<?php 
extract($data['dshang']);
extract($data['dsnew']);
extract($data['dsloai']);
    // Số bản ghi trên mỗi trang
    $records_per_page = 12;
    
    // Sử dụng array_chunk để phân chia mảng dữ liệu thành các trang nhỏ hơn
    $paginated_data = array_chunk($dsnew, $records_per_page);
    if(!empty($paginated_data)){
        // Xác định trang hiện tại mà người dùng đang xem
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $current_page = max(1, min($current_page, count($paginated_data)));
        // Hiển thị dữ liệu trên trang hiện tại
        $dsnew = $paginated_data[$current_page - 1];
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
  <link rel="stylesheet" href="public/css/style.css">
  <link rel="stylesheet" href="public/css/toast.css">
  <link rel="stylesheet" href="public/css/san_pham.css">
</head>
<body>
    <?php
    include "site/layout/header.php";
    ?>
    <main class="max-w-6xl mx-auto">
        <div class="box-cent">
            <div class="box-left">
                <?php
                    include "boxleft.php";
                ?>
            </div>
                <div class="content">
                    <div class="blog">Tất cả sản phẩm</div>
                    <!-- <div class="view">
                        <div class="sel">
                            <strong>Xếp theo:</strong>
                            <input type="radio" name="sp"><a href="">Hàng mới</a>
                            <input type="radio" name="sp"><a href="">Giá thấp đến cao</a>
                            <input type="radio" name="sp"><a href="">Giá cao xuống thấp</a>
                        </div>
                        <div class="navbar"> Xem:
                            <div class="col">
                                <i class="fa-sharp fa-solid fa-table-cells"></i> Lưới
                            </div>
                            <div class="rol">
                                <i class="fa-solid fa-list"></i> Cột
                            </div>
                        </div>
                    </div> -->
                    <div class="block-ct">
                        <?php
                            $i=0;
                            foreach ($dsnew as $san_pham) {
                                $price=select_gia_min_max_san_pham($id);
                                $hinh=$img_dir.$img;
                                if(($i==2) || ($i==5) || ($i==8)){
                                    $mr="";
                                }else{
                                    $mr="mr";
                                };
                                ?>
                                <div  class="product pb-4 border px-3 <?=$mr?>">
                        <a href="?ctl=product_datail&id=<?=$san_pham['id']?>"><img class="h-[180px] w-full" src="<?= $img_dir.$san_pham['img']?>" alt=""></a>
                        <div class="mt-1">
                            <div class="h-12 overflow-hidden text-ellipsis">
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
                        $i+=1;
                        }
                    ?>
                    </div>
                    <div class="mt-10 text-center">
                <?php 
                if (isset($current_page) && $current_page > 1) {
                    echo "<a class='px-2 py-1 mx-1 hover:text-green-900' href='index.php?ctl=product&page=" . ($current_page - 1) . "'>Pre</a> ";
                  }
                // Hiển thị các liên kết phân trang
                for ($i = 1; $i <= count($paginated_data); $i++) {
                    echo "<a class='" . ($current_page == $i ? 'bg-green-900 text-white' : 'bg-white') . " px-2 py-1 mx-1' href='index.php?ctl=product&page=$i'>$i</a> ";
                }
                    
                if (isset($current_page) && $current_page < count($paginated_data)) {
                    echo "<a class='px-2 py-1 mx-1 hover:text-green-900' href='index.php?ctl=product&page=" . ($current_page + 1) . "'>Next</a> ";
                  }
                ?>
            </div>
                </div>
            </div>
            
    </main>
    <div id="toast"></div>
    <?php require "site/layout/footer.php"?>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="public/js/main.js"></script>
    <script>
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

         const active = document.querySelectorAll(".active");
        const icon = document.querySelectorAll(".fa-chevron-down");
        const clickicon = document.querySelectorAll(".clickicon");
        const icon3 = document.querySelectorAll(".fa-eye");
        const nut = document.querySelectorAll(".nut");
        const closebtn = document.querySelectorAll(".closebtn");
        const ttct = document.querySelectorAll(".ttct");

        clickicon.forEach((item, index) => {
                item.addEventListener("click", () => {
                icon[index].classList.toggle("fa-angle-up");
                icon[index].classList.toggle("fa-angle-down");
                active[index].classList.toggle("down");
            });
        });

        nut.forEach((item, index) => {
                item.addEventListener("click", () => {
                icon3[index].classList.toggle("fa-eye");
                icon3[index].classList.toggle("fa-eye");
                ttct[index].classList.toggle("top");
            });
        });

        closebtn.forEach((item, index) => {
                item.addEventListener("click", () => {
                ttct[index].classList.toggle("top");
            });
        });
    </script>
    </body>
</html>