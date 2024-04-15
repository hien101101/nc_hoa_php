<?php 

function select_van_chuyen(){
    $sql = "SELECT * FROM van_chuyen";
   $connect=connection();
   $stmt = $connect->prepare($sql);
   $stmt->execute();
   $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   return $result;
}

?>