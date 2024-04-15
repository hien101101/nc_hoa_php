<?php 
   function select_anh($id_sp){
    $connect=connection();
    $sql = "SELECT * FROM `anh_san_pham` WHERE id_san_pham=$id_sp";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
 }

 function insert_imgs($id_sp,$name_imgs){
   $connect=connection();
   $sql = "INSERT INTO `anh_san_pham`(`id_san_pham`, `img`) VALUES ";
   for ($i = 0; $i < count($name_imgs); $i++) {
      $value_img = $name_imgs[$i];
      
      // Nếu không phải phần tử đầu tiên, thêm dấu phẩy phía trước
      if ($i > 0) {
          $sql .= ", ";
      }
      
      // Thêm giá trị vào câu lệnh SQL
      $sql .= "('$id_sp','$value_img')";
  }
   $stmt = $connect->prepare($sql);
   $stmt->execute();
}
function delete_anh($id){
   $connect=connection();
   $sql = "DELETE FROM `anh_san_pham` WHERE id=$id";
   $stmt = $connect->prepare($sql);
   $stmt->execute();
}
function insert_anh($id_sp,$img){
   $connect=connection();
   $sql = "INSERT INTO `anh_san_pham`(`id_san_pham`, `img`) VALUES ('$id_sp','$img')";
   $stmt = $connect->prepare($sql);
   $stmt->execute();
}
?>