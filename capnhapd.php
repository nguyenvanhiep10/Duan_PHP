<?php
    include("connectdb.php");
    if(isset($_POST["btnthem"])){
        $khoa = $_POST["khoa"];
        $kh = $_POST["khoahoc"];
        $mh = $_POST["monh"];
        
        $sqlselect = "SELECT `MASV` FROM `qlsinhvien` WHERE MAK = '".$khoa."' AND khoahoc = '". $kh ."'";
        $result = mysqli_query($connect, $sqlselect);
        try{
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $masv0 = $row["MASV"];
                    $iddiem = $masv0 ."". $mh;
                    $sql = "INSERT INTO `qldiem`(`IDDIEM`, `MASV`, `MAMH`) VALUES ('".$iddiem."','".$masv0."','".$mh."')";
                    mysqli_query($connect, $sql);
                }
            }
            echo "<script>alert('Thêm thành công');</script>";
            echo "<script>setTimeout(function(){ window.location.href = 'qldiem.php'; }, 0);</script>"; 
        }
        catch(mysqli_sql_exception ){
            echo "<script>alert('Mã môn học đã tồn tại');</script>";            
            echo "<script>setTimeout(function(){ window.location.href = 'qldiem.php'; }, 0);</script>";       
        }
        
    }
    elseif(isset($_POST['action'])) {
        $iddiem = $_POST['iddiem'];
        $action = $_POST['action'];
        
        if($action === 'Sửa') {
            $DIEMCC = $_POST["diemcc"];
            $DIEMGK = $_POST["diemgk"];
            $LANHOC= $_POST["lanhoc"];
            $LANTHI = $_POST["lanthi"];
            $DTHI = $_POST["dthi"];
            $TBCHP = null;
            $DCHU = null;
            $NOTE = $_POST["note"];
            $TBCHP = ($DIEMCC/100)*10 + ($DIEMGK/100)*20 + ($DTHI/100)*70;
            function ktdiemc($so){
                if($so >= 0 && $so < 4){
                    return "F";
                }
                elseif($so >= 4 && $so <= 5.4){
                    return "D";
                }
                elseif($so > 5.4 && $so < 7){
                    return "C";
                }
                elseif($so >= 7 && $so <= 8.4){
                    return "B";
                }
                elseif($so >8.4 && $so <= 10){
                    return "A";
                }
                else{
                    return"K";
                }

            }
            $DCHU = ktdiemc($TBCHP);
            
            // Thực hiện truy vấn UPDATE để cập nhật thông tin
            $sql_update = "UPDATE `qldiem` 
            SET `DIEMCC`='$DIEMCC',`DIEMGK`='$DIEMGK',`LANHOC`='$LANHOC',`LANTHI`='$LANTHI',
            `DTHI`='$DTHI',`TBCHP`='$TBCHP',`DCHU`='$DCHU',`NOTE`='$NOTE' WHERE IDDIEM = '$iddiem'";
            
            if(mysqli_query($connect, $sql_update)) {
                echo "Cập nhật thông tin thành công.";
            } else {
                echo "Lỗi: " . mysqli_error($connect);
            }
        } elseif($action === 'Xóa') {
            // Thực hiện truy vấn DELETE để xóa sinh viên
            $sql_delete = "DELETE FROM `qldiem` WHERE IDDIEM = '$iddiem'";         
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