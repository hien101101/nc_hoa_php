<?php 

function loai_all(){
    $connect=connection();
    $sql = "SELECT * FROM loai";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
 }

 function check_loai($ten_loai){
    $connect=connection();
    $sql = "SELECT * FROM loai WHERE name='$ten_loai'";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
 }
 function select_loai_by_id($id_loai){
    $connect=connection();
    $sql = "SELECT * FROM loai WHERE id=$id_loai";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result[0];
 }
 function update_loai($id,$tenloai,$anh){
    $connect=connection();
    $sql="UPDATE `loai` SET `name`='$tenloai',`anh`='$anh' WHERE id=$id";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
}
function add_loai($tenloai,$anh){
    $connect=connection();
    $sql="INSERT INTO `loai`(`name`,`anh`) VALUES ('$tenloai','$anh')";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
}

function delete_loai($id){
    $connect=connection();
    $sql="delete from loai where id=".$id;
    $stmt = $connect->prepare($sql);
    $stmt->execute();
}

?>