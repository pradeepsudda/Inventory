<?php

session_start();
$db = $_SESSION['db'];
$table = $_SESSION['table'];

$conn = mysqli_connect('localhost:3307',"root","",$db);

$sql1 = "SELECT COUNT(*) FROM `$table`";
$sql2 = "SELECT SUM(`quantity`) FROM `$table`";

$result1 = $conn->query($sql1);
$result2 =  $conn->query($sql2);
echo "TABLE NAME IS:<h4>$table</h4>";
if(!$result1){
    echo "error in query1";
}
else{
    $row = mysqli_fetch_array($result1);
    if($row[0]>=1){
        echo "TOTAL NO OF ROOMS:<h4>$row[0]</h4><br>";
    }
}
if(!$result2){
    echo "error in query 2";

}
else{
    $row1 = mysqli_fetch_array($result2);
    if($row1[0]>=1){
    echo "TOTAL NO OF ITEMS:<h4>$row1[0]</h4><br>";
    }

}

if($row1[0]>0 && $row[0]>0){
    $val = $row1[0]/$row[0];
    $val = floor($val);
    echo "AVERAGE NO OF ITEMS IN EACH ROOM:<h4>$val</h4><br>";
     

}
if(isset($_COOKIE[$table])){

    if(isset($_COOKIE['date']) && $_COOKIE[$table]=="set"){
        $date = $_COOKIE['date'];
        echo "LAST DATE OF MODIFICATION:<h4>$date</h4><br>";
       
    
    }

}






?>