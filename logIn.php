<?php
include "db_connect.php";
//Login page, Script that creates/populates an existing cart based on user ID
// example, User logs in, Has no cart on file, cart is created. Has cart on file, cart is loaded from memory, then person can add and subtract items from cart with buttons

$username = $_POST['uname'];
$password = $_POST['psw'];

checkUser($pdo, $username);
checkPassword($pdo, $username, $password);

//check if username exists
function checkUser($pdo, $username){
	echo ("Entering checkUser...<br>");
	$sql = "SELECT USERNAME FROM customer_account WHERE USERNAME =  '" . $username . "'";
	$q = $pdo->prepare($sql);
	$q->execute();
	$q->setFetchMode(PDO::FETCH_ASSOC);
	$numRows = $q->rowCount();
	if( $numRows == 0){
		echo("User " . $username . " does not exist. <br>");
		return false;
	}//if( $numRows == 0){

	while ($row = $q->fetch()){
		echo ("row['USERNAME'] = " . $username . "<br>");
		if($row["USERNAME"] == $username){
			return true;
		}//if
	} //while ($row = $q->fetch()){	

}//function checkUser($pdo, $username){

//check if password user enters is associated with username entered
function checkPassword($pdo, $username, $password){
	echo("Entering checkPassword...<br>");
	$sql = "SELECT PASSWORD FROM customer_account WHERE USERNAME =  '" . $username . "'";
	$q = $pdo->prepare($sql);
	$q->execute();
	$q->setFetchMode(PDO::FETCH_ASSOC);
	$numRows = $q->rowCount();
	if( $numRows == 0){
		echo("Wrong password");
		return false;
	}//if( $numRows == 0){


	while ($row = $q->fetch()){
		echo ("row['PASSWORD'] = " . $password . "<br>");
		if($row["PASSWORD"] == $password){
			return true;
		}//if
	} //while ($row = $q->fetch()){	

}//function checkPassword($pdo, $username, $password){


//validates the user
function validateUser($pdo, $username, $password){
	echo("Entering validateUser...");
	if(!checkUser($pdo, $username)){
		return false;
	}
	if(!checkPassword($pdo, $username, $password)){
		return false;
	}
	return true;
}//function validateUser($pdo, $username, $password){

$q = validateUser($pdo, $username, $password);
if($q){
	//update LOGGED_IN to value 1
	$sql = "UPDATE customer_account 
			SET LOGGED_IN = 1
			WHERE PASSWORD =  '" . $password . "'";
	$q = $pdo->prepare($sql);
	$q->execute();
	$q->setFetchMode(PDO::FETCH_ASSOC);

	//set all other LOGGED_IN values to 0
	$sql2 = "UPDATE customer_account
			SET LOGGED_IN = 0
			WHERE PASSWORD !=  '" . $password . "'";
	$q = $pdo->prepare($sql2);
	$q->execute();
	$q->setFetchMode(PDO::FETCH_ASSOC);


	//admin user goes straight to admin page
	if($username == 'admin'){
		header('Location:admin.php?loginResult=Login');
	}//if

	//other users go to home screen after logging in
	else {
		header('Location:index.html?loginResult=Login');
	}//else

}//if
else{
	header('Location: logInForm.php?loginResult=Login Failed');
}//else




























?>