<?php require 'controller/DefaultController.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/bms/assets/css/bootstrap.css">
    <title>Blood Sugar Managment System</title>
</head>
<body>
    <div class="container">
        <div class="row bg-dark text-white mb-2 text-center">
            <div class="col-md-12"><h3>Registration Form</h3></div>
        </div>
        <form action="" method="post">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="full_name">Full Name</label>
                <input type="text" name="full_name" id="full_name" class="form-control" required>
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                <a href="login.php" class="btn btn-success">Login</a>
            </div>
        </form>
        <?php echo isset($error)?$error:''?>
        <?php echo isset($sucess)?$sucess:''?>
    </div>
</body>
</html>