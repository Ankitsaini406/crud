<?php
session_start();

$name = "";
$address = "";
$id = 0;
$edit_state = false;

$conn = mysqli_connect('localhost', 'root', '9832', 'crud');

if (isset($_POST['save']))
{
    $name = $_POST['name'];
    $address = $_POST['address'];

    $query = "INSERT INTO info (name, address) VALUES ('$name', '$address')";
    mysqli_query($conn, $query);
    $_SESSION['msg'] = "Address save";
    header('location: index.php');
}

if (isset($_POST['update'])) {
    
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $id = mysqli_real_escape_string($conn, $_POST['id']);

    mysqli_query($conn, "update info set name = '$name', address = '$address' where id = $id");
    $_SESSION['masg'] = "Address update";
    header('location: index.php');
}

if (isset($_GET['del'])){
    $id = $_GET['del'];
    mysqli_query($conn, "delete from info where id = $id");
    $_SESSION['msg'] = "Address delete";
    header('location: index.php');
}

$result = mysqli_query($conn, "select * from info");



?>