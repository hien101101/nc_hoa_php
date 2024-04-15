<?php
if(isset($data['errors'])){
    extract($data['errors']);
}
extract($data['user'])
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="tailwind.config.js"></script>
</head>
<body class="bg-gray-200">
<div class="flex min-h-screen">
        <?php require "layout/sidebar.php"?>
        <div class="w-5/6">
        <?php require "layout/header.php"?>
            <div class="m-3 bg-white p-3 rounded-lg">
                <h2 class="font-medium text-xl">Thêm Tài khoản</h2>
            <form action="index.php?ctl=update_user" method="post" class="flex flex-wrap w-3/5">
                <label class="mt-5 w-1/2 block font-medium" for="">ID
                <input class="block h-8 w-4/5 border rounded-lg mt-2 pl-2" name="id" type="text" value="<?=$user['id']?>" readonly>
                </label>
                
                <label class="mt-5 w-1/2 font-medium" for="">Tên Tài khoản
                <input class="block h-8 w-4/5 border rounded-lg mt-2 pl-2" name="user_name" type="text" placeholder="Tên tài khoản"
                value="<?=$user['user_name']?>">
                <span class="text-red-600 text-xs"><?php if(isset($errors['user_name'])) echo $errors['user_name']?></span>
                </label>
                <label class="mt-5 w-1/2 block font-medium" for="">Email
                <input class="block h-8 w-4/5 border rounded-lg mt-2 pl-2" name="email" type="text" placeholder="Email"
                value="<?=$user['email']?>">
                </label>
                <span class="text-red-600 text-xs"><?php if(isset($errors['email'])) echo $errors['email']?></span>
                <div class="mt-5 w-1/2">
                    <p class="font-medium">Vai trò</p>
                    <input type="radio" name="vai_tro" value="0" id="0"<?php if($user['vai_tro']==0) echo "checked"?>>
                    <label class="" for="0">Người dùng</label>
                    <input class="ml-5" type="radio" name="vai_tro" value="1" id="1" <?php if($user['vai_tro']==1) echo "checked"?>>
                    <label class="" for="1">Quản trị</label>
                    <span class="text-red-600 text-xs"><?php if(isset($errors['vai_tro'])) echo $errors['vai_tro']?></span>
                </div>
                
                <label class="mt-5 w-1/2 block font-medium" for="">Mật khẩu
                <input class="block h-8 w-4/5 border rounded-lg mt-2 pl-2" name="mat_khau" type="password" placeholder="Mật khẩu"
                value="<?=$user['mat_khau']?>">
                <span class="text-red-600 text-xs"><?php if(isset($errors['mat_khau'])) echo $errors['mat_khau']?></span>
                </label>
                <label class="mt-5 w-1/2 block font-medium" for="">Xác nhận mật khẩu
                <input class="block h-8 w-4/5 border rounded-lg mt-2 pl-2" name="confirm_mat_khau" type="password" placeholder="Mật khẩu"
                value="<?=$user['mat_khau']?>">
                <span class="text-red-600 text-xs"><?php if(isset($errors['confirm_mat_khau'])) echo $errors['confirm_mat_khau']?></span>
                </label>
                <div class="mt-4">
                    <button class="px-3 h-8 bg-green-500 text-white rounded-xl" name="btn_update_user">Cập nhật</button>
                    <a href="index.php?ctl=user">
                        <button class="px-3 h-8 inline-block bg-green-500 text-white rounded-xl" type="button">Danh sách hãng</button>    
                    </a>
                </div>
            </form>  
            </div>
        </div>
    </div>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="../public/js/main.js"></script>
</body>
</html>