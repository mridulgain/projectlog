<?php
    function sql_status($conn, $sql, $tablename){
        if ($conn->query($sql) === TRUE) {
            echo "Table ", $tablename, " created successfully<br>";
        }
        else{
            echo "Error creating table ", $tablename, " : " . $conn->error, "<br>";
        }
    }
    include("dbconfig.php");
    //sql1
    $sql = "Create table users(
                 username varchar(20) primary key,
                 passcode varchar(20))";
    sql_status($conn, $sql, "users");
    //sql2    
    /*$sql = "Create table papers(id int auto_increment primary key,
                 file longblob,
                 title varchar(1000))";
    sql_status($conn, $sql, "paperss");
    //sql3
    $sql = "Create table meetings(id int auto_increment primary key,
                 meetingdate date)";
    sql_status($conn, $sql, "meetingss");
    //sql3.5
    $sql = "ALTER TABLE meetings AUTO_INCREMENT=500";
    sql_status($conn, $sql, "meeting_id_fix");*/
    //sql4
    $sql = "Create table comments(id int,
                 username varchar(20),
                 comment mediumtext)";
    sql_status($conn, $sql, "comments");
    //sql5
    $sql = "Create table papers(id int auto_increment,
            title varchar(1000) primary key)";
    sql_status($conn, $sql, "papers");
?>
