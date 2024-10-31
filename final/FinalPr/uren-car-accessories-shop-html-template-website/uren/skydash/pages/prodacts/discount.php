<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../vendors/feather/feather.css">
    <!-- <link rel="stylesheet" href="../../"> -->
    <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- font awsome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="../../js/select.dataTables.min.css">
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@100;300;400;500;700;800;900&family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../../images/favicon.png" />
    <style>
        body {
            font-family: 'M PLUS 1p', sans-serif;
            font-family: 'Oswald', sans-serif;
        }

        .add {
            background: green;
            color: white;
            border: none;
            padding: 7px 10px;
            border-radius: 12px;

        }

        .ipdai {
            background-color: transparent;
            border: none;
            padding: 7px 10px;
            border-radius: 12px;
        }

        .table td img,
        .jsgrid .jsgrid-table td img {
            width: 20px !important;
            height: 20px !important;
            border-radius: 0% !important;
        }
    </style>
</head>

<body>
    <?php
    require_once("../../db.php");

    $result = $crudObj->getAllDiscounts();
    $result = $result->fetch_all(MYSQLI_ASSOC);


    if (isset($_GET['deleteid'])) {

        $deleteid = $_GET['deleteid'];
        $crudObj->deleteDiscount($deleteid);
        header("Location: discount.php");
    }

    if (isset($_POST['submit'])) {
        $newDiscount = $_POST['discount_code'];
        $percent = $_POST['discount_percent'];
        $crudObj->addDiscount($newDiscount, $percent);
        header("Location: discount.php");
    }

    if (isset($_POST['updateStatus'])) {
        $newStatus = $_POST['newStatus'];
        $discountId = $_POST['discountId'];
        $crudObj->updateDiscountStatus($discountId, $newStatus);
        header("Location: discount.php");
    }
    require_once("../../partials/_navbar.php");
    $brands = $crudObj->getAllBrands();
    $thebrand = $brands->fetch_all(MYSQLI_ASSOC);
    // var_dump($categories);
    ?>

    <!-- _________________  -->
    <div class="container-fluid page-body-wrapper">

        <?php
        // require_once("../../partials/navbar.php")
        require_once("../../partials/navbar.php")

        ?>
        <!-- <div class="main-panel"> -->
        <div class="card">
            <div class="card-body">
                <p class="card-title">Add New Discount</p>
                <form action="" method="post">
                    <label for="discount_code">Enter the discount code</label>
                    <input type="text" name="discount_code" required><br>
                    <label for="discount_percent">Enter the discount percent</label>
                    <input type="text" name="discount_percent" id="discount_percent"><br>
                    <button class="add" name="submit">Add discount</button>
                </form><br><br>
                <p class="card-title">All discounts</p>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <?php

                            ?>
                            <table class="display expandable-table" style="width:100%;text-align:center">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Discount code</th>
                                        <th>Discount persent</th>
                                        <th>Update Dicount Status</th>
                                        <th></th>
                                        <!-- <th>Delete</th> -->
                                        </th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <?php
                                    // while ($category = $categories->fetch_assoc()) {
                                    foreach ($result as $value) {
                                    ?>
                                        <tr id="row1">
                                            <td><?php echo $value['id'] ?></td>
                                            <td><?php echo $value['discount_code'] ?></td>
                                            <td><?php echo $value['discount_persent'] ?></td>
                                            <td>
                                                <form method="post">
                                                    <select name="newStatus">
                                                        <!-- <option value="0">User</option>
                                                        <option value="1">Admin</option> -->
                                                        <?php
                                                        if ($value['is_active'] == 0) { ?>

                                                            <option value="0">Not Active</option>
                                                            <option value="1">Active</option>

                                                        <?php } else { ?>
                                                            <option value="1">Active</option>
                                                            <option value="0">Not Active</option>
                                                        <?php } ?>
                                                    </select>
                                                    <input type="hidden" name="discountId" value="<?php echo $value['id']; ?>">
                                                    <button type="submit" class="update" name="updateStatus"><img src="../../../dash_img/1688988.png" width="20px"></button>
                                                </form>
                                            </td>



                                            <td class=" "> <a href="?deleteid=<?php echo $value['id'] ?>"><img src="../../../dash_img/5675840.png" width="20px" alt=""></a></a> </td>

                                        </tr>
                                    <?php
                                    }

                                    ?>
                                    <?php
                                    // }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=" pop">
    </div>
    <!-- plugins:js -->
    <script src="../../vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../../vendors/chart.js/Chart.min.js"></script>
    <script src="../../vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="../../vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="../../js/dataTables.select.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../js/off-canvas.js"></script>
    <script src="../../js/hoverable-collapse.js"></script>
    <script src="../../js/template.js"></script>
    <script src="../../js/settings.js"></script>
    <script src="../../js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="../../js/dashboard.js"></script>
    <script src="../../js/Chart.roundedBarCharts.js"></script>
    <!-- ___________ 
 -->
    <script src="../../js/product.js"></script>

</body>

</html>