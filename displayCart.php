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

<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Cart</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!-- ALL JS FILES -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/jquery.superslides.min.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/inewsticker.js"></script>
    <script src="js/bootsnav.js."></script>
    <script src="js/images-loded.min.js"></script>
    <script src="js/isotope.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/baguetteBox.min.js"></script>
    <script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>


    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script>
        $(document).ready(function(){
            
            $(".btnDeleteItem").click(function(){               
               var itemId =  $(this).attr("id");
               alert("I am item " + itemId );

               
               $.ajax({
                  url: 'deleteFromCart.php',
                  type: 'POST',
                  data: "itemId=" + itemId,
                  success: function(data) {
                    if(data === null || data.trim() == ""){
                        alert('Item ' + itemId + ' deleted');
                        location.reload();
                    }else {
                        alert(data);
                    }

                  }//success
                });//ajax
            });//$(".btnDeleteItem").click

            

        });//$(document).ready
    </script>

</head>




<body>

     <!-- Start Main Top -->
   <div class="main-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="text-slid-box">
                        <div id="offer-box" class="carouselTicker">
                            <ul class="offer-box">
                                
                                <li>
                                   <!-- <i class="fab fa-opencart"></i> 20% off Entire Purchase Promo code: offT20 -->
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Free Shipping on ALL Purchases
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="right-phone-box">
                        <p>Call Us: 1(800)CLS-4YOU</p>
                    </div>
                    <div class="our-link">
                        <ul>
                            <li><a href = "logInForm.php">Log In</li>
                            <li><a href = "registerNewUserForm.php">Create Account</li>
                            <li><a href="contact-us.html">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Top -->

      <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                    <a class="navbar-brand" href="index.html"><img src="images/lookLogo.jpg" class="logo" alt="logo" style = "width: 100px; height:100px;"></a> 
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
               <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                   
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                 <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item active"><a class="nav-link" href="index.html">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.html">About Us</a></li>
                        <li class="dropdown megamenu-fw">
                            <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">Clothing</a>
                            <ul class="dropdown-menu megamenu-content" role="menu">
                                <li>
                                    <div class="row">
                                        <div class="col-menu col-md-3">
                                            <h6 class="title">Men</h6>
                                            <div class="content">
                                               <ul class="menu-col">
                                                    <li><a href="shop.php?productCategory=Men-Shirts">Shirts</a></li>
                                                    <li><a href="shop.php?productCategory=Men-Bottoms">Bottoms</a></li>
                                                    <li><a href="shop.php?productCategory=Men-Jackets">Jackets</a></li>
                                                    <li><a href="shop.php?productCategory=Men-Shoes">Shoes</a></li>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- end col-3 -->
                                        <div class="col-menu col-md-3">
                                            <h6 class="title">Women</h6>
                                            <div class="content">
                                                <ul class="menu-col">
                                                    <li><a href="shop.php?productCategory=Women-Tops">Tops</a></li>
                                                    <li><a href="shop.php?productCategory=Women-Dresses">Dresses</a></li>
                                                    <li><a href="shop.php?productCategory=Women-Bottoms">Bottoms</a></li>
                                                    <li><a href="shop.php?productCategory=Women-Shoes">Shoes</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- end col-3 -->
                                        <div class="col-menu col-md-3">
                                            
                                            <div class="content">
                                                <ul class="menu-col">
                                                   
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-menu col-md-3">
                                            
                                            <div class="content">
                                                <ul class="menu-col">
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- end col-3 -->
                                    </div>
                                    <!-- end row -->
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            
                        <li class="nav-item"><a class="nav-link" href="contact-us.html">Contact Us</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                        <li><a href="displayCart.php">
                        <i class="fa fa-shopping-bag"></i>
                            <span class="badge"></span>
                    </a></li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->
            </div>
            
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->

     <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Cart</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

<!--DISPLAY CART HERE -->
     <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                    <form>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Images</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Size</th>
                                    <th>Quantity</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
