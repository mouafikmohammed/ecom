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
                        <li><a href="checkout.php"><img src="images/user-icon.png"></a></li>
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

      <!-- cart section start -->
      <div class="col-md-9" id="cart">
   <div class="box">
     <form action="cart.php" method="post" enctype="multipart-form-data">
       <h1>Shopping Cart</h1>
       <?php
       $ip_add=getUserIp();
       $select_cart="select * from cart where ip_add='$ip_add'";
       $run_cart=mysqli_query($con,$select_cart);
       $count=mysqli_num_rows($run_cart);



        ?>
        <br>
       <h2 class="text-muted">Currently you have <?php echo $count ?> items in your cart</h2>
       <div class="table-respon"></div>
       <table class="table">
         <thead>
           <tr>
             <th colspan="2">Product</th>
             <th>Quantity</th>
             <th>Unit Price</th>
             <th>Size</th>
             <th colspan="1">Delete</th>
             <th colspan="1">Sub Total</th>
           </tr>
         </thead>
         <tbody>
          <?php
          $total=0;
          while ($row=mysqli_fetch_array($run_cart)) {
            $pro_id=$row['p_id'];
            $pro_size=$row['size'];
            $pro_qty=$row['qty'];
            $get_product="select * from products where product_id='$pro_id'";
            $run_pro=mysqli_query($con,$get_product);
            while ($row=mysqli_fetch_array($run_pro)) {
              $p_title=$row['product_title'];
              $p_img1=$row['product_img1'];
              $p_price=$row['product_price'];
              $sub_total=$row['product_price']*$pro_qty;
              $total += $sub_total; 

           

            ?>
           <tr>
             <td><img style="width: 50;height: 50px;" src="admin_area/product_images/<?php echo $p_img1 ?>"></td>
             <td><?php echo $p_title ?></td>
             <td><?php echo $pro_qty ?></td>
             <td><?php echo $p_price ?></td>
             <td><?php echo $pro_size ?></td>
             <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id ?>"></td>
             <td>CNY<?php echo $sub_total ?></td>
           </tr>
           <?php } } ?>
        </tfoot>
       </table>
<div class="box-footer">
         <div class="pull-left">
          <h4>Total Price CNY<?php echo $total; ?></h4>
         </div>
         <div class="pull-right">
           <!-- <h4>CNY<?php echo $total; ?></h4> -->
         </div>
       </div>
       <br> <br>


       <div class="box-footer">
         <div class="pull-left">
           <a href="index.php" class="btn btn-default">
             <i class="fa fa-chevron-left"></i>Continue Shopping
           </a>
         </div>
         <div class="pull-right">
           <button class="btn btn-default" type="submit" name="update" value="update cart">
             <i class="fa fa-refresh">Update Cart</i>
           </button>
           <a href="checkout.php" class="btn btn-primary">
             Processed to checkout<i class="fa fa-chevron-right"></i>
           </a>
         </div>
         <br>
       </div>
     </form>
   </div>

<?php

function update_cart(){
  global $con;
  if (isset($_POST['update'])){
    foreach ($_POST['remove'] as $remove_id) {
      $delete_product="delete from cart where p_id='$remove_id'";
      $run_del=mysqli_query($con,$delete_product);
      if ($run_del) {
        echo "<script>window.open('cart.php','_self')</script>";
      }

    }
  }
}
echo @$up_cart=update_cart();
  ?>

 </div>
 <br>
      <!-- cart section end -->
      <!--Summary start -->
      <div class="col-m-3" style="border: 0px solid #000; padding: 10px;background-color: #FAEBD7;">
   <div class="box" id="order-summary">
     <div class="box-header">
       <h2>Order Summary</h2>
     </div>
     <p class="text-muted" style="color:#000;">
       Shipping and additional costs are calculated based on the values you have entered
     </p>
     <div class="table-responsive">
       <table class="table">
         <tr>
           <td>Order Sub Total</td>
           <th>CNY <?php echo $total ?></th>
         </tr>
         <tr>
           <td>Shipping and handling</td>
           <td>CNY 0</td>
           <tr>
             <td>Tax</td>
             <td>CNY 0</td>
           </tr>
           <tr class="Total">
            <td>Total</td>
            <th>CNY <?php echo $total ?></th>
             
           </tr>
         </tr>
       </table>
     </div>
   </div>
 </div>
      <!--Summary end   -->

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




