<?php

session_start();
$db = $_SESSION['db'];
$ct = 0;

$_SESSION['f1']=NULL;
$_SESSION['f2']=NULL;
$_SESSION['f3']=NULL;
$_SESSION['f4']=NULL;
$_SESSION['f5']=NULL;
$_SESSION['f6']=NULL;


$conn = mysqli_connect('localhost:3307',"root","",$db);
$sql = "";

if($conn){
    if(isset($_POST['smt'])){
        $table =  $_POST['table'];
        $_SESSION['table']=$table;
        if($_POST['f1'] && isset($_POST['o1'])){
            $f1 = $_POST['f1'];
            $o1 = $_POST['o1'];
            $_SESSION['f1']=$f1;
            $_SESSION['o1']=$o1;
            $ct++;
           

           $sql = "CREATE TABLE `$table`(`$f1` $o1);";

            echo "$sql";
        }
        if($_POST['f2'] && isset($_POST['o2'])){
            $f2 = $_POST['f2'];
            $o2 = $_POST['o2'];
            $_SESSION['f2']=$f2;
            $_SESSION['o2']=$o2;

            $ct++;


            $sql = "CREATE TABLE `$table`(`$f1` $o1,`$f2` $o2,PRIMARY KEY($f1));";

            echo "$sql";
        }
        if($_POST['f3'] && isset($_POST['o3'])){
            $f3 = $_POST['f3'];
            $o3 = $_POST['o3'];

            $_SESSION['f3']=$f3;
            $_SESSION['o3']=$o3;
            $ct++;

            $sql = "CREATE TABLE `$table`(`$f1` $o1,`$f2` $o2,`$f3` $o3,PRIMARY KEY($f1));";

            echo "$sql";

        }
        if($_POST['f4'] && isset($_POST['o4'])){
            $f4 = $_POST['f4'];
            $o4 = $_POST['o4'];

            $_SESSION['f4']=$f4;
            $_SESSION['o4']=$o4;
            $ct++;

            $sql = "CREATE TABLE `$table`(`$f1` $o1,`$f2` $o2,`$f3` $o3,`$f4` $o4,PRIMARY KEY($f1));";
            echo "$sql";
        }
        if($_POST['f5'] && isset($_POST['o5'])){
            $f5 = $_POST['f5'];
            $o5 = $_POST['o5'];

            $_SESSION['f5']=$f5;
            $_SESSION['o5']=$o5;
            $ct++;

            $sql = "CREATE TABLE `$table`(`$f1` $o1,`$f2` $o2,`$f3` $o3,`$f4` $o4,`$f5` $o5,PRIMARY KEY($f1));";
            echo "$sql";
        }
        
        if($_POST['f6'] && isset($_POST['o6'])){
            $f6 = $_POST['f6'];
            $o6 = $_POST['o6'];

            $_SESSION['f6']=$f6;
            $_SESSION['o6']=$o6;
            $ct++;

            $sql = "CREATE TABLE `$table`(`$f1` $o1,`$f2` $o2,`$f3` $o3,`$f4` $o4,`$f5` $o5,`$f6` $o6,PRIMARY KEY($f1));";
            echo "$sql";
        }

        $_SESSION['count']=$ct;
       
        // $sql = "CREATE TABLE `$table`(`name` varchar(10),`age` int(10),`sex` varchar(5),`branch` varchar(10));";
        // $sql = "CREATE TABLE `$table`(`$f1` $o1(100));";
        $result = $conn->query($sql);
        if($result){
            header('location:tables.php');
        }
        else{
            echo " error in the query";
        }
        
        
    }
   
}
else{
    echo "error in connection!!!";
}





?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
    <h1>CREATE TABLE</h1>
    <p style="color:red;font-size:15px;">* THEIR SHOULD BE A QUANTITY FIELD FOR KNOWING THE TOTAL NO.OF ITEMS</P>
    <hr><hr>
    <form method="post" autocomplete="off">
        <label><h3>Enter the Table Name:</h3></label><br>
        <input type="text" name="table" placeholder="Enter the Table name you want to create:"><br><br>
        <input type="text" name="f1" placeholder="Enter Name of the field:">
        <select name="o1">
            <option value="int NOT NULL AUTO_INCREMENT">AUTO_INCREMENT</option>
            <option value="varchar(100)">String</option>
            <option value="int(100)">Number</option>
            <option value="text">text</option>
            <option value="date">Date</option>
        </select><br><br>
        <input type="text" name="f2" placeholder="Enter Name of the field:">
        <select name="o2">
        <!-- <option value="int NOT NULL AUTO_INCREMENT">AUTO_INCREMENT</option> -->
            <option value="varchar(100)">String</option>
            <option value="int(20)">Number</option>
            <option value="text">text</option>
            <option value="date">Date</option>
        </select><br><br>
        <input type="text" name="f3" placeholder="Enter Name of the field:">
        <select name="o3">
        <!-- <option value="int NOT NULL AUTO_INCREMENT">AUTO_INCREMENT</option> -->
            <option value="varchar(100)">String</option>
            <option value="int(20)">Number</option>
            <option value="text">text</option>
            <option value="date">Date</option>
        </select><br><br>
        <input type="text" name="f4" placeholder="Enter Name of the field:">
        <select name="o4">
        <!-- <option value="int NOT NULL AUTO_INCREMENT">AUTO_INCREMENT</option> -->
            <option value="varchar(100)">String</option>
            <option value="int(20)">Number</option>
            <option value="text">text</option>
            <option value="date">Date</option>
        </select><br><br>
        <input type="text" name="f5" placeholder="Enter Name of the field:">
        <select name="o5">
        <!-- <option value="int NOT NULL AUTO_INCREMENT">AUTO_INCREMENT</option> -->
            <option value="varchar(100)">String</option>
            <option value="int(20)">Number</option>
            <option value="text">text</option>
            <option value="date">Date</option>
        </select><br><br>
        <input type="text" name="f6" placeholder="Enter Name of the field:">
        <select name="o6">
        <!-- <option value="int NOT NULL AUTO_INCREMENT">AUTO_INCREMENT</option> -->
            <option value="varchar(100)">String</option>
            <option value="int(20)">Number</option>
            <option value="text">text</option>
            <option value="date">Date</option>
        </select><br><br>
        
        <input type="submit" value="create" name="smt">

    </form>
    <hr><hr>
    </center>
    
</body>
</html>