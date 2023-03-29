<?php
session_start();

$db = $_SESSION['db'];
$_SESSION['f1']=NULL;
$_SESSION['f2']=NULL;
$_SESSION['f3']=NULL;
$_SESSION['f4']=NULL;
$_SESSION['f5']=NULL;
$_SESSION['f6']=NULL;

$conn = mysqli_connect('localhost:3307',"root","",$db);
$sql = "SHOW TABLES";
$result = $conn->query($sql);

echo "<form method='post' autocomplete='off'>";
if($result){
    $i = 0;
    while($row = mysqli_fetch_array($result)){
        $sam = strtoupper($row[$i]);
        echo "<input type='submit' name='tbl' value='$sam' style='color:red;margin-left:500px;height:30px;width:200px;'>";
        echo "<br><br>";
    }
    echo "<input type='submit' name='addtable' value='++ADD TABLE' style='color:red;margin-left:500px;height:30px;width:200px;'><br><br>";

    echo "</form>";
    echo"<a href='delete_db.php'><button style='margin-left:500px;'>Delete Database</button></a>";
    if(isset($_POST['tbl'])){
        $_SESSION['table'] = $_POST['tbl'];
    
        header('location:next.php');
    }
    if(isset($_POST['addtable'])){
        // $_SESSION['table'] = $_POST['tbl'];
    
        header('location:add_table.php');
    }

    // if(isset($_POST['total'])){
    //     // $_SESSION['table'] = $_POST['tbl'];
    
    //     header('location:next5.php');
    // }
}
else{
    echo "error";
}
    

?>
