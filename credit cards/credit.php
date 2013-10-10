<?php
session_start();
include('../connection.php');
 
Stripe::setApiKey('<secret key>');
$name = htmlspecialchars($_POST["name"]);
$address1 = htmlspecialchars($_POST["address1"]);
$city = htmlspecialchars($_POST["city"]);
$state = htmlspecialchars($_POST["state"]);
$zip = htmlspecialchars($_POST["zip"]);
$email = htmlspecialchars($_POST["email"]);
$stripeToken = htmlspecialchars($_POST["stripeToken"]);
	
try {
$response = Stripe_Charge::create(array("amount" => $amount * 100,
"currency" => "usd",
"card" => $stripeToken,
"description" => "Purchase for: $name / $email")
);
$details = json_decode($response);
$card = $details->card;
echo "Thank you for your payment for $name<br/>";
echo "This is your confirmation page and printable receipt for your purchase of $$amount charged to your $card->type ending in $card->last4.<br/>";
echo "Your charge confirmation number is: $details->id. <br/><br/>Thank you for your purchase!";
$conn = new mysqli($host,$user,$password,$db,3306);
if(!$conn || $conn->connect_errno) {
die("Could not connect to database!");
}
if(!($query = $conn->prepare("INSERT INTO `Payment` (`Name`,`Address1`,`City`,`State`,`Zip`,`Email`,`Verification`, `Amount`) VALUES (?,?,?,?,?,?,?,?)"))) {
die("Database Prepare failed!");
}
if(!$query->bind_param("ssssssd", $name, $address1, $city, $state, $zip, $email, $stripeToken, $amount )) {
die("Bind failed!");
}
if(!$query->execute()) {
die("Execute failed!");
}
}
catch (Exception $e) {
echo "Purchase Page<br/>";
echo "Unfortunately there was an error charging your credit card for $$amount.<br/>";
echo "The error was: " . $e->getMessage() ;
}
echo "</BODY></HTML>";
?> 