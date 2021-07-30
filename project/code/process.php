<?php
 session_start();
$mysqli = new mysqli('localhost', 'root', '', 'bloodbank') or die(mysqli_error($mysqli));

$id = 0;
$first_name = '';
$last_name = '';
$blood_group = '';
$mobile_no = '';
$address = '';
$update = false;


if(isset($_POST['save'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $blood_group = $_POST['blood_group'];
    $mobile_no = $_POST['mobile_no'];
    $district = $_POST['district'];
    $address = $_POST['address'];

    $mysqli->query("INSERT INTO donors (first_name, last_name, blood_group,mobile_no, address) VALUES('$first_name','$last_name','$blood_group','$mobile_no','$address')") or
            die($mysqli->error);

    $_SESSION['message'] = "Donor registration success!";
    $_SESSION['msg_type'] = "success";
    
    header("location: search.php");
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    $mysqli->query("DELETE FROM donors WHERE id=$id") or die($mysqli->error());

    $_SESSION['message'] = "Donor profile deleted!";
    $_SESSION['msg_type'] = "danger";

    header("location: search.php");
}

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $result = $mysqli->query("SELECT * FROM donors WHERE id=$id") or die($mysqli->error());

    $row = $result->fetch_array();
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $blood_group = $row['blood_group'];
    $mobile_no = $row['mobile_no'];
    $address = $row['address'];
    $update = true;
}

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $blood_group = $_POST['blood_group'];
    $mobile_no = $_POST['mobile_no'];
    $address = $_POST['address'];

    $mysqli->query("UPDATE donors SET first_name='$first_name', last_name='$last_name', blood_group='$blood_group', mobile_no='$mobile_no', address='$address' WHERE id=$id") or die($mysqli->error());

    $_SESSION['message'] = 'Donor infotmation updated.';
    $_SESSION['msg_type'] = 'success';
    header("location: search.php");
}

if(isset($_GET['search']) && $_GET['search']!=''){
    $searchVal = $_GET['search'];
    $result = $mysqli->query("SELECT * FROM donors 
    WHERE first_name LIKE '%$searchVal%' 
    OR last_name LIKE '%$searchVal%' 
    OR mobile_no LIKE '%$searchVal%'
    OR blood_group LIKE '%$searchVal%'
    OR address LIKE '%$searchVal%'") or die($mysqli->error);

}else{
    $result = $mysqli->query("SELECT * FROM donors") or die($mysqli->error);
}