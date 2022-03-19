<?php
 session_start();
$mysqli = new mysqli('localhost', 'root', '', 'inventory') or die(mysqli_error($mysqli));

$id = 0;
$name = '';
$code = '';
$purchase_price = '';
$sales_price = '';
$stockQty = '';
$update = false;


if(isset($_POST['save'])){
    $name = $_POST['name'];
    $code = $_POST['code'];
    $purchase_price = $_POST['purchase_price'];
    $sales_price = $_POST['sales_price'];
    $stock_qty = $_POST['stock_qty'];

    $mysqli->query("INSERT INTO products (name, code, purchase_price, sales_price, stock_qty) VALUES('$name','$code','$purchase_price','$sales_price','$stock_qty')") or
            die($mysqli->error);

    $_SESSION['message'] = "Product added success!";
    $_SESSION['msg_type'] = "success";
    
    header("location: stock.php");
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    $mysqli->query("DELETE FROM products WHERE id=$id") or die($mysqli->error());

    $_SESSION['message'] = "Product deleted!";
    $_SESSION['msg_type'] = "danger";

    header("location: stock.php");
}

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $result = $mysqli->query("SELECT * FROM products WHERE id=$id") or die($mysqli->error());

    $row = $result->fetch_array();
    $name = $row['name'];
    $code = $row['code'];
    $purchase_price = $row['purchase_price'];
    $sales_price = $row['sales_price'];
    $stock_qty = $row['stock_qty'];
    $update = true;
}

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $code = $_POST['code'];
    $purchase_price = $_POST['purchase_price'];
    $sales_price = $_POST['sales_price'];
    $stock_qty = $_POST['stock_qty'];

    $mysqli->query("UPDATE products SET name='$name', code='$code', purchase_price='$purchase_price', sales_price='$sales_price', stock_qty='$stock_qty' WHERE id=$id") or die($mysqli->error());

    $_SESSION['message'] = 'Product updated.';
    $_SESSION['msg_type'] = 'success';
    header("location: stock.php");
}

if(isset($_GET['search']) && $_GET['search']!=''){
    $searchVal = $_GET['search'];
    $result = $mysqli->query("SELECT * FROM products 
    WHERE name LIKE '%$searchVal%' 
    OR code LIKE '%$searchVal%'") or die($mysqli->error);

}else{
    $result = $mysqli->query("SELECT * FROM products") or die($mysqli->error);
}