<?php
require "global.php";
require "model/connection.php";
require "model/gio_hang.php";
require "model/change_pass.php";
require "model/chi_tiet_gio_hang.php";
require "model/dung_tich.php";
require "model/hang.php";
require "model/loai.php";
require "model/san_pham.php";
require "model/user.php";
require "model/van_chuyen.php";
require "model/anh_san_pham.php";
require "model/chi_tiet_don_hang.php";
require "model/yeu_thich.php";
require "model/don_hang.php";
require "model/chi_tiet_sp.php";
require "controllers/site/home.php";
require "controllers/site/chi_tiet_san_pham.php";
require "controllers/site/don_hang.php";
require "controllers/site/yeu_thich.php";
require "controllers/site/san_pham.php";
require "controllers/site/bill.php";
require "controllers/site/cart.php";
require "controllers/site/user.php";
require "controllers/site/chi_tiet_don_hang.php";

 $ctl= $_GET['ctl'] ?? '';
 switch($ctl){
  case '':
  case 'home':
    home_page();
    break;
  case 'login':
    login();
    break;
  case 'register':
    register();
    break;
  case "btn_login":
    user_login();
    break;
  case "btn_register":
    user_register();
    break;
  case 'change_pass':
    change_pass();
    break;
  case 'logout':
    user_logout();
    break;
  case 'product':
    san_pham();
    break;
  case 'btn_change':
    update_pass();
    break;
  case "don_hang":
    don_hang();
    break;
  case 'product_datail':
    chi_tiet_san_pham();
    break;
  case 'add_to_cart':
    add_cart();
    break;
  case 'checkout':
    insert_dh();
    break;
  case 'delete_sp_cart':
    delete_cart();
  case 'checkout_cart':
    checkout_cart();
    break;
  case 'cart':
    list_cart();
    break;
  case 'yeu_thich':
    yeu_thich();
    break;
  case 'ct_don_hang':
    ct_don_hang_page();
    break;
  case 'cancel_dh':
    cancel_dh();
    break;
  default: echo "Page not pound";
  
 }
?>