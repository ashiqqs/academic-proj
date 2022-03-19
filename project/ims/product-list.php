<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory | Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <style>
    .product-card {
        box-shadow: 0 0 3px 0px #555;
    }

    .product-card:hover {
        box-shadow: 0 0 5px 1px #555;
        cursor: pointer;
    }
    </style>
</head>

<body>
    <?php require_once 'process.php'; ?>
    <main class="main">
        <div class="navbar row mx-0 py-0">
            <div class="col-lg-3 col-md-4 col-sm-12">
                <ul class="row mx-0 py-1">
                    <li class="menu-item col py-2"><a class="active" href="index.php">Home</a></li>
                    <li class="menu-item col py-2"><a href="#.php">Products</a></li>
                    <li class="menu-item col py-2"><a href="stock.php">Stock</a></li>
            </div>
        </div>
        <h3 class="text-center py-2 page-header">Product List</h3>
        <div class="form-group row p-2 mx-0 mb-3">
            <?php
            if (isset($_SESSION['message'])):  ?>

            <div class="col-12 alert alert-<?php echo $_SESSION['msg_type'] ?>">
                <?php 
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            ?>
            </div>
            <?php endif ?>
            <div class="col-md-4 mx-auto">
                <form action="product-list.php" method="GET">
                    <div class="input-group">
                        <input type="text" name="search" value="<?= $_GET['search'] ?? '' ?>" class="form-control"
                            placeholder="Search..">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-secondary rounded-0">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mx-2 px-2">
            <?php
                    
                    $i = 0;
                    while ($row = $result->fetch_assoc()):?>
            <div class="col-md-3 col-lg-2 col-sm-4 col-6 product-card p-0 m-1">
                <div class="card p-0">
                    <div class="card-header row mx-0 py-1 px-2">
                        <div class="col"><b><?php echo $row['name']; ?></b></div>
                        <div class="col text-right"><?php echo $row['code']; ?></div>
                    </div>
                    <div class="card-body p-0">
                        <img src="./assets/images/for-sale.jpg" alt="" height="80%" width="80%">
                    </div>
                    <div class="card-footer">
                        <div class="row mx-0">
                            <div class="col-6">
                                <span>Price</span>
                            </div>
                            <div class="col-6"><b> &#2547; <?php echo $row['sales_price']; ?></b></div>
                        </div>
                    </div>
                </div>

            </div>
            <?php endwhile; ?>
        </div>
    </main>
</body>

</html>