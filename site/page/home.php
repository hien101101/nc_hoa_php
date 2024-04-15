<?php 
if(isset($data['messenger'])){
  extract($data['messenger']);
}
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
  <link rel="stylesheet" href="public/css/toast.css">
  <link rel="stylesheet" href="public/css/style.css">
</head>
<body >
    <?php
    include "site/layout/header.php";
    ?>
    
    <div class="slide-show">
       <div><img class="h-[700px] w-full" src="public/img/slider_1.webp" alt=""></div>
       <div><img class="h-[700px] w-full" src="public/img/slider_2.webp" alt=""></div>
       <div><img class="h-[700px] w-full" src="public/img/slider_3.webp" alt=""></div>
    </div>
    <?php 
    foreach($list_loai as $loai ){
    ?>
      <section class="perfume_men_product mt-10">
      <div class="max-w-6xl mx-auto">
        <div class="bg-[#064a38] p-2">
          <a href="index.php?ctl=sanpham&id_loai=<?=$loai['id']?>"><h2 class="font-bold uppercase text-white"><?=$loai['name']?></h2></a>          
        </div>
        <div class="banner_product relative">
          <a href="index.php?ctl=sanpham&id_loai=<?=$loai['id']?>"><img src="<?=$img_dir.$loai['anh']?>" alt=""></a>
        </div>
        <div class="product_list mt-10">
          <div class=" grid grid-cols-5 gap-4">
            <?php 
            $id_loai=$loai['id'];
            $list_sanPham=select_san_pham_by_loai_limit_10($id_loai);
            foreach($list_sanPham as $san_pham){
              ?>
              <div  class="product pb-4 border px-3">
              <a href="?ctl=product_datail&id=<?=$san_pham['id']?>"><img class="h-[205px] w-full" src="<?= $img_dir.$san_pham['img']?>" alt=""></a>
              <div class="mt-1">
                <div class="h-12">
                  <a href="?ctl=product_datail&id=<?=$san_pham['id']?>"><h3 class="name_product font-semibold hover:text-green-900"><?=$san_pham['name']?></h3></a>
                </div>
                <div class="">
                  <span><i class="text-sm text-yellow-400 fa-regular fa-star"></i></span>
                  <span><i class="text-sm text-yellow-400 fa-regular fa-star"></i></span>
                  <span><i class="text-sm text-yellow-400 fa-regular fa-star"></i></span>
                  <span><i class="text-sm text-yellow-400 fa-regular fa-star"></i></span>
                  <span><i class="text-sm text-yellow-400 fa-regular fa-star"></i></span>
                </div>
                <div>
                  <div class=" text-green-900 font-semibold h-10 relative">
                    <div class="price_product relative">
                      <?php
                      // hiển thị giá min và max
                        $gia_san_pham=select_gia_min_max_san_pham($san_pham['id']);

                      ?>
                      <span><?php echo number_format($gia_san_pham['gia_min'])?>đ</span><span class="mx-1">-</span><span><?php echo number_format($gia_san_pham['gia_max'])?>đ</span>
                    </div>
                    <div class="interact_product h-[32px]">
                      <!-- <button class="btn_product border border-green-900 rounded w-8 h-8 hover:bg-green-900"><i class="icon_product text-green-900 fa-solid fa-cart-plus"></i></button> -->
                      <form action="index.php?ctl=product_datail&id=<?=$san_pham['id']?>" class="inline-flex" method="post">
                        <button class="btn_product border border-green-900 rounded w-8 h-8 hover:bg-green-900"><i class="icon_product text-green-900 fa-regular fa-eye"></i></button>
                      </form>
                      <button value="<?=$san_pham['id']?>" class="btn_wishlist btn_product inline border border-green-900 rounded w-8 h-8 hover:bg-green-900
                      <?php 
                      // check yêu thích sản phẩm
                      if(isset($data['yeu_thich'])){
                        extract($data['yeu_thich']);
                        $i=0;$count=count($yeu_thich);
                      for($i;$i<$count;$i++){
                        if($yeu_thich[$i]['id_san_pham']==$san_pham['id']){
                          echo "bg-green-900 text-white";
                        }
                      }
                      }
                      ?>">
                      <i class="icon_product text-inherit fa-regular fa-heart"></i></button>
                    </div>
                  </div>
                </div> 
              </div>
            </div>
              <?php
            }
            ?>
          </div>
        </div>
        <div class="text-center mt-10">
          <a href="index.php?ctl=product&id_loai=<?=$loai['id']?>" class="px-4 py-2 bg-[#064a38] text-white hover:bg-green-950">Xem tất cả <i class="text-xs fa-solid fa-caret-right"></i></a>
        </div>
      </div>
    </section>
    <?php
    }
    ?>
    <div id="toast"></div>
    <?php require "site/layout/footer.php"?>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="public/js/main.js"></script>
    <script type="text/javascript" src="slick/slick.min.js"></script>
    <script>
      <?php if(isset($_COOKIE['mess_login'])){
        echo '
        toast({
          title: "Thành công",
          message: "' . $_COOKIE["mess_login"] . '",
          type: "success",
          });
        ';
      }?>
      <?php if(isset($_COOKIE['change_pass'])){
        echo '
        toast({
          title: "Thành công",
          message: "' . $_COOKIE["change_pass"] . '",
          type: "success",
          });
        ';
      }?>

      var btn_wishlist=document.querySelectorAll('.btn_wishlist');
      
      function wishList(index){
        let count_wl=document.getElementById('count_wl').innerText;
        let int_count=parseInt(count_wl);
        let data=btn_wishlist[index].value;
        let html = new XMLHttpRequest();
        html.open('post','http://localhost/du-an-1/ajax/yeu_thich.php',true);
        html.setRequestHeader('X-Requested-With', 'wishlist');
        html.onreadystatechange = function(){
          if(html.readyState===4 && html.status===200){
           let repo=html.responseText;
          //  console.log(repo);
           if(repo==1){
             btn_wishlist[index].classList.add('bg-green-900');
             btn_wishlist[index].classList.add('text-white');
             int_count++;
             document.getElementById('count_wl').innerText = "" + int_count;
             toast({
              title: "Thành công",
              message: "Đã thêm sản phẩm vào danh mục yêu thích thành công",
              type: "success",
              });
           }else if(repo==2){
            btn_wishlist[index].classList.remove('bg-green-900');
            btn_wishlist[index].classList.remove('text-white');
            int_count--;
            document.getElementById('count_wl').innerText = "" + int_count;
            toast({
              title: "Thành công",
              message: "Đã bỏ sản phẩm khỏi danh mục yêu thích",
              type: "success",
              });
           }else{
              toast({
              title: "Thất bại",
              message: repo,
              type: "error",
              });
           }
          }
        }
        html.send(data);
      }
      btn_wishlist.forEach((item,index)=>{
        item.addEventListener('click',e=>{
          console.log(e.target);
          wishList(index);
        })
      });

    $(document).ready(function(){
      $(".slide-show").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1000,
      });
    });
    </script>
</body>
</html>