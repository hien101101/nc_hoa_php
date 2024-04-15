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
  <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
  <?php
    include "site/layout/header.php";
    ?>
    <div class="py-10">
        <div class="w-1/3 mx-auto shadow-2xl py-5">
          <div class="text-center mb-3">
            <h1 class="font-bold text-3xl uppercase">Đổi mật khẩu</h1>
          </div>
          <div class="px-10">
            <?php if(isset($_COOKIE['user'])){
              $user=json_decode($_COOKIE['user'],true);
            }?>
            <form action="index.php?ctl=btn_change" method="post">
              <label class="font-bold mt-3 block" for="">Tên tài khoản</label>
              <input class="block rounded h-10 w-full pl-1 border" type="text" name="ten" value="<?php if(isset($user)){ echo $user['user_name'];}?>" readonly>
              <label class="font-bold mt-3 block" for="">Mật khẩu</label>
              <input class="block rounded h-10 w-full pl-1 border" type="password" name="mat-khau">
              <label class="font-bold mt-3 block" for="">Nhập mật khẩu mới</label>
              <input class="block rounded h-10 w-full pl-1 border" type="password" name="mat-khau-new">
              <label class="font-bold mt-3 block" for="">Nhập lại mật khẩu mới</label>
              <input class="block rounded h-10 w-full pl-1 border" type="password" name="mat-khau-new-2">
              <span class="text-red-600"><?php if(isset($errors['change_pass'])) echo $errors['change_pass']?></span>
              <div class="mt-8 text-center">
                <button class="w-full rounded-3xl bg-green-900 h-10 text-white hover:bg-[#064a38]" name="btn_change-pass">Xác nhận</button>
              </div>
            </form>
          </div>
        </div>
    </div>
    <?php
    include "site/layout/footer.php";
    ?>

    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
</body>
</html>