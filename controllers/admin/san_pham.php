<?php 

function list_san_pham(){
    if(!empty($_POST['keyword'])){
        $keyword=$_POST['keyword'];
        $id_loai=0;
        $list_loai=loai_all();
        $list_sp=select_sp($keyword,$id_loai);
    }else if(!empty($_POST['id_loai'])){
        $keyword="";
        $id_loai=$_POST['id_loai'];
        $list_loai=loai_all();
        $list_sp=select_sp($keyword,$id_loai);
    }else{
        $keyword="";
        $id_loai=0;
        $list_loai=loai_all();
        $list_sp=select_sp($keyword,$id_loai);
    }
    location('/san_pham/san_pham',['list_sp'=>$list_sp,'list_loai'=>$list_loai]);
}

function detail_san_pham_by_id(){
    $id=$_GET['id'];
    $detail_sp=detail_sanpham($id);
    $gia_chi_tiet=chi_tiet_by_sp($id);
    $imgs_sp=select_anh($id);
    location('/san_pham/detail_sp',['detail_sp'=>$detail_sp, 'gia_chi_tiet'=>$gia_chi_tiet, 'imgs_sp'=>$imgs_sp]);
}

function add_sp_page(){
    $list_loai=loai_all();
    $list_hang=hang_all();
    $list_dt=select_dung_tich();
    location('/san_pham/add_sp',['list_loai'=>$list_loai,'list_hang'=>$list_hang,'list_dt'=>$list_dt]);
}
function add_sp_new(){
    if(isset($_POST['btn_add_sp'])){

            if(empty($_POST['ten_sp'])){
                $errors['ten_sp']="Vui lòng điền vào trường này";
            }else if(!empty(check_san_pham($_POST['ten_sp']))){
                $errors['ten_sp']="Sản phẩm này đã tồn tại";
            }else{
                $ten_sp=$_POST['ten_sp'];
            }
        
        if(strlen($_FILES["img"]['name'][0]) == 0) {
            $errors['img'] = 'Vui lòng chọn file!';
        }else {
            for($i=0;$i<count($_FILES['img']['name']);$i++){
                $typeImg = ['png', 'jpg', 'jpeg', 'webp'];
                $typeFile = pathinfo($_FILES["img"]['name'][$i], PATHINFO_EXTENSION);
                if(!in_array(strtolower($typeFile), $typeImg)) {
                    $errors['img'] = 'file phai co dinh dang la png, png, jpeg, webp';
                }
                else {
                    if($_FILES["img"]['size'][$i] > (2*1024*1024) ) {
                        $errors['img'] = 'Kích thước không quá 2MB!';
                    }else{
                        $imgs[]=$_FILES['img']['name'][$i];
                    }
                }
            }
        }

        if(empty($_POST['hang'])){
            $errors['hang'] = 'Vui lòng chọn';
        }else{
            $id_hang=$_POST['hang'];
        }

        if(empty($_POST['loai'])){
            $errors['loai'] = 'Vui lòng chọn';
        }else{
            $id_loai=$_POST['loai'];
        }

        if(empty($_POST['mo_ta'])){
            $errors['mo_ta'] = 'Vui lòng điền vào trường này';
        }else{
            $mo_ta=$_POST['mo_ta'];
        }
        if(empty($_POST['dt'])){
            $errors['dt'] = 'Vui lòng điền vào trường này';
        }else{
            for ($i = 0; $i < count($_POST['dt']); $i++) {
                if ($_POST['gia'][$i] < 1 || $_POST['so_luong'][$i] < 1) {
                    $errors['option_child'][$i] = 'Vui lòng điền giá và số lượng lớn hơn 0';
                } else {
                    $id_dt[] = $_POST['dt'][$i];
                    $gia[] = $_POST['gia'][$i];
                    $so_luong[] = $_POST['so_luong'][$i];
                }
            }
        }
    }
    if(empty($errors)){
        $hinh=save_files('img','/du-an-1/public/img/');
        $id=insert_san_pham($ten_sp,$mo_ta,$id_loai,$id_hang);
        insert_imgs($id,$imgs);
        insert_chi_tiet_sp($id,$id_dt,$gia,$so_luong);
        header('location: index.php?ctl=san_pham');
    }else{
        $list_loai=loai_all();
        $list_hang=hang_all();
        $list_dt=select_dung_tich();
        location('san_pham/add_sp',['errors'=>$errors ,'list_loai'=>$list_loai,'list_hang'=>$list_hang,'list_dt'=>$list_dt]);
    }
}

