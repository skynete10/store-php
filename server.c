#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <errno.h>
#include <netdb.h>
#include <unistd.h>
#include <pthread.h>
#include <arpa/inet.h>
#include <netinet/in.h>
#include <sys/types.h>
#include <sys/socket.h>
#define IP "127.0.0.1"
#define PORT 8080
#define BACKLOG 10
#define CLIENTS 10
#define BUFFSIZE 1024
#define FILESIZE 20000
#define NAMESIZE 16
#define ALIASLEN 32
#define OPTLEN 16
#define LENGTH 512
#define ANSI_COLOR_RED     "\x1b[31m"
#define ANSI_COLOR_GREEN   "\x1b[32m"
#define ANSI_COLOR_YELLOW  "\x1b[33m"
#define ANSI_COLOR_BLUE    "\x1b[34m"
#define ANSI_COLOR_MAGENTA "\x1b[35m"
#define ANSI_COLOR_CYAN    "\x1b[36m"
#define ANSI_COLOR_RESET   "\x1b[0m"
struct PACKET {
char option[OPTLEN]; // instruction
char user[ALIASLEN]; // client's user
char buff[BUFFSIZE]; // payload
char name[FILESIZE];
};


struct THREADINFO {
pthread_t thread_ID; // thread's pointer
int sockfd; // socket file descriptor
char user[ALIASLEN]; // client's user
};
struct LLNODE {
struct THREADINFO threadinfo;
struct LLNODE *next;
};
struct LLIST {
struct LLNODE *head, *tail;
int size;
};
int compare(struct THREADINFO *a, struct THREADINFO *b) {
return a->sockfd - b->sockfd;
}
void list_init(struct LLIST *ll) {
ll->head = ll->tail = NULL;
ll->size = 0;
}
int list_insert(struct LLIST *ll, struct THREADINFO *thr_info) {
if(ll->size == CLIENTS) return -1;
if(ll->head == NULL) {
ll->head = (struct LLNODE *)malloc(sizeof(struct LLNODE));
ll->head->threadinfo = *thr_info;
ll->head->next = NULL;
ll->tail = ll->head;
}
else {
ll->tail->next = (struct LLNODE *)malloc(sizeof(struct LLNODE));
ll->tail->next->threadinfo = *thr_info;
ll->tail->next->next = NULL;
ll->tail = ll->tail->next;
}
ll->size++;
return 0;
}
int list_delete(struct LLIST *ll, struct THREADINFO *thr_info) {
struct LLNODE *curr, *temp;
if(ll->head == NULL) return -1;
if(compare(thr_info, &ll->head->threadinfo) == 0) {
temp = ll->head;
ll->head = ll->head->next;
if(ll->head == NULL) ll->tail = ll->head;
free(temp);
ll->size--;
return 0;
}
for(curr = ll->head; curr->next != NULL; curr = curr->next) {
if(compare(thr_info, &curr->next->threadinfo) == 0) {
temp = curr->next;
if(temp == ll->tail) ll->tail = curr;
curr->next = curr->next->next;
free(temp);
ll->size--;
return 0;
}
}
return -1;
}
void list_dump(struct LLIST *ll) {
struct LLNODE *curr;
struct THREADINFO *thr_info;
printf(ANSI_COLOR_GREEN "online users: %d\n" ANSI_COLOR_RESET, ll->size);
for(curr = ll->head; curr != NULL; curr = curr->next) {
thr_info = &curr->threadinfo;
printf(ANSI_COLOR_GREEN "[%d] %s\n" ANSI_COLOR_RESET, thr_info->sockfd, thr_info->user);
}
}
int sockfd, newfd;
struct THREADINFO thread_info[CLIENTS];
struct LLIST client_list;
pthread_mutex_t clientlist_mutex;
void *io_handler(void *param);
void *client_handler(void *fd);
int main(int argc, char **argv) {
int err_ret, sin_size;
struct sockaddr_in serv_addr, client_addr;
pthread_t interrupt;
/* initialize linked list */
list_init(&client_list);
/* initiate mutex */
pthread_mutex_init(&clientlist_mutex, NULL);
/* open a socket */
if((sockfd = socket(AF_INET, SOCK_STREAM, 0)) == -1) {
err_ret = errno;
fprintf(stderr, "socket() failed...\n");
return err_ret;
}
/* set initial values */
serv_addr.sin_family = AF_INET;
serv_addr.sin_port = htons(PORT);
serv_addr.sin_addr.s_addr = inet_addr(IP);
memset(&(serv_addr.sin_zero), 0, 8);
/* bind address with socket */
if(bind(sockfd, (struct sockaddr *)&serv_addr, sizeof(struct sockaddr)) == -1) {
err_ret = errno;
fprintf(stderr, "bind() failed...\n");
return err_ret;
}
/* start listening for connection */
if(listen(sockfd, BACKLOG) == -1) {
err_ret = errno;
fprintf(stderr, "listen() failed...\n");
return err_ret;
}
/* initiate interrupt handler for IO controlling */
printf(ANSI_COLOR_BLUE "Starting server...\n" ANSI_COLOR_RESET);
sleep(1);
int rows, star, spaces;
        int number_of_stars = 6;
        int number_of_rows = number_of_stars;

        for (rows=1; rows <= number_of_rows; rows++) {
                for (spaces=1; spaces <= number_of_stars; spaces++) {
                        printf(" ");
                }
                for (star=1; star <= rows; star++) {
                        printf("*");
                        printf(" ");
                }
                printf("\n");
                number_of_stars = number_of_stars - 1;
        }

if(pthread_create(&interrupt, NULL, io_handler, NULL) != 0) {
err_ret = errno;
fprintf(stderr, "pthread_create() failed...\n");
return err_ret;
}
/* keep accepting connections */
printf(ANSI_COLOR_GREEN "accepting connections...\n" ANSI_COLOR_RESET);
while(1) {
sin_size = sizeof(struct sockaddr_in);
if((newfd = accept(sockfd, (struct sockaddr *)&client_addr, (socklen_t*)&sin_size)) == -1) {
err_ret = errno;
fprintf(stderr, "accept() failed...\n");
return err_ret;
}
else {
if(client_list.size == CLIENTS) {
fprintf(stderr, "Connection full, request rejected...\n");
continue;
}
printf("Connection requested received...\n");
struct THREADINFO threadinfo;
threadinfo.sockfd = newfd;
strcpy(threadinfo.user, "default");
pthread_mutex_lock(&clientlist_mutex);
list_insert(&client_list, &threadinfo);
pthread_mutex_unlock(&clientlist_mutex);
pthread_create(&threadinfo.thread_ID, NULL, client_handler, (void *)&threadinfo);
}
}
return 0;
}
void *io_handler(void *param) {
char option[OPTLEN];
while(scanf("%s", option)==1) {
if(!strcmp(option, "exit")) {
/* clean up */
printf("Terminating server...\n");
pthread_mutex_destroy(&clientlist_mutex);
close(sockfd);
exit(0);
}
else if(!strcmp(option, "list")) {
pthread_mutex_lock(&clientlist_mutex);
list_dump(&client_list);
pthread_mutex_unlock(&clientlist_mutex);
}
else {
fprintf(stderr, ANSI_COLOR_RED "Unknown command: %s...\n" ANSI_COLOR_RESET, option);
}
}
return NULL;
}
void *client_handler(void *fd) {
struct THREADINFO threadinfo = *(struct THREADINFO *)fd;
struct PACKET packet;

struct LLNODE *curr;
int bytes,bytes1, sent;
while(1) {
bytes = recv(threadinfo.sockfd, (void *)&packet, sizeof(struct PACKET), 0);

if(!bytes) {
fprintf(stderr, ANSI_COLOR_RED "Connection lost from [%d] %s...\n" ANSI_COLOR_RESET, threadinfo.sockfd, threadinfo.user);
pthread_mutex_lock(&clientlist_mutex);
list_delete(&client_list, &threadinfo);
pthread_mutex_unlock(&clientlist_mutex);
break;
}

printf("[%d] %s %s %s\n", threadinfo.sockfd, packet.option, packet.user, packet.buff);

if(!strcmp(packet.option, "change")) {
printf("Set user to %s\n", packet.user);
pthread_mutex_lock(&clientlist_mutex);
for(curr = client_list.head; curr != NULL; curr = curr->next) {
if(compare(&curr->threadinfo, &threadinfo) == 0) {
strcpy(curr->threadinfo.user, packet.user);
strcpy(threadinfo.user, packet.user);
break;
}
}
pthread_mutex_unlock(&clientlist_mutex);
}
else if(!strcmp(packet.option, "specf")) {
int i;
char target[ALIASLEN];
for(i = 0; packet.buff[i] != ' '; i++); packet.buff[i++] = 0;
strcpy(target, packet.buff);
pthread_mutex_lock(&clientlist_mutex);
for(curr = client_list.head; curr != NULL; curr = curr->next) {
if(strcmp(target, curr->threadinfo.user) == 0) {
struct PACKET spacket;
memset(&spacket, 0, sizeof(struct PACKET));
if(!compare(&curr->threadinfo, &threadinfo)) continue;
strcpy(spacket.option, "specf");
strcpy(spacket.user, packet.user);
strcpy(spacket.buff, &packet.buff[i]);
sent = send(curr->threadinfo.sockfd, (void *)&spacket, sizeof(struct PACKET), 0);
}
}
pthread_mutex_unlock(&clientlist_mutex);
}
else if(!strcmp(packet.option, "sfile")) {
int i;
char target[ALIASLEN];
for(i = 0; packet.buff[i] != ' '; i++); packet.buff[i++] = 0;
strcpy(target, packet.buff);
pthread_mutex_lock(&clientlist_mutex);
for(curr = client_list.head; curr != NULL; curr = curr->next) {
if(strcmp(target, curr->threadinfo.user) == 0) {
struct PACKET spacket;
memset(&spacket, 0, sizeof(struct PACKET));
if(!compare(&curr->threadinfo, &threadinfo)) continue;
strcpy(spacket.option, "sfile");
strcpy(spacket.user, packet.user);
strcpy(spacket.name, packet.name);

strcpy(spacket.buff, &packet.buff[i]);
sent = send(curr->threadinfo.sockfd, (void *)&spacket, sizeof(struct PACKET), 0);
}
}
pthread_mutex_unlock(&clientlist_mutex);
}
else if(!strcmp(packet.option, "encrypt")) {
int i;
char target[ALIASLEN];
for(i = 0; packet.buff[i] != ' '; i++); packet.buff[i++] = 0;
strcpy(target, packet.buff);
pthread_mutex_lock(&clientlist_mutex);
for(curr = client_list.head; curr != NULL; curr = curr->next) {
if(strcmp(target, curr->threadinfo.user) == 0) {
struct PACKET spacket;
memset(&spacket, 0, sizeof(struct PACKET));
if(!compare(&curr->threadinfo, &threadinfo)) continue;
strcpy(spacket.option, "encrypt");
strcpy(spacket.user, packet.user);
strcpy(spacket.buff, &packet.buff[i]);
sent = send(curr->threadinfo.sockfd, (void *)&spacket, sizeof(struct PACKET), 0);
}
}
pthread_mutex_unlock(&clientlist_mutex);
}
else if(!strcmp(packet.option, "send")) {

pthread_mutex_lock(&clientlist_mutex);
for(curr = client_list.head; curr != NULL; curr = curr->next) {
struct PACKET spacket;
memset(&spacket, 0, sizeof(struct PACKET));
if(!compare(&curr->threadinfo, &threadinfo)) continue;
strcpy(spacket.option, "msg");
strcpy(spacket.user, packet.user);
strcpy(spacket.buff, packet.buff);
strcpy(spacket.name,packet.name);
sent = send(curr->threadinfo.sockfd, (void *)&spacket, sizeof(struct PACKET), 0);
}
pthread_mutex_unlock(&clientlist_mutex);
}
else if(!strcmp(packet.option, "exit")) {
printf("[%d] %s has disconnected...\n", threadinfo.sockfd, threadinfo.user);
pthread_mutex_lock(&clientlist_mutex);
list_delete(&client_list, &threadinfo);
pthread_mutex_unlock(&clientlist_mutex);
break;
}
else {
fprintf(stderr, "wrong data send from [%d] %s...\n", threadinfo.sockfd, threadinfo.user);
}
}
/* clean up */
close(threadinfo.sockfd);
return NULL;
}

