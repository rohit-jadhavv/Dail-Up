<?php
    session_start();                                //isset($_SESSION['user_id'])
    include('connection.php');
    if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_SESSION['user_id'])) {
        unset($_SESSION['user_id']);
        header('Location:DB_conn.php');
    }
    else if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['username'];
        $pas = $_POST['password'];
        
        $csql = "SELECT * from workers_auth where worker_uname = '$name' and worker_pass = '$pas'";

        $result = mysqli_query($conn,$csql);
        
        if ($result && mysqli_num_rows($result) > 0){
            $user_cred = mysqli_fetch_assoc($result);
            $idd = $user_cred['worker_id'];
            //SELECT field from catogries where catogries.id=
            $sql = "SELECT field from catogories where id=$idd";
            $result = mysqli_query($conn,$sql);
            // if ($result && mysqli_num_rows($result) > 0){}

            $some = mysqli_fetch_assoc($result);
            
            $_SESSION['user_id'] = array($user_cred['worker_id'],$user_cred['worker_uname'],$some['field']);
            header('Location:DB_conn.php');
            
        }
        else{
            $_SESSION['user_error'] = "User Does Not Exists";
            header('Location:sign-in.php');
        }

    }
?>