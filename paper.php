<script src="nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">
    bkLib.onDomLoaded(function() {
        new nicEditor({maxHeight : 200}).panelInstance('comment');
    });
</script>
                        
<?php
    //include('session.php');
    session_start();
    include('dbconfig.php');
    if(isset($_SESSION['current_user'])){
        echo "<h4>Paper title here</h4>";
        $paper_id = $_GET['id'];
        $filename = $_GET['fname'];
        $username = $_SESSION['current_user'];
        //show iframe
        echo "<iframe src='./papers/".$filename."' width='100%' height='500px'></iframe>";
?>
<body bgcolor='#feffb9'>
<p><form action = "" method = "POST">
    <textarea name="comment" style="height: 200;width: 100%;" id = 'comment'>
       Your comment here
    </textarea></br>
    <input type = "submit" name = "submit" value = "Publish">
    <input type = "hidden" name = "comment_submitted" value = "1">
</form></p>
</body>
<?php
        if(isset($_POST['comment'])){
            $comment = $_POST['comment'];
            $sql = "Insert into comments values($paper_id, '$username', '$comment')";
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
    else{
        echo "<p>Session closed. Please <a href='index.html'>login</a> again</p>";
    }    
?>