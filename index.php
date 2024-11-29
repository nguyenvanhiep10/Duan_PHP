<?php
    include("function.php");
    include("header.php");
    $top = hienthitop3();
    $top1 = $top[0];
    $top2 = $top[1];
    $top3 = $top[2];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Theme Made By www.w3schools.com - No Copyright -->
    <title>Trang Chủ Sinh Viên</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" type="image/png" href="./image/icon.png" />
    <style>
        body {
            font: 400 15px/1.8 Lato, sans-serif;
        }

        h3,
        h4 {
            margin: 10px 0 30px 0;
            font-size: 20px;
            color: #111;
        }

        .container {
            padding: 40px 120px;
        }

        .person {
            border: 10px solid transparent;
            margin-bottom: 25px;
            width: 80%;
            height: 80%;
        }

        .person:hover {
            border-color: #f1f1f1;
        }

        .carousel-inner img {
            width: 100%;
            /* Set width to 100% */
            margin: auto;
        }

        .carousel-caption h3 {
            color: #fff !important;
        }

        @media (max-width: 600px) {
            .carousel-caption {
                display: none;
                /* Hide the carousel text when the screen is less than 600 pixels wide */
            }
        }

        .bg-1 {
            background: #2d2d30;
            color: #bdbdbd;
        }

        .bg-1 h3 {
            color: #777;
        }

        .bg-1 p {
            font-style: italic;
        }

        .list-group-item:first-child {
            border-top-right-radius: 0;
            border-top-left-radius: 0;
        }

        .list-group-item:last-child {
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .thumbnail {
            padding: 0 0 15px 0;
            border: none;
            border-radius: 0;
        }

        .thumbnail p {
            margin-top: 15px;
            color: #555;
        }

        .btn {
            padding: 10px 20px;
            background-color: #333;
            color: #f1f1f1;
            border-radius: 0;
            transition: .2s;
        }

        .btn:hover,
        .btn:focus {
            border: 1px solid #333;
            background-color: #fff;
            color: #777;
        }

        .modal-header,
        h4,
        .close {
            background-color: #333;
            color: #fff !important;
            text-align: center;
            font-size: 30px;
        }

        .modal-header,
        .modal-body {
            padding: 40px 50px;
        }

        .nav-tabs li a {
            color: #777;
        }

        #googleMap {
            width: 100%;
            height: 400px;
            -webkit-filter: grayscale(100%);
            filter: grayscale(100%);
        }

        .navbar {
            font-family: Montserrat, sans-serif;
            margin-bottom: 0;
            background-color: #3747f0;
            border: 0;
            font-size: 11px !important;
            letter-spacing: 2px;
            opacity: 0.9;
        }

        .navbar li a,
        .navbar .navbar-brand {
            color: #d5d5d5 !important;
        }

        .navbar-nav li a:hover {
            color: #fff !important;
        }

        .navbar-nav li.active a {
            color: #fff !important;
            background-color: #29292c !important;
        }

        .navbar-default .navbar-toggle {
            border-color: transparent;
        }

        .open .dropdown-toggle {
            color: #fff;
            background-color: #555 !important;
        }

        .dropdown-menu li a {
            color: #000 !important;
            font-size: 10px;
        }

        .dropdown-menu li a:hover {
            background-color: red !important;
        }


        footer {
            background-color: #2d2d30;
            color: #f5f5f5;
            padding: 32px;
        }

        footer a {
            color: #f5f5f5;
        }

        footer a:hover {
            color: #777;
            text-decoration: none;
        }

        .form-control {
            border-radius: 0;
        }

        textarea {
            resize: none;
        }
    </style>
