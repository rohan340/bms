<?php
    require 'controller/loginController.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/bms/assets/css/bootstrap.css">
</head>
<body>
<div class="container">
        <div class="row bg-dark text-white mb-2 text-center">
            <div class="col-md-12"><h3>Login</h3></div>
        </div>
        <form action="" method="post">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary">Login</button>
                <a href="index.php" class="btn btn-success">Registration</a>
            </div>
            <?php echo isset($error)?$error:''?>
        </form>
    </div>
</body>
</html>