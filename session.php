<?php
    session_start();  
    if(!isset($_SESSION['current_user'])){
?>
<html>
        <form action = "" method = "post">
            <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
            <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
            <input type = "submit" value = " Submit "/><br />
        </form>
</html>
<?php
        $_SESSION['current_user'] = "abv wol"; 
    }
    else{
?>
<html>
    <body>
        Welcome <?php echo $_SESSION['current_user'] ?><br>
        <a href="logout.php">logout</a>
    <body>
</html>
<?php
    }
?>
