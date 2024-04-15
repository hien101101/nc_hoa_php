<?php 
function list_loai(){
    $list_loai=loai_all();
    location('loai/loai',['list_loai'=>$list_loai]);
}
function add_loai_page(){
    location('loai/add_loai');
}
function add_loai_new(){
    if(isset($_POST['btn_add_loai'])){
        $typeImg = ['png', 'jpg', 'jpeg', 'webp'];
        $typeFile = pathinfo($_FILES["img"]['name'], PATHINFO_EXTENSION);
        if(strlen($_FILES["img"]['name']) == 0) {
            $errors['img'] = 'Vui lòng chọn file!';
        }else {
            if(!in_array(strtolower($typeFile), $typeImg)) {
                $errors['img'] = 'file phai co dinh dang la png, png, jpeg, webp';
            }
            else {
                if($_FILES["img"]['size'] > (2*1024*1024) ) {
                    $errors['img'] = 'Kích thước không quá 2MB!';
                }
            }
        }

        if($_POST['ten_loai']==""){
            $errors['ten_loai']="Vui lòng điền vào trường này";
        }else if(!empty(check_loai($_POST['ten_loai']))){
            $errors['ten_loai']="Loại này đã tồn tại";
        }else{
            $tenloai=$_POST['ten_loai'];
        }         
    }

    if(empty($errors)){
            $hinh=save_file('img','/du-an-1/public/img/');
            add_loai($tenloai,$hinh);
            header('location: index.php?ctl=loai');
    }else{
        location('/loai/add_loai',['errors'=>$errors]);
    }
}
function edit_loai(){
    $id_loai=$_GET['id'];
    $loai=select_loai_by_id($id_loai);
    location('loai/edit_loai',['loai'=>$loai]);
}


function update_loai_by_id(){
    if(isset($_POST['btn_update_loai'])){
        if(empty($_POST['ten_loai'])){
            $errors['ten_loai']="Vui lòng điền vào trường này";
        }else{
            $ten_loai=$_POST['ten_loai'];
        }

        $typeImg = ['png', 'jpg', 'jpeg', 'webp'];
        $typeFile = pathinfo($_FILES["img_loai"]['name'], PATHINFO_EXTENSION);
        if(strlen($_FILES["img_loai"]['name']) == 0 && isset($_POST['old_img_loai'])){
            $hinh=$_POST['old_img_loai'];
        }else if(strlen($_FILES["img_loai"]['name']) == 0 ) {
            $errors['img_loai'] = 'Vui lòng chọn file!';
        }
        else {
            if(!in_array(strtolower($typeFile), $typeImg)) {
                $errors['img_loai'] = 'file phai co dinh dang la png, png, jpeg, webp';
            }
            else {
                if($_FILES["img_loai"]['size'] > (2*1024*1024) ) {
                    $errors['img_loai'] = 'Kích thước không quá 2MB!';
                }else{
                $hinh=save_file('img_loai','/du-an-1/public/img/');
                }
            }
        }
    }
    if(empty($errors)){
        $id_loai=$_POST['id_loai'];
        update_loai($id_loai,$ten_loai,$hinh);
        location('/loai/loai');
        header('location: index.php?ctl=loai');
    }else{
        location('loai/edit_loai',['errors'=>$errors]);
    }
}
function delete_loai_by_id(){
    $id_loai=$_GET['id'];
    delete_loai($id_loai);
    header('location:index.php?ctl=loai');
}
?>