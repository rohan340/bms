<?php
require('dbConfig.php');
session_start();
if(isset($_SESSION['role'])){
    if($_SESSION['role']=='admin'){
        header('Location:admin.php');
    }
    else{
        header('Location:myspace.php');
    }
}

if(isset($_POST['submit'])){
    $email = htmlentities($_POST['email']);
    $password = htmlentities($_POST['password']);
    $sql = "select * from users where email='$email'";
    $result = mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
        
        if(password_verify($password,$row['password'])){

            session_start();
            $_SESSION['loggedin']           = true;
            $_SESSION['role']               = $row['role'];
            $_SESSION['user_id']            = $row['id'];
            $_SESSION['last_login_timestamp']    = time();
            $_SESSION['full_name']          = $row['full_name'];
            $_SESSION['email']              = $row['email'];

            if($row['role']=='user'){
                header('Location:myspace.php');
            }
            else{
                header('Location:admin.php');
            }
        }
        else{
            $error = "<p class='text-danger'>Invalid Password.Please Try Again.</p>";
        }
    }
    else{
        $error = "<p class='text-danger'>Your Email is not registered.</p>";
    }
}