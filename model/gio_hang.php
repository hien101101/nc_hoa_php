<?php 

 function update_so_luong_sp_cart($so_luong,$id_sp,$id_kh,$id_dt){
   $connect=connection();
   $sql = "UPDATE `gio_hang` SET `so_luong`='$so_luong' WHERE id_khach_hang=$id_kh AND id_san_pham=$id_sp AND id_dt=$id_dt";
   $stmt = $connect->prepare($sql);
   $stmt->execute();
}
 function check_cart($id_kh,$id_sp,$id_dt){
   $sql = "SELECT * FROM `gio_hang` WHERE id_khach_hang=$id_kh AND id_san_pham=$id_sp AND id_dt=$id_dt";
   $connect=connection();
   $stmt = $connect->prepare($sql);
   $stmt->execute();
   $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   return $result;
}
 function add_product_cart($id_kh,$id_sp,$so_luong,$id_dt){
    $connect=connection();
    $sql = "INSERT INTO `gio_hang`(`id_khach_hang`, `id_san_pham`, `so_luong`, `id_dt`) VALUES ('$id_kh','$id_sp','$so_luong','$id_dt')";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
 }
 function delete_product_cart($id){
   $connect=connection();
   $sql = "DELETE FROM `gio_hang` WHERE id=$id";
   $stmt = $connect->prepare($sql);
   $stmt->execute();
}
function delete_gio_hang_by_kh($id_kh){
   $connect=connection();
   $sql = "DELETE FROM `gio_hang` WHERE id_khach_hang=$id_kh" ;
   $stmt = $connect->prepare($sql);
   $stmt->execute();
}
 function select_cart($id_kh){
   $connect=connection();
   $sql = "SELECT gio_hang.*, dung_tich.dungTichThuc as dung_tich, san_pham.name as ten_sp, loai.name as ten_loai,hang.name as ten_hang, 
   MAX(chi_tiet_sp.gia) as gia, MAX(anh_san_pham.img) as img FROM `gio_hang`
   INNER JOIN dung_tich ON dung_tich.id = gio_hang.id_dt
   INNER JOIN san_pham ON san_pham.id  = gio_hang.id_san_pham
   INNER JOIN loai ON loai.id = san_pham.id_loai
   INNER JOIN hang ON hang.id = san_pham.id_hang
   INNER JOIN chi_tiet_sp ON chi_tiet_sp.id_sanPham = san_pham.id
   INNER JOIN anh_san_pham ON anh_san_pham.id_san_pham = san_pham.id
   WHERE gio_hang.id_khach_hang= $id_kh
   GROUP BY gio_hang.id";
   $stmt = $connect->prepare($sql);
   $stmt->execute();
   $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   return $result;
}

function count_cart($id_kh){
   $sql = "SELECT COUNT(gio_hang.id) as count FROM `gio_hang` WHERE gio_hang.id_khach_hang=$id_kh";
   $connect=connection();
   $stmt = $connect->prepare($sql);
   $stmt->execute();
   $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   return $result[0];
}

//  SELECT don_hang.*,chi_tiet_don_hang.id_san_pham,chi_tiet_don_hang.id_dung_tich,chi_tiet_don_hang.so_luong,chi_tiet_don_hang.gia FROM `don_hang` JOIN chi_tiet_don_hang ON don_hang.id = chi_tiet_don_hang.id_don_hang WHERE don_hang.id=1;
?>