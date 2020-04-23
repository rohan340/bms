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

    if(isset($_POST['add_admin'])){
        
        $email          = htmlentities($_POST['email']);
        $password       = htmlentities($_POST['password']);
        $password_hash  = password_hash($password,PASSWORD_DEFAULT);
        $role           = 'admin';
        $full_name      = htmlentities($_POST['full_name']);
        $date           = date('Y-m-d h:i:s');

        $email_sql = "select email from users where email = '$email'";
        $result = mysqli_query($con,$email_sql);
        if(mysqli_num_rows($result)>0){
            $message = "<p class='text-danger'>Email is already exist.</p>";
        }
        else{
            $sql = "insert into users(email,full_name,role,password,created_at) values('$email','$full_name','$role','$password_hash','$date')";
        
            if(mysqli_query($con,$sql)){
                $message = "<p class='text-success'>Admin Added Successfully.</p>";
            }
        }
    }