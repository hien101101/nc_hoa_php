<?php 

function update_new_pass($new_pass,$id_user){
    $connect=connection();
    $sql = "UPDATE `tai_khoan` SET `mat_khau`='$new_pass' WHERE id=$id_user";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
 }

?>