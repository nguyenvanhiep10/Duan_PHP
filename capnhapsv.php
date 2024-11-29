<?php
    include("connectdb.php");
    if(isset($_POST["btnthem"])){
        $msv = $_POST["masv"];
        $ht = $_POST["hoten"];
        $ngay = $_POST["date"];
        $gt = $_POST["gt"];
        $mk = $_POST["khoa"];
        $kh = $_POST["khoahoc"];
        $sql = "INSERT INTO `qlsinhvien` (`MASV`, `MAK`, `khoahoc`, `HOTEN`, `NGAYSINH`, `GIOITINH`) VALUES ('$msv', '$mk', '$kh', '$ht', '$ngay', '$gt')";
        try{
            mysqli_query($connect, $sql);
            echo "<script>alert('Thêm thành công');</script>";
            echo "<script>setTimeout(function(){ window.location.href = 'qlsinhvien.php'; }, 0);</script>";
        }
        catch(mysqli_sql_exception)
        {
            echo "<script>alert('Mã sinh viên đã tồn tại');</script>";
            echo "<script>setTimeout(function(){ window.location.href = 'qlsinhvien.php'; }, 0);</script>";
        }
       
    }
    elseif(isset($_POST['action'])) {
        $masv = $_POST['masv'];
        $action = $_POST['action'];
        
        if($action === 'Sửa') {
            $new_hoten = $_POST['hoten' . $masv];
            $new_ngaysinh = $_POST['ngaysinh' . $masv];
            $new_gioitinh = $_POST['gt' . $masv];
            $new_khoa = $_POST['khoa' . $masv];
            $new_khoahoc = $_POST['kh' . $masv];
            
            // Thực hiện truy vấn UPDATE để cập nhật thông tin
            $sql_update = "UPDATE qlsinhvien SET HOTEN='$new_hoten', NGAYSINH='$new_ngaysinh', GIOITINH='$new_gioitinh', MAK='$new_khoa', khoahoc='$new_khoahoc' WHERE MASV='$masv'";
            
            if(mysqli_query($connect, $sql_update)) {
                echo "Cập nhật thông tin thành công.";
            } else {
                echo "Lỗi: " . mysqli_error($connect);
            }
        } elseif($action === 'Xóa') {
            // Thực hiện truy vấn DELETE để xóa sinh viên
            $sql_delete = "DELETE FROM qlsinhvien WHERE MASV='$masv'";
            
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