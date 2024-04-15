<?php 
  if(isset($_COOKIE["user"])){
    $user=json_decode($_COOKIE["user"],true);
    $count_Wishlist=count_wishlist($user['id']);
    $count_cart=count_cart($user['id']);
  }
?>
<header>
      <div class="bg-[#064a38]">
        <div class="max-w-6xl mx-auto">
          <div class="flex justify-between items-center h-[88px]">
            <div class="">
            <form action="index.php?ctl=product" method="post"class="bg-white rounded-lg overflow-hidden px-2">
              <input class="h-10 w-56 outline-none" type="text" placeholder="Tìm sản phẩm" name="kyw">
              <button class="w-7" type="submit" name="timkiem" value="Tìm" id=""><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
              <!-- <form action="index.php?ctl=sanpham" method="post" class="bg-white rounded-lg overflow-hidden px-2">
                <input class="h-10 w-56 outline-none" name="kyw" type="text" placeholder="Tìm kiếm sản phẩm">
                <button class="w-7" name="timkiem"><i class="fa-solid fa-magnifying-glass"></i></button>
              </form> -->
            </div>
            <div>
              <a href="index.php"><img src="public/img/logo.webp" alt=""></a>
            </div>
            <div class="flex items-center">
              <div class="border-r border-white text-xl p-3 text-white flex items-center">
                <div class="relative mr-3">
                  <a href="?ctl=yeu_thich">
                  <i class="px-2 cursor-pointer fa-solid fa-heart"></i>
                  <p id="count_wl" class="w-4 h-4 rounded-full absolute -top-1 -right-1 text-xs bg-red-500 text-center" >
                    <?php if(isset($count_Wishlist['count'])){
                      echo $count_Wishlist['count'];
                      }else echo "0";
                      ?>
                  </p>
                  </a>
                </div>
                <div class="relative">
                  <a href="index.php?ctl=cart"><i class="px-2 cursor-pointer fa-solid fa-cart-shopping"></i></a>
                  <button class="w-4 h-4 rounded-full absolute -top-1 right-0 text-xs bg-red-500 text-center" >
                    <?php 
                    if(isset($count_cart['count'])){
                      echo $count_cart['count'];
                    } else echo "0"
                      ?>
                  </button>
                </div>
              </div>
              <div class="account ml-3 relative">
                <?php
                if(isset($_COOKIE["user"])){
                  $user=json_decode($_COOKIE["user"],true);
                  ?>
                  <h2 class="text-white cursor-default">Xin Chào:<br> <span><?php echo $user['user_name']?></span></h2>
                  <div class="account_menu">
                    <ul class=" w-max shadow-lg bg-white p-3">
                      <!-- <li class="px-2 py-1"><a class="p-1 transition ease-linear duration-300 hover:text-green-700" href="#">Thông tin</a></li> -->
                      <li class="px-2 py-1"><a class="p-1 transition ease-linear duration-300 hover:text-green-700" href="?ctl=don_hang">Đơn hàng</a></li>
                      <li class="px-2 py-1"><a class="p-1 transition ease-linear duration-300 hover:text-green-700" href="?ctl=change_pass">Đổi mật khẩu</a></li>
                      <li class="px-2 py-1"><a class="p-1 transition ease-linear duration-300 hover:text-green-700" href="?ctl=logout">Đăng xuất</a></li>               
                    </ul>
                  </div>
                  <?php
                }else{
                  ?>
                  <a class="text-white text-base block hover:text-gray-300" href="?ctl=login">Đăng nhập</a>
                  <a class="text-white text-base block hover:text-gray-300" href="?ctl=register">Đăng kí</a>
                  <?php
                }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="p-3">
        <div class="max-w-6xl mx-auto">
          <ul class="flex items-center h-10 justify-between">
            <li><a class="p-3 text-xl font-semibold transition-colors duration-300 hover:text-green-700" href="index.php">Trang chủ</a></li>
            <li><a class="p-3 text-xl font-semibold transition-colors duration-300 hover:text-green-700" href="#">Giới thiệu</a></li>
            <li class="item_menu_2 relative">
              <a href="?ctl=product" class="p-3 text-xl font-semibold transition-colors duration-300 hover:text-green-700" >Sản phẩm</a>
              
            </li>
            <li class="item_menu relative ">
              <p class=" p-3 text-xl font-semibold transition-colors duration-300 hover:text-green-700 cursor-pointer" >Thương hiệu <i class="text-sm fa-solid fa-chevron-right"></i></p>
              <div class="menu_child absolute top-[100%] left-0 pt-4 z-10">
                <ul class=" grid grid-cols-4  w-[600px] shadow-lg bg-white p-3">
                <?php
                  $list_hang=hang_all();
                  foreach($list_hang as $hang ){
                    ?>
                      <li class="px-2 py-1"><a class="p-1 transition ease-linear duration-300 hover:text-green-700" href="index.php?ctl=product&id_hang=<?=$hang['id']?>"><?=$hang['name']?></a></li>
                    <?php
                  }
                  ?>
                </ul>
              </div>
            </li>
            <!-- loai -->
            <li class="item_menu_2 relative">
              <p class="p-3 text-xl font-semibold transition-colors duration-300 hover:text-green-700 cursor-pointer" >Nước hoa <i class="text-sm fa-solid fa-chevron-right"></i></p>
              <div class="menu_child_2 absolute top-[100%] left-0 pt-4 z-10">
                <ul class="w-max shadow-lg bg-white p-3">
                  <?php 
                  $list_loai=loai_all();
                  foreach($list_loai as $loai ){
                    ?>
                      <li class="px-2 py-1"><a class="p-1 transition ease-linear duration-300 hover:text-green-700" href="index.php?ctl=product&id-loai=<?=$loai['id']?>"><?=$loai['name']?></a></li>
                    <?php
                  }
                  ?>
                </ul> 
              </div>
            </li>
            <!-- <li class="item_menu_2 relative">
              <a class="p-3 text-xl font-semibold transition-colors duration-300 hover:text-green-700" href="#">Nước hoa chiết <i class="text-sm fa-solid fa-chevron-right"></i></a>
              <div class="menu_child_2 absolute top-[100%] left-0 pt-4 z-10">
                <ul class="w-max shadow-lg bg-white p-3">
                  <li class="px-2 py-1"><a class="p-1 transition ease-linear duration-300 hover:text-green-700" href="#">Nước hoa chiết nam</a></li>
                  <li class="px-2 py-1"><a class="p-1 transition ease-linear duration-300 hover:text-green-700" href="#">Nước hoa chiết nữ</a></li>               
                </ul>
              </div>
            </li> -->
            <li><a class="p-3 text-xl font-semibold transition-colors duration-300 hover:text-green-700" href="#">Hỏi đáp</a></li>
            <li><a class="p-3 text-xl font-semibold transition-colors duration-300 hover:text-green-700" href="#">Liên hệ</a></li>
          </ul>
        </div>
      </div>
</header>