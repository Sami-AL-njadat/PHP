<?php
$_SESSION["isLogin"] = "no";
require_once 'functions.php';
if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["passwords"];
    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    // print_r(mysqli_num_rows($result));

    if (mysqli_num_rows($result) > 0) {
        echo"<h1>normal user 2</h1>";
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if (password_verify($password, $user["password"])) {
            // session_start();
            $_SESSION["user"] = "yes";
            $_SESSION["isLogin"] = "yes";
            $_SESSION["user_id"] = $user["id"];

            if ($_SESSION['from_cart_se'] == 'yes') {
                // $_SESSION["user_id"] = $user["id"];
                // redirect('checkoutNew.php', "Login Successfull.");
                // echo "<h1>test checkout</h1>";
                echo "<script>window.location.href = 'checkoutNew.php';</script>";
                // echo"<h1>fromcart</h1>";
                print_r(mysqli_num_rows($result));
                
            } else {
                // echo"<h1>notfromcart</h1>";
                if ($user["role"] == 1) {
                    $_SESSION["user"] = "yes";
                    $_SESSION["user_id"] = $user["id"];
                    redirect('skydash/index.php', "Login Successfull.");
                    exit();
                    // print_r(mysqli_num_rows($result));
                } else {
                    // echo"<h1>normal user</h1>";
                    $_SESSION["user"] = "yes";
                    $_SESSION["user_id"] = $user["id"];
                    print_r(mysqli_num_rows($result));

                    redirect('Home.php', "Login Successfull.");
                }
            }
        } else {
            $_SESSION["user"] = "no";
            $_SESSION["isLogin"] = "no";
            redirect('login1.php', "Password does not match.");
        }
    } else {
        echo "<div class='alert alert-danger'>Email does not match</div>";
        $_SESSION["user"] = "no";
        $_SESSION["isLogin"] = "no";
        redirect('login1.php', "Email does not match.");
    }
}
