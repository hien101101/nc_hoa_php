<?php
    function dashboard(){
        $list_loai=loai_all();
        $tk_dh=thong_ke_don_hang();
        $tkspdb=thong_ke_san_pham_da_ban();
        $tksp=thong_ke_san_pham();
        location('dashboard',['list_loai'=>$list_loai,'tk_dh'=>$tk_dh,'tkspdb'=>$tkspdb,'tksp'=>$tksp]);
    }

?>