<?php
    session_start();
    function checknam($gioitinh){
        if($gioitinh == "nam"){
            return "checked";
        }
        else{
            return "";
        }
    }
    function checknu($gioitinh){
        if($gioitinh == "Nữ"){
            return "checked";
        }
        else{
            return "";
        }
    }
    function checkon($gioitinh){
        if($gioitinh == "on"){
            return "checked";
        }
        else{
            return "";
        }
    }
    function checkoff($gioitinh){
        if($gioitinh == "off"){
            return "checked";
        }
        else{
            return "";
        }
    }
    function hienthisv($page,$tranght){
        include("connectdb.php");
        $result_per_page = 8; // Số dòng mỗi trang
        $sqlselect = "SELECT * FROM qlsinhvien";
        $result = mysqli_query($connect, $sqlselect);

        $this_page_first_result = ($page - 1) * $result_per_page;

        $sqlselect .= " LIMIT " . $this_page_first_result . ',' . $result_per_page;
        $result = mysqli_query($connect, $sqlselect);

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $masv = $row["MASV"];
                $hoten = $row["HOTEN"];
                $ngaysinh = $row["NGAYSINH"];
                $gioitinh = $row["GIOITINH"];
                $mak = $row["MAK"];
                $kh = $row["khoahoc"];
                echo "<form action='capnhapsv.php' method='post'>";
                echo "<input type='hidden' name='masv' value='" . $masv . "'>";
                echo "<input type='hidden' name='tranght' value='" . $tranght . "'>";
                echo "<tr>";
                echo "<th>";
                echo $masv;
                echo "</th>";
                echo "<th>";
                combox("khoa".$masv,$mak);
                echo "</th>";
                echo "<th>";
                echo "<input class='". "form-control" . "' type='" . "text" . "' name='" . "kh" . $masv . "' value='" . $kh . "'";
                echo "</th>";
                echo "<th>";
                echo "<input class='". "form-control" . "' type='" . "text" . "' name='" . "hoten" . $masv . "' value='" . $hoten . "'";
                echo "</th>";
                echo "<th>";
                echo "<input class='". "form-control" . "' type='" . "date" . "' name='" . "ngaysinh" . $masv . "' value='" . $ngaysinh . "'";
                echo "</th>";                           
                echo "<th>";
                echo"<div class='input-group'>"; 
                echo  "<div class='form-check'>";
                echo "<input class='form-check-input' type='radio' name='gt" . $masv . "' id='gt1' value='nam'" . checknam($gioitinh) . " >";
                echo "<label class='form-check-label me-2' for='gt1'>";   
                echo "Nam";                        
                echo "</label>";                    
                echo "</div>";                
                echo "<div class='form-check'>";                
                echo "<input class='form-check-input' type='radio' name='gt" . $masv . "' id='gt2' value='Nữ'" . checknu($gioitinh) . " >";                    
                echo "<label class='form-check-label' for='gt2'>";           
                echo "Nữ";               
                echo "</label>";         
                echo "</div>"; 
                echo"</div>"; 
                echo "</th>";
                echo "<th>"; 
                echo "<input class='btn btn-success ms-3 me-3' type='submit' name='action' value='Sửa'>";
                echo "<input class='btn btn-success' type='submit' name='action' value='Xóa'>";                         
                echo "</th>";
                echo "</tr>";
                echo "</form>";
            }
        }

        mysqli_close($connect);
        
    }
    function hienthidiemtl($page,$tranght){
        include("connectdb.php");
        $result_per_page = 8; // Số dòng mỗi trang
        $sqlselect = "SELECT * FROM qlsinhvien";
        $result = mysqli_query($connect, $sqlselect);

        $this_page_first_result = ($page - 1) * $result_per_page;

        $sqlselect .= " LIMIT " . $this_page_first_result . ',' . $result_per_page;
        $result = mysqli_query($connect, $sqlselect);

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $masv = $row["MASV"];
                $hoten = $row["HOTEN"];
                $ngaysinh = $row["NGAYSINH"];
                $gioitinh = $row["GIOITINH"];
                $diemtl = $row["TBCHT"];
                $xeploai = $row["XEPLOAI"];
                echo "<tr>";
                echo "<th>";
                echo $masv;
                echo "</th>";
                echo "<th>";
                echo $hoten;
                echo "</th>";
                echo "<th>";
                echo $ngaysinh;
                echo "</th>";
                echo "<th>";
                echo $gioitinh;
                echo "</th>";                           
                echo "<th>";
                echo round($diemtl, 2);
                echo "</th>";
                echo "<th>";
                echo $xeploai;                         
                echo "</th>";
                echo "</tr>";
            }
        }

        mysqli_close($connect);
        
    }
    function hienthisvdyc($khoa,$khoahoc,$sosv){
        include("connectdb.php");
        $sqlselect = "SELECT * FROM qlsinhvien
         WHERE MAK = '$khoa'  AND khoahoc = '$khoahoc'
         ORDER BY TBCHT DESC LIMIT $sosv";
        $result = mysqli_query($connect, $sqlselect);

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $masv = $row["MASV"];
                $hoten = $row["HOTEN"];
                $ngaysinh = $row["NGAYSINH"];
                $gioitinh = $row["GIOITINH"];
                $diemtl = $row["TBCHT"];
                $xeploai = $row["XEPLOAI"];
                echo "<tr>";
                echo "<th>";
                echo $masv;
                echo "</th>";
                echo "<th>";
                echo $hoten;
                echo "</th>";
                echo "<th>";
                echo $ngaysinh;
                echo "</th>";
                echo "<th>";
                echo $gioitinh;
                echo "</th>";                           
                echo "<th>";
                echo round($diemtl, 2);
                echo "</th>";
                echo "<th>";
                echo $xeploai;                         
                echo "</th>";
                echo "</tr>";
            }
        }

        mysqli_close($connect);
        
    }
    function hienthitop3(){
        include("connectdb.php");
        $sqlselect = "SELECT `MASV`, `HOTEN`,`XEPLOAI`,TENK 
        FROM `qlsinhvien`,khoa 
        WHERE qlsinhvien.MAK = khoa.MAK 
        ORDER BY TBCHT DESC LIMIT 3";
        $result = mysqli_query($connect, $sqlselect);
        class sinhvien {
            public $masv;
            public $name;
            public $nganh;
            public $Hocluc;
        
            public function __construct($masv, $name,$nganh,$Hocluc) {
                $this->masv = $masv;
                $this->name = $name;
                $this->nganh = $nganh;
                $this->Hocluc = $Hocluc;
            }
        }
        $top3 = array();
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $masv = $row["MASV"];
                $hoten = $row["HOTEN"];
                $nganh = $row["TENK"];
                $xeploai = $row["XEPLOAI"];
                $top3[] = new sinhvien($masv,$hoten,$nganh,$xeploai);
            }
        }
        mysqli_close($connect);
        return $top3;
    }
    function hienthilh($page,$tranght){
        include("connectdb.php");
        $result_per_page = 8;
        $sqlselect = "SELECT * FROM `lienhe`";
        $result = mysqli_query($connect, $sqlselect);
        $this_page_first_result = ($page - 1) * $result_per_page;

        $sqlselect .= " LIMIT " . $this_page_first_result . ',' . $result_per_page;
        $result = mysqli_query($connect, $sqlselect);

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $masv = $row["name"];
                $hoten = $row["email"];
                $ngaysinh = $row["comment"];
                $gioitinh = $row["ngaygui"];
                
                echo "<tr>";
                echo "<th>";
                echo $masv;
                echo "</th>";
                echo "<th>";
                echo $hoten;
                echo "</th>";
                echo "<th>";
                echo $ngaysinh;
                echo "</th>";
                echo "<th>";
                echo $gioitinh;
                echo "</th>";                           
                echo "</tr>";
            }
        }

        mysqli_close($connect);
        
    }
    function hienthimh($page,$tranght){
        include("connectdb.php");
        $result_per_page = 8; // Số dòng mỗi trang
        $sqlselect = "SELECT * FROM qlmonhoc";
        $result = mysqli_query($connect,$sqlselect);
        $this_page_first_result = ($page - 1) * $result_per_page;

        $sqlselect .= " LIMIT " . $this_page_first_result . ',' . $result_per_page;
        $result = mysqli_query($connect, $sqlselect);
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                $mamh = $row["MAMH"];
                $tenmh = $row["TENMH"];
                $sotinchi = $row["SOTINCHI"];
                echo "<form action='capnhapmh.php' method='post'>";
                echo "<input type='hidden' name='mamh' value='" . $mamh . "'>";
                echo "<input type='hidden' name='tranght' value='" . $tranght . "'>";
                echo "<tr>";
                echo "<th>";
                echo $mamh;
                echo "</th>";
                echo "<th>";
                echo "<input class='form-control' type='text' name='monhoc" . $mamh . "' value='" . $tenmh . "'";
                echo "</th>";
                echo "<th>";
                echo "<input class='form-control' type='text' name='sotinchi" . $mamh . "' value='" . $sotinchi . "'";
                echo "</th>";                           
                echo "<th>"; 
                
                echo "<input class='btn btn-success ms-3 me-3' type='submit' name='action' value='Sửa'>";
                echo "<input class='btn btn-success' type='submit' name='action' value='Xóa'>";                         
                echo "</th>";
                echo "</tr>";
                echo "</form>";    
            }
        }
        mysqli_close($connect);
        
    }
    function hienthitk($page,$tranght){
        include("connectdb.php");
        $result_per_page = 8; // Số dòng mỗi trang
        $sqlselect = "SELECT * FROM taikhoan";
        $result = mysqli_query($connect,$sqlselect);
        $this_page_first_result = ($page - 1) * $result_per_page;

        $sqlselect .= " LIMIT " . $this_page_first_result . ',' . $result_per_page;
        $result = mysqli_query($connect, $sqlselect);
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                $tk = $row["username"];
                $mk = $row["password"];
                $duyet = $row["duyet"];
                echo "<form action='capnhaptk.php' method='post'>";
                echo "<input type='hidden' name='taikhoan' value='" . $tk . "'>";
                echo "<input type='hidden' name='tranght' value='" . $tranght . "'>";
                echo "<tr>";
                echo "<th>";
                echo $tk;
                echo "</th>";
                echo "<th>";
                echo "<input class='form-control' type='text' name='matkhau" . $tk . "' value='" . $mk . "'";
                echo "</th>";
                echo "<th>";
                echo"<div class='input-group'>"; 
                echo  "<div class='form-check'>";
                echo "<input class='form-check-input' type='radio' name='duyet" . $tk . "' id='gt1' value='on'" . checkon($duyet) . " >";
                echo "<label class='form-check-label me-2' for='gt1'>";   
                echo "on";                        
                echo "</label>";                    
                echo "</div>";                
                echo "<div class='form-check'>";                
                echo "<input class='form-check-input' type='radio' name='duyet" . $tk . "' id='gt2' value='off'" . checkoff($duyet) . " >";                    
                echo "<label class='form-check-label' for='gt2'>";           
                echo "off";               
                echo "</label>";         
                echo "</div>"; 
                echo"</div>";
                echo "</th>";                           
                echo "<th>"; 
                echo "<input class='btn btn-success ms-3 me-3' type='submit' name='action' value='Sửa'>";
                echo "<input class='btn btn-success' type='submit' name='action' value='Xóa'>";                         
                echo "</th>";
                echo "</tr>";
                echo "</form>";    
            }
        }
        mysqli_close($connect);
        
    }
    function hienthidiem($maak,$kkhoahoc,$maamh,$page,$tranght){
        include("connectdb.php");
        $result_per_page = 8; // Số dòng mỗi trang
        $sqlselect = "SELECT `IDDIEM`, qldiem.MASV,qlsinhvien.HOTEN, `MAMH`, `DIEMCC`, `DIEMGK`, `LANHOC`, `LANTHI`, `DTHI`, `TBCHP`, `DCHU`, `NOTE` 
        FROM `qldiem`,`qlsinhvien`
        WHERE MAK = '$maak' AND Khoahoc = '$kkhoahoc' AND  MAMH = '$maamh' AND qldiem.MASV = qlsinhvien.MASV 
        ORDER BY SUBSTRING_INDEX(REVERSE(HOTEN), ' ', 1)";
        $result = mysqli_query($connect, $sqlselect);

        $this_page_first_result = ($page - 1) * $result_per_page;

        $sqlselect .= " LIMIT " . $this_page_first_result . ',' . $result_per_page;
        $result = mysqli_query($connect, $sqlselect);

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $iddiem = $row["IDDIEM"];
                $masv = $row["MASV"];
                $hotensv = $row["HOTEN"];
                $mamh = $row["MAMH"];
                $diemcc = $row["DIEMCC"];
                $diemgk = $row["DIEMGK"];
                $lanhoc = $row["LANHOC"];
                $lanthi = $row["LANTHI"];
                $dthi = $row["DTHI"];
                $tbchp = $row["TBCHP"];
                $dchu = $row["DCHU"];
                $note = $row["NOTE"];
                
                echo "<form action='capnhapd.php' method='post'>";
                echo "<input type='hidden' name='iddiem' value='" . $iddiem . "'>";
                echo "<input type='hidden' name='tranght' value='" . $tranght . "'>";
                echo "<tr>";
                echo "<th>";
                echo $masv;
                echo "</th>";
                echo "<th>";
                echo $hotensv;
                echo "</th>";
                echo "<th>";
                echo monhoc($mamh);
                echo "</th>";
                echo "<th>";
                echo "<input class='". "form-control" . "' type='" . "text" . "' name='" . "diemcc' value='" . $diemcc . "'";
                echo "</th>";
                echo "<th>";
                echo "<input class='". "form-control" . "' type='" . "text" . "' name='" . "diemgk' value='" . $diemgk . "'";
                echo "</th>";
                echo "<th>";
                echo "<input class='". "form-control" . "' type='" . "text" . "' name='" . "lanhoc' value='" . $lanhoc . "'";
                echo "</th>";                           
                echo "<th>";
                echo "<input class='". "form-control" . "' type='" . "text" . "' name='" . "lanthi' value='" . $lanthi . "'";
                echo "</th>";
                echo "<th>";
                echo "<input class='". "form-control" . "' type='" . "text" . "' name='" . "dthi' value='" . $dthi . "'";
                echo "</th>";
                echo "<th>";
                echo '<div class="text-center">';
                echo $tbchp;
                echo '</div>';
                echo "</th>";
                echo "<th>";
                echo '<div class="text-center">';
                echo $dchu;
                echo '</div>';
                echo "</th>";
                echo "<th>";
                echo "<input class='". "form-control" . "' type='" . "text" . "' name='" . "note' value='" . $note . "'";
                echo "</th>";
                echo "<th>";
                echo '<div class="d-flex">';
                echo "<input class='btn btn-success ms-3 me-3' type='submit' name='action' value='Sửa'>";
                echo "<input class='btn btn-success' type='submit' name='action' value='Xóa'>";
                echo '</div>';                         
                echo "</th>";
                echo "</tr>";
                echo "</form>";
            }
        }

        mysqli_close($connect);
        
    }
    function combox($name, $value){
        echo "<select class='form-select' name='" . $name ."' id='mySelect'>";
        include("connectdb.php");
        $sqlselect = "SELECT * FROM khoa";
        $result = mysqli_query($connect, $sqlselect);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $mamh = $row["MAK"];
                $tenmh = $row["TENK"];
                if ($mamh == $value) {
                    echo "<option value='" . $mamh . "' selected>" . $tenmh . "</option>";
                } else {
                    echo "<option value='" . $mamh . "'>" . $tenmh . "</option>";
                }
            }
        }
        mysqli_close($connect);
        echo "</select>";
    }
    function monhoc($value){
        include("connectdb.php");
        $sqlselect = "SELECT * FROM `qlmonhoc` WHERE MAMH = '$value'";
        $result = mysqli_query($connect, $sqlselect);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $tenmh = $row["TENMH"];
                return $tenmh;
            }
        }
        mysqli_close($connect);
    }
    function combox2($name, $value){
        echo "<select class='form-select' name='" . $name ."' id='mySelect'>";
        include("connectdb.php");
        $sqlselect = "SELECT * FROM qlmonhoc";
        $result = mysqli_query($connect, $sqlselect);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $mamh = $row["MAMH"];
                $tenmh = $row["TENMH"];
                if ($mamh == $value) {
                    echo "<option value='" . $mamh . "' selected>" . $tenmh . "</option>";
                } else {
                    echo "<option value='" . $mamh . "'>" . $tenmh . "</option>";
                }
            }
        }
        mysqli_close($connect);
        echo "</select>";
    }
    function trang($trang,$bang,$page){    
        include("connectdb.php");
        $result_per_page = 8; // Số dòng mỗi trang
        $sqlselect = "SELECT * FROM ".$bang."";
        $result = mysqli_query($connect, $sqlselect);
        $number_of_results = mysqli_num_rows($result);
        // Xác định số trang
        $number_of_pages = ceil($number_of_results / $result_per_page);
        mysqli_close($connect);
        echo '<div class="container">';
        echo '    <div class="row">';
        echo '        <div class="col-md-6">';
        echo '            <form action="'.$trang.'.php" method="get">';
        echo '                <!-- Nút "Sang trái" -->';
        echo '                <input type="hidden" name="page" value="' . ($page - 1) . '">';
        echo '                <button class="btn btn-primary" ' . (($page == 1) ? 'disabled' : '') . ' type="submit"><</button>';
        echo '            </form>';
        echo '        </div>';
        echo '        <div class="col-md-6 text-end">';
        echo '            <form action="'.$trang.'.php" method="get">';
        echo '                <!-- Nút "Sang phải" -->';
        echo '                <input type="hidden" name="page" value="' . ($page + 1) . '">';
        echo '                <button class="btn btn-primary" ' . (($page >= $number_of_pages) ? 'disabled' : '') . ' type="submit">></button>';
        echo '            </form>';
        echo '        </div>';
        echo '    </div>';
        echo '    <div class="row mt-3">';
        echo '        <div class="col-md-12">';
        echo '            <form action="'.$trang.'.php" method="get">';
        echo '                <!-- Nút chuyển trang -->';
        for ($i = 1; $i <= $number_of_pages; $i++) {
            echo '                <input class="'. mau($i,$page) .'" type="submit" name="page" value="' . $i . '">';
        }
        echo '            </form>';
        echo '        </div>';
        echo '    </div>';
        echo '</div>';
        
    }
    function mau($ii,$trang){
        if($ii == $trang){
            return "btn btn-primary";
        }
        else
        {
            return "btn btn-dark";
        }
    }
?>