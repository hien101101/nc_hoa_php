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
  <?php require "site/layout/header.php"?>
    <div class="py-10">
        <div class="w-2/5 mx-auto shadow-2xl py-5">
          <div class="text-center">
            <h1 class="font-bold text-3xl uppercase">Đăng ký tài khoản</h1>
          </div>
          <div class="px-10">
            <form action="index.php?ctl=btn_register" method="post">
              <label class="font-bold mt-3 block" for="">Họ tên</label>
              <input class="block rounded h-10 w-full pl-1 border" type="text" name="ten">
              <span class="text-red-600"><?php if(isset($errors['ten'])) echo $errors['ten']?></span>
              <label class="font-bold mt-3 block" for="">Email</label>
              <input class="block rounded h-10 w-full pl-1 border" type="email" name="email">
              <span class="text-red-600"><?php if(isset($errors['email'])) echo $errors['email']?></span>
              <label class="font-bold mt-3 block" for="">Mật khẩu</label>
              <input class="block rounded h-10 w-full pl-1 border" type="password" name="mat-khau">
              <span class="text-red-600"><?php if(isset($errors['mat-khau'])) echo $errors['mat-khau']?></span>
              <label class="font-bold mt-3 block" for="">Nhập lại mật khẩu</label>
              <input class="block rounded h-10 w-full pl-1 border" type="password" name="mat-khau-2">
              <span class="text-red-600"><?php if(isset($errors['mat-khau-2'])) echo $errors['mat-khau-2']?></span>
              <div class="text-center mt-5">
                <button class="bg-green-900 w-24 h-10 text-white hover:bg-[#064a38] mr-3" name="btn_re">Đăng ký</button>
                <a class="text-green-900 hover:underline" href="index.php?ctl=login">Đăng nhập</a>
              </div>
            </form>
          </div>
        </div>
    </div>
    <?php require "site/layout/footer.php"?>

    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
</body>
</html>
