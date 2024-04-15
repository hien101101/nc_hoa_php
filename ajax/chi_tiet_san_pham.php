<?php

 require "../global.php";
 require "../model/connection.php";

    $jsonData = file_get_contents('php://input');
    $data = json_decode($jsonData, true);
    $id_dt=$data['id_dt'];    
    $id_sp=$data['id_sp'];
    // echo $id_dt;
    // echo $id_sp;
    function select_gia_san_pham_by_dung_tich($id_san_pham,$id_dung_tich){
        $connect=connection();
        $sql = "SELECT * FROM `chi_tiet_sp` WHERE id_sanPham=$id_san_pham AND id_theTich =$id_dung_tich";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
     }
     $gia=select_gia_san_pham_by_dung_tich($id_sp,$id_dt);
    //  print_r($gia)
     echo json_encode($gia);
        
    
    
?>
