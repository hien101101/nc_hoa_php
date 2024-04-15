<?php
function list_hang(){
    $list_hang=hang_all();
    location('hang/hang',['list_hang'=>$list_hang]);
}
function add_hang_page(){
    location('hang/add_hang');
}
function add_hang_new(){
    if(isset($_POST['btn_add_hang'])){
        $hang=check_hang($_POST['ten_hang']);
        if(empty($_POST['ten_hang'])){
            $errors['ten_hang']="Vui lòng điền vào trường này";
        }else if(!empty(check_hang($_POST['ten_hang']))){
            $errors['ten_hang']="Hãng này đã tồn tại";
        }else{
            $ten_hang=$_POST['ten_hang'];
        }
    }
        if(empty($errors)){
            add_hang($ten_hang);
            header('location: index.php?ctl=hang');
        }else{
            location('hang/add_hang',['errors'=> $errors]);
        }   
    }

function edit_hang(){
    $id_hang=$_GET['id'];
    $hang=select_hang_by_id($id_hang);
    location('hang/edit_hang',['hang'=>$hang]);
}
function update_hang_by_id(){
    if(isset($_POST['btn_update_hang'])&& $_POST['ten_hang'] != ""){
        $id_hang=$_POST['id_hang'];
        $ten_hang=$_POST['ten_hang'];
        update_hang($id_hang, $ten_hang);
        // location('/hang/hang');
        header('location: index.php?ctl=hang');
    }else{
        $eross['ten_hang']="Vui lòng điền vào trường này";
        location('hang/add_hang',['eross'=>$eross]);
    }
}
function delete_hang_by_id(){
    $id_hang=$_GET['id'];
    delete_hang($id_hang);
    header('location:index.php?ctl=hang');
}
?>