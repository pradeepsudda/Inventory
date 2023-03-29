<?php
$conn = mysqli_connect('localhost:3307',"root","");

$sql = "SHOW DATABASES";

$result = $conn->query($sql);
if($result){
    $i = 0;
    echo "<form method='post' autocomplete='off'>";
    while($row = mysqli_fetch_array($result)){
        if($row[$i]=='information_schema' || $row[$i]=='mysql' || $row[$i]=='performance_schema' ||  $row[$i]=='phpmyadmin'){
            echo "";
        }
        else{
            $samp = strtoupper($row[$i]);
            echo "<input type='submit' name='db' value='$samp' style='color:red;margin-left:500px;height:30px;width:200px;'>";
            echo "<br><br>";

            // value='strtoupper($row[$i])'
        }
    }
    echo "<input type='submit' name='adddb' value='ADD CATEGORIES ++' style='color:red;margin-left:500px;height:30px;width:200px;'>";
    echo "</form>";

    // session_start();
    // session_reset();
    // session_destroy();
    session_start();

// session_start();

if(isset($_POST['db'])){
    $_SESSION['db'] = $_POST['db'];

    header('location:tables.php');
}

if(isset($_POST['adddb'])){
    // $_SESSION['db'] = $_POST['db'];
    header('location:add_db.php');
}


 
}
else{

    echo "error";
      
}

?>