<?php

// function insert_yeu_thich($id_sp,$id_kh){
//    $connect=connection();
//    $sql = "INSERT INTO `yeu_thich`(`id_san_pham`, `id_khach_hang`) VALUES ('$id_sp','$id_kh')";
//    $stmt = $connect->prepare($sql);
//    $stmt->execute();
// }
// function select_yeu_tich($keyword){
//    $connect=connection();
//    $sql = "SELECT * FROM `yeu_thich` WHERE id_khach_hang=$keyword";
//    $stmt = $connect->prepare($sql);
//    $stmt->execute();
//    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
//    return $result;
// }

// function select_cart_by_group($id_kh,$id_sp,$id_dt){
//    $sql = "SELECT * FROM `chi_tiet_gio_hang` WHERE id_khach_hang=$id_kh AND id_sp=$id_sp AND id_dt=$id_dt";
//    $connect=connection();
//    $stmt = $connect->prepare($sql);
//    $stmt->execute();
//    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
//    return $result;
// }
// function update_so_luong_sp_cart($so_luong,$id_sp,$id_kh,$id_dt){
//    $connect=connection();
//    $sql = "UPDATE `chi_tiet_gio_hang` SET `so_luong`='$so_luong' WHERE id_khach_hang=$id_kh AND id_sp=$id_sp AND id_dt=$id_dt";
//    $stmt = $connect->prepare($sql);
//    $stmt->execute();
// }

?>
