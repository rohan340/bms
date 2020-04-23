<?php
require 'dbConfig.php';
$token = $_GET['token'];
    if(isset($_GET['submit'])){
        //echo 'asdsa';die;
        $password = htmlentities($_POST['password']);
        $hash_password = password_hash($password,PASSWORD_DEFAULT);
        $sql = "update registration set password='$hash_password' where token='$token'";
        if(mysqli_query($con,$sql)){
            echo "<script>alert('Your Password has been created Successfully.');
            window.location.href='login.php'</script>";
        }
    }