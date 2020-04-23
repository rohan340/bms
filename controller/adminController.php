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

    if(isset($_GET['filter_users'])){
        $search = $_GET['search'];
        if(!empty($search)){
            $search_sql = "select email,full_name from users where email like '%$search%' and role='user';";
            $users_result = mysqli_query($con,$search_sql);
        }
        else{
            $search_sql = "select email,full_name from users where role='user';";
            $users_result = mysqli_query($con,$search_sql);
        }
    }
    else{
        $search_sql = "select email,full_name from users where role='user';;";
        $users_result = mysqli_query($con,$search_sql);
    }



    if(isset($_GET['filter_bs'])){
        $search = $_GET['bs_search'];
        if(!empty($search)){
            $search_sql = "SELECT u.email,b.id,b.bs_level,b.created_at FROM `blood_sugar` as b JOIN users as u on b.user_id=u.id where u.email like '%$search%';";
            $bs_result = mysqli_query($con,$search_sql);
        }
        else{
            $search_sql = "SELECT u.email,b.id,b.bs_level,b.created_at FROM `blood_sugar` as b JOIN users as u on b.user_id=u.id ;";
            $bs_result = mysqli_query($con,$search_sql);
        }
    }
    else{
        $search_sql = "SELECT u.email,b.id,b.bs_level,b.created_at FROM `blood_sugar` as b JOIN users as u on b.user_id=u.id;";
        $bs_result = mysqli_query($con,$search_sql);
    }




    if(isset($_GET['filter_ps'])){
        $search = $_GET['ps_search'];
        if(!empty($search)){
            $search_sql = "SELECT u.email,p.id,p.file_name,p.description,p.file_size,p.created_at FROM `prescription` as p JOIN users as u on p.user_id=u.id where p.file_name like '%$search%';";
            $ps_result = mysqli_query($con,$search_sql);
        }
        else{
            $search_sql = "SELECT u.email,p.id,p.file_name,p.description,p.file_size,p.created_at FROM `prescription` as p JOIN users as u on p.user_id=u.id ;";
            $ps_result = mysqli_query($con,$search_sql);
        }
    }
    else{
        $search_sql = "SELECT u.email,p.id,p.file_name,p.description,p.file_size,p.created_at FROM `prescription` as p JOIN users as u on p.user_id=u.id;";
        $ps_result = mysqli_query($con,$search_sql);
    }

    