
<div class="title sev">
                    BỘ LỌC
                    <p>Giúp lọc nhanh sản phẩm bạn tìm kiếm</p>
                    <a href="index.php" class="reb">&times;
                        <p class="tool">Bỏ hết</p>
                    </a>
                    
                </div>
                <div class="mb">
                    <div class="title nav">Thương hiệu
                        <div class="search1">
                            <form action="index.php?ctl=product" method="post" class="flex items-end">
                                <input class="w-48" type="text" placeholder="Tìm thương hiệu" name="kyw">
                                <button class="bg-[#117b4d] text-white rounded-lg border px-3 py-2" type="submit" name="timkiem" value="Tìm" id="">Tìm</button>
                      </form>
                        </div>
                    </div>
                    <div class="srcollbar">
                        <?php
                            foreach ($dshang as $hg) {
                                extract($hg);
                                $linkhang="index.php?ctl=product&id_hang=".$id;
                                echo '<input type="checkbox"> <a href="'.$linkhang.'">'.$name.'</a> <br>';
                            }
                        ?>
                    </div>
                </div>
                <!-- <div class="mb">
                    <div class="title nav">Giá sản phẩm</div>
                    <div class="srcollbar"> -->
                        <!-- <?php
                            foreach ($dsnew as $sp) {
                                extract($sp);
                                $linkhang="index.php?ctl=product&id_hang=".$id;
                                echo '<input type="checkbox"> <a href="'.$linkhang.'">'.$price.'</a> <br>';
                            }
                        ?> -->
                        <!-- <a class="block" href=""><input class="mr-2" type="checkbox">0 đ - 200.000 đ</a>
                        <a class="block" href=""><input class="mr-2" type="checkbox">200.000 đ - 500.000 đ</a>
                        <a class="block" href=""><input class="mr-2" type="checkbox">500.000 đ - 1.000.000 đ</a>
                        <a class="block" href=""><input class="mr-2" type="checkbox"> >1.000.000 đ</a> -->
                    <!-- </div>
                </div> -->
                <div class="mb">
                    <div class="title">DANH MỤC</div>
                    <div class="menu formtitle ">
                        <ul>
                            <li><a href="index.php">TRANG CHỦ</a></li>
                            <li><a href="">GIỚI THIỆU</a></li>
                            <li>
                                <a href="">THƯƠNG HIỆU</a>
                                <div class="clickicon">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>
                                <div class="active formactive">
                                    <ul>
                                        <?php
                                            foreach ($dshang as $hg) {
                                                extract($hg);
                                                $linkhang="index.php?ctl=product&id_hang=".$id;
                                                echo ' <li><a href="'.$linkhang.'">'.$name.'</a></li>';
                                            }
                                        ?>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="">NƯỚC HOA</a>
                                <div class="clickicon">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>
                                <div class="active formactive">
                                    <ul>
                                        <?php
                                            foreach ($dsloai as $loai) {
                                                extract($loai);
                                                $linkloai="index.php?ctl=product&id_loai=".$id;
                                                echo ' <li><a href="'.$linkloai.'">'.$name.'</a></li>';
                                            }
                                        ?>
                                    </ul>
                                </div>
                            </li>
                            <li><a href="">KIẾN THỨC</a></li>
                            <li><a href="index.php?act=blog">BLOG</a></li>
                            <li><a href="">LIÊN HỆ</a></li>
                        </ul>
                    </div>
                </div>