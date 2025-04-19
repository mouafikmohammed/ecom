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
      <!-- <link rel="stylesheet" href="style.css"> -->
      <link rel="stylesheet" href="includes/order.css">
      <link rel="stylesheet" href="includes/edit_act.css">
      <style>
        .login-container {
    background-color: white;
    padding: 2rem;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    width: 300px;
    text-align: center;
    margin: auto;
    margin-top: 20px;
}

h1 {
    margin-bottom: 1rem;
    color: #333;
}

.form-group {
    margin-bottom: 1rem;
    text-align: left;
}

label {
    display: block;
    margin-bottom: 0.5rem;
    color: #555;
}

input[type="email"],
input[type="password"] {
    width: 100%;
    padding: 0.5rem;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 1rem;
}

input[type="email"]:focus,
input[type="password"]:focus {
    border-color: #004d00;
    outline: none;
}

.btn-login {
    width: 100%;
    padding: 0.75rem;
    background-color: #004d00;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 1rem;
    cursor: pointer;
}

.btn-login:hover {
    background-color: #003300;
}

.register-link {
    margin-top: 1rem;
    color: #555;
}

.register-link a {
    color: #004d00;
    text-decoration: none;
}

.register-link a:hover {
    text-decoration: underline;
}



.profile-container {
    max-width: 1300px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
}

.profile-header {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}

.profile-image img {
    border-radius: 50%;
    width: 100px;
    height: 100px;
    object-fit: cover;
    margin-right: 20px;
}

.profile-info {
    flex: 1;
}

.profile-info h2 {
    font-size: 24px;
    margin: 0;
}

.profile-info p {
    font-size: 16px;
    color: #777;
}

.profile-body {
    margin-top: 20px;
}

.profile-actions {
    display: flex;
    max-width: 200px; /* Limit the width of the buttons to align them to the left */
}


.profile-button {
    padding: 0px 50px;
    margin: 10px 10px;
    text-align: left; /* Align text to the left */
    text-decoration: none;
    color: #fff;
    background-color: #007BFF;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.profile-button:hover {
    background-color: #0056b3;
}

.delete-account {
    background-color: #dc3545;
}

.delete-account:hover {
    background-color: #c82333;
}

.logout {
    background-color: #6c757d;
}

.logout:hover {
    background-color: #5a6268;
}
      </style>
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
                        <li><a href="customer/my_account.php?my_order"><img src="images/user-icon.png"></a></li>
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
      <br> <br>
      <!-- ---------------- -->
      <!-- profile section start --> <br><br><br>
      <div class="profile-container">
         <div class="profile-header">
               <?php
                  if (isset($_SESSION['customer_email'])) {
                     
                   
                  $session_customer=$_SESSION['customer_email'];
                  $get_cust="select * from customers where customer_email='$session_customer'";
                  $run_cust=mysqli_query($con, $get_cust);
                  $row_customers=mysqli_fetch_array($run_cust);
                  $customer_image= $row_customers['customer_image'];
                  $customer_name= $row_customers['customer_name'];
                  $customer_email = $row_customers['customer_email'];
                  if (!isset($_SESSION['customer_email'])){

                  }else{
                     echo "
                     <div class='profile-image'>
                     <img src='customer/customer_images/$customer_image' alt='Profile Picture'>
                     </div>
                     <div class='  profile-info'>
                     <h2>$customer_name</h2>
                     <p>$customer_email</p>
                     </div>
                     ";}
                  }
               ?>
         </div>
         <div class="profile-body">
          <?php
            if (!isset($_SESSION['customer_email'])) {
               include ('customer/customer_login.php');
             }else{
               include ('payment_options.php');
             }
          ?>
         </div>
        </div>
      </div>
      <!-- profile section end --> <br>
      <!-- ---------------- -->


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




