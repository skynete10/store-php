#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <errno.h>
#include <netdb.h>
#include <unistd.h>
#include <pthread.h>
#include </home/ubuntu/Desktop/cryptage.h>
#include <arpa/inet.h>
#include <netinet/in.h>
#include <sys/types.h>
#include <sys/socket.h>

#define SERVERIP "127.0.0.1"
#define SERVERPORT 8080

#define BUFFSIZE 1024
#define userLEN 32
#define OPTLEN 16
#define FILEBUFF 20000
#define LINEBUFF 2048
#define NAMESIZE 16
#define LENGTH 2048
#define ANSI_COLOR_RED     "\x1b[31m"
#define ANSI_COLOR_GREEN   "\x1b[32m"
#define ANSI_COLOR_YELLOW  "\x1b[33m"
#define ANSI_COLOR_BLUE    "\x1b[34m"
#define ANSI_COLOR_MAGENTA "\x1b[35m"
#define ANSI_COLOR_CYAN    "\x1b[36m"
#define ANSI_COLOR_RESET   "\x1b[0m"
#define pink "\e[35m"
struct PACKET {
char option[OPTLEN]; 
char user[userLEN]; 
char buff[BUFFSIZE]; // message size
char name[NAMESIZE];
};

struct USER {
int sockfd; // user's socket file descriptor: objets génériques avec des méthodes génériques (open(), close(), read(), write(), ...).
char user[userLEN]; // user's name
};
struct THREADINFO {
pthread_t thread_ID; // thread's pointer:récupérer l'ID d'un thread
int sockfd; // socket file descriptor
};
int isconnected, sockfd;
char option[LINEBUFF];
struct USER me;

int connect_with_server();
void setuser(struct USER *me);//set username
void logout(struct USER *me);//desconnecter de serveur
void login(struct USER *me);//login
void *receiver(void *param);//receive message
void sendtoall(struct USER *me, char *msg); //broadcast
void sendtoclient(struct USER *me, char * target, char *msg);//send to specific user
void sendencrypt(struct USER *me, char * target, char *msg);
void sendfile(struct USER *me, char * target, char *fname,char *buff);
int main(int argc, char **argv) {
int sockfd, userlen;
memset(&me, 0, sizeof(struct USER));
while(gets(option)) {
if(!strncmp(option, "exit", 4)) {
logout(&me);
break;
}
else if(!strncmp(option, "login", 5)) {
char *ptr = strtok(option, " ");
ptr = strtok(0, " ");//set ptr as username
memset(me.user, 0, sizeof(char) * userLEN);
if(ptr != NULL) {
userlen = strlen(ptr);//strlen:calcule la longeur du chaine de caractere
if(userlen > userLEN) ptr[userLEN] = 0;
strcpy(me.user, ptr);//copy ptr in me.user
}
else {

strcpy(me.user, "default");//copy default to me.user



}
login(&me);
}
else if(!strncmp(option, "change", 6)) {
char *ptr = strtok(option, " ");
ptr = strtok(0, " ");
memset(me.user, 0, sizeof(char) * userLEN);
if(ptr != NULL) {
userlen = strlen(ptr);
if(userlen > userLEN) ptr[userLEN] = 0;
strcpy(me.user, ptr);
setuser(&me);
}
}
else if(!strncmp(option, "specf", 5)) {
char *ptr = strtok(option, " ");
char temp[userLEN];
ptr = strtok(0, " ");
memset(temp, 0, sizeof(char) * userLEN);
if(ptr != NULL) {
userlen = strlen(ptr);
if(userlen > userLEN) ptr[userLEN] = 0;
strcpy(temp, ptr);
while(*ptr) ptr++; ptr++;
while(*ptr <= ' ') ptr++;
sendtoclient(&me, temp, ptr);
}
}
else if(!strncmp(option, "sfile", 5)) {
char *ptr = strtok(option, " ");
char temp[userLEN];
char *buff;
ptr = strtok(0, " ");
memset(temp, 0, sizeof(char) * userLEN);
if(ptr != NULL) {
userlen = strlen(ptr);
if(userlen > userLEN) ptr[userLEN] = 0;
strcpy(temp, ptr);
while(*ptr) ptr++; ptr++;
while(*ptr <= ' ') ptr++;
sendfile(&me, temp, ptr,buff);
}
}
else if(!strncmp(option, "encrypt", 7)) {
char *ptr = strtok(option, " ");
char temp[userLEN];
ptr = strtok(0, " ");
memset(temp, 0, sizeof(char) * userLEN);
if(ptr != NULL) {
userlen = strlen(ptr);
if(userlen > userLEN) ptr[userLEN] = 0;
strcpy(temp, ptr);
while(*ptr) ptr++; ptr++;
while(*ptr <= ' ') ptr++;
sendencrypt(&me, temp, ptr);
}
}
else if(!strncmp(option, "broadcast", 9)) {
sendtoall(&me, &option[9]);
}
else if(!strncmp(option, "list", 4)) {

}
else if(!strncmp(option, "logout", 6)) {
logout(&me);
}
else fprintf(stderr, "Unknown option...\n");
}
return 0;
}

