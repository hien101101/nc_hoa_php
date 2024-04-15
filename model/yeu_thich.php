
<?php 


    function select_yeu_thich($id_kh){
        $connect=connection();
        $sql = "SELECT * FROM `yeu_thich` WHERE id_khach_hang=$id_kh";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
     }
     function select_yeu_thich_by_sp($id_sp,$id_kh){
        $connect=connection();
        $sql = "SELECT * FROM `yeu_thich` WHERE id_san_pham=$id_sp AND id_khach_hang=$id_kh";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
     }
     function count_wishlist($id_kh){
      $connect=connection();
      $sql = "SELECT COUNT(yeu_thich.id_san_pham) as count FROM `yeu_thich` WHERE yeu_thich.id_khach_hang=$id_kh";
      $stmt = $connect->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $result[0];
   }
   function select_list_yeu_thich($id_kh){
      $connect=connection();
      $sql = "SELECT san_pham.id as id_san_pham, san_pham.name as name_sp, hang.name as name_hang, loai.name as name_loai, anh_san_pham.img as img FROM `yeu_thich`
      JOIN san_pham ON yeu_thich.id_san_pham = san_pham.id
       JOIN hang ON san_pham.id_hang = hang.id
       JOIN loai ON san_pham.id_loai = loai.id
       JOIN anh_san_pham ON san_pham.id = anh_san_pham.id_san_pham WHERE yeu_thich.id_khach_hang=$id_kh GROUP BY san_pham.id ";
      $stmt = $connect->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $result;
   }
 
?>
    