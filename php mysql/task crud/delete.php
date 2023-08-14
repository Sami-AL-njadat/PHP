<?php
$conn = mysqli_connect("localhost", "root", "", "mkonline");
// include_once 'students.php';
$sql = "DELETE FROM product WHERE id='".$_GET["id"]."'";
if (mysqli_query($conn, $sql)) {
  header("Location: mkShop.php");
  exit();
      // echo "Record deleted successfully";
    } else {
      echo "Delete record faild: " . mysqli_error($conn);
    }
?>
<a href="mkShpo.php"></a>
