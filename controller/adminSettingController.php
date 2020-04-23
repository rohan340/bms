<?php
    require('dbConfig.php');
    session_start();
    //print_r($_SESSION);die;
    if(isset($_SESSION['loggedin'])){
        if(time()-$_SESSION['last_login_timestamp']>600){
            header('Location:logout.php');
        }
        elseif($_SESSION['role'] == 'user'){
            header('Location:login.php');
        }
    }
    if(!isset($_SESSION['loggedin'])){
        header('Location:login.php');
    }

    if(isset($_POST['admin_setting'])){
        
        $session          = htmlentities($_POST['setting']);
        $session_time = $session*60;
        $date           = date('Y-m-d h:i:s');
            $sql = "UPDATE session SET session_time = '$session_time', created_at= '$date'  WHERE role = 'admin';";
        
            if(mysqli_query($con,$sql)){
                $message = "<p class='text-success'>Session Timeout Added Successfully.</p>";
            }

    }

    