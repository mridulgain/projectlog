<?php
    include('session.php');
    if(isset($_SESSION['current_user'])){
        echo "<h3>Paper title here</h3>";
        $paper_id = $_GET['id'];
        $filename = $_GET['fname'];
        //show iframe
        echo "<iframe src='./papers/".$filename."' width='100%' height='500px'></iframe>";
?>
<body>
<form action = "" method = "POST">
    <textarea name="comment" style="width: 100%;">
       Your comment here
    </textarea><br/>
    <input type = "submit" name = "submit" value = "Publish">
    <input type = "hidden" name = "comment_submitted" value = "1">
</form>
</body>
<?php
        if(isset($_POST['submit'])){
            $comment = $_POST['comment'];
            $sql = "Insert into comments values($paper_id,'username here', '$comment')";
            //echo $sql;
            if(mysqli_query($conn, $sql) == TRUE){
                $temp = "paper.php?id=$paper_id&fname=$filename";
                header("location: $temp");
            }
            else{
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        $sql = "SELECT * FROM comments where id=$paper_id";
        $resultset = mysqli_query($conn, $sql);    // query execution
        if($resultset){
            while($row = mysqli_fetch_assoc($resultset)){// returns the current row of the resultset
                echo $row['username']." :<br>";
                echo $row['comment']."<br>";
            }
        } 
    }    
?>