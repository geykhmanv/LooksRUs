<?php
include 'db_connect.php';
//add item to cart
function addToCart($pdo){
    //echo ("begin addToCart...");
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
    $itemSize = $_POST["itemSize"];
    $itemQuantity = $_POST["itemQuantity"];   

    try{
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO user_cart (CART_ID, ITEM_ID, SIZE, QUANTITY) VALUES (" . $loggedInUserId . ",  " . $itemId . ", '" . $itemSize . "', " . $itemQuantity . " )";
        $pdo->exec($sql);
    }catch(Exception $e){
        echo $sql . "<br>" . $e->getMessage();
        return false;
    }//catch

        return true;

}//function addToCart

    if( addToCart($pdo) )
        echo "Successfully added to cart";
    else
        echo "Failed!";

    
?>

