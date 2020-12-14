<html>
<head>
	<title>Admin Page</title>
</head>
<style>
</style>
<body>


<?php
include 'db_connect.php';
// Admin page will be a series of buttons
// Item list, will dump all the items to the screen, along with their prices and descriptions

//------ button 2, Edit item button

// Populate an html form with the current item description, price, etc and allow the admin to edit it, or delete it.
// add new item button, same as above but blank fields 

//------ button to show users

//------ button to allow editing of a user account via user id. 


$loginResult = "";
parse_str(parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY), $output);
?>


<form action='' method='post'>
	<button name = 'editInventory' type = 'submit'>Edit Inventory Item</button>
	<button name = 'addItem' type = 'submit'>Add An Item</button>
	<a href = "index.html"><button name = 'home' type = 'button'>Back to Home</button></a>
</form>

<?php
	if(isset($_POST['editInventory'])){
?>
		<form action = "editItem.php" method = "post">
			<input type = "text" name = "itemID" placeholder = "Enter Item ID to Edit"><br><br>
			<input type="submit" value="Submit">
		</form>
<?php
	}//if
?>
<?php
	if(isset($_POST['addItem'])){
?>
		<form action="addItem.php" method = "post">
			<input type="text" name="itemName" placeholder="Enter Item Name"><br><br>
			<input type="text" name="itemCat" placeholder="Enter Item Category"><br><br>
			<input type="text" name="itemPrice" placeholder="Enter Item Price"><br><br>
			<input type="text" name="itemImg" placeholder="Enter Item Image URL"><br><br>
			<input type="submit" value="Submit">

		</form>
<?php
	}//if(isset($_POST['addItem'])){
?>


















</body>
</html>







