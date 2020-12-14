<?php
include 'db_connect.php';

$loggedInUserId = -1;
$cartItems = array();

$sql = "SELECT ID FROM customer_account WHERE LOGGED_IN = 1";
$q = $pdo->prepare($sql);
$q->execute();
$q->setFetchMode(PDO::FETCH_ASSOC);
while ($row = $q->fetch()) {
    $loggedInUserId = $row["ID"];
    //echo $loggedInUserId;
}//while


//Retrieve Cart here
$sql = "SELECT b.ITEM_ID, a.ITEM_NAME, a.ITEM_PRICE, a.ITEM_IMG, b.SIZE, b.QUANTITY from inventory a INNER JOIN user_cart b ON a.ITEM_ID = b.ITEM_ID WHERE b.CART_ID = " . $loggedInUserId;
$q = $pdo->prepare($sql);
$q->execute();
$q->setFetchMode(PDO::FETCH_ASSOC);


while ($row = $q->fetch()) { 
    $itemObj = array();
    foreach( $row as $columnName => $value ){
        $itemObj[$columnName] = $value;           
        //echo $value . "<br>";
    }//foreach
    $mapKey = $itemObj["ITEM_ID"] . $itemObj["SIZE"];
    // echo "mapKey = [" . $mapKey . "]<br>";
    if(array_key_exists($mapKey, $cartItems) ){
        //echo "Found " . $mapKey . " in array<br>";
        $cartItems[$mapKey]["QUANTITY"] = $cartItems[$mapKey]["QUANTITY"] + $itemObj["QUANTITY"];
    } else {
        $cartItems[$mapKey] = $itemObj;   
    }//else
}//while

//print_r($cartItems);
?>

<html>
<head>
	<title>Receipt</title>
</head>

<body>
<div>
	<h1>Thank you <?php echo $_POST["fname"]; ?> <?php echo $_POST["lname"];?> for your Purchase</h1>

	<p>The following is the information that you entered:</p>

	<table>
		<tr>
			<td style = "font-weight:bold">Billing Address:</td>
			<td><?php echo $_POST["baddress"]; ?></td>
		</tr>
		<tr>
			<td>City:</td>
			<td><?php echo $_POST["bcity"]; ?></td>
		</tr>
		<tr>
			<td>State:</td>
			<td><?php echo $_POST["bstate"]; ?></td>
		</tr>
		<tr>
			<td>Zip Code:</td>
			<td><?php echo $_POST["bzip"]; ?></td>
		</tr>
		<tr>
			<td style = "font-weight:bold">Shipping Address:</td>
			<td><?php echo $_POST["saddress"]; ?></td>
		</tr>
		<tr>
			<td>City:</td>
			<td><?php echo $_POST["scity"]; ?></td>
		</tr>
		<tr>
			<td>State:</td>
			<td><?php echo $_POST["sstate"]; ?></td>
		</tr>
		<tr>
			<td>Zip Code:</td>
			<td><?php echo $_POST["szip"]; ?></td>
		</tr>
		<tr>
			<td>Email:</td>
			<td><?php echo $_POST["email"]; ?></td>
		</tr>
		<tr>
			<td>Phone Number:</td>
			<td><?php echo $_POST["phone"]; ?></td>
		</tr>
		<tr>
			<td>Credit Card:</td>
			<td><?php echo $_POST["payment"]; ?></td>
		</tr>
		<tr>
			<td>Card Number:</td>
			<td><?php echo $_POST["card"]; ?></td>
		</tr>
		

	</table><br><br><br><br>
	<?php

                $subtotal = 0;
                foreach($cartItems as $itemKey => $itemObj) {
                    $subtotal += ($itemObj["ITEM_PRICE"] * $itemObj["QUANTITY"]);
                }//foreach
?>
                        <div >
                            <h4>Sub Total</h4>
                            <div >$<?php echo $subtotal; ?>.00</div>
                        </div>
                    <hr class="my-1">
                        <div >
                            <h4>Shipping Cost</h4>
                            <div > Free </div>
                        </div>
                        <hr>
                        <div >
                            <h5>Grand Total</h5>
                            <div> $<?php echo $subtotal; ?>.00</div>
                        </div>
                        <hr> </div>
                </div>

	<a href = "index.html"><p>Back to Home</p></a>
		
	
	
</div>




</body>
</html>