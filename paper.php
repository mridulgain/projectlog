<script src="nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">
    bkLib.onDomLoaded(function() {
        new nicEditor({maxHeight : 200}).panelInstance('comment');
    });
/*    Copyright (c) 2007-2008 Brian Kirchoff (http://nicedit.com)

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.*/
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
    &nbsp;&nbsp; Your comment here... as <?php echo $username; ?></div>
    </textarea></br>
    <input type = "submit" name = "submit" value = "Post">
</form></p>
</body>
<?php
        if(isset($_POST['comment'])){
            $comment = $_POST['comment'];
            $sql = "Insert into comments(id, username, comment) values($paper_id, '$username', '$comment')";
            //echo $sql;
            if(mysqli_query($conn, $sql) == TRUE){
                $temp = "paper.php?id=$paper_id&fname=$filename";
                header("location: $temp");
            }
            else{
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        $sql = "SELECT * FROM comments where id=$paper_id order by posted_at";
        $resultset = mysqli_query($conn, $sql);    // query execution
        if($resultset){
            echo "<table border=1>";
            while($row = mysqli_fetch_assoc($resultset)){// returns the current row of the resultset
                echo "<tr><td>".$row['username']."~(".$row['posted_at'].")</td>";
                echo "<td>".$row['comment']."</td></tr>";
            }
            echo "</table>";
        } 
    }
    else{
        echo "<p>Session has been closed. Please <a href='index.html'>login</a> again.</p>";
    }    
?>