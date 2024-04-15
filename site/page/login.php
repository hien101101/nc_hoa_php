<?php 
if(isset($data['errors'])){
  extract($data['errors']);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
  <!-- // Add the new slick-theme.css if you want the default styling -->
  <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="tailwind.config.js"></script>
  <link rel="stylesheet" href="public/css/toast.css">
  <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
  <?php
    include "site/layout/header.php";
    
    ?>
    <div class="py-10">
        <div class="w-1/3 mx-auto shadow-2xl py-5">
          <div class="text-center mb-3">
            <h1 class="font-bold text-3xl uppercase">Đăng nhập tài khoản</h1>
          </div>
          <div class="px-10">
            <form action="index.php?ctl=btn_login" method="post">
              <label class="font-bold mt-3 block" for="">Tên tài khoản</label>
              <input class="block rounded h-10 w-full pl-1 border" type="text" name="ten">
              <label class="font-bold mt-3 block" for="">Mật khẩu</label>
              <input class="block mb-3 rounded h-10 w-full pl-1 border" type="password" name="mat-khau">
              <span class="text-red-600"><?php if(isset($errors)) echo $errors['login'] ?></span>
              <div class="mt-8 text-center">
                <button class="w-full rounded-3xl bg-green-900 h-10 text-white hover:bg-[#064a38]" name="btn_login">Đăng Nhập</button>
              </div>
              <div class="flex justify-between items-center mt-5">
                <!-- <a class="text-green-900 hover:underline" href="index.php?ctl=change_pass">Quên mật khẩu</a> -->
                <p>Bạn chưa có tài khoản đăng ký: <a class="text-green-900 hover:underline font-bold" href="?ctl=register">Tại dây</a></p>
              </div>
            </form>
          </div>
        </div>
    </div>
    <div id="toast"></div>
    <?php
    include "site/layout/footer.php";
    ?>

    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <scrip type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="public/js/main.js"></script>
    <script>

      <?php
      if(isset($_COOKIE['mess_re'])){
        echo 'toast({
          title: "Thành công!",
          message: "Bạn đã đăng ký tài khoản thành công.",
          type: "success",
          duration: 5000
          });';
      }
      ?>
    </script>
    
      
</body>
</html>
