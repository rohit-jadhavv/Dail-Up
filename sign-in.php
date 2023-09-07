<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sign-up.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>LoginForm</title>
</head>

<body>
    <div class="main-container">

        <div id = "signIn" class="box-container ">
            <form name='loginUser' action="login.php" method="post">
                <div class="header"><h1>Sign In</h1></div>
                <div class="input-field">
                    <input type="text" name="username" placeholder="Username" required/>
                    <i class="bx bx-user"></i>
                </div>
                <div class="input-field">
                    <input type="password" name="password" placeholder="Password" required/>
                    <i class="bx bx-lock"></i>
                    <p style="color:red; margin-top:-10px;margin-left: 20px;text-align:center;">
                        <?php
                            session_start();
                            if(isset($_SESSION['user_error'])){
                                echo $_SESSION['user_error'];
                                unset($_SESSION['user_error']);
                            }
                            else{
                                echo "";
                            }
                        ?>
                    </p>
                </div>
                <div class="button-field">
                    <button type="submit">Login</button>
                </div>
                <div class="info-signup">
                    <p>Don't have an account yet ?<span class="signup-link"><a id = "signup-link" href="sign-up.php">Register</a></span></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html> 