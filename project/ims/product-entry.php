<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory | Product Add</title>
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
                    <li class="menu-item col py-2"><a href="stock.php">Stock</a></li>
            </div>
        </div>
        </div>
        <div class="row p-0 mx-0">
            <h3 class="text-center py-2 page-header">Add new product</h3>
            <div class="col-lg-3 col-md-4 col-8 mx-auto product-entry">
                <form action="process.php" method="POST" id="register" class="p-3">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="form-group row mb-2">
                        <div class="col">
                            <label>Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" value="<?php echo $name; ?>" class="form-control"
                                placeholder="Enter product name">
                        </div>

                    </div>
                    <div class="form-group row mb-2">
                        <div class="col-md-8">
                            <label>Code <span class="text-danger">*</span></label>
                            <input type="text" name="code" value="<?php echo $code; ?>" class="form-control"
                                placeholder="Enter product code">
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <div class="col">
                            <label>Purchase Price</label>
                            <input type="number" name="purchase_price" value="<?php echo $purchase_price; ?>"
                                class="form-control" placeholder="Purchase Price">
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <div class="col">
                            <label>Sales Price <span class="text-danger">*</span></label>
                            <input type="number" name="sales_price" value="<?php echo $sales_price; ?>"
                                class="form-control" placeholder="Sales Price">
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <div class="col">
                            <label>Stock Qty</label>
                            <input type="number" name="stock_qty" value="<?php echo $stock_qty; ?>" class="form-control"
                                placeholder="Stock Quantity">
                        </div>
                    </div>
                    <div class="row mx-0">
                        <div class="p-0">
                            <a href="stock.php" class="btn btn-secondary col-5 float-left ms-1">Cancel</a>
                            <?php if($update==true): ?>
                            <button type="submit" name="update" class="btn btn-success col-5 float-right">Update</button>
                            <?php else: ?>
                            <button type="submit" name="save" class="btn btn-success col-5 float-right">Save</button>
                            <?php endif ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>