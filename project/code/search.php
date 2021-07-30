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
     <main class="main">
        <nav class="navbar row">
            <ul class="col-md-5 mx-auto">
                <li class="menu-item"><a class="active" href="index.php">Home </a></li>
                <li class="menu-item"><a href="registration.php">Add Donor</a></li>
                <li class="menu-item"><a href="#">Donors</a></li>
             </ul>
         </nav>
        <!-- center div --> 
        <div class="container border p-0">
            <h3 class="text-center">Donor List</h3>
            <hr class="mx-0 px-0">
            <div class="form-group row p-2 mx-0">
            <?php
                if (isset($_SESSION['message'])):  ?>

                <div class="col-12 alert alert-<?php echo $_SESSION['msg_type'] ?>">
                <?php 
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                ?>
                </div>
         <?php endif ?>
                <div class="col-md-4 ml-auto">
                    <form action="search.php" method="GET">
                      <div class="input-group">
                          <input type="text" name="search" value="<?= $_GET['search'] ?? '' ?>" class="form-control" placeholder="Search.." name="Search by name">
                          <div class="input-group-append">
                              <button type="submit" class="btn btn-primary">Search</button>
                          </div>
                      </div>
                    </form>
                </div>
            </div>
              <div class="row p-3">
                <table id="customers">
                    <thead>
                    <tr>
                      <th>#SN</th>
                      <th>Name</th>
                      <th>Blood Group</th>
                      <th>Mobile No.</th>
                      <th>Address</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                        
                        $i = 0;
                        while ($row = $result->fetch_assoc()):?>

                        <tr> 
                          <td><?php echo ++$i; ?></td>
                          <td><?php echo $row['first_name'];echo ' '; echo $row['last_name']; ?></td>
                          <td><?php echo $row['blood_group']; ?></td>
                          <td><?php echo $row['mobile_no']; ?></td>
                          <td><?php echo $row['address']; ?></td>
                          <td>
                              <a href="registration.php?edit=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                              <a href="process.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Remove</a>
                          </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                  </table>
              </div>
        </div>
     </main>
</body>
</html>