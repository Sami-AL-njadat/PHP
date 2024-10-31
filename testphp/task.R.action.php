
<?php
session_start();
if(!isset($_SESSION["card"])) {
  $_SESSION["card"] = array();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>

form{width: 50%;
        margin:auto ;
        border:5px solid skyblue;
        text-align:center;
        font-size: large;
        margin-top: 20px;
        padding-top: 20px
      }


      div{
        width: 20%;
        margin:auto ;
        border:5px solid skyblue;
        text-align:center;
        font-size: large;
        margin-top: 20px

      }
      a{
        width: 20%;
        margin-left:40% ;
        border:5px solid skyblue;
         font-size: large;
          padding:5px;
          display:block;
          margin-top:50px;
          text-align:center;
 
      }


    </style>
</head>
<body>


<form method="POST" >
 
  <label for="Name">Name: </label>
  <input type="text" name="Name" required><br> <br>
  <label for="Price">Price: </label>
  <input type="number"  name="Price" required><br><br>
  <label for="Product">Product:   </label>
  <input type="text"  name="Product" required><br><br>
  <input type="submit" value="Submit">  
  <br><br>
 </form>
    
</body>
</html>
<?php


  if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $card = array ( $_POST['Name'] , $_POST['Price'] , $_POST['Product']);
  

  if (!isset($_SESSION["card"])) {
    $_SESSION["card"] = array();
}
$check = true;

foreach ($_SESSION["card"] as $value) {
  if ($_POST['Name'] === $value[0] && $_POST['Price'] === $value[1] && $_POST['Product'] === $value[2]) {
      $check = false;
  }
}
if ($check) {

  array_push(
      $_SESSION["card"],
      $card
  );
}

}
// session_destroy();


 ?>





<?php
echo '<a href="testnew.php" > look here </a>';
 
 ?>










 

<!-- //  $_SESSION['$name'];
//  $_SESSION['$Price'];
//  $_SESSION['$Pro'];

// session_destroy();



?> -->