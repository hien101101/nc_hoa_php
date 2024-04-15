<?php
    function list_cart(){
        if(!empty($_COOKIE['user'])){
            $user=json_decode($_COOKIE['user'],true);
            $list_cart=select_cart($user['id']);
            view('page/gio_hang',['list_cart'=>$list_cart]);
        }else{
            $list_cart=[];
            view('page/gio_hang',['list_cart'=>$list_cart]);
        }
        
    }
    function add_cart(){
        if(isset($_POST['btn-add-cart'])){
            if(isset($_COOKIE['user'])){
                $user=json_decode($_COOKIE['user'],true);
                $id_kh=$user['id'];
                $id_sp=$_POST['id-sp'];
                $id_dt=$_POST['dung-tich'];            
                $so_luong=$_POST['so-luong'];
                $cart=check_cart($id_kh,$id_sp,$id_dt);
                if(empty($cart)){
                    add_product_cart($id_kh,$id_sp,$so_luong,$id_dt);
                    header("location: index.php?ctl=cart");
                }else{
                    $sl_new=$so_luong + $cart[0]['so_luong'];
                    update_so_luong_sp_cart($sl_new,$id_sp,$id_kh,$id_dt);
                    header("location: index.php?ctl=cart");
                }
            }else{
                $id_sp=$_POST['id-sp'];
                setcookie('mess','Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng',time()+1000);
                header("location:index.php?ctl=product_datail&id=$id_sp");
            }
        }
    }
    function delete_cart(){
        $id=$_GET['id'];
        delete_product_cart($id);
        header("location: index.php?ctl=cart");       
    }
?>