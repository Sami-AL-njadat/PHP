<?php
$conn = mysqli_connect("localhost", "root", "", "mkonline");
if (count($_POST)>0){
    mysqli_query($conn,"UPDATE product SET id ='".$_POST['id']."',names='". $_POST['names']."' ,price='" . $_POST['price']. "' WHERE id='".$_GET['id']."'");
$alert = "Record successfully updated";
header("Location: mkShop.php");
  exit();
}
$result = mysqli_query($conn,"SELECT * FROM product WHERE id='".$_GET['id']."'");
$row = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
</head>
<body>
    <!-- <a href="updateByUser.php">Studentes List</a> -->

    <form action="" name= "form" method="post">
        <?php if(isset($alert)) {echo $alert;}?>
        <label>ISSN</label> <br>

    <input type="number" name = "id"value="<?php echo $row['id']?>"><br>
    <label>name of proudct</label> <br>

    <input type="text" name = "names"value="<?php echo $row['names']?>">   <br>
     <label> price of proudct</label> <br>

    <input type="number" name = "price"value="<?php echo $row['price']?>"><br>
    <input type="submit" name="submit" value="submit"><br>
<br>



    </form>
<a href="mkShpo.php"></a>
</body>
</html>