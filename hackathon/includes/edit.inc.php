<?php
 if(isset($_POST['submit'])){
     $numdiv=(int)$_POST['numdiv'];
     $numinput=(int)$_POST['numinput'];
     $css=$_POST['css'];
     $name=$_POST['get'];
     $js=$_POST['js'];
     echo $numdiv.$numinput.$name;
     require 'dbh.inc.php';


     $query="INSERT INTO template(name,numdiv,numinput,css,js) VALUES(?,?,?,?,?)";
     $stmt=mysqli_prepare($conn,$query);
     mysqli_stmt_bind_param($stmt,"sddss",$name,$numdiv,$numinput,$css,$js);
     mysqli_stmt_execute($stmt);
    $msg;
    for($x=0;$x<$numdiv;$x++){
        $y=$x+1;
        $msg[$x]=$_POST['divmsg'.$y];
        
    }


        
    $header=$_POST['header'];
    $footer=$_POST['footer'];


    $sql1 = "CREATE TABLE ".$name." (id INT(11) AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(30) NOT NULL,
    header VARCHAR(30) ,
    footer VARCHAR(30)) ";
    mysqli_query($conn, $sql1);

    $query="INSERT INTO ".$name."(title,header,footer) VALUES(?,?,?) ";
    $stmt=mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt,"sss",$name,$header,$footer);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    for($x = 0; $x < count($msg); $x++) {
        $n=strval($x+1);
        $sqli="ALTER TABLE ".$name." ADD q".$n." VARCHAR(80) NOT NULL";
        if(mysqli_query($conn,$sqli)){
            echo"column created <br>";
        }
        $query2="UPDATE ".$name." SET q".$n." ='$msg[$x]' WHERE id=1";
        if(mysqli_query($conn, $query2)){
            echo"details inserted <br>";
        }
        echo$msg[$x];
        echo "<br>";
    }

 }