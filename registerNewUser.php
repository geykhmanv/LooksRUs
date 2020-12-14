<?php

include "db_connect.php";
$username = $_POST['uname'];
$password = $_POST['psw'];

echo $username . "; " . $password . "<br>";


try{
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "INSERT INTO customer_account (USERNAME, PASSWORD) VALUES('" . $username . "', '" . $password . "' )";
	echo $sql . "<br>";
	$pdo->exec($sql);
	
}catch(Exception $e){
	echo $sql . "<br>" . $e->getMessage();
}

header('Location:index.html?result=Record Added Successfully');




























?>