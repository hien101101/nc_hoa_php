<?php
 require "../global.php";
 require "../model/connection.php";

 $jsonData=file_get_contents('php://input');
 $data = json_decode($jsonData, true);
 $id_cart=$data['id_cart'];
 $so_luong=$data['sl'];
function update_sl_cart($so_luong,$id_cart){
    $connect=connection();
    $sql = "UPDATE `gio_hang` SET `so_luong`='$so_luong' WHERE id=$id_cart";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
 }

    update_sl_cart($so_luong,$id_cart); 
?>