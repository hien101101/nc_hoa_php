<?php 
function insert_don_hang($id_kh,$dia_chi,$id_vc,$ten_kh,$sdt,$tong_tien){
    $connect=connection();
    $sql = "INSERT INTO `don_hang`(`id_khach_hang`, `dia_chi`, `id_vc`, `ten_kh`, `sdt`,`tong_tien`,`date`) 
    VALUES ('$id_kh','$dia_chi','$id_vc','$ten_kh','$sdt','$tong_tien',NOW())";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $id=$connect->lastInsertId();
    return $id;
 }

 function select_don_hang($id_kh){
    $connect=connection();
    $sql = "SELECT * FROM `don_hang` WHERE id_khach_hang=$id_kh ORDER BY don_hang.id DESC" ;
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
 }
 function select_don_hang_by_id($id){
   $connect=connection();
   $sql = "SELECT don_hang.*, van_chuyen.name as ten_vc,van_chuyen.gia as gia_vc FROM `don_hang`
   JOIN van_chuyen ON van_chuyen.id=don_hang.id_vc
   WHERE don_hang.id=$id" ;
   $stmt = $connect->prepare($sql);
   $stmt->execute();
   $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   return $result[0];
}
function don_hang_all(){
   $connect=connection();
   $sql = "SELECT * FROM don_hang ORDER BY don_hang.id DESC";
   $stmt = $connect->prepare($sql);
   $stmt->execute();
   $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   return $result;
}
function select_don_hang_admin($id_don_hang){
   $connect=connection();
   $sql = "SELECT * FROM don_hang WHERE id=$id_don_hang";
   $stmt = $connect->prepare($sql);
   $stmt->execute();
   $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   return $result[0];
}
function update_don_hang($id, $trang_thai){
   $connect=connection();
   $sql="UPDATE `don_hang` SET `trang_thai`='$trang_thai' WHERE id=$id";
   $stmt = $connect->prepare($sql);
   $stmt->execute();
}
function thong_ke_don_hang(){
   $connect=connection();
   $sql = "SELECT
   MONTH(date) AS month,
   YEAR(date) AS year,
   SUM(tong_tien) AS doanh_thu FROM don_hang WHERE trang_thai=3 GROUP BY YEAR(date), MONTH(date) ";
   $stmt = $connect->prepare($sql);
   $stmt->execute();
   $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   return $result;
}

?>