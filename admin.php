<?php
   include 'controller/adminController.php';
    //echo '<pre>';print_r($_SESSION);die;
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/bms/assets/css/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <title>Admin Dashboard</title>
</head>
<body>
<div class="container bg-light">
        <div class="row bg-dark text-white mb-2">
            <div class="col-md-6"><h3>Hi <?php echo $_SESSION['full_name']?></h3></div>
            <div class="col-md-6"><h3>Welcome to Admin Dashboard</h3></div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="admin-settings.php" class="btn btn-secondary">Configure Settings</a>
            </div>
            <div class="col-md-4">
                <a href="add-admin.php" class="btn btn-secondary">Creae More Admins</a>
            </div>
            <div class="col-md-4 text-right mb-5">
                <a href="logout.php" class="btn btn-secondary">Logout</a>
            </div>
        </div>
<!-- -------------------------USERS LISTING--------------------------------------------!-->

        <form action="" method="GET" class="mb-4">
            <div class="row">
                    <div class="col-md-10">
                        <input type="text" name="search" id="search" value="<?php echo isset($_GET['search'])?$_GET['search']:''?>"  class="form-control" placeholder="Filter By Email">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" style="width:141px" name="filter_users" class="btn btn-secondary">Filter</button>
                    </div>
            </div>
            <div class="row" style="padding: 11px 0px 0px 19px;">
                <?php if(mysqli_num_rows($users_result) == 0){
                        echo "<p class='text-danger'>No Record Found</p>";
                }?>
            </div>
        </form>
        <table class="table table-bordered table-striped" style=" margin-bottom: 6rem;">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Full Name</th>
                </tr>
            </thead>
            <tbody>
                <?php if(mysqli_num_rows($users_result)>0){
                        while($row = mysqli_fetch_assoc($users_result)){?>
                        <tr>
                            <td><?php echo $row['email']?></td>
                            <td><?php echo $row['full_name']?></td>
                        </tr>
                <?php }} else{ ?>
                        <tr>
                            <td colspan="2">No users found</td>
                        </tr>
                <?php }?>
            </tbody>
        </table>

<!-- ------------------------- BLODD SUGAR LISTING--------------------------------------------!-->

        <form action="" method="GET" class="mb-4">
            <div class="row">
                    <div class="col-md-10">
                        <input type="text" name="bs_search" id="search" value="<?php echo isset($_GET['bs_search'])?$_GET['bs_search']:''?>"  class="form-control" placeholder="Filter By Email">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" style="width:141px" name="filter_bs" class="btn btn-secondary">Filter</button>
                    </div>
            </div>
            <div class="row" style="padding: 11px 0px 0px 19px;">
                <?php if(mysqli_num_rows($bs_result) == 0){
                        echo "<p class='text-danger'>No Record Found</p>";
                }?>
            </div>
        </form>
        <table class="table table-bordered table-striped" style=" margin-bottom: 6rem;">
            <thead>
                <tr>
                    <th>SNO</th>
                    <th>Email</th>
                    <th>BS Level</th>
                    <th>Date & Time</th>
                </tr>
            </thead>
            <tbody>
                <?php if(mysqli_num_rows($bs_result)>0){
                        while($row = mysqli_fetch_assoc($bs_result)){?>
                        <tr>
                            <td><?php echo $row['id']?></td>
                            <td><?php echo $row['email']?></td>
                            <td><?php echo $row['bs_level']?></td>
                            <td><?php echo $row['created_at']?></td>
                        </tr>
                <?php }} else{ ?>
                        <tr>
                            <td colspan="4">No users found</td>
                        </tr>
                <?php }?>
            </tbody>
        </table>



<!-- ------------------------- PRESCRIPTION  LISTING--------------------------------------------!-->

`       <form action="" method="GET" class="mb-4">
            <div class="row">
                    <div class="col-md-10">
                        <input type="text" name="ps_search" id="search" value="<?php echo isset($_GET['ps_search'])?$_GET['ps_search']:''?>"  class="form-control" placeholder="Filter By File Name">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" style="width:141px" name="filter_ps" class="btn btn-secondary">Filter</button>
                    </div>
            </div>
            <div class="row" style="padding: 11px 0px 0px 19px;">
                <?php if(mysqli_num_rows($ps_result) == 0){
                        echo "<p class='text-danger'>No Record Found</p>";
                }?>
            </div>
        </form>
        <table class="table table-bordered table-striped" style=" margin-bottom: 6rem;">
            <thead>
                <tr>
                    <th>SNO</th>
                    <th>Email</th>
                    <th>File Name</th>
                    <th>Description</th>
                    <th>File Size</th>
                    <th>Date & Time</th>
                </tr>
            </thead>
            <tbody>
                <?php if(mysqli_num_rows($ps_result)>0){
                        while($row = mysqli_fetch_assoc($ps_result)){?>
                        <tr>
                            <td><?php echo $row['id']?></td>
                            <td><?php echo $row['email']?></td>
                            <td><?php echo $row['file_name']?></td>
                            <td><?php echo $row['description']?></td>
                            <td><?php echo $row['file_size']?></td>
                            <td><?php echo $row['created_at']?></td>
                        </tr>
                <?php }} else{ ?>
                        <tr>
                            <td colspan="6">No Prescriptions found</td>
                        </tr>
                <?php }?>
            </tbody>
        </table>
</div>
</body>
</html>