<?php 

function hang_all(){
    $connect=connection();
    $sql = "SELECT * FROM hang";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
 }

 function select_hang_by_id($id_hang){
    $connect=connection();
    $sql = "SELECT * FROM hang WHERE id=$id_hang";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result[0];
 }
 function check_hang($name){
    $connect=connection();
    $sql = "SELECT * FROM hang WHERE name = '$name'";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
 }
 function update_hang($id, $tenhang){
     $connect=connection();
    $sql="update hang set name='".$tenhang."' where id=".$id;
    $stmt = $connect->prepare($sql);
    $stmt->execute();
}
function add_hang($tenhang){
    $connect=connection();
    $sql="INSERT INTO `hang`(`name`) VALUES ('$tenhang')";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
}

function delete_hang($id){
    $connect=connection();
    $sql="delete from hang where id=".$id;
    $stmt = $connect->prepare($sql);
    $stmt->execute();
}
?>