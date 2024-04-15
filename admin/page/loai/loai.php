<?
extract($data['list_loai']);

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
            <div class="">
                <div class="bg-white rounded-xl m-3 h-16 pl-3 flex items-center">
                    <h1 class="font-medium text-3xl">Quản lý loại</h1>
                </div>
                <div class="m-3 bg-white p-3 rounded-lg h-full">
                    <div class="flex justify-between pb-4">
                        <h2 class="font-medium text-xl">Danh sách loại</h2>
                        <a class="font-xl hover:text-green-800" href="index.php?ctl=add_loai">
                            <i class="mr-2 fa-solid fa-square-plus"></i>Thêm mới
                        </a>
                    </div>
                <table class="w-full">
                    <thead>
                        <tr>
                            <th class="p-2 border text-left w-1/12">ID</th>
                            <th class="p-2 border text-left w-6/12">Tên loại</th>
                            <th class="p-2 border text-left w-2/12">Ảnh</th>
                            <th class="p-2 border text-left w-2/12">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($list_loai as $loai){
                            ?>
                            <tr>
                            <td class="p-2 border"><?=$loai['id']?></td>
                            <td class="p-2 border"><?=$loai['name']?></td>
                            <td class="p-2 border"><img class="w-10 h-5" src="../public/img/<?=$loai['anh']?>" alt=""></td>
                            <td class="p-2 border">
                                <a class="px-2 py-1 bg-yellow-500 rounded-lg text-white hover:bg-yellow-600" 
                                href="index.php?ctl=edit_loai&id=<?=$loai['id']?>">Sửa</a>
                                
                                <a class="px-2 py-1 bg-red-600 rounded-lg text-white hover:bg-red-700" 
                                href="index.php?ctl=delete_loai&id=<?=$loai['id']?>">Xóa</a>
                            </td>
                        </tr>
                            <?php
                            // print_r() ;
                        }
                        ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="../public/js/main.js"></script>
</body>
</html>