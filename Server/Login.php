<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/loginDB.php";
    
    $sql = sprintf("SELECT * FROM user
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    
    

    if ($user) {
        
        if (password_verify($_POST["password"], $user["password_hash"])) {
             // <!-- FIXME: -->
            header("Location: wrapper.php");}
    
}
}
?>


<!-- html -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <!-- FIXME: -->
        <link rel="stylesheet" href="../css/Login-Register.css">
    </head>
    <body>
        <header>
            <h2 class="logo"> JobiFy</h2>
        </header>

        <?php if ($is_invalid): ?>
            <em>Invalid login</em>
        <?php endif; ?>

        <div class="wrapper">
            <span class="icon-close"><ion-icon name="close"></ion-icon></span>
            <!-- login popup -->
            <div class="form-box login">
                <h2>Login</h2>
                <form  method="post">
                    <div class="input-box">
                        <span class="icon"><ion-icon name="mail"></ion-icon></span>
                        <input type="email" required name="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
                        <label>Email</label>

                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                        <input type="password" required name="password">
                        <label>Password</label>

                    </div>
                    <div class="remember-forget">
                        <label><input type="checkbox">Remeber me</label>
                        <a href="#"> Forgot Password?</a>
                    </div>
                    <button type="submit" class="btn">Login</button>
                    <div class="login-register">
                        <p>Don't have an accout ? <a href="#" class="register-link">Register</a></p>
                    </div>
                </form> 
            </div>

            <!-- register popup -->
            <div class="form-box register">
                <h2>Register</h2>
                
                <!-- FIXME: -->
                <form action="Register.php" method="post">
                    <!-- FIXME: -->
                    <div class="input-box">
                        <span class="icon"><ion-icon name="person"></ion-icon></span>
                        <input type="text" required name="username">
                        <label>Username</label>
                    </div>

                    <!-- FIXME: -->
                    <div class="input-box">
                        <span class="icon"><ion-icon name="mail"></ion-icon></span>
                        <input type="email" required name="email">
                        <label>Email</label>
                    </div>

                    <!-- FIXME: -->
                    <div class="input-box">
                        <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                        <input type="password" required name="password">
                        <label>Password</label>
                    </div>

                    <!-- FIXME: -->
                    <div class="input-box">
                        <span class="icon"><ion-icon name="person"></ion-icon></span>
                        <input type="text" required name="cooperation">
                        <label>cooperation</label>
                    </div>

                    <div class="remember-forget">
                        <label><input type="checkbox">I agree to the terms & conditions</label>
                    </div>

                    <button type="submit" class="btn">Login</button>

                    <div class="login-register">
                        <p>Already have an account ? <a href="#" class="login-link">Login</a></p>
                    </div>

                </form>
            </div>
        </div>

        <script src="../js/Login-Register.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    
    </body>