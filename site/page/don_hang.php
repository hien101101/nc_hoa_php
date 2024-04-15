<?php 
extract($data['don_hang']);

global $img_dir;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <?php require "site/layout/header.php"?>
    <main class="mt-20 max-w-6xl mx-auto ">
        <div class="mb-10">
            <h2 class="font-medium text-2xl">Đơn hàng của tôi</h2>
        </div>
        <?php
        foreach($don_hang as $dh){  
            ?>
    <div class="mt-5 shadow-xl p-5">
                <?php 
                $ct_don_hang=select_chi_tiet_don_hang($dh['id']);
                foreach($ct_don_hang as $ctdh){
                    $tong_tien_sp= $ctdh['so_luong'] * $ctdh['gia'];
                    ?>
                    <div class="flex py-4 items-center border-b">
                        <img class="w-[80px] h-[80px]" src="<?=$img_dir.$ctdh['img']?>" alt="">
                        <div class="flex-1 ml-4 h-full">
                            <h2 class="font-medium text-2xl"><?= $ctdh['name']?></h2>
                            <p class="text-lg my-1">Dung tích: <?=$ctdh['dung_tich'] ?>ml</p>
                            <span class="text-lg">Số lượng: <?= $ctdh['so_luong']?></span>
                        </div>
                        <div class="justify-end ">
                            <button id="<?=$dh['id']?>" value="" class="text-xl cursor-text"><?= number_format($ctdh['gia'])?> đ</button>
                        </div>
                    </div>
                    <?php
                }
                    ?>
            <div class="py-3 text-right">
                <p class="text-2xl text-green-900 font-medium">Tổng tiền: <?= number_format($dh['tong_tien'])?> đ</p>
            </div>
            <div class="border-t-2 flex justify-between pt-3">
                <?php if($dh['trang_thai']==0){
                    echo '<p class="text-green-600"><i class="mr-2 fa-solid fa-clipboard-list"></i>Đơn hàng đang chờ xác nhận</p>';
                }else if($dh['trang_thai']==1){
                    echo '<p class="text-green-600"><i class="mr-2 fa-solid fa-circle-check"></i>Đã xác nhận đơn hàng</p>';
                }else if($dh['trang_thai']==2){
                    echo '<p class="text-green-600"><i class="mr-2 fa-solid fa-truck-fast"></i>Đang giao hàng</p>';
                }else if($dh['trang_thai']==3){
                    echo '<p class="text-green-600"><i class="mr-2 fas fa-check-circle"></i>Hoàn thành</p>';
                }if($dh['trang_thai']==4){
                    echo '<p class="text-red-600"><i class="mr-2 fa-solid fa-circle-xmark"></i>Đơn hàng đã bị hủy</p>';
                }
                
                ?>
                    <div class="flex gap-5">
                        <a href="index.php?ctl=ct_don_hang&id=<?=$dh['id']?>"><button class="px-3 py-2 bg-green-900 text-white font-medium hover:bg-[#064a38] duration-300">Xem chi tiết đơn hàng</button></a>
                        <div class="<?php if($dh['trang_thai']==0){echo "block";} else {echo "hidden";}?>">
                        <a href="index.php?ctl=cancel_dh&id=<?=$dh['id']?>"><button class="px-3 py-2 bg-green-900 text-white font-medium hover:bg-[#064a38] duration-300">Hủy đơn hàng</button></a>
                        </div>
                    </div>
                
                
            </div>
        </div>
        <?php
        
        }
        ?>
        
    </main>
    <?php require "site/layout/footer.php"?>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
</body>
</html>