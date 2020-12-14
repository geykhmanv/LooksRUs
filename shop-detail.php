<!DOCTYPE html>
<html lang="en">
<!-- Basic -->


<?php include 'db_connect.php';

$itemId = $_GET["itemId"];
//echo $productCategory . "<br>";

$sql = "SELECT * from inventory WHERE ITEM_ID ="  . $itemId;
$q = $pdo->prepare($sql);
$q->execute();
$q->setFetchMode(PDO::FETCH_ASSOC);

$rowNum = 0;
while ($row = $q->fetch()) { 
    $itemObj = array();
    foreach( $row as $columnName => $value ){
        $itemObj[$columnName] = $value;
        $items[$rowNum] = $itemObj;
        //echo $value . "<br>";
   }//foreach
   $rowNum ++;
}//while


   //print_r($items);   

?>





<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Shop Detail</title>
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

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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

    <script>
    $(document).ready(function(){
        
        $("#btnAddToCart").click(function(){               
           
           var itemSize = $( "select#itemSize" ).val();
           var itemQuantity = $( "select#itemQuantity" ).val();
           var itemId = $("#itemId").val();
           console.log("itemSize=" + itemSize + "; itemQuantity=" + itemQuantity + "; itemId=" + itemId);
                    
           $.ajax({
              url: 'addToCart.php',
              type: 'POST',
              data :    {
                             itemSize : itemSize,
                             itemQuantity : itemQuantity,
                             itemId : itemId
                        },
              success: function(data) {
                alert(data.trim());
              },//success

            });//ajax
           

        });//$("#btnAddToCart").click(function()

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
                                    <i class="fab fa-opencart"></i> 20% off Entire Purchase Promo code: offT20
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
                        <li ><a href="displayCart.php">
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
                    <h2>Shop Detail</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Shop Detail </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Shop Detail  -->
    <div class="shop-detail-box-main">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6">
                   
            <?php
                 for($i = 0; $i < count($items); $i++){ 
            ?>
                    <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active"> <img class="d-block w-100" src="<?php echo $items[$i]["ITEM_IMG"] ?>" alt="First slide"> </div>
                            
                        </div>
                        <a class="carousel-control-prev" href="#carousel-example-1" role="button" data-slide="prev"> 
                        <i class="fa fa-angle-left" aria-hidden="true"></i>
                        <span class="sr-only">Previous</span> 
                    </a>
                        <a class="carousel-control-next" href="#carousel-example-1" role="button" data-slide="next"> 
                        <i class="fa fa-angle-right" aria-hidden="true"></i> 
                        <span class="sr-only">Next</span> 
                    </a>
                
                    </div>
            






                </div>
                <div class="col-xl-7 col-lg-7 col-md-6">
                    <div class="single-product-details">
                        <h2><?php echo $items[$i]["ITEM_NAME"] ?></h2>
                        <h5>$<?php echo $items[$i]["ITEM_PRICE"] ?>.00</h5>
                        
                           
            <?php
                }// for($i = 0; $i < count($items); $i++)


            ?>
                            <form>
                                <ul>
                                    <li>
                                        <div class="form-group size-st">
                                            <label class="size-label">Size</label>
                                            <select name = "Size" id="itemSize" class="selectpicker show-tick form-control">
                            
                                                <option value="S">S</option>
                                                <option value="M">M</option>
                                                <option value="L">L</option>
                                                <option value="XL">XL</option>
                                            </select>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group size-st">
                                            <label class="size-label">Quantity</label>
                                            <select name = "Quantity" id="itemQuantity" class="selectpicker show-tick form-control">
                                    
                                                <option name = "1" value="1">1</option>
                                                <option name = "2" value="2">2</option>
                                                <option name = "3" value="3">3</option>
                                                <option name = "4" value="4">4</option>
                                            </select>
                                        </div>
                                    </li>
                                </ul>
                                
                                <input type = "hidden" id = "itemId" value = "<?php echo $itemId ?>" >

                                <div class="price-box-bar">
                                    <div class="cart-and-bay-btn">
                                       
                                        <input id = "btnAddToCart" type="button"  value = "Add to Cart" class="btn hvr-hover" data-fancybox-close="">
                                    </div>
                                </div>
                             </form>

                                <div class="add-to-btn">
                                    <div class="add-comp">
                                       
                                    </div>
                                    <div class="share-bar">
                                        <a class="btn hvr-hover" href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                                        <a class="btn hvr-hover" href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a>
                                        <a class="btn hvr-hover" href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                                        <a class="btn hvr-hover" href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a>
                                        <a class="btn hvr-hover" href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                    </div>
                </div>
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