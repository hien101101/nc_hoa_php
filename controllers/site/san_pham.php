<?php 

// function san_pham(){
//     $list_hang=loadall_hang();
//     $dsnew=loadall_sanpham_home();
//     $dsloai=loai_all();
//     view('/page/san_pham',['dshang'=>$list_hang ,'dsnew'=>$dsnew, 'dsloai'=>$dsloai]);
// }

function san_pham(){
    if(isset($_POST['timkiem'])&&($_POST['timkiem']!="")){
        $kyw=$_POST['kyw'];
    }else{
        $kyw="";
    };
    if(isset($_GET['id_hang'])&&($_GET['id_hang']>0)){
        $id_hang=$_GET['id_hang'];
    }else{
        $id_hang=0;
    };
    if(isset($_GET['id_loai'])&&($_GET['id_loai']>0)){
        $id_loai=$_GET['id_loai'];
    }else{
        $id_loai=0;
    };
    if(isset($_COOKIE['user'])){
        $user=json_decode($_COOKIE['user'],true);
        $yeu_thich=select_yeu_thich($user['id']);
        $dsnew=check_key_word($kyw,$id_hang,$id_loai);
        $list_hang=loadall_hang();
        $dsloai=loai_all();
        view('/page/san_pham',['dshang'=>$list_hang ,'dsnew'=>$dsnew, 'dsloai'=>$dsloai,'yeu_thich'=>$yeu_thich]);
    }else{
        $dsnew=check_key_word($kyw,$id_hang,$id_loai);
        $list_hang=loadall_hang();
        $dsloai=loai_all();
        view('/page/san_pham',['dshang'=>$list_hang ,'dsnew'=>$dsnew, 'dsloai'=>$dsloai]);
    }
    // view('/page/san_pham',['dsnew' => $dsnew]);
}

?>