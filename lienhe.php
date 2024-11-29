<?php
    include("connectdb.php");
    if(isset($_POST["send"])){
        $mmh = $_POST["name"];
        $mh = $_POST["email"];
        $tc = $_POST["comments"];
        $sql = "INSERT INTO `lienhe`(`name`, `email`, `comment`) VALUES ('$mmh','$mh','$tc')";
        try{
            mysqli_query($connect, $sql);
            echo "<script>alert('Gửi thành công');</script>";
            echo "<script>setTimeout(function(){ window.location.href = 'index.php'; }, 0);</script>";
        }
        catch(mysqli_sql_exception)
        {
            echo "<script>alert('Gửi không thành công');</script>";
            echo "<script>setTimeout(function(){ window.location.href = 'index.php'; }, 0);</script>";
        }
    }

?>