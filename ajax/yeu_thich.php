<?php
require "../global.php";
require "../model/connection.php";

function add_wishlist($id_sp,$id_kh){
    $connect=connection();
    $sql = "INSERT INTO `yeu_thich`(`id_san_pham`, `id_khach_hang`) VALUES ('$id_sp','$id_kh')";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
 }

 function delete_wishlist($id_yt){
    $connect=connection();
    $sql = "DELETE FROM `yeu_thich` WHERE id=$id_yt";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
 }
 function select_by_yeu_thich($id_sp,$id_kh){
    $connect=connection();
    $sql = "SELECT * FROM `yeu_thich` WHERE id_san_pham=$id_sp and id_khach_hang=$id_kh";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
 }

 if(!empty($_COOKIE['user'])){
    $jsonData = file_get_contents('php://input');
    $user = json_decode($_COOKIE['user'],true);
    $id_sp = $jsonData;
    $id_kh=$user['id'];
    $yeu_thich=select_by_yeu_thich($id_sp,$id_kh);
    extract($yeu_thich);
    // $id_yeu_thich=$yeu_thich[0]['id'];
    // print_r($yeu_thich);
    if(empty($yeu_thich)){
        add_wishlist($id_sp,$id_kh);
        echo "1";
    }else{
        delete_wishlist($yeu_thich[0]['id']);
        echo "2";
    }
}
else{
    echo "Bạn cần đăng nhập để thực hiện tính năng này";
}
?>