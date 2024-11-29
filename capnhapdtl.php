<?php
        include("connectdb.php");
    $sqlselect = "SELECT * FROM `qlsinhvien`";
    $result = mysqli_query($connect, $sqlselect);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $masvv = $row["MASV"];
            $sqlselect1 = "SELECT qldiem.MASV,(SUM(SOTINCHI*TBCHP)/SUM(SOTINCHI)) AS diemtl 
            FROM qldiem,qlmonhoc 
            WHERE MASV = '$masvv' AND qldiem.MAMH = qlmonhoc.MAMH";
            $result1 = mysqli_query($connect, $sqlselect1);
            if(mysqli_num_rows($result1) > 0){
                while($row = mysqli_fetch_assoc($result1)){
                    $diemtll = $row["diemtl"];
                    $masvv1 = $row["MASV"];
                    $xeploaii = ktdiemc($diemtll);
                    $sql_update = "UPDATE `qlsinhvien` SET `TBCHT`='$diemtll',`XEPLOAI`='$xeploaii' WHERE MASV = '$masvv1'";
                    $result2 = mysqli_query($connect,$sql_update);
                }
            }
        }
    }
    function ktdiemc($so){
                if($so >= 0 && $so < 4){
                    return "Kém";
                }
                elseif($so >= 4 && $so < 5){
                    return "Yếu";
                }
                elseif($so >= 5 && $so < 7){
                    return "Trung bình";
                }
                elseif($so >= 7 && $so < 8){
                    return "Khá";
                }
                elseif($so >=8 && $so < 9){
                    return "Giỏi";
                }
                elseif($so >=9 && $so <=10){
                    return"Xuất sắc";
                }
                else{
                    return"Ero";
                }

            }
            mysqli_close($connect); 
?>
