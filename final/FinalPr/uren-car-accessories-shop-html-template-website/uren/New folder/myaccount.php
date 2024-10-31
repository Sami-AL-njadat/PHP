<?php
session_start();
if (isset($_POST['logout'])) {
    session_destroy();
    header('Location:login1.php');
}


$serverName = 'localhost';
$usernName = 'root';
$password = '';
$dbName = 'ecomm';

$conn = new mysqli($serverName, $usernName, $password, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->error);
}


$sql = "SELECT first_name, last_name FROM user where id=$_SESSION[user_id]";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
    // output data of each row
    $row = mysqli_fetch_assoc($result);
} else {
    echo "0 results";
}
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Uren - Car Accessories Shop HTML Template</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">

    <!-- CSS
	============================================ -->
    <link rel="stylesheet" href="myaccount.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="assets/css/vendor/font-awesome.css">
    <!-- Fontawesome Star -->
    <link rel="stylesheet" href="assets/css/vendor/fontawesome-stars.css">
    <!-- Ion Icon -->
    <link rel="stylesheet" href="assets/css/vendor/ion-fonts.css">
    <!-- Slick CSS -->
    <link rel="stylesheet" href="assets/css/plugins/slick.css">
    <!-- Animation -->
    <link rel="stylesheet" href="assets/css/plugins/animate.css">
    <!-- jQuery Ui -->
    <link rel="stylesheet" href="assets/css/plugins/jquery-ui.min.css">
    <!-- Lightgallery -->
    <link rel="stylesheet" href="assets/css/plugins/lightgallery.min.css">
    <!-- Nice Select -->
    <link rel="stylesheet" href="assets/css/plugins/nice-select.css">

    <!-- Vendor & Plugins CSS (Please remove the comment from below vendor.min.css & plugins.min.css for better website load performance and remove css files from the above) -->
    <!--
    <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script>
    -->

    <!-- Main Style CSS (Please use minify version for better website load performance) -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!--<link rel="stylesheet" href="assets/css/style.min.css">-->

</head>

