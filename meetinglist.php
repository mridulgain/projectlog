<title>meetinglog2020</title>
<h4> meeting log </h4>
<body bgcolor='#faffbb'>
<?php
	session_start();
	include('dbconfig.php');
?>
<form action="" method="POST">
	<input type = 'date' name = 'meeting_date' required><br>
	<textarea name="meeting_minutes" cols = '60' rows = "20" placeholder="Write meeting minutes here........" required></textarea><br>
	
	<input type = "submit" name = "submit" value="Add">
</form>
<a href="">Show meeting logs</a><br>
<?php
	if(isset($_POST['submit'])){
		if(isset($_SESSION['current_user'])){
			//insert into db
			$username = $_SESSION['current_user'];
			$meeting_minutes = $_POST['meeting_minutes'];
			$meeting_date = $_POST['meeting_date'];
            $sql = "Insert into meetinglogs(username, meeting_minutes, meeting_date) values('$username', '$meeting_minutes', '$meeting_date')";
            //echo $sql;
            if(mysqli_query($conn, $sql) == TRUE){
                header("location: meetinglist.php");
            }
            else{
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
		}
		else{
			echo "<p><font size='3' color='red'>Please LOGIN first!!!!</font></p>";
		}
	}
	if(isset($_SESSION['current_user'])){
		//show all from db
        $sql = "SELECT * FROM meetinglogs order by meeting_date desc,id asc";
        $resultset = mysqli_query($conn, $sql);    // query execution
        if($resultset){
            echo "<table border=1>";
            while($row = mysqli_fetch_assoc($resultset)){// returns the current row of the resultset
                echo "<tr><td>".$row['username']."~(".$row['meeting_date'].")</td>";
                echo "<td>".$row['meeting_minutes']."</td></tr>";
            }
            echo "</table>";
        }
	}
	else{
		echo "<p><font color='red'>To view meeting minutes you need to login first</font></p><br>";
	}
?>