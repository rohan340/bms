<?php require 'controller/addAdminController.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/bms/assets/css/bootstrap.css">
    <title>Add Admin</title>
</head>
<body>
<div class="container">
    <div class="row bg-dark text-white text-center mb-2">
            <div class="col-md-12"><h3>Welcome to Admin Dashboard</h3></div>
        </div>
        <div class="row">
            <div class="col-md-10 text-right">
                <a href="admin.php" class="btn btn-secondary">Back</a>
            </div>
            <div class="col-md-2 text-right mb-2">
                <a href="logout.php" class="btn btn-dark">Logout</a>
            </div>
        </div>
  <h2>ADD / ADMIN</h2>
  <?php echo isset($message)?$message:''?>
  <form action="" method="POST">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" required id="email" placeholder="Enter email" name="email">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-10">          
        <input type="password" class="form-control" required id="pwd" placeholder="Enter password" name="password">
      </div>
    </div>
    <div class="form-group">        
        <label class="control-label col-sm-2" for="full_name">Full Name:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="pwd" required placeholder="Enter Full Name" name="full_name">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="add_admin" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </form>
</div>
</body>
</html>