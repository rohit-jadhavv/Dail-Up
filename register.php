<?php
    session_start();
    include('connection.php');
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $name = $_POST['username'];
        $mail = $_POST['email'];
        $pas = $_POST['password'];

        $sql = "CREATE TABLE IF NOT EXISTS workers_auth(
            worker_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            worker_uname VARCHAR(50),
            worker_mail VARCHAR(50),
            worker_pass VARCHAR(20)
            )";

        mysqli_query($conn,$sql);
    
        $csql = "SELECT * from workers_auth where worker_uname = '$name'";
        
        $result = mysqli_query($conn,$csql);

        if ($result && mysqli_num_rows($result) > 0){
            $_SESSION['message'] = "Username or Password already exists";
            header('Location:sign-up.php');
        }
        else{

            $sql = "INSERT INTO workers_auth (worker_uname, worker_mail,worker_pass) VALUES ('$name', '$mail','$pas')";

            if (mysqli_query($conn, $sql)) {
                header('Location:profileform.php');
            } else {
                echo 'Error inserting data: ' . mysqli_error($conn);
            }

        }
        mysqli_close($conn);
    }

?>