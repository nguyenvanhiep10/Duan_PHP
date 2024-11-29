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
    <title>LienHe</title>
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
        <h1 class="text-center">Liên Hệ</h1>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Comments</th>
                    <th>Ngày gửi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        hienthilh($page,$currentURL);            
                    ?>
                </tbody>
            </table>  
        </div>  
        <?php
            trang("trlienhe","lienhe",$page);
        ?>
    </main> 
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>      
</body>
</html>


