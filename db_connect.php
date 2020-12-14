<?php

	$host = "localhost";
	$dbname = "looksrus";
	$username = "look_manager";
	$password = "looksrus2020";

	
	try {
		$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);


		//$q = $pdo->prepare();
		//$q->execute();
		//$q->setFetchMode(PDO::FETCH_ASSOC);


		//while ($row = $q->fetch()) { 
			//foreach( $row as $value ){
				//echo($value);
			//}
		//}//while

	}catch(Exception $pe){
				die("Couldn't connect:" .$pe->getMessage());
	}//catch


//For looksrus.sql:
//GRANT SELECT, INSERT, DELETE, UPDATE
//ON looksrus.*
//TO look_manager@localhost
//IDENTIFIED BY 'looksrus2020';






























?>
















