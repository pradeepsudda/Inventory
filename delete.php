<?php
session_start();

$db = $_SESSION['db'];
$table = $_SESSION['table'];


$conn = mysqli_connect('localhost:3307',"root","",$db);
$f1 = $_SESSION['f1'];

if(isset($_GET[$f1])){
    $id = $_GET[$f1];

    $sql = "DELETE FROM `$table` WHERE `$f1`='$id'";

    $result = $conn->query($sql);

    header('location:view.php');
}
?>