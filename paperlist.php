<head>
    <title>Papers
    </title>
    <h1>Papers</h1>
</head>
<?php
    //session_start();
    include('dbconfig.php');
    if(isset($_POST['submit'])){

        $title = $_POST['title'];
        $sql = "INSERT INTO papers(title) values('$title')";
        if(mysqli_query($conn, $sql) == TRUE){
            header("location: paperlist.php");
        }
        else{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
}
?>
<form action = "" method = "POST">
<input type="text" name = "title" /> 
<input type="submit" name="submit" value="Register" />
</form>
<?php
    //download
    $sql = "SELECT * FROM papers";
    $resultset = mysqli_query($conn, $sql);    // query execution
    if($resultset){
        while($row = mysqli_fetch_assoc($resultset)){// returns the current row of the resultset
            $id = $row['id'];
            $fname = $row['title'];
            //$row['title']."<br>";
            echo "<a href = './paper.php?id=$id&fname=$fname'>$fname</a><br>";    
        }
    } 
?>
