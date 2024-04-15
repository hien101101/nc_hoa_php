<?php 
function chi_tiet_san_pham(){
    $id=$_GET['id'];
    if(isset($_COOKIE["user"])){
        $user=json_decode($_COOKIE["user"],true);
        $yeu_thich=select_yeu_thich_by_sp($id,$user['id']);
      }else{
        $yeu_thich=[];
      }
    $san_pham=select_san_pham_by_id($id);
    $dung_tich=select_dung_tich();
    $imgs=select_anh($id);
    $sp_cung_loai=select_san_pham_by_loai_limit_10($san_pham['id_loai']);
    // $loai_sp=select_gioi_tinh($id);
    view('page/chi_tiet_san_pham',['san_pham' => $san_pham,'dung_tich'=>$dung_tich,'yeu_thich'=>$yeu_thich, "imgs"=>$imgs,'sp_cung_loai'=>$sp_cung_loai]);
}

?>