<?php
                                foreach($cartItems as $itemKey => $itemObj) {
                                    //echo "Key=" . $itemKey . ", Value=" . $itemObj["ITEM_ID"] . "<br>";
?>
                                    <tr>
                                      <td class="thumbnail-img"><img class="img-fluid" src="<?php echo $itemObj["ITEM_IMG"]; ?>" alt="" />
                                      </td>
                                      <td class = "name-pr">
                                          <p><?php echo $itemObj["ITEM_NAME"]; ?></p>
                                      </td>  
                                      <td class = "price-pr">
                                          <p>$<?php echo $itemObj["ITEM_PRICE"]; ?>.00</p>
                                      </td>
                                      <td class = "">
                                          <p><?php echo $itemObj["SIZE"]; ?></p>
                                      </td>
                                      <td class="quantity-box">
                                           <p><?php echo $itemObj["QUANTITY"]; ?></p>   
                                      </td>
                                      <td>
                                        <a id="<?php echo $itemObj["ITEM_ID"]; ?>" class="btnDeleteItem" href="javascript:void(0)">&#10006</a>
                                      </td>

                                    
                                        
                                    </tr>
<?php
                                }// for($i=0; $i<count($cartItems); $i++){
?>
                            </tbody>
                        </table>
                    </form>
                    </div><!-- <div class="table-main table-responsive">-->
                </div><!-- <div class="col-lg-12">-->
            </div><!--<div class="row">-->
        </div><!--<div class="container">-->
    </div> <!--<div class="cart-box-main">-->
<!-- DISPLAY CART END -->

<div class="row my-5">
                <div class="col-lg-6 col-sm-6">
                    
                </div>
                <div class="col-lg-6 col-sm-6">
                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-8 col-sm-12"></div>
                <div class="col-lg-4 col-sm-12">
                    <div class="order-box">
                        <h3>Order summary</h3>
<?php

                $subtotal = 0;
                foreach($cartItems as $itemKey => $itemObj) {
                    $subtotal += ($itemObj["ITEM_PRICE"] * $itemObj["QUANTITY"]);
                }//foreach
?>
                        <div class="d-flex">
                            <h4>Sub Total</h4>
                            <div class="ml-auto font-weight-bold">$<?php echo $subtotal; ?>.00</div>
                        </div>
                    <hr class="my-1">
                        <div class="d-flex">
                            <h4>Shipping Cost</h4>
                            <div class="ml-auto font-weight-bold"> Free </div>
                        </div>
                        <hr>
                        <div class="d-flex gr-total">
                            <h5>Grand Total</h5>
                            <div class="ml-auto h5"> $<?php echo $subtotal; ?>.00</div>
                        </div>
                        <hr> </div>
                </div>
                <div class="col-12 d-flex shopping-box"><a href="checkout.php" class="ml-auto btn hvr-hover">Checkout</a> </div>
            </div>

        </div>
    </div>
    <!-- End Cart -->

     <!-- Start Footer  -->
    <footer>
        <div class="footer-main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-widget">
                            <h4>About LooksRUS</h4>
                            <p>Stylish clothing at affordable prices.  Find us on all the social media platforms listed below:
                                </p>
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link">
                            <h4>Information</h4>
                            <ul>
                                <li><a href="about.html">About Us</a></li>
                                <li><a href="contact-us.html">Customer Service</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link-contact">
                            <h4>Contact Us</h4>
                            <ul>
                                <li>
                                    <p><i class="fas fa-map-marker-alt"></i>Address: 1 Normal Avenue <br>Montclair, NJ</p>
                                </li>
                                <li>
                                    <p><i class="fas fa-phone-square"></i>Phone: <a href="tel:+1-888705770">+1-888-888-8888</a></p>
                                </li>
                                <li>
                                    <p><i class="fas fa-envelope"></i>Email: <a href="mailto:looksrus@montclair.edu">looksrus@montclair.edu</a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer  -->


  
    <!-- Start copyright  -->
  
    <!-- End copyright  -->
    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

    
</body>

</html>