<?php
    $connect = mysqli_connect ('localhost', 'root', '', 'webphp') or die ('Không thể kết nối tới database');
    mysqli_set_charset($connect, 'UTF8');
    if($connect) {
        echo "";
    }
?>