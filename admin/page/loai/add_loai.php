<?php
if(isset($data['errors'])){
    extract($data['errors']);
}
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
                <h2 class="font-medium text-xl">Thêm loại</h2>
            <form action="index.php?ctl=add_new_loai" method="post" enctype="multipart/form-data">
                <label class="mt-5 block font-medium" for="">ID</label>
                <input class="w-1/2 h-8 border rounded-lg mt-2 pl-2" type="text" value="Auto Number" readonly>
                <label class="mt-5 block font-medium" for="">Tên hãng</label>
                <input class="w-1/2 h-8 border rounded-lg mt-2 pl-2" name="ten_loai" type="text" placeholder="Tên loại">
                <span class="text-red-600"><?php if(isset($errors['ten_loai'])) echo $errors['ten_loai']?></span>
                <label class="mt-5 block font-medium" for="">Ảnh</label>
                <input class="" name="img" type="file">
                <span class="text-red-600"><?php if(isset($errors['img'])) echo $errors['img']?></span>
                <div class="mt-4">
                    <button class="px-3 h-8 bg-green-500 text-white rounded-xl" name="btn_add_loai">Thêm mới</button>
                    <a href="index.php?ctl=loai">
                        <button class="px-3 h-8 inline-block bg-green-500 text-white rounded-xl" type="button">Danh sách loại</button>    
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