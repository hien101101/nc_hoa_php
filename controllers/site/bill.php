<?php
    function checkout_cart(){
        $user=json_decode($_COOKIE['user'],true);
        $list_cart=select_cart($user['id']);
        $van_chuyen=select_van_chuyen();
        $count_cart=count_cart($user['id']);
        view('/page/bill',['list_cart'=>$list_cart,'van_chuyen'=>$van_chuyen,'count_cart'=>$count_cart]);
    }
    
?>