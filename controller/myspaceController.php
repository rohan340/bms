<?php

include('dbConfig.php');
session_start();
//print_r($_SESSION);die;
$sql = "select session_time from session;";
$session_time = mysqli_query($con,$sql);
if(mysqli_num_rows($session_time)>0){
    $session_time = mysqli_fetch_row($session_time);
}

//print_r($_SESSION);die;
if(isset($_SESSION['loggedin'])){
    if(time()-$_SESSION['last_login_timestamp']>$session_time){
        header('Location:logout.php');
    }
    elseif($_SESSION['role'] == 'admin'){
        header('Location:login.php');
    }
}
elseif(!isset($_SESSION['loggedin'])){
    header('Location:login.php');
}
$user_id = $_SESSION['user_id'];

$sql = "select * from blood_sugar where user_id='$user_id'";
$result = mysqli_query($con,$sql);

if(isset($_POST['bs_value'])){
    if(!preg_match("/^([0-9]|1[0])$/",$_POST['blood_value'])){
        $errorMsg = '<p class="text-danger">Your range shoulbe be between 0-10.</p>';
    }
    else{
        $value = $_POST['blood_value'];
        $sql = "insert into blood_sugar(user_id,bs_level) values('$user_id','$value')";
        if(mysqli_query($con,$sql)){
            header('Location:myspace.php');
        }
    }
}


if(isset($_POST["prescription"])){
    if(!empty($_FILES["file"]["name"])){
    $description        = $_POST['description'];
    $targetDir          = "assets/uploads/";
    $fileName           = basename($_FILES["file"]["name"]);
    $filesize           = $_FILES['file']['size'];
    $targetFilePath     = $targetDir . $fileName;
    $fileType           = pathinfo($targetFilePath,PATHINFO_EXTENSION );
    $allowed_type       = ['jpg','jpeg','txt','png','pdf','doc'];
    $date               = date('Y-m-d h:i:s');
    
    if(in_array($fileType,$allowed_type)){
        if(move_uploaded_file($_FILES['file']['tmp_name'],$targetFilePath)){
            $file_sql  = "insert into prescription(user_id,file_name,description,file_size,created_at) values ('$user_id','$fileName','$description','$filesize','$date')";
            if(mysqli_query($con,$file_sql)){
                $prs_message = "<p class='text-success'>Prescription added successfully.</p>";
            }
            else{
                $error = mysqli_error($con);
                $prs_message = "<p class='text-danger'>$error</p>";
            }
        }
        else{
            $prs_message = "<p class='text-danger'>Error in uploading File.</p>";
        }
    }
    else{
        $prs_message = "<p class='text-danger'>$fileType is not allowed.</p>";
    }
}
else{
    $prs_message = "<p class='text-danger'>Please Select File.</p>";
}
}

if(isset($_GET["filter_value"])){
    $search = $_GET['search'];
    if(!empty($search)){
        $search_sql = "select * from prescription where file_name like '%$search%' and user_id='$user_id'";
        //echo $search_sql;die;
        $search_result = mysqli_query($con,$search_sql);
    }
    else{
        $search_sql = "select * from prescription where user_id='$user_id'";
        $search_result = mysqli_query($con,$search_sql);
    }
}
else{
    $search_sql = "select * from prescription where user_id='$user_id'";
    $search_result = mysqli_query($con,$search_sql);
}