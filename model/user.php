<?php 

function user_all(){
   $connect=connection();
    $sql = "SELECT * FROM `tai_khoan`";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function select_user_by_id($id){
   $connect=connection();
    $sql = "SELECT * FROM `tai_khoan` WHERE id=$id";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result[0];
}
function check_user($user_name){
   $connect=connection();
    $sql = "SELECT * FROM `tai_khoan` WHERE user_name='$user_name'";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function check_login($name,$mat_khau){
    $connect=connection();
    $sql = "SELECT * FROM `tai_khoan` WHERE `user_name`='".$name."' AND `mat_khau`='".$mat_khau."'";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
 }
 function update_user($name,$email,$vai_tro,$mat_khau,$id){
   $connect=connection();
   $sql = "UPDATE `tai_khoan` SET `user_name`='$name',`email`='$email',`vai_tro`='$vai_tro',`mat_khau`='$mat_khau' WHERE id= $id";
   $stmt = $connect->prepare($sql);
   $stmt->execute();
}
function delete_user($id){
   $connect=connection();
   $sql = "DELETE FROM `tai_khoan` WHERE id=$id";
   $stmt = $connect->prepare($sql);
   $stmt->execute();
}

 function new_register($name,$email,$mat_khau){
    $connect=connection();
    $sql = "INSERT INTO `tai_khoan`(user_name, email, vai_tro, mat_khau) VALUES ('$name','$email',0,'$mat_khau')";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
 }

 function add_user($name,$email,$vai_tro,$mat_khau){
   $connect=connection();
   $sql = "INSERT INTO `tai_khoan`(`user_name`, `email`, `vai_tro`, `mat_khau`) VALUES ('$name','$email','$vai_tro','$mat_khau')";
   $stmt = $connect->prepare($sql);
   $stmt->execute();
}
 
?>