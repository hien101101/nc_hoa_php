<?php 
extract($yeu_thich);
global $img_dir;
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
    <?php require "site/layout/header.php" ?>
    <main class="max-w-6xl mx-auto">
      <h2 class="mt-20 text-3xl font-medium">Sản phẩm yêu thích</h2>
      <div class="grid grid-cols-3 gap-4 mt-10">
        <?php 
        foreach($yeu_thich as $yt){
          $gia = select_gia_min_max_san_pham($yt['id_san_pham'])
          ?>
          <div class="flex align-top p-3 shadow-lg">
          <img class="h-[100px] w-[100px]" src="<?=$img_dir.$yt['img']?>" alt="">
          <div class="ml-3">
            <h2 class="text-2xl text-[#064a38] font-medium cursor-pointer"><?=$yt['name_sp']?></h2>
            <p class="font-medium">Thương hiệu: <?=$yt['name_hang']?></p>
            <p class="font-medium">Loại: <?=$yt['name_loai']?></p>
            <p class="font-medium">Giá: <?=number_format($gia['gia_min'])?> đ - <?=number_format($gia['gia_max'])?> đ</p>
          </div>
        </div>
          <?php
        }
        
        ?>
      </div>
    </main>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    </body>
    <?php require "site/layout/footer.php" ?>
</html>