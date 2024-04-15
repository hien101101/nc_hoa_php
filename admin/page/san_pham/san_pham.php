<?
extract($data['list_sp']);
extract($data['imgs']);
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
                    <h1 class="font-medium text-3xl">Quản lý sản phẩm</h1>
                </div>
                <div class="m-3 bg-white p-3 rounded-lg h-full">
                    <div class="flex justify-between pb-4">
                        <h2 class="font-medium text-xl">Danh sách sản phẩm</h2>
                        <a class="font-xl hover:text-green-800" href="index.php?ctl=add_sp">
                            <i class="mr-2 fa-solid fa-square-plus"></i>Thêm mới
                        </a>
                    </div>
                    <div>
                        <p>Bộ lọc</p>
                        <div class="flex gap-10">
                            <form action="index.php?ctl=san_pham" class="flex" method="post">
                                <input class="border h-8 pl-2 rounded-l-md outline-none" type="text" name="keyword">
                                <button class="h-8 w-8 border hover:bg-green-900 hover:text-white rounded-r-md"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </form>
                            <form action="index.php?ctl=san_pham" method="post" id="form_option">
                            <span>Danh mục :</span>
                            <select name="id_loai" id="danh_muc" class="border rounded ml-2">
                                <option class="hidden" value="">Chọn danh mục</option>
                                <?php 
                                foreach($list_loai as $loai){
                                    ?>
                                    <option value="<?=$loai['id']?>"><?=$loai['name']?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            </form>
                        </div>
                    </div>
                <table class="w-full mt-8">
                    <thead>
                        <tr>
                            <th class="p-2 border text-left w-1/12">ID</th>
                            <th class="p-2 border text-left w-3/12">Tên sản phẩm</th>
                            <th class="p-2 border text-left w-1/12">Hình ảnh</th>
                            <th class="p-2 border text-left w-1/12">Số lượng</th>
                            <th class="p-2 border text-left w-3/12">Danh mục</th>
                            <th class="p-2 border text-left w-2/12">Thương hiệu</th>
                            <th class="p-2 border text-left w-1/12">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($list_sp as $sp){
                            $imgs=select_anh($sp['id']);
                            ?>
                            <tr>
                            <td class="p-2 border"><?=$sp['id']?></td>
                            <td class="p-2 border"><?=$sp['name']?></td>
                            <td class="p-2 border"><img class="w-20 h-20" src="../public/img/<?=$imgs[0]['img']?>" alt=""></td>
                            <td class="p-2 border"><?=$sp['so_luong']?></td>
                            <td class="p-2 border"><?=$sp['ten_loai']?></td>
                            <td class="p-2 border"><?=$sp['ten_hang']?></td>
                            <td class="p-2 border">
                                <a class="px-2 py-1 bg-red-600 rounded-lg text-white hover:bg-red-700" 
                                href="index.php?ctl=delete_sp&id=<?=$sp['id']?>">Xóa</a>
                                <a class="px-2 py-1 block w-max mt-2 bg-yellow-500 rounded-lg text-white hover:bg-yellow-600" 
                                href="index.php?ctl=detail_sp&id=<?=$sp['id']?>">Chi tiết</a>
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
    <script>
        const select_danh_muc =document.getElementById('danh_muc');
        select_danh_muc.addEventListener('change',e=>{
            const form_option =document.getElementById('form_option');
            form_option.submit();
        })
    </script>
</body>
</html>