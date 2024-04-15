<?php 

function select_san_pham_by_loai_limit_10($id_loai){
    $connect=connection();
    $sql = "SELECT san_pham.*, MAX(anh_san_pham.img) AS img 
    FROM san_pham
    JOIN anh_san_pham ON san_pham.id = anh_san_pham.id_san_pham
    WHERE id_loai = 1 
    GROUP BY san_pham.id 
    LIMIT 10";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
 }

 function select_san_pham_by_hang($id_hang){
    $connect=connection();
    $sql = "SELECT * FROM `san_pham` WHERE id_hang=$id_hang";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
 }

 function check_san_pham($ten_sp){
   $connect=connection();
   $sql = "SELECT * FROM `san_pham` WHERE name='$ten_sp'";
   $stmt = $connect->prepare($sql);
   $stmt->execute();
   $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   return $result;
}
 function select_san_pham_by_loai($id_loai){
   $connect=connection();
   $sql = "SELECT * FROM `san_pham` WHERE id_loai=$id_loai";
   $stmt = $connect->prepare($sql);
   $stmt->execute();
   $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   return $result;
}
 function select_gia_min_max_san_pham($id){
    $connect=connection();
    $sql = "SELECT min(`chi_tiet_sp`.`gia`) gia_min ,max(`chi_tiet_sp`.`gia`) gia_max FROM `san_pham` JOIN chi_tiet_sp ON chi_tiet_sp.id_sanPham=san_pham.id WHERE san_pham.id=$id";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result[0];
 }

 function select_by_keyword($keyword){
    $connect=connection();
    $sql = "SELECT * FROM san_pham WHERE san_pham.name LIKE '%$keyword%'";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
 }

 function select_san_pham_by_id($id){
    $connect=connection();
    $sql = "SELECT san_pham.* ,loai.name as ten_loai FROM `san_pham` JOIN loai ON san_pham.id_loai=loai.id WHERE san_pham.id=$id";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result[0];
 }

//  function select_gioi_tinh($id_sp){
//     $connect=connection();
//     $sql = "SELECT `loai`.`name` as name FROM san_pham JOIN loai ON san_pham.id_loai=loai.id WHERE san_pham.id=$id_sp;";
//     $stmt = $connect->prepare($sql);
//     $stmt->execute();
//     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
//     return $result[0];
//  };
 function select_sp($keyword, $id_loai){
   $connect=connection();
   $sql="SELECT san_pham.id,loai.name as ten_loai,hang.name as ten_hang,san_pham.name,SUM(chi_tiet_sp.so_luong) as so_luong 
   FROM `san_pham` JOIN loai ON loai.id=san_pham.id_loai 
   JOIN hang ON hang.id=san_pham.id_hang 
   JOIN chi_tiet_sp ON chi_tiet_sp.id_sanPham=san_pham.id ";
   if(!empty($keyword)){
      $sql .="WHERE san_pham.name like '%".$keyword."%'";
   }else if($id_loai>0){
      $sql .="WHERE san_pham.id_loai='".$id_loai."'";
   }
      $sql .="GROUP by san_pham.id order by san_pham.id desc";
   $stmt = $connect->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
 function loadall_hang(){
   $connect=connection();
   $sql="select * from hang order by id desc";
   $stmt = $connect->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function select_sp_by_id_sp($id){
   $connect=connection();
   $sql="SELECT * FROM `san_pham` WHERE id=$id";
   $stmt = $connect->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result[0];
}
function detail_sanpham($id){
   $connect=connection();
   $sql="SELECT san_pham.id as id_sp,san_pham.name as name_sp,san_pham.mo_ta as mo_ta,loai.name as name_loai,hang.name as name_hang FROM `san_pham` 
   JOIN loai ON san_pham.id_loai=loai.id 
   JOIN hang ON san_pham.id_hang=hang.id WHERE  san_pham.id= $id";
   $stmt = $connect->prepare($sql);
   $stmt->execute();
   $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   return $result[0];
}
function check_key_word($kyw,$id_hang,$id_loai){
   $connect=connection();
   $sql="SELECT san_pham.*,MAX(anh_san_pham.img) as img FROM san_pham 
   JOIN anh_san_pham ON san_pham.id = anh_san_pham.id_san_pham ";
        if(!empty($kyw)){
            $sql.=" WHERE san_pham.name like '%".$kyw."%'";
        }
        if($id_hang>0){
            $sql.=" WHERE san_pham.id_hang ='".$id_hang."'";
        }
        if($id_loai>0){
         $sql.=" WHERE san_pham.id_loai ='".$id_loai."'";
        }
        $sql.="GROUP by san_pham.id order by san_pham.id desc";
   $stmt = $connect->prepare($sql);
   $stmt->execute();
   $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   return $result;
}

function insert_san_pham($ten_sp,$mo_ta,$id_loai,$id_hang){
   $connect=connection();
   $sql="INSERT INTO `san_pham`(`name`, `mo_ta`,`id_loai`, `id_hang`) 
   VALUES ('$ten_sp','$mo_ta',$id_loai,$id_hang)";
   $stmt = $connect->prepare($sql);
   $stmt->execute();
   $id_sp=$connect->lastInsertId();
   return $id_sp;
}  

function delete_san_pham($id){
   $connect=connection();
   $sql="DELETE FROM `san_pham` WHERE id=$id";
   $stmt = $connect->prepare($sql);
   $stmt->execute();
}  

function update_san_pham($id,$name,$mo_ta,$id_loai,$id_hang){
   $connect=connection();
   $sql="UPDATE `san_pham` SET`name`='$name',`mo_ta`='$mo_ta',`id_loai`='$id_loai',`id_hang`='$id_hang' WHERE id=$id";
   $stmt = $connect->prepare($sql);
   $stmt->execute();
}  
function thong_ke_san_pham_by_loai($id_loai){
   $connect=connection();
   $sql="SELECT COUNT(san_pham.id) as sl_sp FROM `san_pham` WHERE san_pham.id_loai=$id_loai";
   $stmt = $connect->prepare($sql);
   $stmt->execute();
   $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   return $result[0];
}  
function thong_ke_san_pham(){
   $connect=connection();
   $sql="SELECT COUNT(san_pham.id) as sl_sp FROM `san_pham`";
   $stmt = $connect->prepare($sql);
   $stmt->execute();
   $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   return $result[0];
}  
?>