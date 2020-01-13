<?php
   define('DB_SERVER', '127.0.0.1:3306');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'test');
   $conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
   }
?>


