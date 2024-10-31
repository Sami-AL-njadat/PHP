<?php 
session_start();
if(!isset($_SESSION["cards"])) {
    $_SESSION["cards"] = array();
}
?>

<!doctype html>
<html lang="en">
  <head>
    <title>SS coffee</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="sscoffee.css">

  </head>
  
  <body>
     
  <nav class="navbar navbar-expand-lg navbar-light bg-warning">
  <a class="navbar-brand" href="http://localhost/php/mini%20project/SScoffee.php"><img src="LOGO.SSS-removebg-preview.png" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="http://localhost/php/mini%20project/SScoffee.php">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="http://localhost/php/mini%20project/SS%20store.php">Products</a>

      <a class="nav-item nav-link" href="#AboutUs">About Us</a>
      <a class="nav-item nav-link" href="#ContactUs">Contact Us</a>
 
    </div>
  </div>
</nav>
    <!-- <form action="http://localhost/phpMiniProject/ViewPage.php"<?php $_Git  ?>></form>
      <p>sami</p> -->
        
      
      
      <!-- <form method="post" action="http://localhost/phpMiniProject/HomePage.php"> -->
        <div  id="form">
<form method="post" action="#" enctype="multipart/form-data"
>
        
        <label for="Product">Name of Product</label> <br>
        <input type="text" id="Product" name="product-name"><br> 

        <label for="Product">price of Product</label> <br>
        <input type="number" id="price" name="product-price" step="0.01" > <br> 

           <label for="product_image">Product Image</label> <br> 
         <input type="file" name="product-image" class="imageimage">  <br> 
         

        <!-- <input type="submit" value="Upload"><br> -->

      <label for="Product"> Description of Product </label> <br> 
      <input type="text" id="Description" name="product-desc" > <br> 

      <br> <input type="submit" name="submit"  class="submitbot"><br>
</form>
</div>
<?php
if (isset($_POST["submit"])) {
        $Name = $_FILES["product-image"]["name"];
        $tempName = $_FILES["product-image"]["tmp_name"];
        $folder = $Name;
        move_uploaded_file($tempName, $folder);


        $check = true;
        foreach ($_SESSION["cards"] as $value) {
            if ($_POST['product-name'] === $value[0] && $_POST['product-desc'] === $value[1] && $Name === $value[2] && $_POST['product-price'] === $value[3]) {
                $check = false;
            }
        }

        if ($check) {

            array_push(
                $_SESSION["cards"],
                array(
                    $_POST['product-name'],
                    $_POST['product-desc'],
                    $Name,
                    $_POST['product-price'],
                )
            );
        }
    }

    if ($_SESSION["cards"] != null) {
        echo "<table class='container'>";
        echo "<th>Name of product</th>";
        echo "<th>Price of product</th>";
        echo "<th>Image of product</th>";
        echo "<th>Discription of product</th>";
 

        foreach ($_SESSION["cards"] as $value) {

            echo "<tr>";
            echo "<td>$value[0]</td>";
            echo "<td>$value[1]</td>";
            echo "<td>";
            echo "<img class = 'image' src= $value[2] >";
            echo "</td>";
            echo "<td>$value[3] JOD </td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "no pruduct to show";
    }
?>




<br>
<br>
<footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <h6 id="AboutUs">About Us </h6>
            <p class="text-justify">  <i> <a href="#"></a> </i> SS Coffee is an online website that offers a diverse and famous selection of coffee types. It allows users to easily choose and purchase their favorite coffee varieties at affordable prices. The website provides a convenient and secure online shopping experience for coffee lovers, along with detailed information about each coffee type and brewing methods.</p>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Categories</h6>
            <ul class="footer-links">
              <li><a href="https://www.aromatico.com/coffee/">Coffee typs</a></li>
              <li><a href="https://printify.com/custom-mugs/">Coffee Mugs</a></li>
              <li><a href="https://bluebottlecoffee.com/us/eng">Coffee store</a></li>
              <li><a href="https://cmsale.com/">Coffee machines</a></li>
              
            </ul>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Quick Links</h6>
            <ul class="footer-links">
              <li><a href="#AboutUs">About Us</a></li>
              <li><a id="ContactUs" href="#ContactUs">Contact Us</a></li>
               <li><a href="#">Privacy Policy</a></li>
             </ul>
          </div>
        </div>
        <hr>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text">Copyright &copy; 2021 All Rights Reserved by 
         <a href="#">SAM</a>.
            </p>
          </div>
           <div class="col-md-4 col-sm-6 col-xs-12" >
            <ul  class="social-icons">            
              <li><a  class="twitter" href="https://twitter.com/i/flow/login?redirect_after_login=%2Fsami_njadat"><i class="fa-brands fa-twitter"></i></a></li>
              <li><a class="linkedin" href="https://www.linkedin.com/in/sami-al-njadat-566b2a149"><i class="fa-brands fa-linkedin-in"></i></a></li>
              <li><a class="facebook" href="https://www.facebook.com/sami.alnjadat.549/"><i class="fa-brands fa-facebook-f"></i></a></li>   
              <li><a class="instagram" href="https://www.instagram.com/sam__njt/?igshid=MzNlNGNkZWQ4Mg%3D%3D"><i class="fa-brands fa-square-instagram"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
</footer>



    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>