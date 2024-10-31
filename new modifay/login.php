<?php
$serverName = 'localhost';
$usernName = 'root';
$password = '';
$dbName = 'ecommerce';

$conn = new mysqli($serverName, $usernName, $password, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->error);
} else {
    echo "sami is here";
}

$loginSuccess = false;

if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["passwords"];
    require_once "loginSINGup.php";
    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if (password_verify($password, $user["password"])) {
        session_start();
        $_SESSION["user"] = "yes";
        $_SESSION["islogin"] = "yes";
        $_SESSION["id"] = $user["id"];
        $loginSuccess = true; // Set login success to true

        header("Location: myaccount.php");
        die();
    } else {
        $_SESSION["islogin"] = "no";
    }
}
?>

<!-- Your existing HTML code -->

<div class="overlay-panel overlay-left">
    <!-- ... existing code ... -->
    <?php
    if (count($errors) > 0) {
        echo "<div class='alert alert-danger'>";
        foreach ($errors as $error) {
            echo "$error<br>";
        }
        echo "</div>";
    }
    ?>
</div>

<div class="overlay-panel overlay-right">
    <!-- ... existing code ... -->
    <?php
    if (isset($_POST["login"]) && !$loginSuccess) {
        echo "<div class='alert alert-danger'>Invalid email or password</div>";
    }
    ?>
</div>





<!doctype html>
<html lang="en">

<head>
    <title>look</title>
    <!-- log CSS -->
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- log CSS -->
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">



</head>

<body>

    <h2>WELCOME</h2>
    <div class="container" id="container">


        <?php
        if (isset($_POST["singup"])) {
            $fName = $_POST["first_name"];
            $lName = $_POST["last_name"];
            $email = $_POST["email"];
            $password = $_POST["passwords"];

            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            $errors = array();
            $password_regex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";
            $email_regex = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/";

            if (empty($fName) or  empty($lName) or empty($email) or empty($password)) {
                array_push($errors, "All fields are required");
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errors, "Email is not valid");
            } elseif (!preg_match($email_regex, $email)) {
                array_push($errors, "Invalid email format");
            }
            if (strlen($password) < 8) {
                array_push($errors, "Password must be at least 8 charactes long");
            }
            if (!preg_match($password_regex, $password)) {
                array_push($errors, "Password format is invalid");
            };


            require_once "loginSINGup.php";
            $sql = "SELECT * FROM user WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $rowCount = mysqli_num_rows($result);
            if ($rowCount > 0) {
                array_push($errors, "Email already exists!");
            }
            if (count($errors) > 0) {
                foreach ($errors as  $error) {
                    echo "<div class='alert alert-danger'>$error</div>";
                }
            } else {

                $sql = "INSERT INTO user (first_name, last_name, email, password) VALUES ( ?, ?, ?, ? )";
                $stmt = mysqli_stmt_init($conn);
                $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
                if ($prepareStmt) {
                    mysqli_stmt_bind_param($stmt, "ssss", $fName, $lName, $email, $passwordHash);
                    mysqli_stmt_execute($stmt);
                    echo "<div class='alert alert-success'>You are registered successfully.</div>";
                } else {
                    die("Something went wrong");
                }
            }
        }


 
        ?>





        <div class="form-container sign-up-container">
            <form action="#" method="POST">
                <h1>Create Account</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fa-brands fa-facebook-f" style="color: #4b82e2;"></i></a>
                    <a href="#" class="social"><i class="fa-brands fa-linkedin-in" style="color: #2e64c2;"></i></a>
                    <a href="#" class="social"><i class="fa-brands fa-google" style="color: #5089ed;"></i></a>
                </div>
                <strong>or use your email for registration</strong>
                <br>
                <input id="firstname" type="text" placeholder="first name : Amani" name="first_name" required />
                <br>
                <input id="lastname" type="text" placeholder="last name : raaed" name="last_name" required />
                <br>
                <input type="email" placeholder="Email" name="email" required />
                
                <br>
                <input type="password" placeholder="Password:A###$@123" name="passwords" required  />
                <br>
                <br>
                <button name="singup">Sign Up</button>
            </form>
        </div>







        <!--sign in here baby  -->
        <div class="form-container sign-in-container">
            <form action="#" method="POST">
                <h1>Sign in</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fa-brands fa-facebook-f" style="color: #4b82e2;"></i></a>
                    <a href="#" class="social"><i class="fa-brands fa-linkedin-in" style="color: #2e64c2;"></i></a>
                    <a href="#" class="social"><i class="fa-brands fa-google" style="color: #5089ed;"></i></a>
                </div>
                <strong>or use your account</strong>
                <br>
                <input type="email" placeholder="Email" name="email" />
                <br>

                <input type="password" placeholder="Password" name="passwords" />
                <br>

                <a href="resetpassword.php">Forgot your password?</a>
                <button name="login">Sign In</button>
            </form>
        </div>



        <?php
        if (isset($_POST["login"])) {
            $email = $_POST["email"];
            $password = $_POST["passwords"];
            require_once "loginSINGup.php";
            $sql = "SELECT * FROM user WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);


            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if (password_verify($password, $user["password"])) {
                session_start();
                $_SESSION["user"] = "yes";
                $_SESSION["islogin"] = "yes";
                $_SESSION["id"] = $user["id"];

                header("Location: myaccount.php");

                die();
            } else {
                echo "<div class='alert alert-danger'>Password does not match</div>";
                $_SESSION["islogin"] = "no";

            }
        } else {
            echo "<div class='alert alert-danger'>Email does not match</div>";
            $_SESSION["islogin"] = "no";
          echo  $_SESSION["islogin"];

        }        


      

 
        ?>



        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <!-- <footer>
	<p>
		Created with <i class="fa fa-heart"></i> by
		<a target="_blank" href="https://florin-pop.com">Florin Pop</a>
		- Read how I created this and how you can join the challenge
		<a target="_blank" href="https://www.florin-pop.com/blog/2019/03/double-slider-sign-in-up-form/">here</a>.
	</p>
</footer> -->



    <script> </script>
    <!-- js src-->
    <script src="login.js"> </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>

