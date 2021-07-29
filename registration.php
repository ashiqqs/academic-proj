<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>blood bank| home</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <?php require_once 'process.php'; ?>
     <div class="background" href=> </div>
     <main class="main">
         <nav class="navbar row">
             <ul class="col-md-5 mx-auto">
                <li class="menu-item"><a class="active" href="index.php">Home</a></li>
                <li class="menu-item"><a  href="#">Add Donor</a></li>
                <li class="menu-item"><a  href="search.php">Donors</a></li>
             </ul>
         </nav>
        <!-- center div -->
        <!-- kader vai start -->
        </div class="row p-0"> 
            <div class="col-md-6 mx-auto border">
                <h3 class="text-center">Add new donor</h3>
                <hr>
                <form action="process.php" method="POST" id="register" class="p-3">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>First Name</label>
                            <input type="text" name="first_name" value="<?php echo $first_name; ?>" class="form-control" placeholder="Enter your first name">
                        </div>
                        <div class="col-md-6">
                            <label>Last Name</label>
                            <input type="text" name="last_name" value="<?php echo $last_name; ?>" class="form-control" placeholder="Enter your last name">
                        </div>
                    </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label>Blood group</label>
                        <input type="text" name="blood_group" value="<?php echo $blood_group; ?>" class="form-control" placeholder="Enter your blood group">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label>Mobile No.</label>
                        <input type="text" name="mobile_no" value="<?php echo $mobile_no; ?>" class="form-control" placeholder="Enter your mobile no">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label>Address</label>
                        <input type="text" name="address" value="<?php echo $address; ?>" class="form-control" placeholder="Enter your mobile no">
                    </div>
                </div>
                <div class="row">
                    <div class="m-3">
                       <?php if($update==true): ?>
                        <button type="submit" name="update" class="btn btn-info">Update</button>
                        <?php else: ?>
                        <button type="submit" name="save" class="btn btn-primary">Save</button>
                        <?php endif ?>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <!-- kader vai end -->
     </main>
</body>
</html>