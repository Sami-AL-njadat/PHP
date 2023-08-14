<?php
include 'index1.php';

$result = mysqli_query($conn,"SELECT * FROM product");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mkonline</title>
    <link rel="stylesheet" href="table.css">
</head>
<body>


<form action="mkShop.php" method="POST">
    <label>ISSN</label> <br>
    <input type="text" name="id"><br>
    <label>name of product</label><br>
    <input type="text" name="nameofproduct"><br>
    <label>price of product</label><br>
    <input type="number" name="priceofproduct"><br>
    <!-- <label>delete data</label><br>
    <input type="text" name="delete data"><br>
    <label>update data</label><br>
    <input type="text" name="update data"><br> -->
    <input type="submit" name="submit" value="SUBMIT"><br>

</form>
    <br>
    <br>
    <?php
if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $namesprod = $_POST['nameofproduct'];
    $priceprod = $_POST['priceofproduct'];


    $sql = "INSERT INTO product (id, names, price) VALUES ($id, '$namesprod', $priceprod)";
    
    // var_dump($result);
    mysqli_query($conn, $sql);
// if (mysqli_query($conn, $sql)){

//     echo "New record added successfully";
// }else{
//     echo "Record dose not added successfully";
// }
header("Location: mkShop.php");
exit();
}


?>



<table id="Table123">
        <thead>
            <th>ISSN</th>
            <th>Name of product</th>
            <th>price of product</th>
            <th>delete data</th>
            <th>Update data</th>
        </thead>
        <?php
        $i = 0;
        while ($row = mysqli_fetch_array($result)){
?>       
        <tbody>

            <td><?php echo $row["id"];?></td>
            <td><?php echo $row["names"];?></td>
            <td><?php echo $row["price"];?></td>
            <td class="buat"><a href="delete.php?id=<?php echo $row["id"];?>">Delete</a></td>
            <td class="buat"><a href="update.php?id=<?php echo $row["id"];?>">Update</a></td>
        </tbody>

<?php
$i++;
 }
?>
    </table>


 










</body>
</html>


