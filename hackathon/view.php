<html>
    <head>
    <link href="view.css" rel="stylesheet">  
</head>

<body>
    <header id="head"></header>
<?php

$name=$_GET['template'];
require 'includes/dbh.inc.php';

$query="SELECT * FROM template WHERE name=?";
$stmt=mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt,"s",$name);
mysqli_stmt_execute($stmt);
$result=mysqli_stmt_get_result($stmt);
$record=mysqli_fetch_array($result);

echo '<input type="text" id="d" value="'.$record[2].'"hidden>'; 
echo '<input type="text" id="i" value="'.$record[3].'"hidden>';
echo '<input type="text" id="url" value="'.$record[4].'"hidden>';
echo '<input type="text" id="url" value="'.$record[5].'" hidden>';

$no=1;
$query1="SELECT * FROM ".$name." WHERE id=?";
$stmt1=mysqli_prepare($conn, $query1);
mysqli_stmt_bind_param($stmt1,"s",$no);
mysqli_stmt_execute($stmt1);
$result1=mysqli_stmt_get_result($stmt1);
while($record1=mysqli_fetch_array($result1)){
    echo'<input type ="text" value="' .$record1[2].'" id="header" hidden>';
        
    echo "<br>";
    echo'<input type ="text" value="' .$record1[3].'" id="footer" hidden >';
        
    echo "<br>";
    for($x = 4; $x < count($record1)/2; $x++) {
        $z=$x-3;
        echo'<input type ="text" value="' .$record1[$x].'" id="'.$z.'"hidden>';
        
        echo "<br>";
    }
    echo'<br><br><br>';
}





?>


<form id="form">
</form>
<footer id="foot"></footer>
<script src="view.js"></script>
</body>
</html>