<?php
    function home_page(){
        if(!empty($_COOKIE['user'])){
            $user=json_decode($_COOKIE['user'],true);
            $yeu_thich=select_yeu_thich($user['id']);
            view('/page/home',['yeu_thich'=>$yeu_thich]);
        }else{
            view('/page/home');
        }
    }
    
    
    function search(){
        if(isset($_POST['btn-search'])){
            $keyword=$_POST['search'];
            $list=select_by_keyword($keyword);
            view('/page/san_pham',['dsnew' => $list]);
        }
    }

    
?>