 <?php

$conn = mysqli_connect('localhost:3307',"root","");
session_start();
session_reset();
session_destroy();
session_start();
$error="";
if($conn){
    if(isset($_POST['submit'])){
        $db =  $_POST['db'];
        $sql = "CREATE DATABASE $db";
        // $result = $conn->query($sql);
        if($conn->query($sql)){
            $_SESSION['db']=$db;
            header('location:index.php');
         }
        else{
            header('location:add_db.php');
            $error = "Database Already Exists, so please Try with Other Name";
            echo "error";

        }
        
    }
   
}
else{
   $error = "Database Already Exists, so please Try with Other Name";
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
        <?php
        if($error!=""){
            echo "<h1>$error</h1>";
        } 
        ?>
    <h1>CREATE DATABASE</h1>
    <hr><hr>
    <form method="post" autocomplete="off">
        <label><h3>Enter the DataBase Name:</h3></label><br>
        <input type="text" name="db" placeholder="Enter the database name you want to create:"><br><br>
        <input type="submit" value="create" name="submit">

    </form>
    <hr><hr>
    </center>
    
</body>
</html>