<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="dailup";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$user_prof=array();
$users_dict = array();
$sql = "SELECT * from catogories";
// mysqli_query($conn, $sql);
$result = $conn->query($sql);
while($result and $row = $result->fetch_assoc()) {
    $ppl=array();
    $a=$row['id'];
    $sql2 = "SELECT * from worker_info where field_id=$a";
    $result2 = $conn->query($sql2);
    while($row2 = $result2->fetch_assoc()){
        array_push($ppl,array($row["id"],$row2["user_name"]));
        $user_prof[$row2["id"]]=array($row2["user_name"],$row2["age"],$row2["phone"],$row2["email"],$row2["about"],$row2["additional_info"],$row2["rating"],$row2["profile_pic"]);
    }
    $users_dict[$row["field"]]=$ppl;
  }
$users_dict2 = json_encode($users_dict);
$user_prof2 = json_encode($user_prof);
// Pass the JSON string to JavaScript
echo "<script>var prof_name = $users_dict2;var all_info=$user_prof2;console.log(prof_name,all_info)</script>";

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Home</title>
</head>
<body>
    <div class="main_container">
        <div class="side_nav_bar">
            <p class="side_nav_links" onclick="create()" >HOME</p>
            
            <h1 class="side_nav_links" id='welcome'
            ><br><?php 
                session_start();
                if (isset($_SESSION['user_id']))
                    echo "Welcome\n" . $_SESSION['user_id'][1];
                ?></h1>
        </div>
        <div class="side_container">
            <div class="upper_nav">
                <!-- <p style="color:white"></p> -->
                <?php
                    if (isset($_SESSION['user_id'])){
                        $some = json_encode($_SESSION['user_id']);
                        echo "<script>var chor = $some;console.log(chor);</script>";?>
                        <form method="post" action='login.php' style="margin:3vh;" onsubmit="localStorage.removeItem('info')">
                            <input type='submit' id="upper_nav_btn_logout" class="upper_nav_btns" value="LOGOUT">
                        </form>
                        <button id="upper_nav_btn_view" class="upper_nav_btns" onclick="op(this)">PROFILE</button><?php
                    }
                        // unset($_SESSION['user_id']);
                    else if(!isset($_SESSION['user_id'])){?>
                        <button id="upper_nav_btn_login" class="upper_nav_btns" onclick="window.location.href = 'sign-in.php'">LOGIN</button>
                        <button id="upper_nav_btn_singup" class="upper_nav_btns" onclick="window.location.href = 'sign-up.php'">SIGN UP</button>
                        <?php
                    }
                ?>
                <input type="search" class="search_bar" id="search" size="19" placeholder=" SEARCH" >
            </div>
            <div class="side_main_container">
                <div class="HEADING"><h2>CATOGORIES</h2></div>
                    <div class="main_card_details scrollbar" id="style-1">
                        <div class="card_container" id="main_card_info" >
                            <!-- <div class="main_cards_cata" id="cards">
                            </div> -->
                        </div>
                    </div>
               </div>
             </div>
       
         </div>

         <script src="apis.js"></script>
         <script>
            function op(buton) {
                let goingToLocalStorage = all_info[chor[0]].slice();
                goingToLocalStorage.push(chor[2]);
                localStorage.setItem('info',JSON.stringify(goingToLocalStorage));
                window.location.href="http://localhost/DailUP/view-profile.html";
            }
         </script>
</body>

</html>