<body class="template-color-1">
<?php
    require "nav.php";
    ?>
    <div class="main-wrapper">

        <!-- Begin Uren's Header Main Area -->
       
        <!-- Uren's Header Main Area End Here -->

        <!-- Begin Uren's Breadcrumb Area -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                     <ul>
                        <li><a href="index.html">Home</a></li>
                        <li class="active">My Account</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Uren's Breadcrumb Area End Here -->
        <!-- Begin Uren's Page Content Area -->
        <main class="page-content">
            <!-- Begin Uren's Account Page Area -->
            <div class="account-page-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3">
                            <form action="" method="post">
                                <ul class="nav myaccount-tab-trigger" id="account-page-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="account-dashboard-tab" data-toggle="tab" href="#account-dashboard" role="tab" aria-controls="account-dashboard" aria-selected="true">MY Account</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="account-orders-tab" data-toggle="tab" href="#account-orders" role="tab" aria-controls="account-orders" aria-selected="false">Orders</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="account-address-tab" data-toggle="tab" href="#account-address" role="tab" aria-controls="account-address" aria-selected="false">Addresses</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="account-details-tab" data-toggle="tab" href="#account-details" role="tab" aria-controls="account-details" aria-selected="false">Account Details</a>
                                    </li>
                               
                                    <li class="nav-item">
                                        <!-- <a class="nav-link" name="logout" id="account-logout-tab" href="loginSINGup.php" role="tab" aria-selected="false">Logout</a> -->
                                        <button style="color:white" class="btn btn-warning btn-lg  mt-1" class="nav-item" name="logout">Logout</button>
                                    </li>
                                </ul>
                            </form>

                        </div>
                        <div class="col-lg-9">
                            <div class="tab-content myaccount-tab-content" id="account-page-tab-content">
                                <div class="tab-pane fade show active" id="account-dashboard" role="tabpanel" aria-labelledby="account-dashboard-tab">
                                    <div class="myaccount-dashboard">


                                        
                                    <h3> WELCOME <?php echo  $row['first_name'] . " " . $row['last_name'] . "<br>"; ?> </h3>
                                    <br>

                                    <h5 style="color:#DFAB29;">We are happy to see you here</h5>
                                    <br>
                                        <h6>Through this my account page, you can  <a href="javascript:void(0)">edit your password and account details,</a>
                                             view your previous orders, and the address for sending these requests</a></h6>

                                    </div>
                                </div>



                                <div class="tab-pane fade" id="account-orders" role="tabpanel" aria-labelledby="account-orders-tab">




                                    <div class="myaccount-orders">
                                        <h4 class="small-title">MY ORDERS</h4>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">
                                                <!-- <tbody>
                                                    <tr>
                                                        <th>ORDER</th>
                                                        <th>DATE</th>
                                                        <th>STATUS</th>
                                                        <th>TOTAL</th>
                                                        <th></th>
                                                    </tr> -->



                                                <?php
                                                $serverName = 'localhost';
                                                $userName = 'root';
                                                $password = '';
                                                $dbName = 'ecomm';

                                                $conn = new mysqli($serverName, $userName, $password, $dbName);

                                                if ($conn->connect_error) {
                                                    die("Connection failed: " . $conn->connect_error);
                                                };


                                                $sql = "SELECT * FROM `order` WHERE user_id = $_SESSION[user_id]";
                                                $result = mysqli_query($conn, $sql);

                                                if (mysqli_num_rows($result) > 0) {
                                                    echo "<table class='table table-hover'>";
                                                    echo "<tr>";
                                                    echo "<th>date</th>";
                                                    echo "<th>address</th>";
                                                    echo "<th>Sub total</th>";
                                                    echo "<th>Total amount</th>";
                                                    echo "</tr>";

                                                    while ($row = mysqli_fetch_array($result)) {
                                                        echo "<tr>";
                                                        echo "<td>" . $row['date'] . "</td>";
                                                        echo "<td>" . $row['address'] . "</td>";
                                                        echo "<td>" . $row['sub_total'] . "</td>";
                                                        echo "<td>" . $row['total'] . "</td>";
                                                        echo "</tr>";
                                                    }
                                                    echo "</table>";

                                                    mysqli_free_result($result);
                                                } else {
                                                    echo "No records matching your query were found.";
                                                }

                                                mysqli_close($conn);
                                                ?>



                                                <!--                                                      
                                                    <tr>
                                                        <td><a class="account-order-id" href="javascript:void(0)">#5364</a></td>
                                                        <td>></td>
                                                        <td>On Hold</td>
                                                        <td>£162.00 for 2 items</td>
                                                        <td><a href="javascript:void(0)" class="uren-btn uren-btn_dark uren-btn_sm"><span>View</span></a>
                                                        </td>
                                                    </tr>
                                                   
                                                </tbody> -->


                                            </table>
                                        </div>
                                    </div>
                                </div>



                                <div class="tab-pane fade" id="account-address" role="tabpanel" aria-labelledby="account-address-tab">
                                    <div class="myaccount-address">
                                        <h5>The following addresses will be used on the checkout page.</h5>

                                        <?php


                                        $serverName = 'localhost';
                                        $userName = 'root';
                                        $password = '';
                                        $dbName = 'ecomm';

                                        $conn = new mysqli($serverName, $userName, $password, $dbName);

                                        if ($conn->connect_error) {
                                            die("Connection failed: " . $conn->connect_error);
                                        }
                                        $sql = "SELECT * FROM `order` WHERE user_id = $_SESSION[user_id]";
                                        $result = mysqli_query($conn, $sql);

                                        if (mysqli_num_rows($result) > 0) {
                                            echo "<table  class='table table-hover'>";
                                            echo "<tr>";
                                            echo "<th>Address </th>";
                                            echo "<th>City</th>";

                                            echo "</tr>";

                                            while ($row = mysqli_fetch_array($result)) {
                                                echo "<tr>";
                                                echo "<td>" . $row['address'] . "</td>";
                                                echo "<td>" . $row['city'] . "</td>";
                                                echo "</tr>";
                                            }
                                            echo "</table>";

                                            mysqli_free_result($result);
                                        } else {
                                            echo "No records matching your query were found.";
                                        }

                                        mysqli_close($conn);
                                        ?>

                                    </div>
                                </div>



                                <?php

                                $serverName = 'localhost';
                                $usernName = 'root';
                                $password = '';
                                $dbName = 'ecomm';

                                $conn = new mysqli($serverName, $usernName, $password, $dbName);

                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->error);
                                }


                                $sql = "SELECT first_name, last_name, email, password FROM user where id =  $_SESSION[user_id] ";
                                $result = mysqli_query($conn, $sql);


                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                    $row = mysqli_fetch_assoc($result);
                                } else {
                                    echo "0 results";
                                }

                                if (isset($_POST['submit'])) {
                                    $fName = $_POST['fname'];
                                    $lName = $_POST['lname'];
                                    $current_pass = $_POST['currentpass'];
                                    $new_pass = $_POST['newpass'];
                                    $cnew_pass = $_POST['cnewpass'];
                                    // $names_regex ="/^[A-Za-z]+$/";

                                    // require_once 'functions.php';
                                    if (password_verify($current_pass, $row['password'])) {

                                        if ($new_pass == $cnew_pass) {
                                            $new_pass_hash = password_hash($new_pass, PASSWORD_DEFAULT);
                                            $sql = "UPDATE user SET first_name='$fName', last_name='$lName', password='$new_pass_hash' WHERE id=$_SESSION[user_id]";
                                            $result = mysqli_query($conn, $sql);
                                            // header('Location: myaccount.php');
                                            echo "<script>window.location.href = 'myaccount.php';</script>";
                                            // redirect('login1.php', 'updated successfully!');
                                            // echo '<script>window.location.href = "myaccount.php";</script>';
                                        }
                                    } else {
                                        echo '<script>alert("Wrong current password")</script>';
                                    }
                                }


                                // $conn->close();





                                // if(isset($_POST['submit'])){
                                //     $currentPassword=$_POST['currentpass']; 
                                //      $password=$_POST['newpass'];  
                                //     $passwordConfirm=$_POST['cnewpass']; 
                                //    $sql="SELECT password from user where id=$_SESSION[id]";
                                //    $res = mysqli_query($conn,$sql);
                                //          $res=mysqli_query($conn,$sql);
                                //            $row = mysqli_fetch_assoc($res);
                                //           if(password_verify($currentPassword,$row['password'])){
                                //    if($passwordConfirm ==''){
                                //                $error[] = 'Please confirm the password.';
                                //            }
                                //            if($password != $passwordConfirm){
                                //                $error[] = 'Passwords do not match.';
                                //            }
                                //              if(strlen($password)<8){ // min 
                                //                $error[] = 'The password is 8 characters long.';
                                //            }

                                //             if(strlen($password)>20){ // Max 
                                //                $error[] = 'Password: Max length 20 Characters Not allowed';
                                //            }
                                //    if(!isset($error))
                                //    {
                                //          $options = array("cost"=>4);
                                //        $password = password_hash($password,PASSWORD_BCRYPT,$options);

                                //         $result = mysqli_query($conn,"UPDATE user SET password='$password' WHERE id='$_SESSION[id]'");
                                //               if($result)
                                //               {
                                //           header("location:myaccount.php?password_updated=1");
                                //               }
                                //               else 
                                //               {
                                //                $error[]='Something went wrong';
                                //               }
                                //    }

                                //            } 
                                //            else 
                                //            {
                                //                $error[]='Current password does not match.'; 
                                //            }   
                                //        }
                                //            if(isset($error)){ 

                                //    foreach($error as $error){ 
                                //      echo '<p class="errmsg">'.$error.'</p>'; 
                                //    }
                                //    }
                                ?>























                                <div class="tab-pane fade" id="account-details" role="tabpanel" aria-labelledby="account-details-tab">
                                    <div class="myaccount-details">
                                        <form action="#" class="uren-form" method="post">
                                            <div class="uren-form-inner">
                                                <div class="single-input single-input-half">
                                                    <label for="account-details-firstname">First Name*</label>
                                                    <input type="text" name="fname" id="account-details-firstname" value="<?php echo  $row['first_name']; ?>">
                                                </div>
                                                <div class="single-input single-input-half">
                                                    <label for="account-details-lastname">Last Name*</label>
                                                    <input type="text" name="lname" id="account-details-lastname" value="<?php echo $row['last_name']; ?>">
                                                </div>
                                                <div class="single-input">
                                                    <label for="account-details-email">Email*</label>
                                                    <input type="email" id="account-details-email" value="<?php echo $row['email'] ?>">
                                                </div>
                                                <div class="single-input">
                                                    <label for="account-details-oldpass">Current Password(leave blank to leave
                                                        unchanged)</label>
                                                    <input type="password" id="account-details-oldpass" placeholder="#######" name="currentpass">
                                                </div>
                                                <div class="single-input">
                                                    <label for="account-details-newpass">New Password (leave blank to leave
                                                        unchanged)</label>
                                                    <input type="password" id="account-details-newpass" name="newpass">
                                                </div>
                                                <div class="single-input">
                                                    <label for="account-details-confpass">Confirm New Password</label>
                                                    <input type="password" id="account-details-confpass" name="cnewpass">
                                                </div>
                                                <div class="single-input">
                                                    <button name="submit" class="uren-btn uren-btn_dark" type="submit"><span>SAVE
                                                            CHANGES</span></button>
                                                </div>




                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Uren's Account Page Area End Here -->
        </main>
        <!-- Uren's Page Content Area End Here -->
        <!-- Begin Uren's Footer Area -->
        <div class="uren-footer_area">
            <!-- <div class="footer-top_area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="newsletter-area">
                                <h3 class="title">Join Our Newsletter Now</h3>
                                <p class="short-desc">Get E-mail updates about our latest shop and special offers.</p>
                                <div class="newsletter-form_wrap">
                                    <form action="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="newsletters-form validate" target="_blank" novalidate>
                                        <div id="mc_embed_signup_scroll">
                                            <div id="mc-form" class="mc-form subscribe-form">
                                                <input id="mc-email" class="newsletter-input" type="email" autocomplete="off" placeholder="Enter your email" />
                                                <button class="newsletter-btn" id="mc-submit">Subscribe</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="footer-middle_area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="footer-widgets_info">
                                <div class="footer-widgets_logo">
                                    <a href="#">
                                        <img src="assets/images/menu/logo/1.png" alt="Uren's Footer Logo">
                                    </a>
                                </div>
                                <div class="widget-short_desc">
                                    <p>We are a team of designers and developers that create high quality HTML Template &
                                        Woocommerce, Shopify Theme.
                                    </p>
                                </div>
                                <div class="widgets-essential_stuff">
                                    <ul>
                                        <li class="uren-address"><span>Address:</span> The Barn,
                                            Ullenhall, Henley
                                            in
                                            Arden B578 5CC, England</li>
                                        <li class="uren-phone"><span>Call
                                                Us:</span> <a href="tel://+123123321345">+123 321 345</a>
                                        </li>
                                        <li class="uren-email"><span>Email:</span> <a href="mailto://info@yourdomain.com">info@yourdomain.com</a></li>
                                    </ul>
                                </div>
                                <div class="uren-social_link">
                                    <ul>
                                        <li class="facebook">
                                            <a href="https://www.facebook.com/" data-toggle="tooltip" target="_blank" title="Facebook">
                                                <i class="fab fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="twitter">
                                            <a href="https://twitter.com/" data-toggle="tooltip" target="_blank" title="Twitter">
                                                <i class="fab fa-twitter-square"></i>
                                            </a>
                                        </li>
                                        <li class="google-plus">
                                            <a href="https://www.plus.google.com/discover" data-toggle="tooltip" target="_blank" title="Google Plus">
                                                <i class="fab fa-google-plus"></i>
                                            </a>
                                        </li>
                                        <li class="instagram">
                                            <a href="https://rss.com/" data-toggle="tooltip" target="_blank" title="Instagram">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="footer-widgets_area">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6">
                                        <div class="footer-widgets_title">
                                            <h3>Information</h3>
                                        </div>
                                        <div class="footer-widgets">
                                            <ul>
                                                <li><a href="javascript:void(0)">About Us</a></li>
                                                <li><a href="javascript:void(0)">Delivery Information</a></li>
                                                <li><a href="javascript:void(0)">Privacy Policy</a></li>
                                                <li><a href="javascript:void(0)">Terms & Conditions</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="footer-widgets_title">
                                            <h3>Customer Service</h3>
                                        </div>
                                        <div class="footer-widgets">
                                            <ul>
                                                <li><a href="javascript:void(0)">Contact Us</a></li>
                                                <li><a href="javascript:void(0)">Returns</a></li>
                                                <li><a href="javascript:void(0)">Site Map</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="footer-widgets_title">
                                            <h3>Extras</h3>
                                        </div>
                                        <div class="footer-widgets">
                                            <ul>
                                                <li><a href="javascript:void(0)">About Us</a></li>
                                                <li><a href="javascript:void(0)">Delivery Information</a></li>
                                                <li><a href="javascript:void(0)">Privacy Policy</a></li>
                                                <li><a href="javascript:void(0)">Terms & Conditions</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="footer-widgets_title">
                                            <h3>My Account</h3>
                                        </div>
                                        <div class="footer-widgets">
                                            <ul>
                                                <li><a href="javascript:void(0)">My Account</a></li>
                                                <li><a href="javascript:void(0)">Order History</a></li>
                                                <li><a href="javascript:void(0)">Wish List</a></li>
                                                <li><a href="javascript:void(0)">Newsletter</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom_area">
                <div class="container-fluid">
                    <div class="footer-bottom_nav">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="copyright">
                                    <span><a href="templateshub.net">Templateshub</a></span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="payment">
                                    <a href="#">
                                        <img src="assets/images/footer/payment/1.png" alt="Uren's Payment Method">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Uren's Footer Area End Here -->

    </div>

    <!-- JS
