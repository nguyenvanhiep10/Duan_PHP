<?php
    include("connectdb.php");
    if(isset($_POST["btndangky"])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        
        $sql = "INSERT INTO `taikhoan`( username,`password`, `duyet`) VALUES ('$username','$password','off')";
        try{
            mysqli_query($connect, $sql);
            echo "<script>alert('Đăng ký thành công, vui lòng chờ admin cho phép');</script>";
            echo "<script>setTimeout(function(){ window.location.href = 'index.php'; }, 0);</script>";
        }
        catch(mysqli_sql_exception)
        {
            echo "<script>alert('Tài khoản đã tồn tại');</script>";
            echo "<script>setTimeout(function(){ window.location.href = 'dangky.html'; }, 0);</script>";
        }
    
        mysqli_close($connect);
    }
?>