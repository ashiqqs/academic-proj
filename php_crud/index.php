<!DOCTYPE html>
<header>
    <title>Blood Bank Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link type="text/css" rel="stylesheet" href="style.css">
</header>


<body>
    
<div class="row mx-0 bg-primary py-2">
    <div class="col-7 mx-auto">
        <ul>
            <li class="menu-item m-1">Home</li>
            <li class="menu-item m-1">Add Donor</li>
            <li class="menu-item m-1">Search Donor</li>
            <li class="menu-item m-1">About Us</li>
        </ul>
    </div>
</div>
<div class="row mx-0 p-2">
    <?php require_once 'process.php'; ?>
    <?php
        if (isset($_SESSION['message'])):  ?>

        <div class="col-12 alert alert-<?php=$_SESSION['msg-type']?>">
         <?php 
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            
         ?>
        </div>
        <?php endif ?>
    <div class="col-md-6 mx-auto">
        <form action="process.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="form-group row my-1">
            <label for="" class="col-md-3">Name</label>
            <div class="col-md-6">
                <input type="text" name="name" value="<?php echo $name; ?>" class="form-control" placeholder="Enter your name">
            </div>
        </div>
        <div class="form-group row my-1">
            <label for="" class="col-md-3">Address</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="address" value="<?php echo $address; ?>"  id="exampleFormControlTextarea1" rows="3" placeholder="Enter your address"/>
            </div>
        </div>
        <div class="form-group row my-3">
            <div class="col-md-6 mx-auto">
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
<div class="row mx-3 p-3">
    <table class="table table-bordered table-hover table-striped">
        <thead class="bg-secondary text-white">
            <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
             $mysqli = new mysqli('localhost', 'root', '', 'blood_bank') or die(mysqli_error($mysqli));
             $result = $mysqli->query("SELECT * FROM donor") or die($mysqli->error);
                while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td>
                    <a href="index.php?edit=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                    <a href="process.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Remove</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>