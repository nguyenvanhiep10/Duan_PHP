<?php
function topsv(){
    include("connectdb.php");
    $sqlselect = "SELECT `MASV`, `HOTEN`,`XEPLOAI`,TENK 
    FROM `qlsinhvien`,khoa 
    WHERE qlsinhvien.MAK = khoa.MAK 
    ORDER BY TBCHT DESC LIMIT 3";
    $result = mysqli_query($connect, $sqlselect);
    class sinhvien {
        public $masvv;
        public $name;
        public $nganh;
        public $Hocluc;

        public function __construct($masvv, $name,$nganh,$Hocluc) {
            $this->masvv = $masvv;
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
    $top = topsv();
    $top1 = $top[0];
    $top2 = $top[1];
    $top3 = $top[2];
    echo $top1 ->name;
    echo $top2 ->name;
    echo $top3 ->name;
?>