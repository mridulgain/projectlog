<?php
    //include('dbconfig.php');
    include('session.php');
    if(isset($_SESSION['current_user'])){
        if($_SESSION['current_user'] == 'rohan'){
?>
<form action = "" method = "POST">
<input type="text" name = "title" /> 
<input type="submit" name="submit" value="Register" />
</form>
<?php
            if(isset($_POST['title']) and $_POST['title'] != ""){

                $title = $_POST['title'];
                $sql = "INSERT INTO papers(title) values('$title')";
                if(mysqli_query($conn, $sql) == TRUE){
                    header("location: paperlist.php");
                }
                else{   
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        }
        $sql = "SELECT * FROM papers order by id";
        $resultset = mysqli_query($conn, $sql);    // query execution

        if($resultset){
            echo "<table border=1><tr><th>Paper list</th></tr>";
            $ln = 0;
            while($row = mysqli_fetch_assoc($resultset)){// returns the current row of the resultset
                $id = $row['id'];
                $fname = $row['title'];
                $ln++;
                echo "<tr><td> ",$ln,") <a href = './paper.php?id=$id&fname=$fname' target = '_blank'>$fname</a></td></tr>";    
            }
            echo "</table>";
        }
    } 
?>
