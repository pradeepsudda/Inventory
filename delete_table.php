<?php

session_start();
$db = $_SESSION['db'];
$table = $_SESSION['table'];

$conn = mysqli_connect('localhost:3307',"root","",$db);

$sql = "DROP table `$table`";

$result = $conn->query($sql);
if(!$result){
    echo $sql.conn->error;
}
else{
    setcookie($table,"reset");
   header('location:tables.php');
}

?>