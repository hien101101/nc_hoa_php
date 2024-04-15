<?php
 extract($data['list_cart']);
 extract($data['van_chuyen']);
 extract($data['count_cart']);
 if(isset($data['errors'])){
    extract($data['errors']);
 }
 global $img_dir;
?>
<!DOCTYPE html>
<html lang="vi" class="h-100">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Thanh toán</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="public/boostrap/bootstrap.min.css" type="text/css">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="public/css/bill.css" type="text/css">
    <link rel="stylesheet" href="public/css/style.css">
</head>

<body>
<?php
    include "site/layout/header.php";
    ?>
    <main role="main" class="mb-20">
        <div class="max-w-6xl mx-auto mt-4">
            <form class="needs-validation" name="frmthanhtoan" method="post"
                action="index.php?ctl=checkout">
                <!-- <input type="hidden" name="kh_tendangnhap" value=""> -->

                <div class="py-5 text-center">
                    <i class="fa fa-credit-card fa-5x" aria-hidden="true"></i>
                    <h2>Thanh toán</h2>
                    <p class="lead">Vui lòng kiểm tra thông tin Khách hàng, thông tin Giỏ hàng trước khi Đặt hàng.</p>
                </div>

                <div class="flex">
                    <div class="col-md-8 order-md-1">
                        <h2 class="mb-3 text-2xl font-medium">Thông tin khách hàng</h2>

                        <div class="row">
                            <div class="col-md-12 ">
                                <label class="font-medium" for="kh_ten">Họ tên</label>
                                <input type="text" class="form-control" name="kh_ten" id="kh_ten"
                                    value="" >
                                    <span class="text-red-600 text-xs"><?php if(isset($errors['kh_ten'])) echo $errors['kh_ten']?></span>
                            </div>
                            <!-- <div class="col-md-12">
                                <label for="kh_email">Email</label>
                                <input type="text" class="form-control" name="kh_email" id="kh_email"
                                    value="" >
                            </div> -->
                            <div class="col-md-12 mt-3">
                                <label class="font-medium" for="kh_diachi">Địa chỉ</label>
                                <input type="text" class="form-control" name="kh_diachi" id="kh_diachi"
                                    value="" require="">
                                    <span class="text-red-600 text-xs"><?php if(isset($errors['kh_diachi'])) echo $errors['kh_diachi']?></span>
                            </div>
                            <div class="flex justify-between w-full gap-8 items-center px-[15px]">
                            <div class="w-1/2 mt-3">
                                <label class="font-medium" for="kh_dienthoai">Điện thoại</label>
                                <input type="text" class="form-control" name="kh_dienthoai" id="kh_dienthoai"
                                    value="" require="">
                                    <span class="text-red-600 text-xs"><?php if(isset($errors['kh_dienthoai'])) echo $errors['kh_dienthoai']?></span>
                            </div>
                            
                            <div class="w-1/2 mt-3">
                                <label class="font-medium" for="">Đơn vị vận chuyển
                                    </label>
                                    <select class="border py-2 rounded-sm block" name="van_chuyen" id="select_vc" onchange="change_select()">
                                        <option class="hidden" value="">Chọn đơn vị vận chuyển</option>
                                        <option data-other-value="24000" value="1">Giao hàng tiết kiệm</option>
                                        <option data-other-value="26000" value="2">Giao hàng nhanh</option>
                                        
                                    </select>
                                    <span class="text-red-600 text-xs"><?php if(isset($errors['van_chuyen'])) echo $errors['van_chuyen']?></span>
                            </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <h4 class="mb-3 font-medium">Hình thức thanh toán</h4>
                                <div class="d-block my-3">
                                    <label class="w-1/2 border rounded-lg flex py-2 px-1 gap-2">
                                        <input id="httt-1" name="httt" type="radio"
                                            value="1" checked>
                                            <div class="flex justify-between items-center w-11/12">
                                                <p>Thanh toán khi nhận hàng</p>
                                                <span><i class="fa-regular fa-money-bill-1"></i></span>
                                            </div>
                                    </label>
                                    <!-- <label class="w-1/2 border rounded-lg flex py-2 px-1 gap-2">
                                        <input id="httt-2" name="httt" type="radio"
                                            value="2">
                                            <div class="flex justify-between items-center w-11/12">
                                                <p >Thanh toán bằng ngân hàng</p>
                                                <span><i class="fa-regular fa-credit-card"></i></span>
                                            </div>
                                        </label>
                                        <span class="text-red-600 text-xs">* Chức năng đang phát triển</span>
                                    <label class="w-1/2 border rounded-lg flex py-2 px-1 gap-2">
                                        <input id="httt-3" name="httt" type="radio" class=""
                                            value="3">
                                        <div class="flex justify-between items-center w-11/12">
                                            <p>Thanh toán bằng VN Pay</p>
                                            <img class="h-3" src="public//img/vnpayqr-icon.webp" alt="">
                                        </div>
                                    </label>
                                    <span class="text-red-600 text-xs">* Chức năng đang phát triển</span> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 order-md-2 mb-4">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">Giỏ hàng</span>
                            <span class="badge badge-secondary badge-pill"><?=$count_cart['count']?></span>
                        </h4>
                        <?php
                        $total=0;
                        foreach($list_cart as $cart){
                            ?>
                            <ul class="list-group mb-3">
                            <li class="border py-2 pr-2 d-flex justify-content-between align-items-center lh-condensed gap-1">
                                <input type="text" class="hidden" name="id_sp[]" value="<?=$cart['id_san_pham']?>">
                                <div class="flex">
                                    <img class="w-16 h-16" src="<?=$img_dir.$cart['img']?>" alt="">
                                    <div class="">
                                        <h6 class="my-0"><?=$cart['ten_sp']?><span> / <?=$cart['dung_tich']?>ml</span></h6>
                                        <small class="text-muted"><?=number_format($cart['gia'])?> x <?=$cart['so_luong']?></small>
                                    </div>
                                </div>
                                <input class="hidden" name="dung_tich[]" type="text" value="<?=$cart['id_dt']?>">
                                <input class="hidden" name="so_luong[]" type="text" value="<?=$cart['so_luong']?>">
                                <input class="hidden" name="gia[]" type="text" value="<?=$cart['gia']?>">
                                <p class="text-muted min-w-[25%] text-right"><?=number_format($cart['gia']*$cart['so_luong'])?> đ</p>
                            </li>
                        </ul>
                            <?php
                            $total+=($cart['gia']*$cart['so_luong']);
                        }
                        ?>
                        <div class="border-t py-3">
                            <div class="flex justify-between">
                                <p class="text-lg">Tạm tính:</p>
                                <span id="gia_tam_tinh" class="text-lg"><?=$total?> đ</span>
                            </div>
                            <div class="flex justify-between mt-2">
                                <p class="text-lg">Phí vận chuyển:</p>
                                <span id="gia-vc" class="text-lg">0 đ</span>
                            </div>
                        </div>
                        <div class="flex justify-between border-t py-3">
                            <p class="text-2xl">Tổng tiền:</p>
                            <input class="hidden value-tt" value="0" type="text" name="tong_tien">
                            <span id="total_price" class="text-2xl"></span>
                        </div>
                        <div class="border-t pt-3 flex justify-between items-center">
                            <a href="index.php?ctl=cart" class="text-green-900 font-medium hover:text-green-900"><i class="mr-2 fa-solid fa-angle-left"></i>Trở về giỏ hàng</a>
                            <button name="btn_checkout" class="px-4 py-2 text-xl font-medium rounded-lg text-white bg-green-900">Đặt hàng</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- End block content -->
    </main>

    <!-- footer -->
    <?php
    include "site/layout/footer.php";
    ?>
    <!-- end footer -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="public/boostrap/jquery.min.js"></script>
    <script src="public/boostrap/popper.min.js"></script>
    <script src="public/boostrap/bootstrap.min.js"></script>
    <script>

        function change_select() {
            var select_vc=document.getElementById("select_vc");
             let selectedOption = select_vc.options[select_vc.selectedIndex];
             let data =selectedOption.getAttribute("data-other-value");
             document.getElementById('gia-vc').innerText=data+""+"đ";
             render();   
        }

        function render(){
            let gia_tam_tinh=parseInt(document.getElementById('gia_tam_tinh').innerText);
            let gia_vc=parseInt(document.getElementById('gia-vc').innerText);
            console.log(gia_tam_tinh);
            console.log(gia_vc);
            let inputElement=document.querySelector('.value-tt');
            document.getElementById('total_price').innerText=gia_tam_tinh + gia_vc ;
            inputElement.value = gia_tam_tinh + gia_vc ;
            // console.log(inputElement);
        }
        render();
        
    </script>
</body>

</html>