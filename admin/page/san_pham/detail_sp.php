<?
if(isset($data['errors'])){
    extract($data['errors']);
}
extract($data['detail_sp']);
extract($data['gia_chi_tiet']);
extract($data['imgs_sp']);
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
    <style>
        .box_img:hover .dlt_img{
            display: flex;
        }
    </style>
</head>
<body class="bg-gray-200">
    <div class="flex min-h-screen">
        <?php require "layout/sidebar.php"?>
        <div class="w-5/6">
        <?php require "layout/header.php"?>
            <div class="">
                <div class="bg-white rounded-xl m-3 h-16 pl-3 flex items-center">
                    <h1 class="font-medium text-3xl">Quản lý Tài khoản</h1>
                </div>
                <div class="m-3 bg-white p-5 rounded-lg">
                    <h2 class="text-3xl font-medium">Thông tin sản phẩm</h2>
                    <div class="mt-5">
                        <div class="flex">
                            <div class="w-1/2">
                                <h4 class="text-2xl font-medium text-green-800">ID: <?=$detail_sp['id_sp']?></h4>
                                <h2 class="text-2xl py-1 font-medium text-green-800">Tên sản phẩm: <?=$detail_sp['name_sp']?></h2>
                                <p class="text-lg py-1 font-medium">Thương hiệu: <?=$detail_sp['name_hang']?></p>
                                <p class="text-lg font-medium">Loại: <?=$detail_sp['name_loai']?></p>
                                <div class="mt-2 w-3/4">
                                    <h2 class="font-medium text-xl mb-3">Mô tả</h2>
                                    <p class="text-lg text"><?=$detail_sp['mo_ta']?></p>

                            </div>
                            </div>
                                <div class="w-1/2">
                                <div class="mt-2">
                                        <h2 class="font-medium text-lg">Ảnh sản phẩm</h2>
                                        <div class="flex items-center gap-x-5">
                                        <?php
                                        $i=0;
                                        foreach($imgs_sp as $img){
                                            
                                            ?>
                                            <div class="my-2 relative box_img">
                                                <img class="w-[60px] h-[60px]" src="../public/img/<?=$img['img']?>" alt="">
                                                <a href="index.php?ctl=delete_img&id=<?=$img['id']?>&sp=<?=$detail_sp['id_sp']?>" class=" bg-red-400 h-6 w-6 rounded-full text-white
                                                absolute -top-2 -right-2 justify-center items-center hidden dlt_img">
                                                    <i class="fa-solid fa-xmark"></i></a>
                                            </div>
                                            <?php
                                            $i++;
                                        }
                                        ?>
                                        <form class="<?php if($i==4) echo "hidden"?>" action="index.php?ctl=insert_img&id=<?=$detail_sp['id_sp']?>" id="uploadForm" method="post" enctype="multipart/form-data">
                                            <label class="bg-green-800 rounded-xl px-3 py-2 cursor-pointer">
                                                <input id="fileInput" class="hidden" type="file" name="img">
                                                <span class="text-white"><i class="fa-solid fa-plus"></i></span>
                                            </label>
                                        </form>
                                        </div>
                                        <span class="text-red-600 text-xs"></span><?php if(isset($errors['img'])) echo $errors['img'] ?></span>
                                    
                                    </div>
                                    <table class="mt-10">
                                        <thead>
                                            <tr>
                                                <th class="border w-28">Dung tích</th>
                                                <th class="border w-28">Giá tiền</th>
                                                <th class="border w-28">Số lượng</th>
                                                <th class="border"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i=0;
                                            foreach($gia_chi_tiet as $gct){
                                                $i++;
                                                    ?>
                                                    <tr>
                                                        <td class="border p-2 text-center"><?=$gct['dung_tich']?> ml</td>
                                                        <td class="border p-2 text-center"><?=number_format($gct['gia'])?></td>
                                                        <td class="border p-2 text-center"><?=$gct['so_luong']?></td>
                                                        <td class="p-2 border">
                                                            <a class="p-1 bg-yellow-500 rounded-lg text-white hover:bg-yellow-600" 
                                                            href="index.php?ctl=edit_chi_tiet_sp&id=<?=$gct['id']?>">Sửa</a>
                                                            <a class="<?php if(count($gct)==1) echo "hidden"?> p-1 bg-red-600 rounded-lg text-white hover:bg-red-700" 
                                                            href="index.php?ctl=delete_chi_tiet_sp&id=<?=$gct['id']?>&id_sp=<?=$detail_sp['id_sp']?>">Xóa</a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                    
                            </div>
                        </div>  
                    </div>
                    <div class="mt-14">
                        <a class="px-3 py-2 bg-green-800 text-white rounded-xl" href="index.php?ctl=edit_sp&id=<?=$detail_sp['id_sp']?>">Chỉnh sửa sản phẩm</a>
                        <a class="px-3 py-2 bg-green-800 text-white rounded-xl" href="">Danh sách sản phẩm</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="../public/js/main.js"></script>
    <script>
        // Lắng nghe sự kiện khi người dùng chọn ảnh
document.getElementById("fileInput").addEventListener("change", function() {
  // Kiểm tra xem đã chọn ảnh hay chưa
  if (this.files && this.files[0]) {
    // Tạo đối tượng FileReader để đọc ảnh
    var reader = new FileReader();
    
    // Lắng nghe sự kiện khi đọc ảnh xong
    reader.onload = function(e) {
      // Gán đường dẫn ảnh vào thuộc tính src của thẻ img (để xem trước ảnh nếu muốn)
      // Ví dụ: document.getElementById("previewImage").src = e.target.result;
      
      // Tự động submit form sau khi upload ảnh
      document.getElementById("uploadForm").submit();
    };
    
    // Đọc ảnh dưới dạng URL Data
    reader.readAsDataURL(this.files[0]);
  }
});
    </script>
</body>
</html>