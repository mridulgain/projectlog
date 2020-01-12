
<?php
    //session_start();
    include('dbconfig.php');
    if(isset($_POST['submit'])){

    // extract file name, type, size and path
    $file_path=$_FILES['pdf']['tmp_name']; //pdf is the name of the input type where we are uploading files
    $file_type=$_FILES['pdf']['type'];
    $file_size=$_FILES['pdf']['size'];
    $file_name=$_FILES['pdf']['name'];
    echo $file_path."<br>";
    echo $file_type.'<br>';
    echo $file_size.'<br>';
    echo $file_name.'<br>';
    $file_data = mysqli_real_escape_string($conn, file_get_contents($file_path));
    //echo $file_data;
    $sql = "INSERT INTO papers(file, title) values('".$file_data."','".$file_name."')";
    if(mysqli_query($conn, $sql) == TRUE){
        echo "New record created successfully";
    }else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<form action="" enctype="multipart/form-data" method="POST">
<input type="file" name="pdf" /> 
<input type="submit" name="submit" value="Upload" />
</form>
