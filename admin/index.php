<?php 
require "../global.php";
require "../model/connection.php";
require "../model/loai.php";
require "../model/hang.php";
require "../model/user.php";
require "../model/anh_san_pham.php";
require "../model/san_pham.php";
require "../model/don_hang.php";
require "../model/dung_tich.php";
require "../model/chi_tiet_sp.php";
require "../model/chi_tiet_don_hang.php";
require "../controllers/admin/doashboard.php";
require "../controllers/admin/loai.php";
require "../controllers/admin/hang.php";
require "../controllers/admin/user.php";
require "../controllers/admin/don_hang.php";
require "../controllers/admin/san_pham.php";
require "../controllers/site/chi_tiet_don_hang.php";

$ctl= $_GET['ctl'] ?? '';
switch($ctl){
    case "":
    case "dashboard":
        dashboard();
        break;
    case "loai":
        list_loai();
        break;
    case "add_loai":
        add_loai_page();
        break;
    case "add_new_loai":
        add_loai_new();
        break;
    case "edit_loai":
        edit_loai();
        break;
    case "update_loai":
        update_loai_by_id();
        break;
    case "delete_loai":
        delete_loai_by_id();
        break;
    case "hang":
        list_hang();
        break;
    case "add_hang":
        add_hang_page();
        break;
    case "add_new_hang":
        add_hang_new();
        break;
    case "edit_hang":
        edit_hang();
        break;
    case "update_hang":
        update_hang_by_id();
        break;
    case "delete_hang":
        delete_hang_by_id();
        break;
    case "user":
        list_user();
        break;
    case "add_user":
        add_user_page();
        break;
    case "add_new_user":
        add_user_new();
        break;
    case "edit_user":
        edit_user();
        break;
    case "update_user":
        update_user_by_id();
        break;
    case "delete_user":
        delete_user_by_id();
        break;
    case "san_pham":
        list_san_pham();
        break;
    case "detail_sp":
        detail_san_pham_by_id();
        break;
    case "add_sp":
        add_sp_page();
        break;
    case "add_new_sp":
        add_sp_new();
        break;
    case "delete_sp":
        delete_sp();
        break;
    case "edit_sp":
        edit_sp_page();
        break;
    case 'update_sp':
        update_sp();
        break;
    case "delete_img":
        delete_anh_by_id();
        break;
    case "insert_img":
        add_img();
        break;
    case "delete_chi_tiet_sp":
        delete_gia_chi_tiet_by_id();
        break;
    case "edit_chi_tiet_sp":
        chi_tiet_sp_adit_page();
        break;
    case "update_chi_tiet_sp":
        update_chi_tiet_sp_by_id();
        break;
        case "quan_li_don_hang":
            list_don_hang();
            break; 
        case "edit_don_hang":
            edit_don_hang();
            break; 
        case "update_don_hang":
            update_don_hang_by_id();
            break;
        case 'ct_don_hang':
            ct_don_hang_admin();
            break;
            default: echo "Page not pound";
    
    }
    
?>