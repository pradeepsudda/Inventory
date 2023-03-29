<?php
session_start();
$db = $_SESSION['db'];
$table = $_SESSION['table'];
$conn = mysqli_connect('localhost:3307',"root","",$db);
$sql = "";
if(isset($_POST['update'])){
    if(isset($_SESSION['f1'])){
        $f1 = $_SESSION['f1'];
        $fld1 = $_POST[$f1];

        $sql = "UPDATE `$table` SET `$f1`='$fld1' WHERE `$f1`='$fld1'";
    }
    if(isset($_SESSION['f2'])){
        $f2 = $_SESSION['f2'];
        $fld2 = $_POST[$f2];

        $sql = "UPDATE `$table` SET `$f2`='$fld2' WHERE `$f1`='$fld1'";
    }
    if(isset($_SESSION['f3'])){
        $f3 = $_SESSION['f3'];
        $fld3 = $_POST[$f3];

        $sql = "UPDATE `$table` SET `$f2`='$fld2',`$f3`='$fld3' WHERE `$f1`='$fld1'";
    }
    if(isset($_SESSION['f4'])){
        $f4 = $_SESSION['f4'];
        $fld4 = $_POST[$f4];

        $sql = "UPDATE `$table` SET `$f2`='$fld2',`$f3`='$fld3',`$f4`='$fld4' WHERE `$f1`='$fld1'";
    }
    if(isset($_SESSION['f5'])){
        $f5 = $_SESSION['f5'];
        $fld5 = $_POST[$f5];

        $sql = "UPDATE `$table` SET `$f2`='$fld2',`$f3`='$fld3',`$f4`='$fld4',`$f5`='$fld5' WHERE `$f1`='$fld1'";
    }
    if(isset($_SESSION['f6'])){
        $f6 = $_SESSION['f6'];
        $fld6 = $_POST[$f6];


        
        $sql = "UPDATE `$table` SET `$f2`='$fld2',`$f3`='$fld3',`$f4`='$fld4',`$f5`='$fld5',`$f6`='$fld6' WHERE `$f1`='$fld1'";


    }
   $result = $conn->query($sql);
if(!$result){
    echo $sql.conn->error;
}
// $date = $_SESSION['date'];
// if(isset($date)){
//     $_SESSION['date'] = $date;

// }
// else{
//     $_SESSION['date']=Date('y-m-d');
// }
// setcookie('date',Date(''))

setcookie($table,"set");
setcookie("date", Date('y-m-d'), time() + (10 * 365 * 24 * 60 * 60) , "/");

header('location:view.php');
}
$f1 = $_SESSION['f1'];





if(isset($_GET[$f1])){
    $id = $_GET[$f1];
    $sql = "SELECT * FROM `$table` WHERE `$f1`='$id'";
    $result = $conn->query($sql);
    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            if(isset($_SESSION['f1'])){
                $f1 = $_SESSION['f1'];
                $fd1=$row[$f1];

            }
            if(isset($_SESSION['f2'])){
                $f2 = $_SESSION['f2'];
                $fd2=$row[$f2];

            }
            if(isset($_SESSION['f3'])){
                $f3 = $_SESSION['f3'];
                $fd3=$row[$f3];

            }
            if(isset($_SESSION['f4'])){
                $f4 = $_SESSION['f4'];
                $fd4=$row[$f4];

            }
            if(isset($_SESSION['f5'])){
                $f5 = $_SESSION['f5'];
                $fd5=$row[$f5];

            }  if(isset($_SESSION['f6'])){
                $f6 = $_SESSION['f6'];
                $fd6=$row[$f6];

            }
        }
    ?>
     <h2><?php echo $table ?> FORM UPDATE</h2>
     <form method="post" autocomplete="off">
        <?php if(isset($_SESSION['f1'])){
            $f1 = $_SESSION['f1'];
            echo "<label>Enter the $f1 :</label><br>";
            echo "<input type='text' name='$f1' value='$fd1'><br><br>";
        }
        ?> 
         <?php if(isset($_SESSION['f2'])){
            $f2 = $_SESSION['f2'];
            echo "<label>Enter the $f2 :</label><br>";
            echo "<input type='text' name='$f2' value='$fd2'><br><br>";
        }
        ?>
         <?php if(isset($_SESSION['f3'])){
            $f3 = $_SESSION['f3'];
            echo "<label>Enter the $f3 :</label><br>";
            echo "<input type='text' name='$f3' value='$fd3'><br><br>";
        }
        ?>
         <?php if(isset($_SESSION['f4'])){
            $f4 = $_SESSION['f4'];
            echo "<label>Enter the $f4 :</label><br>";
            echo "<input type='text' name='$f4' value='$fd4'><br><br>";
        }
        ?>
         <?php if(isset($_SESSION['f5'])){
            $f5 = $_SESSION['f5'];
            echo "<label>Enter the $f5 :</label><br>";
            echo "<input type='text' name='$f5' value='$fd5'><br><br>";
        }
        ?>
         <?php if(isset($_SESSION['f6'])){
            $f6 = $_SESSION['f6'];
            echo "<label>Enter the $f6 :</label><br>";
            echo "<input type='text' name='$f6' value='$fd6'><br><br>";
        }
        ?>

        <input type="submit" name="update" value="update">

        
    </form>
<?php
    }

}
?>

    

</body>

</html>