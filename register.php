<?php


if (isset($_POST["submit"])) {
    include_once("dbconnect.php");
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password =sha1( $_POST["password"]);
    
    $sqlreg = "INSERT INTO `users`(`id`, `username`, `email`, `password`) VALUES ('','$username','$email','$password')";
    try {
        $conn->exec($sqlreg);
        
        echo "<script>alert('Registered Successfully')</script>";
        echo "<script>window.location.replace('mainpage.php')</script>";
    } catch (PDOException $e) {
        echo "<script>alert('Failed to Register')</script>";
        
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma-rtl.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <script src="https://kit.fontawesome.com/ac93d662e6.js" crossorigin="anonymous"></script>
    <img src="images/heda.png" alt="shop banner">
    <title>Register</title>
</head>

<body >


    <div class="w3-bar w3-blue-gray">
        <a href="login.php" class="w3-bar-item w3-button w3-right">Login</a>
        <a href="userpage.php" class="w3-bar-item w3-button w3-left">Home</a>
    </div>

    <div class="w3-container w3-padding-64 form-container ">
        <div class="w3-card has-background-warning">
            <div class="w3-container w3-pale-yellow">
                <p>New User Registration</p>
            </div>
            <form class="w3-container w3-padding" name="registerForm" action="register.php" method="post" enctype="multipart/form-data" onsubmit="return confirmDialog()" >
               

                <p>
                    <label>Name</label>
                    <i class="fa fa-user-o" ></i>
                    <input class="w3-input w3-border w3-round" name="username" id="idname" type="text" required>
                </p>
                <p>
                    <label>Email</label>
                    <i class="fa fa-envelope icon"></i>
                    <input class="w3-input w3-border w3-round" name="email"  type="text" required>
                </p>
                
<p>
                    <label>Password</label>
                    <i class="fa fa-lock" ></i>
                    <input class="w3-input w3-border w3-round" name="password" type="text" required>
                </p>


                <div class="row">
                    <input class="w3-input w3-border w3-block has-background-link-light  w3-round" type="submit" name="submit" value="Register">
                </div>

            </form>


        </div>
    </div>

    <footer class="footer has-background-primary-light">
  <div class="content has-text-centered">
    <p>
      <a aria-setsize="50">Bella Cosa</a><br>
      <i class="fab fa-facebook"></i><a href="https://www.facebook.com/akmalsyfq">Find me on facebook</a><br>
      <i class="fab fa-shopify"></i><a
        href="https://shopee.com.my/product/91037664/9126330878?smtt=0.91039142-1635165472.3">Follow me at shopee</a>
      <i class="fas fa-paper-plane"></i><a href="mailto:akmalsyfq@gmail.com">Contact me through email</a>
    </p>
    <bold>COPYRIGHT</bold><i class="far fa-copyright"></i> 2021. All rights reserved.

    </p>
  </div>
</footer>


</body>

</html>
