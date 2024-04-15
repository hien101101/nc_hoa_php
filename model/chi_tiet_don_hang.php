<?php 
   

function insert_chi_tiet_don_hang($id_sp,$id_dt,$so_luong,$gia,$id_don_hang){
   $connect=connection();
    $sql = "INSERT INTO `chi_tiet_don_hang`(`id_san_pham`, `id_dung_tich`, `so_luong`, `gia`, `id_don_hang`) VALUES ";
    for ($i = 0; $i < count($id_sp); $i++) {
      $sp = $id_sp[$i];
      $dt = $id_dt[$i];
      $sl=$so_luong[$i];
      $price=$gia[$i];
      // Nếu không phải phần tử đầu tiên, thêm dấu phẩy phía trước
      if ($i > 0) {
          $sql .= ", ";
      }
      
      // Thêm giá trị vào câu lệnh SQL
      $sql .= "('$sp','$dt','$sl','$price','$id_don_hang')";
  } 
    $stmt = $connect->prepare($sql);
    $stmt->execute();
}
 function select_chi_tiet_don_hang($id_don_hang){
   $connect=connection();
   $sql = 
   "SELECT chi_tiet_don_hang.so_luong as so_luong, 
   chi_tiet_don_hang.gia as gia , MAX(anh_san_pham.img) as img, san_pham.name as name, dung_tich.dungTichThuc AS dung_tich 
   FROM `chi_tiet_don_hang` 
   INNER JOIN anh_san_pham ON anh_san_pham.id_san_pham= chi_tiet_don_hang.id_san_pham
   INNER JOIN san_pham ON san_pham.id=chi_tiet_don_hang.id_san_pham
   INNER JOIN dung_tich ON dung_tich.id=chi_tiet_don_hang.id_dung_tich
   WHERE chi_tiet_don_hang.id_don_hang=$id_don_hang GROUP BY chi_tiet_don_hang.id";

   $stmt = $connect->prepare($sql);
   $stmt->execute();
   $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   return $result;
}
function select_ctdh_by_bill($id_don_hang){
  $connect=connection();
  $sql = "SELECT * FROM `chi_tiet_don_hang` WHERE id_don_hang=$id_don_hang";
  $stmt = $connect->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}
function thong_ke_san_pham_da_ban(){
  $connect=connection();
  $sql = "SELECT COUNT(ctdh.so_luong) AS so_luong 
  FROM chi_tiet_don_hang AS ctdh 
  JOIN don_hang AS dh ON dh.id = ctdh.id_don_hang
  WHERE dh.trang_thai = 3
  ORDER BY ctdh.so_luong";
  $stmt = $connect->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $result[0];
}
?>


