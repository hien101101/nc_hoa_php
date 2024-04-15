<?php
    function list_don_hang(){
        $list_don_hang=don_hang_all();
        location('don_hang/don_hang',['list_don_hang'=>$list_don_hang]);
    }

    function get_ttdh($n){
        switch ($n) {
            case '0':
                $tt="Chờ xác nhận";
            break;
            case '1':
                $tt="Xác nhận thành công";
            break;
            case '2':
                $tt="Đang vận chuyển";
            break;
            case '3':
                $tt="Hoàn thành";
            break;
            default:
                $tt="Đã hủy";
            break;
        }
        return $tt;
    }

    function edit_don_hang(){
        $id_don_hang=$_GET['id'];
        $don_hang=select_don_hang_admin($id_don_hang);
        location('don_hang/edit_don_hang',['don_hang'=>$don_hang]);
    }

    function update_don_hang_by_id(){
        if(isset($_POST['btn_update_don_hang'])){
            if(empty($_POST['trang_thai'])){
                $errors['trang_thai']="Vui lòng điền vào trường này";
            }else{
                $trang_thai=$_POST['trang_thai'];
            }
        }
        print_r($_POST);
        if(empty($errors)){
            $id=$_POST['id'];
            update_don_hang($id,$trang_thai);
            header('location: index.php?ctl=quan_li_don_hang');
        }else{
            location('don_hang/edit_don_hang',['errors'=>$errors]);
        }
    }
    function ct_don_hang_admin(){
        $id=$_GET['id'];
        $don_hang=select_don_hang_by_id($id);
        $ct_don_hang=select_chi_tiet_don_hang($don_hang['id']);
        location('/don_hang/chi_tiet_don_hang',['don_hang'=>$don_hang,'ct_don_hang'=>$ct_don_hang]);
    }
?>