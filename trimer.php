<?php 
session_start();
include("includes/db.php");  
include("functions/functions.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>TeaMo</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Open+Sans:400,700&display=swap&subset=latin-ext" rel="stylesheet">
    <!-- owl stylesheets --> 
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <!-- header section start -->
    <div class="header_section" style="position: fixed;top: 0;z-index: 999;">
        <div class="container-fluid">
          <nav class="navbar navbar-light bg-light justify-content-between">
              <div id="mySidenav" class="sidenav">
              <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                  <a href="index.php">Home</a>
                  <a href="trimer.php">Products</a>
                  <a href="about.php">About</a>
                  <a href="contacts.php">Contact</a>
              </div>
              <span class="toggle_icon" onclick="openNav()"><img src="images/toggle-icon.png"></span>
              <a class="logo" href="index.php"><img src="images/logo.png"></a></a>
              <form class="form-inline ">
                <div class="login_text">
                    <ul>
                      <li><a href="#"><img src="images/search-icon.png"></a></li>
                      <li><a href="#"><img src="images/bag-icon.png"></a></li>
                      <li><a href="#"><img src="images/user-icon.png"></a></li>
                      <li>
                          <a href="#">
                            <?php
                                if (!isset($_SESSION['customer_email'])){
                                echo "<a style='color:black;' href='checkout.php'>Login</a>";

                                  } else{

                                echo "<a style='color:black;' href='logout.php'>Logout</a>";

                                  }
                            ?>
                          </a>
                      </li>
                    </ul>
                </div>
              </form>
          </nav>
        </div>
    </div>
    <!-- header section end -->

      <!-- product section start -->
      <div class="product_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-sm-12">
                  <h1 class="product_taital">Our Products</h1>
                  <!-- <p class="product_text">incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p> -->
               </div>
            </div>
            <div>
               <?php
                  include("includes/sidebar.php");  
               ?>
            </div>
            <div class="product_section_2 layout_padding">
               <div class="row">
                  <?php
               if(isset($_GET['p_cat'])){
                     $start_from = $_GET['p_cat'];
                     $get_product="select * from products where p_cat_id = '$start_from'";
                     
                     $run_pro=mysqli_query($con,$get_product);
                     while ($row=mysqli_fetch_array($run_pro)) {
                        $pro_id=$row['product_id'];
                        $pro_title=$row['product_title'];
                        $pro_price=$row['product_price'];
                        $pro_img1=$row['product_img1'];
                        
                        echo "
                           <div class='col-lg-3 col-sm-6'>
                           <div class='product_box'>
                           <h4 class='bursh_text'>$pro_title</h4>
                           <p class='lorem_text'>incididunt ut labore et dolore magna aliqua. Ut enim </p>
                           <img src='admin_area/product_images/$pro_img1' class='image_1'>
                           <div class='btn_main'>
                           <div class='buy_bt'>
                                 <ul>
                                 <li class='active'><a style='color:black;' href='details.php?pro_id=$pro_id'>Details</a></li>
                                 <li><a href='details.php?pro_id=$pro_id'><i class='fa fa-shopping-cart'></i>AddCart</a></li>
                                 </ul>
                           </div>
                           <h3 class='price_text'>¥$pro_price</h3>
                           </div>
                           </div>
                        </div>
                        
                           ";}
                           echo "<div class='seemore_bt'><a href='trimer.php'>ALL Products</a></div>";
                        }else{
                           $get_product="select * from products";
                     
                     $run_pro=mysqli_query($con,$get_product);
                     while ($row=mysqli_fetch_array($run_pro)) {
                        $pro_id=$row['product_id'];
                        $pro_title=$row['product_title'];
                        $pro_price=$row['product_price'];
                        $pro_img1=$row['product_img1'];
                        
                        echo "
                           <div class='col-lg-3 col-sm-6'>
                           <div class='product_box'>
                           <h4 class='bursh_text'>$pro_title</h4>
                           <p class='lorem_text'>incididunt ut labore et dolore magna aliqua. Ut enim </p>
                           <img src='admin_area/product_images/$pro_img1' class='image_1'>
                           <div class='btn_main'>
                           <div class='buy_bt'>
                                 <ul>
                                 <li class='active'><a style='color:black;' href='details.php?pro_id=$pro_id'>Details</a></li>
                                 <li><a href='details.php?pro_id=$pro_id'><i class='fa fa-shopping-cart'></i>AddCart</a></li>
                                 </ul>
                           </div>
                           <h3 class='price_text'>¥$pro_price</h3>
                           </div>
                           </div>
                        </div>
                           ";}
                        }
                  ?>
                  <!-- <div class="col-lg-3 col-sm-6">
                     <div class="product_box">
                        <h4 class="bursh_text">Beauty Bursh</h4>
                        <p class="lorem_text">incididunt ut labore et dolore magna aliqua. Ut enim </p>
                        <img src="images/img-1.png" class="image_1">
                        <div class="btn_main">
                           <div class="buy_bt">
                              <ul>
                                 <li class="active"><a href="#">Buy Now</a></li>
                                 <li><a href="#">Buy Now</a></li>
                              </ul>
                           </div>
                           <h3 class="price_text">Price $30</h3>
                        </div>
                     </div>
                  </div> -->
               </div>
               <!-- <div class="seemore_bt"><a href="#">See More</a></div> -->
            </div>
         </div>
      </div>
      <!-- product section end -->


    <!-- footer section start -->
    <div class="footer_section layout_padding">
         <div class="container">
            <div class="footer_logo"><a href="index.html"><img src="images/footer-logo.png"></a></div>
            <div class="contact_section_2">
               <div class="row">
                  <div class="col-sm-4">
                     <h3 class="address_text">Contact Us</h3>
                     <div class="address_bt">
                        <ul>
                           <li>
                              <a href="#">
                              <i class="fa fa-map-marker" aria-hidden="true"></i><span class="padding_left10">Address : Dalian, China</span>
                              </a>
                           </li>
                           <li>
                              <a href="#">
                              <i class="fa fa-phone" aria-hidden="true"></i><span class="padding_left10">Call : +86 178 2481 2834</span>
                              </a>
                           </li>
                           <li>
                              <a href="#">
                              <i class="fa fa-envelope" aria-hidden="true"></i><span class="padding_left10">Email : admin@email.com</span>
                              </a>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="footer_logo_1"><a href="index.php" style="color:white;font-size:30px;">TEA MO</a></div>
                     <p class="dummy_text">TeaMo is your gateway to exploring and experiencing the rich and vibrant culture of Moroccan tea.</p>
                  </div>
                  <div class="col-sm-4">
                     <div class="main">
                        <h3 class="address_text">ABOUT US!</h3>
                        <!-- <p class="ipsum_text">About Us,Our Services,Privacy Policy</p> -->
                        <ul>
                            <li><a href="" class="ipsum_text">About Us</a></li>
                            <li><a href="" class="ipsum_text">Our Services</a></li>
                            <!-- <li><a href="" class="ipsum_text">Privacy Policy</a></li> -->
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="social_icon">
               <ul>
                  <li>
                     <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                  </li>
                  <li>
                     <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                  </li>
                  <li>
                     <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                  </li>
                  <li>
                     <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                  </li>
               </ul>
            </div>
         </div>
      </div>
      <!-- footer section end -->
      <!-- copyright section start -->
      <div class="copyright_section">
         <div class="container">
            <p class="copyright_text">TeaMo. Design by <a href="">Mohammed Mouafik</a></p>
         </div>
      </div>
      <!-- copyright section end -->

    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <!-- javascript --> 
      <script src="js/owl.carousel.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>  
      <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
      <script>
         function openNav() {
           document.getElementById("mySidenav").style.width = "100%";
         }
         
         function closeNav() {
           document.getElementById("mySidenav").style.width = "0";
         }
      </script> 
  </body>
</html>
