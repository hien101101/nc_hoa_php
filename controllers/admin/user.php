<?php 
function list_user(){
    $list_user=user_all();
    location('/user/user',['list_user'=>$list_user]);
}
function add_user_page(){
    
    location('/user/add_user');
}
function edit_user(){
    $id=$_GET['id'];
    $user=select_user_by_id($id);
    location('/user/edit_user',['user'=>$user]);
}

function update_user_by_id(){
    if(isset($_POST['btn_update_user'])){
        $id=$_POST['id'];
        if(empty($_POST['user_name'])){
            $errors['user_name']="Vui lòng điền vào trường này";
        }else{
                $name=$_POST['user_name'];
            }
        }
        if(empty($_POST['email'])){
            $errors['email']="Vui lòng điền vào trường này";
         }else
        if(!preg_match("/^[A-Za-z0-9_.]{4,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/",$_POST['email'])){
            $errors['email']="Chưa nhập đúng định dạng email";
        }else{
            $email=$_POST['email'];
        }
        
        if(isset($_POST['vai_tro']) && ($_POST['vai_tro'] == '0' || $_POST['vai_tro'] == '1')){
        
            $vai_tro=$_POST['vai_tro'];
        }else{
            $errors['vai_tro']="Vui lòng điền vào trường này";
        }
        
        if(empty($_POST['confirm_mat_khau'])){
            $errors['confirm_mat_khau']="Vui lòng điền vào trường này";
         }

        if(empty($_POST['mat_khau'])){
            $errors['mat_khau']="Vui lòng điền vào trường này";
         }else 
         if(!preg_match("/^[a-zA-Z0-9!@#$%^&*]+$/",$_POST['mat_khau'])){
            $errors['mat_khau']="Vui lòng nhập mật khẩu có ít nhất 1 chữ số và độ dài từ 6 đến 20 kí tự";
        }else if($_POST['mat_khau'] != $_POST['confirm_mat_khau']){
            $errors['confirm_mat_khau']="Xác nhận mật khẩu không chính xác";
        }else{
            $mat_khau=$_POST['mat_khau'];
        }
        
        if(empty($errors)){  
        update_user($name,$email,$vai_tro,$mat_khau,$id);
        header("location: index.php?ctl=user");
        }else{
        $user=select_user_by_id($id);
        location('/user/edit_user',['user'=>$user,'errors'=>$errors]);
        }
    }

function delete_user_by_id(){
    $id=$_GET['id'];
    delete_user($id);
    header('location: index.php?ctl=user');
}
function add_user_new(){
    if(isset($_POST['btn_add_user'])){

        if(empty($_POST['user_name'])){
            $errors['user_name']="Vui lòng điền vào trường này";
        }else{
            $user=check_user($_POST['user_name']);
            if(!empty($user)){
                $errors['user_name']="Tài khoản đã tồn tại";
            }else{
                $user_name=$_POST['user_name'];
            }
        }
        if(empty($_POST['email'])){
            $errors['email']="Vui lòng điền vào trường này";
         }else
        if(!preg_match("/^[A-Za-z0-9_.]{4,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/",$_POST['email'])){
            $errors['email']="Chưa nhập đúng định dạng email";
        }else{
            $email=$_POST['email'];
        }
        
        if(isset($_POST['vai_tro']) && ($_POST['vai_tro'] == '0' || $_POST['vai_tro'] == '1')){
        
            $vai_tro=$_POST['vai_tro'];
        }else{
            $errors['vai_tro']="Vui lòng điền vào trường này";
        }
        
        if(empty($_POST['confirm_mat_khau'])){
            $errors['confirm_mat_khau']="Vui lòng điền vào trường này";
         }

        if(empty($_POST['mat_khau'])){
            $errors['mat_khau']="Vui lòng điền vào trường này";
         }else 
         if(!preg_match("/^[a-zA-Z0-9!@#$%^&*]+$/",$_POST['mat_khau'])){
            $errors['mat_khau']="Vui lòng nhập mật khẩu có ít nhất 1 chữ số và độ dài từ 6 đến 20 kí tự";
        }else if($_POST['mat_khau'] != $_POST['confirm_mat_khau']){
            $errors['confirm_mat_khau']="Xác nhận mật khẩu không chính xác";
        }else{
            $mat_khau=$_POST['mat_khau'];
        }
        }
        if(empty($errors)){
            add_user($user_name,$email,$vai_tro,$mat_khau);
            header('location: index.php?ctl=user');
        }else{
            location('/user/add_user',['errors'=>$errors]);
        }
    }
    

?>