void login(struct USER *me) {
int recvd;
if(isconnected) {
fprintf(stderr, "You are already connected to server at %s:%d\n", SERVERIP, SERVERPORT);
return;
}
sockfd = connect_with_server();
if(sockfd >= 0) {
isconnected = 1;
me->sockfd = sockfd;
if(strcmp(me->user, "default")) setuser(me);
printf(pink "Logged in as %s\n" ANSI_COLOR_RESET, me->user);
printf(ANSI_COLOR_YELLOW "ready to send and receive messages [%d]\n" ANSI_COLOR_RESET, sockfd);
sleep(1);
struct THREADINFO threadinfo;
pthread_create(&threadinfo.thread_ID, NULL, receiver, (void *)&threadinfo);

}
else {
fprintf(stderr, "Connection rejected...\n");
}
}

int connect_with_server() {
int newfd, err_ret;
struct sockaddr_in serv_addr;//pour communiquer via internet
struct hostent *to;//for host

/* generate address */
if((to = gethostbyname(SERVERIP))==NULL) {// gethostbyname: recieve info for host name
err_ret = errno;
fprintf(stderr, "gethostbyname() error...\n");
return err_ret;
}

/* open a socket */
if((newfd = socket(AF_INET, SOCK_STREAM, 0)) == -1) {
err_ret = errno;
fprintf(stderr, "socket() error...\n");
return err_ret;
}

/* set initial values */
serv_addr.sin_family = AF_INET;
serv_addr.sin_port = htons(SERVERPORT);
serv_addr.sin_addr = *((struct in_addr *)to->h_addr);
memset(&(serv_addr.sin_zero), 0, 8);

/* try to connect with server */
if(connect(newfd, (struct sockaddr *)&serv_addr, sizeof(struct sockaddr)) == -1) {
err_ret = errno;
fprintf(stderr, "connect() error...\n");
return err_ret;
}
else {
printf("Connected to server at %s:%d\n", SERVERIP, SERVERPORT);
return newfd;
}
}

void logout(struct USER *me) {
int sent;
struct PACKET packet;
if(!isconnected) {
fprintf(stderr, "You are not connected...\n");
return;
}
memset(&packet, 0, sizeof(struct PACKET));
strcpy(packet.option, "exit");
strcpy(packet.user, me->user);
/* send request to close this connetion */
sent = send(sockfd, (void *)&packet, sizeof(struct PACKET), 0);
isconnected = 0;
}

void setuser(struct USER *me) {
int sent;
struct PACKET packet;
if(!isconnected) {
fprintf(stderr, "You are not connected...\n");
return;
}
memset(&packet, 0, sizeof(struct PACKET));
strcpy(packet.option, "change");
strcpy(packet.user, me->user);
/* send request to close this connetion */
sent = send(sockfd, (void *)&packet, sizeof(struct PACKET), 0);//send packet
}

void *receiver(void *param) {

int recvd;
struct PACKET packet;
printf("Waiting for messages from other clients  [%d]...\n" , sockfd);
while(isconnected) {
recvd = recv(sockfd, (void *)&packet, sizeof(struct PACKET), 0);
if(!recvd) {
fprintf(stderr, ANSI_COLOR_RED "Connection lost from server...\n" ANSI_COLOR_RESET);
isconnected = 0;
close(sockfd);
break;
}
if(recvd > 0) {

if(!strcmp(packet.option, "msg")){
printf(ANSI_COLOR_YELLOW "broadcast from [%s]: %s \n" ANSI_COLOR_RESET, packet.user, packet.buff);
}
if(!strcmp(packet.option, "specf")){
printf(ANSI_COLOR_BLUE "message from [%s]: %s \n" ANSI_COLOR_RESET, packet.user, packet.buff);
}
if(!strcmp(packet.option, "encrypt")){
printf(ANSI_COLOR_CYAN "encrypted message from [%s]: %s \n" ANSI_COLOR_RESET, packet.user, packet.buff);
}
if(!strcmp(packet.option, "sfile")){

printf(ANSI_COLOR_GREEN "recieved file from [%s]: contenu: %s file name: %s \n" ANSI_COLOR_RESET, packet.user, packet.buff,packet.name);

char* f_name = packet.name;
    FILE *fp = fopen(f_name, "a");
    if(fp == NULL) printf("File %s cannot be opened.\n", f_name);
    else
    {
        bzero(packet.buff, LENGTH);
        int f_block_sz = 0;
        int success = 0;
        while(success == 0)
        {
            while(f_block_sz = recv(sockfd, (void *)&packet, sizeof(struct PACKET), 0))
            {
                if(f_block_sz < 0)
                {
                    printf("Receive file error.\n");
                    break;
                }
                int write_sz = fwrite(packet.buff, sizeof(char), f_block_sz, fp);
                if(write_sz < f_block_sz)
                {
                    printf("File write failed.\n");
                    break;
                }
                bzero(packet.buff, LENGTH);
            }
            printf("ok!\n");
            success = 1;
            fclose(fp);
        }
    }



}
}
memset(&packet, 0, sizeof(struct PACKET));
}
return NULL;
}
char revbuf[LENGTH];

