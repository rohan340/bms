<?php
require('dbConfig.php');
$token = $_GET['token'];
    if(empty($token)){
        echo "<script>alert('Token not found');
        window.location.href='index.php';</script>";
    }
    $sql = "select email_verified from users where token='$token'";
    $verified = mysqli_query($con,$sql);
    //echo '<pre>';print_r($verified);die;
    if(mysqli_num_rows($verified)>0){
        if(isset($_POST['submit'])){
            //echo 'asdsa';die;
            $password = htmlentities($_POST['password']);
            $hash_password = password_hash($password,PASSWORD_DEFAULT);
            $sql = "update users set password='$hash_password' where token='$token'";
            if(mysqli_query($con,$sql)){
                echo "<script>alert('Your Password has been created Successfully.');
                window.location.href='login.php'</script>";
            }
        }
    }
    $sql = "update users set email_verified=1 where token='$token'";
    //echo $sql;die;
    if(mysqli_query($con,$sql)){
        echo "<script>alert('Your Email has been Verified.Please Enter your Password.');</script>";
    }
    else{
        echo "<script>alert('Email not Found.Please Register Again');window.location.href='index.php';
        </script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password</title>
    <link rel="stylesheet" href="/bms/assets/css/bootstrap.css">
</head>
<body>
    <div class="container">
        <div class="row bg-dark text-white text-center mb-5">
           <div class="col-md-12">
                 <h1>Blood Sugar Managment System</h1>   
            </div>
        </div>
        <form action="" method="POST">
            <div class="form-group">
                <label for="password">Please Enter Your Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    
</body>
</html>