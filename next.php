<?php

session_start();

$db = $_SESSION['db'];
$table = $_SESSION['table'];

$conn = mysqli_connect("localhost:3307","root","",$db);

$sql = "SHOW COLUMNS FROM `$table`";
$result = $conn->query($sql);

if($result){
    $i=1;
    // $fields = mysqli_fetch_array($result);
    $fields;
    while($fields = mysqli_fetch_array($result)){
        print_r($fields[0]);
        $_SESSION["f".$i]=$fields[0];
        echo "<br>"; 
        $i++;   
    }

    header('location:view.php');
   
}



?>