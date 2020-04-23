<?php require 'controller/adminSettingController.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/bms/assets/css/bootstrap.css">
    <title>Admin Settings</title>
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
        <h2>ADMIN / SETTING</h2>
        <form class="form-horizontal" action="" method="POST">
          <div class="form-group">
            <label class="control-label col-sm-5" for="email">Please Enter value in minutes</label>
            <div class="col-sm-10">
              <input type="number" name="setting" id="session" min="1" max="50" required class="form-control">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" name="admin_setting" class="btn btn-default">Submit</button>
            </div>
          </div>
        </form>
        <?php echo isset($message)?$message:''?>
</div>    
</body>
</html>