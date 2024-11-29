<?php
    include("function.php");
    if (!isset($_SESSION['username'])) {
        header("Location: dangnhap.html"); // Thay 'login.php' bằng đường dẫn của trang đăng nhập của bạn
        exit;
    }
    include("header.php");
    if (!isset($_GET['page'])) {
        $_SESSION['current_page'] = 1;            
    } else {
        $_SESSION['current_page'] = $_GET['page'];
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
    <title>QLTAIKHOAN</title>
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
        <h1 class="text-center">Quản lý tài khoản</h1>
        <div class="py-2">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
            Thêm Tài khoản
            </button>
        </div>
        
        <div class="modal" id="myModal">
            <div class="modal-dialog" >
                <div class="modal-content w-200">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Thêm Tài khoản</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body w-200 ">
                    <div class="d-flex align-items-center ">
                        <div class="form-signin w-200 m-auto bg-body-tertiary py-4 px-4 " >
                            <form action="capnhaptk.php" method="post">
                                <div class="">
                                        <label class="form-label align-items-center" for="mamh">Tài khoản: <span class="error"></span></label>
                                        <input class="form-control" type="text" name="taikhoan" id="mamh">
                                </div>
                                <div class="">
                                        <label class="control-label" for="monhoc">Mật khẩu: <span class="error"></span></label>
                                        <input class="form-control" type="text" name="matkhau" id="monhoc">
                                </div>
                                <div class="">
                                    <label class="control-label">Duyệt:</label><br>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="duyet" id="gt1" value="on">
                                        <label class="form-check-label me-2" for="gt1">
                                            On
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="duyet" id="gt2" value="off" checked>
                                        <label class="form-check-label" for="gt2">
                                            Off
                                        </label>
                                    </div>
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
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th>Tài khoản</th>
                    <th>Mật khẩu</th>
                    <th>Duyệt</th>
                    <th>Cập nhập</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        hienthitk($page,$currentURL);                                 
                    ?>
                </tbody>
            </table>
        </div>
        <?php
            trang("qltaikhoan","taikhoan",$page);
        ?>
    </main>
    
</body>
</html>
