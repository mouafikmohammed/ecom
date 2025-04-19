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
      <style>
         header {
    color: white;
    text-align: center;
    padding: 1rem 0;
    margin: 10px;
}

header h1 {
    margin: 0;
}

main {
    padding: 2rem;
    max-width: 800px;
    margin: auto;
}

section#about {
    background-color: white;
    padding: 1rem;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

.about-img {
    width: 100%;
    height: auto;
    margin: 1rem 0;
    border-radius: 8px;
}

h2 {
    color: #004d00;
    margin-top: 2rem;
}

ul {
    list-style-type: disc;
    margin-left: 20px;
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
      <br> <br>
      <!-- ---------------- -->
      <!-- <header>
        <h1>Welcome to TeaMo - Moroccan Tea Culture Online Marketing System</h1>
    </header> -->
    <main>
        <section id="about">
            <h2 style="color:black;">Welcome to TeaMo - Moroccan Tea Culture Online Marketing System</h2>
            <h2>About TeaMo</h2>
            <p>
                TeaMo is your gateway to exploring and experiencing the rich and vibrant culture of Moroccan tea. Our online marketing system is dedicated to bringing the essence of Moroccan tea culture to a global audience, offering an extensive range of authentic Moroccan teas, accessories, and educational resources.
            </p>
            <img src="about/3.jpg" alt="Moroccan Tea Ceremony" class="about-img">
            <h2>The Essence of Moroccan Tea Culture</h2>
            <p>
                Moroccan tea, famously known as "Atay," is much more than just a beverage; it is a symbol of hospitality, tradition, and social connection. Moroccan mint tea, typically prepared with green tea, fresh mint leaves, and sugar, is a staple in Moroccan households and is always served to guests as a sign of welcome and respect.
            </p>
            <img src="about/2.jpg" alt="Pouring Moroccan Tea" class="about-img">
            <p>
                The preparation of Moroccan tea is a ceremonial art form. The tea is brewed and then poured from a height into small, ornate glasses, creating a frothy top layer. This method not only enhances the tea's flavor but also showcases the skill and tradition involved in its preparation.
            </p>
            <h2>A Rich History</h2>
            <p>
                The tradition of tea in Morocco dates back to the 18th century when it was introduced through trade with the East. Since then, it has woven itself into the fabric of Moroccan daily life. The tea ceremony is often a communal activity, bringing family and friends together. It is common to enjoy tea multiple times a day, especially during social gatherings and meals.
            </p>
            <img src="about/1.jpg" alt="Traditional Moroccan Tea Set" class="about-img">
            <h2>Our Mission at TeaMo</h2>
            <p>
                At TeaMo, we aim to share the authentic experience of Moroccan tea culture with tea lovers around the world. Our platform offers a curated selection of the finest Moroccan teas, sourced directly from trusted producers in Morocco. Additionally, we provide a variety of accessories that are essential for the traditional Moroccan tea ceremony.
            </p>
            <h2>What We Offer</h2>
            <ul>
                <li>Authentic Moroccan Teas: Explore our wide range of teas, from the classic Moroccan mint tea to other traditional blends.</li>
                <li>Tea Accessories: Find everything you need to prepare and serve Moroccan tea, including teapots, tea glasses, and serving trays.</li>
                <li>Educational Resources: Learn about the history, preparation, and cultural significance of Moroccan tea through our detailed guides and articles.</li>
            </ul>
            <h2>Join the TeaMo Community</h2>
            <p>
                Whether you are a seasoned tea enthusiast or new to the world of Moroccan tea, TeaMo welcomes you to discover the unique flavors and traditions of Moroccan tea culture. Join our community and immerse yourself in the rich heritage and hospitality that Moroccan tea represents.
            </p>
            <p>Thank you for visiting TeaMo. We look forward to sharing the delightful journey of Moroccan tea with you.</p>
            <h2>TeaMo – Celebrating the Tradition of Moroccan Tea Culture</h2>
        </section>
    </main>
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




