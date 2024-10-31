<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
body {
    
        display:grid;
        grid-template-columns: auto auto auto ;
        grid-template-rows : auto auto
}

div{
        width: 30%;
        margin:auto ;
        border:5px solid skyblue;
        text-align:center;
        font-size: large;
        margin-top: 20px;
        grid-rows:2/3;
        
        }


        a{
            /* width: 50px; */
        /* margin-left:40% ; */
        /* border:5px solid skyblue; */
        font-size: large;
        /* padding:5px; */
        text-align:center;
           

      }

    </style>
</head>
<body>
    











<?php 

foreach ($_SESSION["card"] as $key => $value) {
    echo "<div>";
    echo "<p>" . $value[0] . "</p>" ;
    
    echo "<p>" . $value[1] . "</p>" ;
   
    echo "<p>" . $value[2] . "</p>" ;
    echo "</div>";
  }
  
  // session_destroy();

 

?>

<?php
echo'<div>';
echo '<a href="task.R.action.php" > look back </a>';
echo'</div>';
 ?>




</body>
</html>