void sendtoall(struct USER *me, char *msg) {
int sent;
struct PACKET packet;

if(!isconnected) {
fprintf(stderr, "You are not connected...\n");
return;
}
msg[BUFFSIZE] = 0;
memset(&packet, 0, sizeof(struct PACKET));
strcpy(packet.option, "send");
strcpy(packet.user, me->user);
strcpy(packet.buff, msg);
/* send request to close this connetion */
sent = send(sockfd, (void *)&packet, sizeof(struct PACKET), 0);
}

void sendtoclient(struct USER *me, char *target, char *msg) {
int sent, targetlen;
struct PACKET packet;
if(target == NULL) {
return;
}
if(msg == NULL) {
return;
}
if(!isconnected) {
fprintf(stderr, "You are not connected...\n");
return;
}
msg[BUFFSIZE] = 0;
targetlen = strlen(target);
memset(&packet, 0, sizeof(struct PACKET));
strcpy(packet.option, "specf");
strcpy(packet.user, me->user);
strcpy(packet.buff, target);
strcpy(&packet.buff[targetlen], " ");
strcpy(&packet.buff[targetlen+1], msg);
/* send request to close this connetion */
sent = send(sockfd, (void *)&packet, sizeof(struct PACKET), 0);
}
void sendfile(struct USER *me, char *target, char *msg,char *buff) {
int sent, targetlen;
struct PACKET packet;

char* f_name = msg;
            char sdbuf[LENGTH]; // Send buffer
            printf("[server] send %s to the client...", f_name);
            FILE *fp = fopen(f_name, "r");
            if(fp == NULL)
            {
                printf("ERROR: File %s not found.\n", f_name);
                exit(1);
            }
            bzero(sdbuf, LENGTH);
            int f_block_sz;
            while((f_block_sz = fread(sdbuf, sizeof(char), LENGTH, fp))>0)
            {
                strcpy(&packet.buff[targetlen+1], buff);
                bzero(sdbuf, LENGTH);
            }
            printf("ok!\n");
if(target == NULL) {
return;
}
if(msg == NULL) {
return;
}
if(!isconnected) {
fprintf(stderr, "You are not connected...\n");
return;
}
msg[BUFFSIZE] = 0;
targetlen = strlen(target);
memset(&packet, 0, sizeof(struct PACKET));
strcpy(packet.option, "sfile");
strcpy(packet.user, me->user);
strcpy(packet.buff, target);
strcpy(packet.name, msg);
strcpy(&packet.buff[targetlen], " ");

/* send request to close this connetion */
sent = send(sockfd, (void *)&packet, sizeof(struct PACKET), 0);
}
void sendencrypt(struct USER *me, char *target, char *msg) {
int sent, targetlen;
struct PACKET packet;
if(target == NULL) {
return;
}
if(msg == NULL) {
return;
}
if(!isconnected) {
fprintf(stderr, "You are not connected...\n");
return;
}
int a=bin(msg);

char *c=(char*)&a;
printf(ANSI_COLOR_RED "message encrypted : %s\n" ANSI_COLOR_RESET,c);
msg[BUFFSIZE] = 0;
targetlen = strlen(target);
memset(&packet, 0, sizeof(struct PACKET));
strcpy(packet.option, "encrypt");
strcpy(packet.user, me->user);
strcpy(packet.buff, target);
strcpy(&packet.buff[targetlen], " ");
strcpy(&packet.buff[targetlen+1],c);
/* send request to close this connetion */
sent = send(sockfd, (void *)&packet, sizeof(struct PACKET), 0);
}
