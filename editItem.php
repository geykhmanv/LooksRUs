<?php
include 'db_connect.php';

$itemID = $_POST['itemID'];

$itemName = "SELECT ITEM_NAME FROM inventory WHERE ITEM_ID =" . $itemID . "";
$q = $pdo->prepare($itemName);
$q->execute();
$q->setFetchMode(PDO::FETCH_ASSOC);
while ($row = $q->fetch()) { 
	$Name = $row["ITEM_NAME"];
}//while

$itemCat = "SELECT ITEM_CAT FROM inventory WHERE ITEM_ID =" . $itemID . "";
$q = $pdo->prepare($itemCat);
$q->execute();
$q->setFetchMode(PDO::FETCH_ASSOC);
while ($row = $q->fetch()) { 
	$Cat = $row["ITEM_CAT"];
}//while

$itemPrice = "SELECT ITEM_PRICE FROM inventory WHERE ITEM_ID =" . $itemID . "";
$q = $pdo->prepare($itemPrice);
$q->execute();
$q->setFetchMode(PDO::FETCH_ASSOC);
while ($row = $q->fetch()) { 
	$Price = $row["ITEM_PRICE"];
}//while

$itemImg = "SELECT ITEM_IMG FROM inventory WHERE ITEM_ID =" . $itemID . "";
$q = $pdo->prepare($itemImg);
$q->execute();
$q->setFetchMode(PDO::FETCH_ASSOC);
while ($row = $q->fetch()) { 
	$Img = $row["ITEM_IMG"];
}//while

?>

<form action="" method = "post">
	<input readonly id = "$itemID" name = "itemID" value="<?= $itemID; ?>"><br><br>
	<input id = "$itemName" name = "itemName" value="<?= $Name; ?>"><br><br>
	<input id = "$itemCat" name = "itemCat" value="<?= $Cat; ?>"><br><br>
	<input id = "$itemPrice" name = "itemPrice" value="<?= $Price; ?>"><br><br>
	<input id = "$itemImg" name = "itemImg" value="<?= $Img; ?>"><br><br>
	<input name = "submit" type="submit" value="Submit">

</form> 

<?php

if(isset($_POST['submit'])){
	$sql = "UPDATE inventory
			SET ITEM_NAME = '" . $_POST['itemName'] . "', ITEM_CAT = '" . $_POST['itemCat'] . "',  ITEM_PRICE = '" . $_POST['itemPrice'] . "', ITEM_IMG = '" . $_POST['itemImg'] . "'
			WHERE ITEM_ID = " . $itemID;
	$q = $pdo->prepare($sql);
	$q->execute();
	$q->setFetchMode(PDO::FETCH_ASSOC);
	//echo($sql);

	header('Location:admin.php');
}//if(isset($_POST['submit']))

?>