function edit_sp_page(){
    $id = $_GET['id'];
    $sp=select_sp_by_id_sp($id);
    $list_loai=loai_all();
    $list_hang=hang_all();
    location('san_pham/edit_sp',['sp'=>$sp,'list_hang'=>$list_hang,'list_loai'=>$list_loai]);
}
    function delete_sp(){
        $id = $_GET['id'];
        delete_san_pham($id);
        header('location: index.php?ctl=san_pham');
    }
    function update_sp(){
        if(isset($_POST['btn_update_sp'])){
            $id=$_POST['id'];
            if(empty($_POST['ten_sp'])){
                $errors['ten_sp']="Vui lòng điền vào trường này";
            }else{
                $name=$_POST['ten_sp'];
            }
            if(empty($_POST['hang'])){
                $errors['hang'] = 'Vui lòng chọn';
            }else{
                $id_hang=$_POST['hang'];
            }
    
            if(empty($_POST['loai'])){
                $errors['loai'] = 'Vui lòng chọn';
            }else{
                $id_loai=$_POST['loai'];
            }
    
            if(empty($_POST['mo_ta'])){
                $errors['mo_ta'] = 'Vui lòng điền vào trường này';
            }else{
                $mo_ta=$_POST['mo_ta'];
            }
        }
        if(empty($errors)){
            update_san_pham($id,$name,$mo_ta,$id_loai,$id_hang);
            header('location: index.php?ctl=san_pham');
        }else{
            $sp=select_sp_by_id_sp($id);
            $list_loai=loai_all();
            $list_hang=hang_all();
            location('san_pham/edit_sp',['sp'=>$sp,'list_hang'=>$list_hang,'list_loai'=>$list_loai,'errors'=>$errors]);
        }
    }

    function delete_anh_by_id(){
        $id=$_GET['id'];
        $id_sp=$_GET['sp'];
        delete_anh($id);
        header("location:index.php?ctl=detail_sp&id=$id_sp");

    }
    function add_img(){
        $id_sp=$_GET['id'];
        $typeImg = ['png', 'jpg', 'jpeg', 'webp'];
        $typeFile = pathinfo($_FILES["img"]['name'], PATHINFO_EXTENSION);
        if(!in_array(strtolower($typeFile), $typeImg)) {
            $errors['img'] = 'file phai co dinh dang la png, png, jpeg, webp';
        }else {
            if($_FILES["img"]['size'] > (2*1024*1024) ) {
                $errors['img'] = 'Kích thước không quá 2MB!';
            }else{
                $img=save_file('img','/du-an-1/public/img/');
                }
            }
            if(empty($errors)){
                insert_anh($id_sp,$img);
                header("location:index.php?ctl=detail_sp&id=$id_sp");
            }else{
                $detail_sp=detail_sanpham($id_sp);
                $gia_chi_tiet=chi_tiet_by_sp($id_sp);
                $imgs_sp=select_anh($id_sp);
                location('/san_pham/detail_sp',['detail_sp'=>$detail_sp, 'gia_chi_tiet'=>$gia_chi_tiet, 'imgs_sp'=>$imgs_sp,'errors'=>$errors]);
            }
    }
    function delete_gia_chi_tiet_by_id(){
        $id=$_GET['id'];
        $id_sp=$_GET['id_sp'];
        delete_chi_tiet_sp($id);
        header("location:index.php?ctl=detail_sp&id=$id_sp");
    }
    function chi_tiet_sp_adit_page(){
        $id=$_GET['id'];
        $chi_tiet_sp=select_chi_tiet_sp_by_id($id);
        location('san_pham/edit_chi_tiet_sp',['chi_tiet_sp'=>$chi_tiet_sp]);
    }
    function update_chi_tiet_sp_by_id(){
        $id_sp=$_GET['id_sp'];
        $id=$_POST['id'];

        if(isset($_POST['btn_update_ctsp'])){
            if(empty($_POST['gia'])){
                $errors['gia']="Vui lòng điền vào trường này";
            }else if($_POST['gia']<1){
                $errors['gia']="Giá tiền phải lớn hơn 0";
            }else{
                $gia=$_POST['gia'];
            }

            if(isset($_POST['so_luong']) && $_POST['so_luong']<0){
                $errors['so_luong']="Vui lòng điền vào trường này";
            }else{
                $so_luong=$_POST['so_luong'];
            }   
        }
        if(empty($errors)){
            update_chi_tiet_sp($id,$gia,$so_luong);
            header("location:index.php?ctl=detail_sp&id=$id_sp");
        }else{
            $chi_tiet_sp=select_chi_tiet_sp_by_id($id);
            location('san_pham/edit_chi_tiet_sp',['chi_tiet_sp'=>$chi_tiet_sp,'errors'=>$errors]);
        }
    }
?>
