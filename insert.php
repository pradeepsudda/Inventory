<?php
session_start();
$db = $_SESSION['db'];
$table = $_SESSION['table'];
$sql = "";
$dte = Date('y-m-d');
$_SESSION['dte']=$dte;

$conn = mysqli_connect('localhost:3307',"root","",$db);

if(isset($_POST['submit'])){

    // if(isset($_SESSION['f1'])){
    //     $f1 = $_SESSION['f1'];
    //     $v1 = $_POST[$f1];

    //     $sql = "INSERT INTO `$table` ('$f1') VALUES($v1)";

    // }
    if(isset($_SESSION['f2'])){
        $f2 = $_SESSION['f2'];
        $v2 = $_POST[$f2];

        $sql = "INSERT INTO `$table` (`$f2`) VALUES('$v2')";

    }
    if(isset($_SESSION['f3'])){
        $f3 = $_SESSION['f3'];
        $v3 = $_POST[$f3];
        if($f3=='modified_date'){
            $v3 = Date('y-m-d');
        }

        $sql = "INSERT INTO `$table` (`$f2`,`$f3`) VALUES('$v2','$v3')";

    }
    if(isset($_SESSION['f4'])){
        $f4 = $_SESSION['f4'];
        $v4 = $_POST[$f4];
        if($f4=='modified_date'){
            $v4 = Date('y-m-d');
        }

        $sql = "INSERT INTO `$table` (`$f2`,`$f3`,`$f4`) VALUES('$v2','$v3','$v4')";
        
        echo $sql;

    }
    if(isset($_SESSION['f5'])){
        $f5 = $_SESSION['f5'];
        $v5 = $_POST[$f5];
        if($f5=='modified_date'){
            $v5 = Date('y-m-d');
        }

        $sql = "INSERT INTO `$table` (`$f2`,`$f3`,`$f4`,`$f5`) VALUES('$v2','$v3','$v4','$v5')";

        echo "$sql";

    }
    if(isset($_SESSION['f6'])){
        $f6 = $_SESSION['f6'];
        $v6 = $_POST[$f6];
        if($f6=='modified_date'){
            $v6 = Date('y-m-d');
        }

        $sql = "INSERT INTO `$table` (`$f2`,`$f3`,`$f4`,`$f5`,`$f6`) VALUES('$v2','$v3','$v4','$v5','$v6')";

    }

    $result = $conn->query($sql);

    if($result){
        header("location:view.php");
    }
    else{
        echo "Connection Error";
    }
    



}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form submission</title>
</head>
<body>
    <form method="post" autocomplete="off">
        <h1><?php echo $table ?> FORM SUBMISSION</h1>
        <!-- <?php if(isset($_SESSION['f1'])){
            $f1 = $_SESSION['f1'];
            echo "<label>Enter the $f1 :</label><br>";
            echo "<input type='text' name='$f1'><br><br>";
        }
        ?> -->
         <?php if(isset($_SESSION['f2'])){
            $f2 = $_SESSION['f2'];
            if($f2!='modified_date'){
            echo "<label>Enter the $f2 :</label><br>";
            echo "<input type='text' name='$f2'><br><br>";
            }
        }
        ?>
         <?php if(isset($_SESSION['f3'])){
            $f3 = $_SESSION['f3'];
            if($f3!='modified_date'){
            echo "<label>Enter the $f3 :</label><br>";
            echo "<input type='text' name='$f3'><br><br>";
            }
        }
        ?>
         <?php if(isset($_SESSION['f4'])){
            $f4 = $_SESSION['f4'];
            if($f4!='modified_date'){
                echo "<label>Enter the $f4 :</label><br>";
                echo "<input type='text' name='$f4'><br><br>";
            }
            // echo "<label>Enter the $f4 :</label><br>";
            // echo "<input type='text' name='$f4'><br><br>";
        }
        ?>
         <?php if(isset($_SESSION['f5'])){
            $f5 = $_SESSION['f5'];
            if($f5!='modified_date'){
            echo "<label>Enter the $f5 :</label><br>";
            echo "<input type='text' name='$f5'><br><br>";
            }
        }
        ?>
         <?php if(isset($_SESSION['f6'])){
            $f6 = $_SESSION['f6'];
            if($f6!='modified_date'){
            echo "<label>Enter the $f6 :</label><br>";
            echo "<input type='text' name='$f6'><br><br>";
            }
        }
        ?>

        <input type="submit" name="submit" value="submit">

        
    </form>
    
</body>
</html>