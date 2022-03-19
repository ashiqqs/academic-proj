<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory | Stock</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>

<body>
    <?php require_once 'process.php'; ?>
    <main class="main">
        <div class="navbar row mx-0 py-0">
            <div class="col-lg-3 col-md-4 col-sm-12">
                <ul class="row mx-0 py-1">
                    <li class="menu-item col py-2"><a class="active" href="index.php">Home</a></li>
                    <li class="menu-item col py-2"><a href="product-list.php">Products</a></li>
                    <li class="menu-item col py-2"><a href="#.php">Stock</a></li>
            </div>
        </div>
        </div>
        <!-- center div -->
        <div class="p-0">
            <h3 class="text-center py-2 page-header">Manage Product</h3>
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
                    <form action="stock.php" method="GET">
                        <div class="input-group">
                            <input type="text" name="search" value="<?= $_GET['search'] ?? '' ?>" class="form-control"
                                placeholder="Search..">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-secondary rounded-0">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-8">
                    <div class="float-right">
                        <a class="btn btn-success" href="product-entry.php">Add New</a>
                    </div>
                </div>
            </div>
            <div class="row mx-0 p-3">
                <table class="table table-bordered table-striped table-hover bg-white">
                    <thead>
                        <tr class="bg-secondary text-white">
                            <th>SL No.</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th class="text-right">Purchase Price</th>
                            <th class="text-right">Sales_Price</th>
                            <th class="text-right">Quantity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        
                        $i = 0;
                        while ($row = $result->fetch_assoc()):?>

                        <tr>
                            <td><?php echo ++$i; ?></td>
                            <td><?php echo $row['code'];?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td class="text-right"><?php echo $row['purchase_price']; ?></td>
                            <td class="text-right"><?php echo $row['sales_price']; ?></td>
                            <td class="text-right"><?php echo $row['stock_qty']; ?></td>
                            <td>
                                <a href="product-entry.php?edit=<?php echo $row['id']; ?>"
                                    class="btn btn-primary">Edit</a>
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