<?php
    extract($data['don_hang']);
    if(isset($data['errors'])){
        extract($data['errors']);
    }
    $ttdh=get_ttdh($don_hang['trang_thai']);
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
        <div class="bg-white rounded-xl m-3 h-16 pl-3 flex items-center">
            <h1 class="font-medium text-3xl">Quản lý đơn hàng</h1>
        </div>
            <div class="m-3 bg-white p-3 rounded-lg">
                <h2 class="font-medium text-xl">Cập nhật đơn hàng</h2>
            <form action="index.php?ctl=update_don_hang" method="post" enctype="multipart/form-data">
                <label class="mt-5 block font-medium" for="">ID</label>
                <input class="w-1/2 h-8 border rounded-lg mt-2 pl-2" type="text"
                 value="<?=$don_hang['id']?>" readonly name="id">
                <label class="mt-5 block font-medium" for="">Tên khách hàng</label>
                <input class="w-1/2 h-8 border rounded-lg mt-2 pl-2" 
                name="name" type="text" placeholder="Tên khách hàng" readonly value="<?=$don_hang['ten_kh']?>">
                <span class="text-red-600"><?php if(isset($errors['name'])) echo $errors['name']?></span>
                <label class="mt-5 block font-medium" for="">Email</label>
                <input class="w-1/2 h-8 border rounded-lg mt-2 pl-2" 
                name="email" type="text" readonly value="<?=$don_hang['dia_chi']?>">
                <span class="text-red-600"><?php if(isset($errors['email'])) echo $errors['email']?></span>
                <label class="mt-5 block font-medium" for="">Điện thoại</label>
                <input class="w-1/2 h-8 border rounded-lg mt-2 pl-2" 
                name="tel" type="text" readonly value="<?=$don_hang['sdt']?>">
                <span class="text-red-600"><?php if(isset($errors['tel'])) echo $errors['tel']?></span><br>
                <label class="mt-5 block font-medium" for="">Trạng thái</label>
                <select name="trang_thai">
                    <option <?php if($don_hang['trang_thai']==0) echo "selected"?> value="0">Chờ xác nhận đơn hàng</option>
                    <option <?php if($don_hang['trang_thai']==1) echo "selected"?> value="1">Đã xác nhận đơn hàng</option>
                    <option <?php if($don_hang['trang_thai']==2) echo "selected"?> value="2">Đang vận chuyển</option>
                    <option <?php if($don_hang['trang_thai']==3) echo "selected"?> value="3">Hoàn thành</option>
                </select>
                <span class="text-red-600"><?php if(isset($errors['trang_thai'])) echo $errors['trang_thai']?></span><br><br>
                <div class="mt-4">
                    <button class="px-3 h-8 bg-green-500 text-white rounded-xl" name="btn_update_don_hang">Cập nhật</button>
                    <a href="index.php?ctl=quan_li_don_hang">
                        <button class="px-3 h-8 inline-block bg-green-500 text-white rounded-xl" type="button">Danh sách đơn hàng</button>    
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