<?php 
function yeu_thich(){
    if(isset($_COOKIE['user'])){
        $user= json_decode($_COOKIE['user'],true);
        $yeu_thich=select_list_yeu_thich($user['id']);
        view('/page/yeu_thich',['yeu_thich'=>$yeu_thich]);
    }else{
        view('/page/home');
    }
}

?>