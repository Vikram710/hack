<?php
session_start();
?>

<html>
    <head>
        <title>php</title>
        <link href="dashboard.css" rel="stylesheet">
        <script src="index.js"></script>
        <script src="note.js"></script>

        <style>
            input[type=text]{
                border:1px solid black;
            }
        </style>
    </head>
    <body  ><?php
    echo'<input id="user" value="'.$_SESSION['username'].'"hidden>';
    if(isset($_POST['submit'])){
        $tem=$_POST['template'];
        header("Location:edit.php?template=".$tem."");
        exit();
       
    }
    if(isset($_POST['subview'])){
        $tem=$_POST['view'];
        header("Location:view.php?template=".$tem."");
        exit();
       
    }
    ?>
        <nav id="nav">
            <div class="logo">CMS</div>
            
            
            
            <div class="profile" id="profile" onclick="openNav()"> 
                <img src="photo/profilestd.jpg" class="p">
            <br>
            
            <div class="drop" id="drop">    
            <form action="includes/logout.inc.php" method="post">
            <button type="submit" name="logout" class="logout" >Log out</button>
            </form>
            </div>

        </div>

        </nav><br><br><br><br><br>

        <form action="dashboard.php" method="POST">
            <input type ="text" name="template" placeholder="create">
            <input type="submit" name="submit" >
        </form>
        <form action="dashboard.php" method="POST">
            <input type ="text" name="view" placeholder="view">
            <input type="submit" name="subview">
        </form>
</body>
</html>