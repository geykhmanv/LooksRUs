<?php
include 'db_connect.php';



$itemName = $_POST['itemName'];
$itemCat = $_POST['itemCat'];
$itemPrice = $_POST['itemPrice'];
$itemImg = $_POST['itemImg'];

try{
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "INSERT INTO inventory (ITEM_NAME, ITEM_CAT, ITEM_PRICE, ITEM_IMG) VALUES('" . $itemName . "', '" . $itemCat . "', " . $itemPrice . " , '" . $itemImg . "')";
	//echo $sql . "<br>";
	$pdo->exec($sql);
	
}catch(Exception $e){
	echo $sql . "<br>" . $e->getMessage();
}//catch























?>