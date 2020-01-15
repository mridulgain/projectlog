<form action = "" method = "POST">
	<input type='text' name = 'sql'>
	<input type = 'submit' name = 'submit' value = 'run'>
</form>
<?php
	include("dbconfig.php");
	if(isset($_POST['submit'])){
		$sql = $_POST['sql'];
		if($rs = mysqli_query($conn, $sql)){
            if(gettype($rs) == 'boolean')
                echo "query executed successfully";
            else
                while($row = mysqli_fetch_assoc($rs)){
                    print_r($row);
                    echo "<br>";
                }
		}
		else{
			echo $conn->error;
		}
	}
    /*function sql_status($conn, $sql, $tablename){
        if ($conn->query($sql) === TRUE) {
            echo "Table ", $tablename, " successfully<br>";
        }
        else{
            echo "Error creating table ", $tablename, " : " . $conn->error, "<br>";
        }
    }

    //sql1---
    $sql = "Create table users(
                 username varchar(20) primary key,
                 passcode varchar(20))";
    sql_status($conn, $sql, "users");
    //sql2    
    $sql = "Create table papers(id int auto_increment primary key,
                 file longblob,
                 title varchar(1000))";
    sql_status($conn, $sql, "paperss");
    //sql3
    $sql = "Create table meetings(id int auto_increment primary key,
                 meetingdate date)";
    sql_status($conn, $sql, "meetingss");
    //sql3.5
    $sql = "ALTER TABLE meetings AUTO_INCREMENT=500";
    sql_status($conn, $sql, "meeting_id_fix");
    //sql4----
    $sql = "Create table comments(id int,
                 username varchar(20),
                 comment mediumtext)";
    sql_status($conn, $sql, "comments");
    //sql5-----
    $sql = "Create table papers(id int auto_increment primary key,
            title varchar(1000))";
    sql_status($conn, $sql, "papers");*/
?>
