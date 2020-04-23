<?php
    include('controller/myspaceController.php');
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
    <title>My Space</title>
</head>
<body>
<div class="container bg-light">

        <div class="row bg-dark text-white mb-2 text-center">
            <div class="col-md-6"><h3>Hi <?php echo $_SESSION['full_name']?></h3></div>
            <div class="col-md-6"><h3>Welcome to My Space</h3></div>
        </div>
        <div class="row">
            <div class="col-md-12 text-right mb-4">
                <a href="logout.php" class="btn btn-dark">Logout</a>
            </div>
        </div>

<!-- ------------------------- BLODD SUGAR LISTING--------------------------------------------!-->

        <form action="" method="post" class="mb-4">
            <div class="row">
                    <div class="col-md-10">
                        <input type="text" name="blood_value" min="1" max="5" id="blood" required class="form-control" placeholder="Enter Blood Sugar Level">
                    </div>
                    <div class="col-md-2 text-right">
                        <button type="submit" name="bs_value" class="btn btn-secondary">Save BS Value</button>
                    </div>
            </div>
            <div class="row" style="padding: 11px 0px 0px 19px;">
                <?php echo isset($errorMsg)?$errorMsg:''?>
            </div>
        </form>
        <table class="table table-bordered table-striped" style=" margin-bottom: 6rem;">
            <thead>
                <tr>
                    <th >SL No</th>
                    <th >BS Level</th>
                    <th >Date & Time</th>
                </tr>
            </thead>
            <tbody>
                <?php if(mysqli_num_rows($result)>0){  
                    while($bs_data = mysqli_fetch_assoc($result)){?>
                        <tr>
                            <td><?php echo $bs_data['id']?></td>
                            <td><?php echo $bs_data['bs_level']?></td>
                            <td><?php echo $bs_data['created_at']?></td>
                        </tr>
                <?php }} else{?>
                        <tr class="text-center">
                                <td colspan="3">No Data Found</td>
                        </tr>
                <?php } ?>
            </tbody>
        </table>


<!-- ------------------------- PRESCRIPTION LISTING--------------------------------------------!-->

        <form action="" method="GET" class="mb-4">
            <div class="row">
                    <div class="col-md-4">
                        <input type="text" name="search" id="search" value="<?php echo isset($_GET['search'])?$_GET['search']:''?>"  class="form-control" placeholder="Filter By Filename">
                    </div>
                    <div class="col-md-4">
                        <button type="submit" name="filter_value" class="btn btn-secondary">Filter</button>
                    </div>
                    <div class="col-md-4 text-right">
                        <button type="button" data-toggle="modal" data-target="#prescriptionModal" class="btn btn-secondary">Add Prescription</button>
                    </div>
            </div>
            <div class="row" style="padding: 11px 0px 0px 19px;">
                <?php if(isset($_GET['filter_value'])){
                            if(mysqli_num_rows($search_result) == 0){
                                echo "<p class='text-danger'>No Search Found</p>";
                        }
                }?>
            </div>
        </form>
        <div class="row text-right">
            <div class="col-md-12 text-right"><?php if(isset($prs_message)){echo $prs_message;}?></div>
        </div>
        <table class="table table-bordered table-striped" style=" margin-bottom: 6rem;">
            <thead>
                <tr>
                    <th >SL No</th>
                    <th >File Name</th>
                    <th >Description</th>
                    <th >File Size</th>
                    <th >Date</th>
                </tr>
            </thead>
            <tbody>
                <?php if(mysqli_num_rows($search_result)>0){  
                    while($search_data = mysqli_fetch_assoc($search_result)){?>
                        <tr>
                            <td><?php echo $search_data['id']?></td>
                            <td><?php echo $search_data['file_name']?></td>
                            <td><?php echo $search_data['description']?></td>
                            <td><?php echo $search_data['file_size']?></td>
                            <td><?php echo $search_data['created_at']?></td>
                        </tr>
                <?php }} else{?>
                        <tr class="text-center">
                                <td colspan="5">No Data Found</td>
                        </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="modal fade" id="prescriptionModal" tabindex="-1" role="dialog" aria-labelledby="prescriptionModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="prescriptionModal">ADD / Prescription</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                        
                                <div class="form-group">
                                    <label for="email">File Upload</label>
                                    <input type="file" name="file" id="" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" name="description" required class="form-control" id="" cols="30" rows="5"></textarea>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="prescription" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>