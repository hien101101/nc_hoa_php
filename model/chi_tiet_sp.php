<?php 

function chi_tiet_by_sp($id){
    $connect=connection();
    $sql = "SELECT chi_tiet_sp.*, dung_tich.dungTichThuc as dung_tich FROM `chi_tiet_sp`
    JOIN dung_tich ON chi_tiet_sp.id_theTich=dung_tich.id
    WHERE chi_tiet_sp.id_sanPham=$id";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
 }
 function select_chi_tiet_sp_by_id($id){
    $connect=connection();
    $sql = "SELECT chi_tiet_sp.*, dung_tich.dungTichThuc as name_dt FROM `chi_tiet_sp`
    JOIN dung_tich ON dung_tich.id=chi_tiet_sp.id_theTich  WHERE chi_tiet_sp.id=$id";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result[0];
 }

 function update_chi_tiet_sp($id,$gia,$so_luong){
    $connect=connection();
    $sql = "UPDATE `chi_tiet_sp` SET `gia`='$gia',`so_luong`='$so_luong' 
    WHERE id=$id";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    
 }
 function update_chi_tiet_sp_to_checkout($id_sp,$id_dt,$so_luong){
   $connect=connection();
   $sql = "UPDATE `chi_tiet_sp` SET `so_luong`='$so_luong' 
   WHERE id_sanPham =$id_sp AND id_theTich=$id_dt";
   $stmt = $connect->prepare($sql);
   $stmt->execute();
   
}
 function delete_chi_tiet_sp($id){
    $connect=connection();
    $sql = "DELETE FROM `chi_tiet_sp` WHERE id=$id"; 
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    
 }
 
 function insert_chi_tiet_sp($id_sp,$id_dt,$gia,$so_luong){
    $connect=connection();
    $sql = "INSERT INTO `chi_tiet_sp`(`id_sanPham`, `id_theTich`, `gia`, `so_luong`) VALUES ";
    for ($i = 0; $i < count($id_dt); $i++) {
        $value_dt = $id_dt[$i];
        $value_gia = $gia[$i];
        $value_sl = $so_luong[$i];
        // Nếu không phải phần tử đầu tiên, thêm dấu phẩy phía trước
        if ($i > 0) {
            $sql .= ", ";
        }
        
        // Thêm giá trị vào câu lệnh SQL
        $sql .= "('$id_sp','$value_dt','$value_gia','$value_sl')";
    }
    $stmt = $connect->prepare($sql);
    $stmt->execute();
 }
 function chi_tiet_sp_cart($id_sp,$id_dt){
   $connect=connection();
    $sql = "SELECT `so_luong` FROM `chi_tiet_sp` WHERE id_sanPham=$id_sp AND id_theTich=$id_dt";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result[0];
 }

 function chi_tiet_sp_bill($id_sp,$id_dt){
   $connect=connection();
    $sql = "SELECT `so_luong` FROM `chi_tiet_sp` WHERE id_sanPham=$id_sp AND id_theTich=$id_dt";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result[0];
 }
?>