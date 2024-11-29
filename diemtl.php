<?php
    include("function.php");
    include("capnhapdtl.php");
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
    <link rel="stylesheet" href="phaohoa.css">
    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .error {
          color: red;
          font-size: 0.8em;
        }
    </style>
</head>
<body>
    <main class="mt-3 ms-3">
        <h1 class="text-center">Điểm tích lũy</h1>
        <div class="d-flex"> 
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                    Công bố
        </button>
        <form action="diemtl.php" method="get">
            <div class="py-2 d-flex">                
                <div class="mx-4">
                    <label class="control-label me-3" for="kkhoa">Khoa:</label>
                    <?php combox("kkhoa","") ?>
                </div>
                <div class="mx-4">
                    <label class="control-label" for="">Khóa học : <span class="error"></span></label>       
                    <input class="form-control" type="text" name="kkhoahoc">
                </div>
                <div class="mx-4">
                    <label class="control-label" for="">Số lượng : <span class="error"></span></label>       
                    <input class="form-control" type="text" name="soluong">
                </div>
                <input type="submit" class="btn btn-success" name="btnhb" value="Gửi">
            </div> 
        </form>
        </div>
          
        <?php
            $khoa = " ";
            $khoahoc = " ";
            $soluong = " " ; 
            if(isset($_GET["btnhb"])){
                $khoa = $_GET["kkhoa"];
                $khoahoc = $_GET["kkhoahoc"];
                $soluong = $_GET["soluong"];
            }
        ?>
        <div class="modal" id="myModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Danh sách sinh viên đạt yêu cầu</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>MASV</th>
                                        <th>Họ và tên</th>
                                        <th>Ngày sinh</th>
                                        <th>Giới tính</th>
                                        <th>Điểm TBCHT</th>
                                        <th>Học lực</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if(isset($_GET["btnhb"]) && !empty($_GET["kkhoahoc"]) && !empty($_GET["soluong"])){
                                            hienthisvdyc($khoa,$khoahoc,$soluong);
                                        }         
                                    ?>
                                </tbody>
                            </table>  
                        </div>
                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th>MASV</th>
                    <th>Họ và tên</th>
                    <th>Ngày sinh</th>
                    <th>Giới tính</th>
                    <th>Điểm TBCHT</th>
                    <th>Học lực</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        hienthidiemtl($page,$currentURL);            
                    ?>
                </tbody>
            </table>  
        </div>  
        <?php
            trang("diemtl","qlsinhvien",$page);
        ?>
    </main> 
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>      
</body>
</html>


