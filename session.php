<title>projectlog</title>
<h4>Project logger</h4>
<?php
    session_start();  
    include('dbconfig.php');
    if(!isset($_SESSION['current_user'])){
?>
    <form action = "" method = "post">
        <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br>
        <label>Password  :</label><input type = "password" name = "password" class = "box"/><br>
        <input type = "submit" name = "submit" value = " Log in"/><br>
    </form>
<?php
        if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $sql = "Select * from users where username='$username' and passcode='$password'";
            $result = mysqli_query($conn, $sql);
            //echo $sql;
            if(mysqli_num_rows($result) > 0){
                $_SESSION['current_user'] = $username;
                header("location: paperlist.php");
            }
            else{
                echo "<p>invalid id or password</p>";
            }
        }
    }
    else{
        echo "<body bgcolor='#E6E6FA'>";
        echo "<p>Welcome ".$_SESSION['current_user']." ";
        echo "<a href='logout.php'>logout</a></p>";
    }
?>