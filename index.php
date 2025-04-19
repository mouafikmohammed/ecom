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
                  <!-- <a href="#">Blog</a> -->
               </div>
               <span class="toggle_icon" onclick="openNav()"><img src="images/toggle-icon.png"></span>
               <a class="logo" href="index.php"><img src="images/logo.png"></a></a>
               <form class="form-inline ">
                  <div class="login_text">
                     <ul>
                        <li><a href="#"><img src="images/search-icon.png"></a></li>
                        <li><a href="cart.php"><img src="images/bag-icon.png"></a></li>

                        
                        <?php

                           if (!isset($_SESSION['customer_email'])){
                           echo "<li><a href='checkout.php'><img src='images/user-icon.png'></a></li>";

                                 } else{
                           
                           echo "<li><a href='customer/my_account.php?my_order'><img src='images/user-icon.png'></a></li>";
                        
                                 }

                        ?>

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
      <!-- banner section start -->
      <div class="banner_section layout_padding">
         <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <!-- item -->
                <?php
                    $get_slider="select * from slider LIMIT 0,1";
                    $run_slider= mysqli_query($con,$get_slider);
                    while ($row= mysqli_fetch_array($run_slider)) {
                    $slider_name= $row['slider_name'];
                    $slider_image= $row['slider_image'];
                    $slider_url= $row['slider_url'];

                    echo "<div class='carousel-item active'>
                            <div class='container'>
                                <div class='row'>
                                    <div class='col-sm-6'>
                                    <h1 class='banner_taital'>Explore<br>Tea</h1>
                                    <p class='banner_text'>$slider_name</p>
                                    <div class='read_bt'><a href='$slider_url'>Buy Now</a></div>
                                    </div>
                                    <div class='col-sm-6'>
                                    <div class='banner_img'><img src='admin_area/slider_images/$slider_image'></div>
                                    </div>
                                </div>
                            </div>
                        </div>";}
                ?>
                <?php
                    $get_slider="select * from slider LIMIT 1,10";
                    $run_slider= mysqli_query($con,$get_slider);
                    while ($row= mysqli_fetch_array($run_slider)) {
                        $slider_name= $row['slider_name'];
                        $slider_image= $row['slider_image'];
                        $slider_url= $row['slider_url'];
                        echo "<div class='carousel-item'>
                        <div class='container'>
                            <div class='row'>
                                <div class='col-sm-6'>
                                <h1 class='banner_taital'>Explore<br>Tea</h1>
                                <p class='banner_text'>$slider_name</p>
                                <div class='read_bt'><a href='$slider_url'>Buy Now</a></div>
                                </div>
                                <div class='col-sm-6'>
                                <div class='banner_img'><img src='admin_area/slider_images/$slider_image'></div>
                                </div>
                            </div>
                        </div>
                    </div>";
                    }
                ?>
               <!-- finish item -->
            </div>
         </div>
      </div>
      <!-- banner section end-------------------------------------------- -->



      <!-- product section start -->
      <div class="product_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-sm-12">
                  <h1 class="product_taital">Our Products</h1>
                  <p class="product_text">Discover our unique selection of exquisite Teas. Enhance your tea experience with our premium, aromatic blends today!</p>
               </div>
            </div>
            <div class="product_section_2 layout_padding">
               <div class="row">
                    <?php
                     getPro();
                    ?>
                    <!-- <div class="col-lg-3 col-sm-6">
                        <div class="product_box">
                            <h4 class="bursh_text">$pro_title</h4>
                            <p class="lorem_text">incididunt ut labore et dolore magna aliqua. Ut enim </p>
                            <img src="images/img-1.png" class="image_1">
                            <div class="btn_main">
                            <div class="buy_bt">
                                <ul>
                                    <li class="active"><a href='details.php?pro_id=$pro_id'>View Details</a></li>
                                    <li><a href='details.php?pro_id=$pro_id'><i class='fa fa-shopping-cart'></i>Add to Cart</a></li>
                                </ul>
                            </div>
                            <h3 class="price_text">Price ¥$pro_price</h3>
                            </div>
                        </div>
                    </div> -->
               </div>
               <div class="seemore_bt"><a href="trimer.php">See More</a></div>
            </div>
         </div>
      </div>
      <!-- product section end -->
      <!-- about section start -->
      <div class="about_section layout_padding">
         <div class="container">
            <div class="about_section_main">
               <div class="row">
                  <div class="col-md-6">
                     <div class="about_taital_main">
                        <h1 class="about_taital">About Our <img style="width: 250px;" src="images/logo.png" alt="TeaMo"></h1>
                        <p class="about_text">TeaMo is your gateway to exploring and experiencing the rich and vibrant culture of Moroccan tea. Our online marketing system is dedicated to bringing the essence of Moroccan tea culture to a global audience, offering an extensive range of authentic Moroccan teas, accessories, and educational resources.</p>
                        <div class="readmore_bt"><a href="about.php">Read More</a></div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div><img src="images/about-img.jpg" class="image_3"></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- about section end -->
      <!-- customer section start -->
      <!-- <div class="customer_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-sm-12">
                  <h1 class="customer_taital">What says customers</h1>
               </div>
            </div>
            <div id="main_slider" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="client_section_2">
                        <div class="client_main">
                           <div class="client_left">
                              <div class="client_img"><img src="images/client-img.png"></div>
                           </div>
                           <div class="client_right">
                              <h3 class="name_text">Jonyro</h3>
                              <p class="dolor_text">consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation  eu </p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="client_section_2">
                        <div class="client_main">
                           <div class="client_left">
                              <div class="client_img"><img src="images/client-img.png"></div>
                           </div>
                           <div class="client_right">
                              <h3 class="name_text">Jonyro</h3>
                              <p class="dolor_text">consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation  eu </p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="client_section_2">
                        <div class="client_main">
                           <div class="client_left">
                              <div class="client_img"><img src="images/client-img.png"></div>
                           </div>
                           <div class="client_right">
                              <h3 class="name_text">Jonyro</h3>
                              <p class="dolor_text">consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation  eu </p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
               <i class="fa fa-angle-left"></i>
               </a>
               <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
               <i class="fa fa-angle-right"></i>
               </a>
            </div>
         </div>
      </div> -->
      <!-- customer section end -->
      <!-- contact section start -->
      <div class="contact_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <h1 class="contact_taital">Get In Touch</h1>
                  <p class="contact_text">If you have any questions, please feel free to contact us, our customer service center is working for you 24/7.</p>
               </div>
               <div class="col-md-6">
                  <div class="contact_main">
                     <div class="contact_bt"><a href="contacts.php">Contact Form</a></div>
                     <!-- <div class="newletter_bt"><a href="#">Newletter</a></div> -->
                  </div>
               </div>
            </div>
         </div>
         <div class="map_main">
            <!-- <div class="map-responsive">
               <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&amp;q=Eiffel+Tower+Paris+France" width="600" height="400" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe>
            </div> -->
         </div>
      </div>
      <!-- contact section end -->
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