</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="https://eaut.edu.vn/wp-content/uploads/2023/12/anh-1920x1080-1333-x-421-px-2048x647.png.webp"
                    alt="New York" width="1200" height="700">
            </div>
        </div>

        <!-- Container (The Band Section) -->
        <div id="band" class="container text-center">
            <h3>TRƯỜNG ĐẠI HỌC CÔNG NGHỆ ĐÔNG Á</h3>
            <p><em>SỨ MẠNG - MỤC TIÊU - TẦM NHÌN</em></p>
            <p>Trường Đại học Công nghệ Đông Á được Thủ tướng chính phủ cho phép thành lập ngày 09/12/2008 theo Quyết
                định số 1777/QĐ-TTg. Trường Đại học Công nghệ Đông Á
                là trường đại học đa ngành nằm trong hệ thống giáo dục quốc dân. Trường đào tạo các trình độ: Cao đẳng,
                Đại học và Sau đại học với nhiều hình thức: Chính quy, liên thông, vừa làm vừa học. Đào tạo nguồn nhân
                lực có phẩm chất đạo đức và trình độ chuyên môn đáp ứng nhu cầu của xã hội; nghiên cứu khoa học theo
                định hướng ứng dụng và chuyển giao tri thức, phục vụ sự phát triển của Đất nước.</p>
            <br>
            <div class="row">
                <div class="col-sm-4">
                    <p class="text-center"><strong><?php echo $top1 ->name ." - ".$top1 ->masv?></strong></p><br>
                    <a href="#demo" data-toggle="collapse">
                        <img src="./image/sinhvien1.png" class="img-circle person" alt="Random Name" width="255"
                            height="255">
                    </a>
                    <div id="demo" class="collapse">
                        <p>Sinh Viên Ngành: <?php echo $top1 ->nganh ?></p>
                        <p>Loại bằng: <?php echo $top1 ->Hocluc ?></p>
                        <p></p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <p class="text-center"><strong><?php echo $top2 ->name ." - ".$top2 ->masv?></strong></p><br>
                    <a href="#demo2" data-toggle="collapse">
                        <img src="./image/sinhvien2.png" class="img-circle person" alt="Random Name" width="255"
                            height="255">
                    </a>
                    <div id="demo2" class="collapse">
                        <p>Sinh Viên Ngành: <?php echo $top2 ->nganh ?></p>
                        <p>Loại bằng: <?php echo $top2 ->Hocluc ?></p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <p class="text-center"><strong><?php echo $top3 ->name ." - ".$top3 ->masv?></strong></p><br>
                    <a href="#demo3" data-toggle="collapse">
                        <img src="./image/sinhvien3.png" class="img-circle person" alt="Random Name" width="255"
                            height="255">
                    </a>
                    <div id="demo3" class="collapse">
                        <p>Sinh Viên Ngành: <?php echo $top3 ->nganh ?></p>
                        <p>Loại bằng: <?php echo $top3 ->Hocluc ?></p>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h4><span class="glyphicon glyphicon-lock"></span> Tickets</h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" >
                            <div class="form-group">
                                <label for="psw"><span class="glyphicon glyphicon-shopping-cart"></span> Tickets, $23
                                    per person</label>
                                <input type="number" class="form-control" id="psw" placeholder="How many?">
                            </div>
                            <div class="form-group">
                                <label for="usrname"><span class="glyphicon glyphicon-user"></span> Send To</label>
                                <input type="text" class="form-control" id="usrname" placeholder="Enter email">
                            </div>
                            <button type="submit" class="btn btn-block">Pay
                                <span class="glyphicon glyphicon-ok"></span>
                            </button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
                            <span class="glyphicon glyphicon-remove"></span> Cancel
                        </button>
                        <p>Need <a href="#">help?</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Container (Contact Section) -->
    <div id="contact" class="container">
        <h3 class="text-center">Đăng Ký Liên Hệ</h3>
        <form action="lienhe.php" method="post">
        <div class="row">
        
            <div class="col-md-4">
                <p>Hà Nội</p>
                <p><span class="glyphicon glyphicon-map-marker"></span>Đại học Công Nghệ Đông Á</p>
                <p><span class="glyphicon glyphicon-phone"></span>Cơ sở đào tạo thực hành
                    Quyết định thành lập số: 1777/QĐ-TTg</p>
                <p><span class="glyphicon glyphicon-envelope"></span>Toà Nhà Polyco, Trịnh Văn Bô, Nam Từ Liêm, Hà Nội
                    Điện thoại: 0243.555.2008
                    email: tuyensinh@eaut.edu.vn</p>
            </div>   
            <div class="col-md-8">
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
                    </div>
                    <div class="col-sm-6 form-group">
                        <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
                    </div>
                </div>
                <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea>
                <br>
                <div class="row">
                    <div class="col-md-12 form-group">
                        <button class="btn pull-right" name="send" type="submit">Send</button>
                    </div>
                </div>
            </div>      
        </div>
        </form>
        <br>
        <h3 class="text-center">Các Điều Khoản</h3>
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">Điều Khoản Sử Dụng</a></li>
            <li><a data-toggle="tab" href="#menu1">Chính Sách Bảo Mật</a></li>
        </ul>

        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <a href="https://drive.google.com/file/d/155sNh8FUDn2lrn_umTt7aH5jb8Ux6Vx6/view?usp=sharing">Thông Tin
                    Điều Khoản</a>
            </div>
            <div id="menu1" class="tab-pane fade">
                <a href="https://drive.google.com/file/d/1zZaoRY-11q8a-WBE6J6gi2U7ljZ1qqxH/view">Thông Tin Chính
                    Sách</a>
            </div>
        </div>
    </div>
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.81693972803!2d105.7393833750812!3d21.040009480612078!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135096b31fa7abb%3A0xff645782804911af!2zVHLGsOG7nW5nIMSR4bqhaSBo4buNYyBDw7RuZyBuZ2jhu4cgxJDDtG5nIMOB!5e0!3m2!1svi!2s!4v1703059273544!5m2!1svi!2s"
        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>

    <!-- Footer -->
    <footer class="text-center">
        <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
            <span class="glyphicon glyphicon-chevron-up"></span>
        </a><br><br>
    </footer>


    <script>
        $(document).ready(function () {
            // Initialize Tooltip
            $('[data-toggle="tooltip"]').tooltip();

            // Add smooth scrolling to all links in navbar + footer link
            $(".navbar a, footer a[href='#myPage']").on('click', function (event) {

                // Make sure this.hash has a value before overriding default behavior
                if (this.hash !== "") {

                    // Prevent default anchor click behavior
                    event.preventDefault();

                    // Store hash
                    var hash = this.hash;

                    // Using jQuery's animate() method to add smooth page scroll
                    // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 900, function () {

                        // Add hash (#) to URL when done scrolling (default click behavior)
                        window.location.hash = hash;
                    });
                } // End if
            });
        })
    </script>

</body>

</html>