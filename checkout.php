
<!DOCTYPE html>

<html>
<head>
    <title>Checkout</title>
</head>
<style>

    

    .indented {
        margin-top: -15px;
        margin-left:50px;
    }/*indented*/

    .divform {
        padding-left: 10px;
        width: 700px;
        margin: 0px;
        margin-bottom: 70px;
    }/*divform*/
    
    .divform input {
        display: inline-block;
        width: 200px;
        margin-bottom: 3px;
    }/*divform input*/

    .divform label {
        display: inline-block;
        width: 200px;
        margin-bottom: 3px;
    }/*divform label*/

    .divform select {
        margin-bottom: 3px;
    }/*divform select*/

    

</style>
<body>

    <h1>Please enter your information:</h1>
    

    
    <div class = divform>
    <form action ="checkoutReceipt.php" method = "post">
            <label for = "fname">First name:</label>
            <input type = "text" id = "fname" name = "fname" required><br>
            <label for = "lname">Last name:</label>
            <input type = "text" id = "lname" name = "lname" required><br><br>
            <label style = "font-weight: bold">Billing Address</label><br>
            <label for = "baddress">Address:</label>
            <input type = "text" id = "baddress" name = "baddress"><br>
            <label for = "bcity">City:</label>
            <input type = "text" id = "bcity" name = "bcity"><br>
            <label for = "bstate">State:</label>
            <input type = "text" id = "bstate" name = "bstate"><br>
            <label for = "bzip">Zip Code:</label>
            <input type = "text" id = "bzip" name = "bzip"><br><br>
            <label style = "font-weight: bold">Shipping Address</label><br>
            <label for = "saddress">Address:</label>
            <input type = "text" id = "saddress" name = "saddress"><br>
            <label for = "scity">City:</label>
            <input type = "text" id = "scity" name = "scity"><br>
            <label for = "sstate">State:</label>
            <input type = "text" id = "sstate" name = "sstate"><br>
            <label for = "szip">Zip Code:</label>
            <input type = "text" id = "szip" name = "szip"><br><br>
            <label for = "phone">Phone:</label>
            <input type = "tel" id = "phone" name = "phone" placeholder = "(###) ###-####"><br>
            <label for = "email">Email Address:</label>
            <input type = "email" id = "email" name = "email" placeholder = "name@domain.com" required><br>
            <label for = "payment">Payment Method:</label>
            <select name="payment" required>
                    <option value="MC">Mastercard</option>
                    <option value="VISA">Visa</option>
                    <option value="AMEX">American Express</option>
                    <option value="DISC">Discover</option>
            </select><br>
            <label for = "card">Card Number:</label>
            <input type = "text" id = "card" name = "card" required ><br><br>
            <input type="submit" value="Submit"> <input type="reset" value="Clear">
        

        </form>
        </div>

    




</div>





</body>
</html>