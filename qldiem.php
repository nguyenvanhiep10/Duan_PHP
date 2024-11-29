<?php
    include("function.php");
    if (!isset($_SESSION['username'])) {
        header("Location: dangnhap.html"); // Thay 'login.php' bằng đường dẫn của trang đăng nhập của bạn
        exit;
    }
    include("header.php");
    if (!isset($_POST['page'])) {
        $_SESSION['current_page'] = 1;            
    } else {
        $_SESSION['current_page'] = $_POST['page'];
    }
    $page = $_SESSION['current_page'];
    $currentURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>QLDIEM</title>
    <style>
        .error {
          color: red;
          font-size: 0.8em;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    
    <main class="mt-3 ms-3">
        <h1 class="text-center">Quản lý điểm</h1>
        <div class="d-flex py-2" >
            <div class="mt-3">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                Thêm danh sách điểm
                </button>
            </div>
            <div class="modal" id="myModal">
                <div class="modal-dialog" >
                    <div class="modal-content w-200">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Thêm danh sách điểm</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body w-200 ">
                        <div class="d-flex align-items-center ">
                            <div class="form-signin w-200 m-auto bg-body-tertiary py-4 px-4 " >
                                <form action="capnhapd.php" method="post">
                                    <div class="">
                                            <label class="form-label align-items-center" for="khoa">Khoa:</label>
                                            <?php
                                                combox("khoa","");
                                            ?>
                                    </div>
                                    <div class="">
                                            <label class="control-label" for="khoahoc">Khóa học: <span class="error"></span></label>
                                            <input class="form-control" type="text" name="khoahoc" id="khoahoc">
                                    </div>
                                    <div class="">
                                            <label class="control-label" for="monh">Môn học:</label>
                                            <?php
                                                combox2("monh","");
                                            ?>
                                    </div>
                                    <div class="pt-3">
                                        <input class="btn btn-success" type="submit" name="btnthem" id="submitBtn" value="Thêm">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <script>
                            document.getElementById("submitBtn").addEventListener("click", function(event) {
                            let inputs = document.getElementsByTagName("input");
                            let errors = document.getElementsByClassName("error");
                                for (let i = 0; i < inputs.length; i++) {
                                    if ((inputs[i].type !== "radio" && inputs[i].type !== "checkbox") && inputs[i].value === "") {
                                    errors[i].innerText = "----Vui lòng điền thông tin *";
                                    event.preventDefault();
                                    } else {
                                    errors[i].innerText = "";
                                    }
                                }
                            });
                        </script>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                    </div>
                </div>
            </div>
            <form action="qldiem.php" method="get">
            <div class="d-flex ">
                    <div class="mx-4">
                        <label class="control-label me-3 " for="kkhoa">Khoa:</label>
                        <?php combox("kkhoa","") ?>
                    </div>
                    <div class="mx-4">
                        <label class="control-label" for="">Khóa học :</label>       
                        <input class="form-control" type="text" name="kkhoahoc">
                    </div>
                    <div class="mx-4">
                        <label class="control-label" for="mmonhoc">Môn học :</label>
                        <?php combox2("mmonhoc","") ?>
                    </div>
                    <div class="mt-4">
                        <input class="btn btn-success" type="submit" name="btnhienthi" value="Hiển thị">
                    </div>
            </div>
            </form>
        </div>
        
        
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th>Mã sinh viên</th>
                    <th>Họ và tên</th>
                    <th>Môn học</th></th>
                    <th>Điểm chuyên cần</th>
                    <th>Điểm giữa kỳ</th>
                    <th>Lần học</th>
                    <th>Lần thi</th>
                    <th>Điểm thi</th>
                    <th>TBCHP</th>
                    <th>Điểm chữ</th>
                    <th>Ghi chú</th>
                    <th>Cập nhâp</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    if(isset($_GET["kkhoa"]) && isset($_GET["kkhoahoc"]) && isset($_GET["mmonhoc"])){
                        $kkhoa = $_GET["kkhoa"];
                        $kkhoahoc = $_GET["kkhoahoc"];
                        $mmonh = $_GET["mmonhoc"]; 
                    }
                    else{
                        $kkhoa = null;
                        $kkhoahoc = null;
                        $mmonh = null; 
                    }
                    hienthidiem($kkhoa,$kkhoahoc,$mmonh,$page,$currentURL);  
                ?>
                </tbody>
            </table>
        </div>
        <?php
            $sqlselectdiem = "`qldiem`,`qlsinhvien`
            WHERE MAK = '$kkhoa' AND Khoahoc = '$kkhoahoc' AND  MAMH = '$mmonh' AND qldiem.MASV = qlsinhvien.MASV ";
            trang("qldiem","$sqlselectdiem",$page);
        ?>
    </main>
    
</body>
</html>
