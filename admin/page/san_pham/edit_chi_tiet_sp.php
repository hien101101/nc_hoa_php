<?
if(isset($data['errors'])){
    extract($data['errors']);
}
extract($data['chi_tiet_sp']);

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
                    <div class="pb-4">
                        <h2 class="font-medium text-xl">Cập nhật chi tiết sản phẩm</h2>
                        <div class="mt-20">
                            <form class="mx-auto w-max" action="index.php?ctl=update_chi_tiet_sp&id_sp=<?=$chi_tiet_sp['id_sanPham']?>" method="post" enctype="multipart/form-data" >
                                <input class="hidden" type="text" value="<?=$chi_tiet_sp['id']?>" name="id">
                                <label class="block mt-5">
                                    <span class="text-xl font-medium">Dung tích</span>
                                    <input class="block border rounded-md h-10 w-[400px] mt-2 pl-2" type="text" value="<?=$chi_tiet_sp['name_dt']."ml"?>" readonly>
                                </label>
                                <label class="block mt-5">
                                    <span class="text-xl font-medium">Giá</span>
                                    <input class="block border rounded-md h-10 w-[400px] mt-2 pl-2" type="text" value="<?=$chi_tiet_sp['gia'] ?>" name="gia">
                                </label>
                                <span class="text-red-600 text-xs"><?php if(isset($errors['gia'])) echo $errors['gia']?></span>
                                <label class="block mt-5">
                                    <span class="text-xl font-medium">Số lượng</span>
                                    <input class="block border rounded-md h-10 w-[400px] mt-2 pl-2" type="text" value="<?=$chi_tiet_sp['so_luong'] ?>" name="so_luong">
                                </label>
                                <span class="text-red-600 text-xs"><?php if(isset($errors['so_luong'])) echo $errors['so_luong']?></span> <br>
                                <button name="btn_update_ctsp" class="px-7 py-2 rounded-lg mt-5 bg-green-900 text-white text-lg">Cập nhật</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="../public/js/main.js"></script>
</body>
</html>