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
        <div id = "signUp" class="box-container">
            
            <form name='registration' action = 'register.php' method="post" onSubmit="return formValidation();">
                <div class="header"><h1>Sign Up</h1></div>
                <div class="input-field">
                    <input type="text" name="username" id = "uname" placeholder="Username" required/>
                    <i class="bx bx-user"></i>
                    <p id="user-error" style="display: none; margin-top: -4px; margin-left: 20px;"></p>
                </div>
                <div class="input-field">
                    <input type="text" name="email" id = "email" placeholder="Email" required/>
                    <i class='bx bxl-gmail'></i>
                    <p id="mail-error" style="display: none; margin-top: -4px; margin-left: 20px;"></p>
                </div>
                <div class="input-field">
                    <input type="password" name="password" id="pwd" placeholder="Password" required/>
                    <i class="bx bx-lock"></i>
                    
                </div>
                <div class="input-field">
                    <input type="password" name="conf-password" id = "cpwd" placeholder="Confirm Password" required/>
                    <i class="bx bx-lock"></i>
                    <p id="pass-error" style="display: none; margin-top: -4px; margin-left: 20px; margin-right: 10px;"></p>
                    <p style="color:red; margin-top:-10px;margin-left: 20px;">
                        <?php
                            session_start();
                            if(isset($_SESSION["message"])){
                                echo $_SESSION['message'];
                                unset($_SESSION["message"]);
                            }
                            else{
                                echo "";
                            }
                        ?>
                    </p>
                </div>
                <div class="button-field">
                    <button type="submit">Sign Up</button>
                </div>
                <div class="info-signup">
                    <p>Already have an account ?<span class="signup-link"><a id = "signin-link" href="sign-in.php">Login</a></span></p>
                </div>
            </form>
        </div>
    </div>

    <script src = "sign-up.js"></script>

</body>
</html> 