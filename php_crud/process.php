<?php
// session_start();
$mysqli = new mysqli('localhost', 'root', '', 'testDb') or die(mysqli_error($mysqli));

$id = 0;
$name = '';
$address = '';
$update = false;
if(isset($_POST['save'])){
    $name = $_POST['name'];
    $address = $_POST['address'];

    $mysqli->query("INSERT INTO donors (name, address) VALUES('$name', '$address')") or
            die($mysqli->error);

    $_SESSION['message'] = "Donor registration success!";
    $_SESSION['msg_type'] = "success";
    
    header("location: index.php");
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    $mysqli->query("DELETE FROM donor WHERE id=$id") or die($mysqli->error());

    $_SESSION['message'] = "Donor profile deleted!";
    $_SESSION['msg_type'] = "danger";

    header("location: index.php");
}

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $result = $mysqli->query("SELECT * FROM donor WHERE id=$id") or die($mysqli->error());

    if (count($result)==1){
        $row = $result->fetch_array();
        $name = $row['name'];
        $address = $row['address'];
        $update = true;
    }
}

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];

    $mysqli->query("UPDATE donor SET name='$name', address='$address' WHERE id=$id") or die($mysqli->error());

    $_SESSION['message'] = 'Donor infotmation updated.';
    $_SESSION['msg_type'] = 'warning';
    header("location: index.php");
}
