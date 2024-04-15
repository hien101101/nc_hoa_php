<?php

function ct_don_hang_page(){
    $id=$_GET['id'];
    $don_hang=select_don_hang_by_id($id);
    $ct_don_hang=select_chi_tiet_don_hang($don_hang['id']);
    view('/page/chi_tiet_don_hang',['don_hang'=>$don_hang,'ct_don_hang'=>$ct_don_hang]);
}

?>