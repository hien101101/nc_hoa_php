<?php 
function  don_hang(){
        $user = json_decode($_COOKIE['user'],true);
        $id=$user['id'];
        $don_hang=select_don_hang($id);
        view('page/don_hang',['don_hang'=>$don_hang]);
}

    function insert_dh(){
        if(isset($_POST['btn_checkout'])){
        $user= json_decode($_COOKIE['user'],true);
        $id_kh=$user['id'];
        $total=$_POST['tong_tien'];
            if(empty($_POST['kh_ten'])){
                $errors['kh_ten']="Vui lòng điền vào trường này";
            }else{
                $ten_kh=$_POST['kh_ten'];
            }

            if(empty($_POST['kh_diachi'])){
                $errors['kh_diachi']="Vui lòng điền vào trường này";
            }else{
                $dia_chi=$_POST['kh_diachi'];
            }
            if(empty($_POST['kh_dienthoai'])){
                $errors['kh_dienthoai']="Vui lòng điền vào trường này";
            }else{
                $sdt=$_POST['kh_dienthoai'];
            }

            if(empty($_POST['van_chuyen'])){
                $errors['van_chuyen']="Vui lòng điền vào trường này";
            }else{
                $van_chuyen=$_POST['van_chuyen'];
            }
        }
        if(empty($errors)){
            $id_dh=insert_don_hang($id_kh,$dia_chi,$van_chuyen,$ten_kh,$sdt,$total);
            $id_sp=$_POST['id_sp'];
            $so_luong=$_POST['so_luong'];
            $gia=$_POST['gia'];
            $id_dt=$_POST['dung_tich'];
            insert_chi_tiet_don_hang($id_sp,$id_dt,$so_luong,$gia,$id_dh);
            delete_gio_hang_by_kh($id_kh);
            for($i=0;$i<count($id_sp);$i++){
                $chi_tiet_so_luong=chi_tiet_sp_bill($id_sp[$i],$id_dt[$i]);
                $inventory=$chi_tiet_so_luong['so_luong'] - $so_luong[$i];
                update_chi_tiet_sp_to_checkout($id_sp[$i],$id_dt[$i],$inventory);
            }
            header('location: index.php?ctl=don_hang');
        }else{
            $list_cart=select_cart($id_kh);
            $van_chuyen=select_van_chuyen();
            $count_cart=count_cart($user['id']);
            view('/page/bill',['list_cart'=>$list_cart,'van_chuyen'=>$van_chuyen,'errors'=>$errors,'count_cart'=>$count_cart]);
        }
    }

    function cancel_dh(){
        $id=$_GET['id'];
        $trang_thai=4;
        $list=select_ctdh_by_bill($id);
        print_r($list);
        for($i=0;$i<count($list);$i++){
            echo $list[$i]['so_luong'];
            $chi_tiet_so_luong=chi_tiet_sp_bill($list[$i]['id_san_pham'],$list[$i]['id_dung_tich']);
            $inventory=$list[$i]['so_luong']+$chi_tiet_so_luong['so_luong'];
            update_chi_tiet_sp_to_checkout($list[$i]['id_san_pham'],$list[$i]['id_dung_tich'],$inventory);
        }
        update_don_hang($id, $trang_thai);
        header('location: index.php?ctl=don_hang');
    }

?>