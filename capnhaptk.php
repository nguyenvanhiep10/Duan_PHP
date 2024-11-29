<?php
    include("connectdb.php");
    if(isset($_POST["btnthem"])){
        $mmh = $_POST["taikhoan"];
        $mh = $_POST["matkhau"];
        $tc = $_POST["duyet"];
        $sql = "INSERT INTO `taikhoan`(`username`, `password`, `duyet`) VALUES ('$mmh','$mh','$tc')";
        try{
            mysqli_query($connect, $sql);
            echo "<script>alert('Thêm thành công');</script>";
            echo "<script>setTimeout(function(){ window.location.href = 'qltaikhoan.php'; }, 0);</script>";
        }
        catch(mysqli_sql_exception)
        {
            echo "<script>alert('tài khoản đã tồn tại');</script>";
            echo "<script>setTimeout(function(){ window.location.href = 'qltaikhoan.php'; }, 0);</script>";
        }
    }
    elseif(isset($_POST['action'])) {
        $mamh = $_POST['taikhoan'];
        $action = $_POST['action'];
        
        if($action === 'Sửa') {
            $new_mh = $_POST['matkhau' . $mamh];
            $new_tc = $_POST['duyet' . $mamh];
            
            // Thực hiện truy vấn UPDATE để cập nhật thông tin
            $sql_update = "UPDATE `taikhoan` SET`password`='$new_mh',`duyet`='$new_tc' WHERE  `username`='$mamh'";
            
            if(mysqli_query($connect, $sql_update)) {
                echo "Cập nhật thông tin thành công.";
            } else {
                echo "Lỗi: " . mysqli_error($connect);
            }
        } elseif($action === 'Xóa') {
            // Thực hiện truy vấn DELETE để xóa sinh viên
            $sql_delete = "DELETE FROM `taikhoan` WHERE taikhoan ='$mamh'";
            
            if(mysqli_query($connect, $sql_delete)) {
                echo "Xóa thông tin thành công.";
            } else {
                echo "Lỗi: " . mysqli_error($connect);
            }
        }
        header("Location:".$_POST["tranght"]);
    }                   
    mysqli_close($connect);
    
?>