<?php
include "db_connect.php";

//delete from user_cart where CART_ID = $loggedInUserId and ITEM_ID = itemId
$loggedInUserId = -1;
$sql = "SELECT ID FROM customer_account WHERE LOGGED_IN = 1";
$q = $pdo->prepare($sql);
$q->execute();
$q->setFetchMode(PDO::FETCH_ASSOC);
while ($row = $q->fetch()) {
    $loggedInUserId = $row["ID"];
    //echo $loggedInUserId;
}//while


$itemId = $_POST["itemId"];

try{
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM user_cart WHERE CART_ID = " . $loggedInUserId . " and ITEM_ID = " . $itemId;
    $pdo->exec($sql);
}catch(Exception $e){
    echo $sql . "<br>" . $e->getMessage();
    return false;
}//catch

?>