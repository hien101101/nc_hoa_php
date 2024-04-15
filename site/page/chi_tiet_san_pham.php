<?php 
    extract($data['san_pham']);
    extract($data['dung_tich']);
    extract($data['sp_cung_loai']);
    extract($data['yeu_thich']);
    if(isset($data['mess'])){
        extract($data['mess']);
    }
    extract($data['imgs']);
    $id_sp=$san_pham['id'];
    global $img_dir;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
  <!-- // Add the new slick-theme.css if you want the default styling -->
  <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="tailwind.config.js"></script>
  <link rel="stylesheet" href="public/css/toast.css">
  <link rel="stylesheet" href="public/css/style.css">
  <style>
    .yt_parent:hover .yt_child{
        color: rgb(22, 101, 52,) ;
    }
    /* chi tiết sản phẩm */
  .more_info{
    background:linear-gradient(180deg, rgba(255,255,255,0), rgba(255,255,255,0.33) 33%, rgba(255,255,255,0.8) 83%, #fff);
  }

    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
  </style>
</head>
<body>
    <?php require "site/layout/header.php"?>
    <main class="relative">
        <div class="max-w-6xl mx-auto ">
            <div class="flex gap-8">
                <div class="w-2/5">
                    <div class="flex justify-center relative">
                    <div id="pre" class="absolute top-1/2 left-0 bg-slate-300 px-3 py-5"><i class="fa-solid fa-angle-left"></i></div>
                        <img class="h-80" id="img-show" src="" alt="">
                        <div id="next" class="absolute top-1/2 right-0 bg-slate-300 px-3 py-5"><i class="fa-solid fa-angle-right"></i></div>
                    </div>
                    
                    <div class="flex items-center mt-8 border p-3 gap-5">
                        <?php 
                            foreach ($imgs as $img) {
                                ?>
                                <div id="imgs" class="border-2"><img class="w-[80px] h-[80px]"  src="<?=$img_dir.$img['img']?>" alt=""></div>
                            <?php
                            }
                        ?>
                    </div>
                </div>
                <div class="w-3/5">
                    <h1 class="text-3xl font-medium"><?=$san_pham['name']?></h1>
                    <!-- <div class="my-2">
                        <span><i class="text-sm text-yellow-400 fa-regular fa-star"></i></span>
                        <span><i class="text-sm text-yellow-400 fa-regular fa-star"></i></span>
                        <span><i class="text-sm text-yellow-400 fa-regular fa-star"></i></span>
                        <span><i class="text-sm text-yellow-400 fa-regular fa-star"></i></span>
                        <span><i class="text-sm text-yellow-400 fa-regular fa-star"></i></span>
                    </div> -->
                    <p class="mb-2">Tồn kho: <span id="tinh-trang" class="text-green-800 font-medium">Còn hàng</span></p>
                    <span id="gia" class="font-medium text-green-800 text-2xl"> đ</span>
                    <div class="mt-3">
                        <p>
                            <?=$san_pham['mo_ta']?>
                        </p>
                    </div>
                    <div class="mt-3">
                        <p class="font-medium">Danh mục: <span><?=$san_pham['ten_loai']?></span></p>
                    </div>
                    <form action="index.php?ctl=add_to_cart" method="post">
                        <input class="hidden" type="text" value="<?=$san_pham['id']?>" name="id-sp">
                        <div class="mt-2">
                            <span class="font-medium">Dung tích</span>
                            <div class="flex gap-3">
                                <?php
                                foreach($dung_tich as $dt){
                                    ?>
                                    <div class="relative w-max h-max mt-5">
                                        <input class="dung_tich absolute left-1/2 right-1/2 -z-10" type="radio" value="<?=$dt['id']?>" name="dung-tich" id="<?=$dt['dungTichThuc']?>">
                                        <label class="label_dt bg-white px-3 py-2 border-2" for="<?=$dt['dungTichThuc']?>"><?=$dt['dungTichThuc']?>ml</label>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="mt-10">
                            <span class="font-medium">Số lượng</span>
                            <div class="border w-max mt-2 flex">
                                <div id="minus" class="px-4 py-2 border-r hover:bg-green-800 text-lg cursor-pointer">-</div>
                                <input id="amount" class="w-10 text-center outline-none" type="number" max="" required value="1" name="so-luong">
                                <div id="plus" class="px-4 py-2 border-l hover:bg-green-800 text-lg cursor-pointer">+</div>
                            </div>
                        </div>
                        <div class="flex gap-5 mt-5" id="box_con_hang">
                            <!-- <a class="text-white font-medium rounded-lg bg-green-900 hover:bg-green-950 w-1/2 py-3 text-2xl text-center block" href="">Mua ngay</a> -->
                            <button class="text-white font-medium rounded-lg bg-green-900 hover:bg-green-950 w-1/2 py-3 text-2xl text-center" name="btn-add-cart">Thêm vào giỏ hàng</button>
                        </div>
                        <div class="mt-5 hidden" id="box_het_hang">
                            <button class="text-white font-medium rounded-lg bg-green-900 w-1/2 py-3 text-2xl text-center" disabled type="button">Sản phẩm tạm hết hàng</button>
                        </div>
                    </form>
                    <button id="btn_wishlist" onclick="wishlist()" value="<?=$san_pham['id']?>"
                             class="yt_parent mt-3 border w-max p-3 
                            hover:border-green-950 hover:text-green-950 cursor-pointer">
                        <i id="icon_wishlist" class="
                        <?php if(!empty($data['yeu_thich'])) echo "text-green-900"?>
                         yt_child text-gray-200 mr-2 fa-solid fa-heart"></i>
                        <span id="text_wishlist" class="<?php if(!empty($data['yeu_thich'])) echo "text-green-900"?>">
                            <?php if(!empty($data['yeu_thich'])){echo "Đã yêu thích";}
                            else echo "Thêm vào mục yêu thích"  ?>
                        </span>
                    </button>
                </div>
            </div>
            <div class="flex gap-5 mt-5">
                <div class="w-3/4">
                    <div class="bg-green-900 py-3 px-2">
                        <ul class="">
                            <li class="font-medium text-xl text-white">Thông tin sản phẩm</li>
                        </ul>
                    </div>
                    <div class="border px-3 h-[91%]">
                        <div>
                            <div class="relative">
                                <p>Đang cập nhật</p>
                                <div class="absolute bottom-0 left-0 w-full h-1/4 more_info"></div>
                            </div>
                            <div class="hidden text-center py-3 text-blue-600"><a class="px-4" href="#">Xem thêm <i class="fa-solid fa-angle-down"></i></a></div>
                        </div>
                    </div>
                </div>
                <div class="w-1/4 border">
                    <div class="flex items-center border-b justify-between py-3 px-2 gap-2">
                        <img width="40px" height="40px" src="public/img/service1.webp" alt="">
                        <div>
                            <p class="font-medium">Giao hàng nhanh chóng</p>
                            <p class="text-sm text-gray-600">
                            ✅ Đa dạng sản phẩm thương hiệu nổi tiếng được yêu thích tại Việt Nam. <br>
                            ✅ Miễn phí giao hàng đối với đơn hàng sản phẩm nước hoa Fullbox.</p>
                        </div>
                    </div>
                    <div class="flex items-center border-b justify-between py-3 px-2 gap-2">
                        <img width="40px" height="40px" src="public/img/service2.webp" alt="">
                        <div>
                            <p class="font-medium">Bảo đảm chất lượng</p>
                            <p class="text-sm text-gray-600">
                            ✅ Cam kết nước hoa chính hãng 100%. <br>
                            ✅ Miễn phí giao hàng đối với đơn hàng sản phẩm nước hoa Fullbox.</p>
                        </div>
                    </div>
                    <div class="flex items-center border-b justify-between py-3 px-2 gap-2">
                        <img width="40px" height="40px" src="public/img/service3.webp" alt="">
                        <div>
                            <p class="font-medium">Chăm sóc khách hàng tốt</p>
                            <p class="text-sm text-gray-600">
                            ✅ Hotline 24/7: 0863928753 <br>
                            ✅ Chăm sóc khách hàng tận tình trước và sau khi mua hàng.</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between py-3 px-2 gap-2">
                        <img width="40px" height="40px" src="public/img/service4.webp" alt="">
                        <div>
                            <p class="font-medium">Đa dạng lựa chọn</p>
                            <p class="text-sm text-gray-600">
                            ✅ Đa dạng sản phẩm thương hiệu nổi tiếng được yêu thích tại Việt Nam. <br>
                            ✅ Đa dạng dung tích: Nước hoa Fullbox; Nước hoa Chiết 10ml/20ml/30ml; Gốc nước hoa.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-6xl mx-auto mt-5">
            <h2 class="text-2xl font-medium">Sản phẩm liên quan</h2>
            <div class="grid grid-cols-6 mt-5">
            <?php 
            foreach($sp_cung_loai as $sp_cl){
              ?>
              <div  class="product pb-4 border px-3 <?php if($sp_cl['id']==$san_pham['id']) echo "hidden-slide"?>">
              <a href="?ctl=product_datail&id=<?=$sp_cl['id']?>"><img class="h-[150px] w-full" src="<?= $img_dir.$sp_cl['img']?>" alt=""></a>
              <div class="mt-1">
                <div class="h-12">
                  <a href="?ctl=product_datail&id=<?=$sp_cl['id']?>"><h3 class="name_product font-semibold hover:text-green-900"><?=$sp_cl['name']?></h3></a>
                </div>
                <div>
                  <div class=" text-green-900 font-semibold relative">
                    <div class="relative mt-3">
                      <?php
                      // hiển thị giá min và max
                        $gia_san_pham=select_gia_min_max_san_pham($sp_cl['id']);

                      ?>
                      <span><?php echo number_format($gia_san_pham['gia_min'])?>đ</span><span class="mx-1">-</span><span><?php echo number_format($gia_san_pham['gia_max'])?>đ</span>
                  </div>
                </div> 
              </div>
            </div>
            </div>
              <?php
            }
            ?>
          
        </div>
        </div>
        <div id="toast"></div>
    </main>
    <?php require "site/layout/footer.php"?>

    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="slick/slick.min.js"></script>
    <script type="text/javascript" src="public/js/main.js"></script>
    <script>

        var dung_tich=document.querySelectorAll('.dung_tich');
        var gia=document.getElementById('gia');
        var label_dt=document.querySelectorAll('.label_dt');
        var con_hang=document.getElementById('box_con_hang');
        var het_hang=document.get
        // gửi request để lấy giá tiền
        // tạo function;
        function requestGia(index){
            dung_tich[index].checked=true;
            var $id_dt=dung_tich[index].value;
                var $id_sp=<?php echo $id_sp?>;
                var data={
                    id_dt: $id_dt,
                    id_sp: $id_sp
                };
                var jsondata= JSON.stringify(data);
                var html =new XMLHttpRequest();
                html.open('post','http://localhost/du-an-1/ajax/chi_tiet_san_pham.php',true);
                html.onreadystatechange = function() {
                if (html.readyState === 4 && html.status === 200) {
                    label_dt.forEach(item=>{
                        item.classList.remove('border-green-800','border-red-800');
                    });
                    let newObj = JSON.parse(html.responseText);
                    
                    if(newObj[0].so_luong == 0 || Object.values(newObj[0]).length == 0){
                        var giasp= new Intl.NumberFormat().format(newObj[0].gia);
                        document.getElementById('tinh-trang').innerText=0;
                        gia.innerText=  giasp+ "đ";
                        label_dt[index].classList.add('border-red-800');
                        document.getElementById('box_con_hang').classList.remove('flex');
                        document.getElementById('box_con_hang').classList.add('hidden');
                        document.getElementById('box_het_hang').classList.remove('hidden');
                        document.getElementById('box_het_hang').classList.add('block');
                    }else {
                        var giasp= new Intl.NumberFormat().format(newObj[0].gia);
                        gia.innerText=giasp + ' đ';
                        document.getElementById('tinh-trang').innerText=newObj[0].so_luong;
                        document.getElementById('amount').setAttribute('max',newObj[0].so_luong);
                        label_dt[index].classList.add('border-green-800');
                        document.getElementById('box_con_hang').classList.remove('hidden');
                        document.getElementById('box_con_hang').classList.add('flex');
                        document.getElementById('box_het_hang').classList.remove('block');
                        document.getElementById('box_het_hang').classList.add('hidden');
                        
                    }
                }
            };
                html.send(jsondata);
                

        }
        //gọi function requestGia
        dung_tich.forEach((dungtich,index)=>{
            dungtich.addEventListener('click', e=>{
                requestGia(index);
            }) 
        })
        requestGia(0);


        // tăng giảm số lượng mua hàng
         let render =(amount)=>{
            qlt.value=amount;
        }
         // tăng giảm số lượng
         var minus= document.getElementById('minus');
         var plus =document.getElementById('plus');
         var qlt=document.getElementById('amount');
         var amount= qlt.value;



         minus.addEventListener('click',e=>{
            if(amount >1){
                amount--;
                // qlt.value=amount;
                render(amount)
            }
            
         });
         plus.addEventListener('click',e=>{
            amount++;
            let max=document.getElementById('amount').getAttribute('max');
            // qlt.value=amount;
            if(amount <= max){
                render(amount);
            }
         })
         qlt.addEventListener('input',()=>{
            amount=qlt.value;
            // amount=parseInt(amount);
            amount=(isNaN(amount)||amount==0 ? 1:amount);
            render(amount);
})
        var btn_wishlist=document.getElementById('btn_wishlist');
        var icon_wishlist=document.getElementById('icon_wishlist');
        var text_wishlist=document.getElementById('text_wishlist');
        // console.log(btn_wishlist.value);
        function wishlist(){
            let count_wl=document.getElementById('count_wl').innerText;
            let int_count=parseInt(count_wl);
            let data=btn_wishlist.value;
            let html = new XMLHttpRequest();
            html.open('post','http://localhost/du-an-1/ajax/yeu_thich.php',true);
            html.setRequestHeader('X-Requested-With', 'wishlist');
            html.onreadystatechange = function(){
            if(html.readyState===4 && html.status===200){
            let repo=html.responseText;
            //  console.log(repo);
            if(repo==1){
                int_count++;
                document.getElementById('count_wl').innerText = "" + int_count;
                icon_wishlist.classList.add('text-green-900');
                text_wishlist.classList.add('text-green-900')
                text_wishlist.innerText="Đã yêu thích";
                toast({
                    title: "Thành công",
                    message: "Đã thêm sản phẩm vào danh mục yêu thích thành công",
                    type: "success",
                });
            }else if(repo==2){
                int_count--;
                document.getElementById('count_wl').innerText = "" + int_count;
                text_wishlist.classList.remove('text-green-900');
                icon_wishlist.classList.remove('text-green-900');
                text_wishlist.innerText="Thêm vào mục yêu thích";
                toast({
                    title: "Thành công",
                    message: "Đã bỏ sản phẩm khỏi danh mục yêu thích",
                    type: "success",
                });
            }else{
                toast({
              title: "Thất bại",
              message: repo,
              type: "error",
              });
            }
            }
            }
            html.send(data);

        }

        var img_show =document.querySelector('#img-show');
        var list_img =document.querySelectorAll('#imgs');
        var img =document.querySelectorAll('#imgs img');
        var pre = document.getElementById('pre');
        var next = document.getElementById('next');
        let curentIndex = 0;
        function updateImg(index){
            list_img.forEach(item=>{
                item.classList.remove('border-2');
            })
            curentIndex=index;
            img_show.src=img[index].getAttribute('src');
            img[index].parentElement.classList.add('border-2', 'border-green-400');       
         }
         img.forEach((imgElement,index)=>{
            imgElement.addEventListener('click',e=>{
                updateImg(index);
            })
         })
         pre.addEventListener('click',e=>{
            if(curentIndex ==0){
                curentIndex=img.length - 1;
            }else{
                curentIndex--;
            }
            updateImg(curentIndex);
         })
         next.addEventListener('click',e=>{
            
            if(curentIndex == img.length - 1 ){
                curentIndex=0;
            }else{
                curentIndex++;
            }
            updateImg(curentIndex);
         })
         updateImg(0);
         <?php
         if(isset($_COOKIE['mess'])){
            $mess=$_COOKIE['mess'];
            echo "alert('$mess')";
         }
         ?>
    </script>
</body>
</html>