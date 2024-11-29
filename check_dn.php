<?php 
session_start();
  include("connectdb.php");
  
    if(isset($_POST["dangnhap"])){
      $username = $_POST["username"];
      $password = $_POST["password"];
      $sqlselect = "SELECT * FROM taikhoan";
      $check0 = 0;
      $result = mysqli_query($connect, $sqlselect);
      if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
          $check_username = $row["username"];
          $check_password = $row["password"];
          $check_duyet = $row["duyet"];
          if($username == $check_username && $password == $check_password && $check_duyet == "on"){
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $check0 = 1; 
            break;
          }
          elseif($username == $check_username && $password == $check_password && $check_duyet == "off"){
            $check0 = 2;
            break;
          }
        }      
      }
      if($check0 == 0){
        echo "<script>alert('Tài khoản hoặc mật khẩu không chính xác');</script>";
        echo "<script>setTimeout(function(){ window.location.href = 'dangnhap.html'; }, 0);</script>";  
      }
      elseif($check0 == 2){
        echo "<script>alert('Tài khoản chưa được duyệt');</script>";
        echo "<script>setTimeout(function(){ window.location.href = 'index.php'; }, 0);</script>";  
      }
      elseif($check0 == 1){
        header("Location:index.php");
      }
    }
?>