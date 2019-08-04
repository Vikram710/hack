<?php
session_start();
?>

<html>
    <head>
        <title>php</title>
        <link href="dashboard.css" rel="stylesheet">
        <script src="index.js"></script>
        <script src="note.js"></script>
    </head>
    <body  ><?php
    $name=$_GET['template'];
    echo'<input id="user" value="'.$_SESSION['username'].'"hidden>';
    ?>
        <nav id="nav">
            <div class="logo">CMS</div>

            <div class="home"><a href="dashboard.php">Home</a></div>
            
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
 
        <div class="side">
        <button id="bold" onclick="bold1()">Bold</button>
        <button id="italics" onclick="italics1()">Italics</button>
        <button id="underline" onclick="underline1()">Underline</button>
        <button onclick="adddiv()">Add div</button>
        <form>
            <select name="element" class="sec">
                <option value="text">Textbox</option>
                <option value="number">Numberbox</option>
            </select>
            <input type="button" value="Add" onclick="addinput(document.forms[1].element.value)" />
        </form>

    </div>
    <header contenteditable="true" id="header1"></header>
    <form id="form">

    </form>
    <form action="includes/edit.inc.php" method="POST" id="s">
        <input type="text" name="numdiv" value=0 hidden>
        <input type="text" name="numinput" value=0 hidden>
        <input type="text" id="url" name=" css"style="background:lightblue" value="view.css">
        <input type="text" id="jsurl" name="js"style="background:lightblue" value="view.js"> 
        <input type="text" id="header" name="header" hidden>
        <input type="text" id="footer" name="footer" hidden>
        <?php
        echo '<input type="text" name="get" value='.$_GET['template'].' hidden>'
        ?>
        <input type="submit" name="submit" value="save template">
    </form>
    <button onclick="save()">SAVE</button>
    <button onclick="addcss()">add css</button>
    <footer contenteditable="true" id="footer1"></footer>
    <script src="index.js"></script>
    </body>
</html>