============================================ -->

    <!-- jQuery JS -->
    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- Modernizer JS -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <!-- Popper JS -->
    <script src="assets/js/vendor/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="assets/js/vendor/bootstrap.min.js"></script>

    <!-- Slick Slider JS -->
    <script src="assets/js/plugins/slick.min.js"></script>
    <!-- Barrating JS -->
    <script src="assets/js/plugins/jquery.barrating.min.js"></script>
    <!-- Counterup JS -->
    <script src="assets/js/plugins/jquery.counterup.js"></script>
    <!-- Nice Select JS -->
    <script src="assets/js/plugins/jquery.nice-select.js"></script>
    <!-- Sticky Sidebar JS -->
    <script src="assets/js/plugins/jquery.sticky-sidebar.js"></script>
    <!-- Jquery-ui JS -->
    <script src="assets/js/plugins/jquery-ui.min.js"></script>
    <script src="assets/js/plugins/jquery.ui.touch-punch.min.js"></script>
    <!-- Lightgallery JS -->
    <script src="assets/js/plugins/lightgallery.min.js"></script>
    <!-- Scroll Top JS -->
    <script src="assets/js/plugins/scroll-top.js"></script>
    <!-- Theia Sticky Sidebar JS -->
    <script src="assets/js/plugins/theia-sticky-sidebar.min.js"></script>
    <!-- Waypoints JS -->
    <script src="assets/js/plugins/waypoints.min.js"></script>
    <!-- jQuery Zoom JS -->
    <script src="assets/js/plugins/jquery.zoom.min.js"></script>

    <!-- Vendor & Plugins JS (Please remove the comment from below vendor.min.js & plugins.min.js for better website load performance and remove js files from avobe) -->
    <!--
<script src="assets/js/vendor/vendor.min.js"></script>
<script src="assets/js/plugins/plugins.min.js"></script>
-->

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

</body>

</html>