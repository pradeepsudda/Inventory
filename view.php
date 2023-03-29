<?php
session_start();
$db = $_SESSION['db'];
$table = $_SESSION['table'];
$ct=1;


$f1 = $_SESSION['f1'];
$conn = mysqli_connect('localhost:3307',"root","","$db");

$sql = "SELECT * from `$table`";

$result = $conn->query($sql);

if(!$result){
    echo "connection error";
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
    <a href="insert.php"><button>INSERT DATA</button></a>
    <a href="total_data.php"><button>Total DATA</button></a>
    <a href="delete_table.php"><button>DELETE TABLE</button></a>

    <table border="2" style="width:100%;margin-top:10px;">
    <thead>
        <tr>
        <?php if(isset($_SESSION['f1']))echo "<th>".$_SESSION['f1']."</th>"?>
        <?php if(isset($_SESSION['f2']))echo "<th>".$_SESSION['f2']."</th>"?>
        <?php if(isset($_SESSION['f3']))echo "<th>".$_SESSION['f3']."</th>"?>
        <?php if(isset($_SESSION['f4']))echo "<th>".$_SESSION['f4']."</th>"?>
        <?php if(isset($_SESSION['f5']))echo "<th>".$_SESSION['f5']."</th>"?>
        <?php if(isset($_SESSION['f6'])){
            echo "<th>".$_SESSION['f6']."</th>";
        }
        ?> 
        <th>EDIT/DELETE</th>
            

        </tr>
    </thead>
        <tbody>
            <?php 
            if($result->num_rows>0){
            while($row = mysqli_fetch_assoc($result)){
                ?>
            
             
             <tr>

              <?php if(isset($_SESSION['f1']))echo "<td>".$row[$_SESSION['f1']]."</td>"?>
              <?php if(isset($_SESSION['f2']))echo "<td>".$row[$_SESSION['f2']]."</td>"?>
              <?php if(isset($_SESSION['f3']))echo "<td>".$row[$_SESSION['f3']]."</td>"?>
              <?php if(isset($_SESSION['f4']))echo "<td>".$row[$_SESSION['f4']]."</td>"?>
              <?php if(isset($_SESSION['f5']))echo "<td>".$row[$_SESSION['f5']]."</td>"?>
              <?php if(isset($_SESSION['f6']))echo "<td>".$row[$_SESSION['f6']]."</td>"?>
              <td><a href="update.php?<?php echo $_SESSION['f1']?>=<?php echo $row[$f1];?>">EDIT</a>
            <a href="delete.php?<?php echo $_SESSION['f1']?>=<?php echo $row[$f1];?>">DELETE</a></td>
              
            </tr>
             
       <?php }} ?>
           

        </tbody>
    </table>
    
</body>
</html>