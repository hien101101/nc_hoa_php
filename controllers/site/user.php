<?php 
function login(){
    view('/page/login');
}
function register(){
    view('/page/register');
}
function change_pass(){
    view('/page/change_pass');
}

function user_login(){
    if(isset($_POST['btn_login'])){
        $name=$_POST['ten'];
        $mat_khau=$_POST['mat-khau'];
        $tai_khoan=check_login($name,$mat_khau);
        if(!empty($tai_khoan)){
            $user=$tai_khoan[0];
            if($user['vai_tro'] == 1){
                $_SESSION['user_admin']=$user;
                header('location: ./admin/index.php');
            }else{
                $json_tai_khoan=json_encode($user);
                setcookie("mess_login","Đăng nhập thành công",time()+1);
                setcookie("user",$json_tai_khoan,time()+(86400*7));
                header('location:index.php');
            }
        }else {
            $errors['login']="Tài khoản hoặc mật khẩu không đúng";
            view("/page/login",['errors'=>$errors]);
        }
    }
}

function user_logout(){
    setcookie("user",'',time()-1000);
    setcookie("mess_login",'',time()-1000);
    header('location:index.php');
}
function user_register(){
    if(isset($_POST['btn_re'])){
        $name=$_POST['ten'];
        // $email=$_POST['email'];
        // $mat_khau=$_POST['mat-khau'];
        $mat_khau2=$_POST['mat-khau-2'];
        if(empty($_POST['ten'])){
            $errors['ten']="Vui lòng điền vào trường này";
        }else if(!empty(check_user($_POST['ten']))){
            $errors['ten']="Tài khoản đã tồn tại";
        }else if(preg_match("/\s/",$_POST['ten'] )){
            $errors['ten']="Tên không được có khoảng trắng";
        }else {
            $name=$_POST['ten'];
        }
        
        if(empty($_POST['email'])){
            $errors['email']="Vui lòng điền vào trường này";
        }else if(!preg_match("/^[A-Za-z0-9_.]{4,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/",$_POST['email'])){
            $errors['email']="Chưa nhập đúng định dạng email";
        }else{
            $email=$_POST['email'];
            }

        if(empty($_POST['mat-khau-2'])){
            $errors['mat-khau-2']="Vui lòng điền vào trường này";
        }

        if(empty($_POST['mat-khau'])){
            $errors['mat-khau']="Vui lòng điền vào trường này";
        }else if(!preg_match("/^[a-zA-Z0-9!@#$%^&*]+$/",$_POST['mat-khau'])){
            $errors['mat-khau']="Chưa nhập đúng định dạng mật khẩu";
        }else if($_POST['mat-khau'] !== $_POST['mat-khau-2']){
            $errors['mat-khau-2']="Xác nhận mật khẩu không chính xác";
        }else{
            $mat_khau=$_POST['mat-khau-2'];
        }
        // new_register($name,$email,$mat_khau);
        // echo "đăng kí thành công";
    }
    if(empty($errors)){
        new_register($name,$email,$mat_khau);
        setcookie('mess_re',"Tạo tài khoản thành công",time()+1);
        header('location:index.php?ctl=login');
        
    }else{
        view('page/register',['errors'=>$errors]);
    }
}
function update_pass(){
    $user=json_decode($_COOKIE['user'],true);
    $id=$user['id'];
    if(isset($_POST['btn_change-pass'])){
        $mat_khau=$_POST['mat-khau'];
        $new_may_khau=$_POST['mat-khau-new'];
        $new_may_khau_2=$_POST['mat-khau-new-2'];
        if($user['mat_khau']==$mat_khau && $new_may_khau == $new_may_khau_2){
            update_new_pass($new_may_khau,$id);
            $user['mat_khau']=$new_may_khau;
            header('location: index.php?ctl=home');
        }else{
            $errors['change_pass']= "Thông tin thay đổi không đúng";
            view('/page/change_pass',['errors'=>$errors]);
        }
    }
}
?>