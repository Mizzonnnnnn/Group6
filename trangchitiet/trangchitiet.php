<?php
include "../connect.php";
global $conn;
$product_id = null;
if (isset($_GET["id"])) {
    $product_id = $_GET["id"];
}
$select = "SELECT * FROM `products` WHERE `product_id` LIKE '%$product_id%'";
$queyrySelect = mysqli_query($conn, $select);
$row = mysqli_fetch_array($queyrySelect);
$fullName = null;
$userName = null;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đồng Hồ Đeo Tay Thời Trang Chính Hãng Giá Rẻ</title>
    <link rel="stylesheet" href="../trangChu/trangchu.css">
    <link rel="stylesheet" href="../trangchitiet/trangchitiet.css">
    <link rel="icon" href="../img/icon/icon-watch-home.svg">
    <link rel="stylesheet" href="../thu vien/bootstrap-icons-1.10.5/00font/bootstrap-icons.css">
    <link rel="stylesheet" href="../thu vien/swiper/cdn.jsdelivr.net_npm_swiper@10.3.1_swiper-bundle.min.css">
    <link rel="stylesheet" href="../thu vien/bootstrap/css/bootstrap.css">
</head>
<?php
if (isset($_SESSION['loGin']["fullName"])) {
    $fullName  = $_SESSION['loGin']["fullName"];
    $userName =   $_SESSION['loGin']["userName"];
}
?>

<body>
    <div class="inThebodyAll">
        <div class="theheader">
            <div class="theheader__heading">
                <div class="theheader__heading--laypout d-flex flex-row justify-content-between align-items-center">
                    <div class="heading--layout__logo"><a href="../index.php" style="color: #d63031 !important;">Thanh Hải.Swatch</a></div>
                    <!-- xong logo  -->
                    <div class="d-flex flex-row justify-content-between align-items-center heading--layout__flex">
                        <a href="">
                            <div class="heading--layout__gioiThieu">Giới Thiệu</div>
                        </a>
                        <!-- xong giới thiệu -->
                        <div class="heading--layout__menu" style="cursor: pointer;">
                            Menu
                            <i class="bi bi-caret-down-fill"></i>
                            <ul class="heading--menu__item">
                                <li class="menu__item">
                                    <span class="menu__item--span">Phổ biến nhất</span>
                                    <ul>
                                        <?php
                                        $selectCategory0 = "SELECT * FROM `categories` WHERE `high_class` = 0";
                                        $queryCategory0 = mysqli_query($conn, $selectCategory0);
                                        while ($rowCategory = mysqli_fetch_array($queryCategory0)) {
                                        ?>
                                            <a href="../trangtim/trangtimdanhmuc.php?id=<?php echo $rowCategory["category_id"] ?>">
                                                <li><?php echo $rowCategory["category_name"] ?></li>
                                            </a>
                                        <?php
                                        } ?>
                                    </ul>
                                </li>
                                <li class="menu__item">
                                    <span class="menu__item--span">Hàng cao cấp</span>
                                    <ul>
                                        <?php
                                        $selectCategory1 = "SELECT * FROM `categories` WHERE `high_class` = 1";
                                        $queryCategory1 = mysqli_query($conn, $selectCategory1);
                                        while ($rowCategory = mysqli_fetch_array($queryCategory1)) {
                                        ?>
                                            <a href="../trangtim/trangtimdanhmuc.php?id=<?php echo $rowCategory["category_id"] ?>">
                                                <li><?php echo $rowCategory["category_name"] ?></li>
                                            </a>
                                        <?php
                                        } ?>
                                    </ul>
                                </li>
                                <li class="menu__item">
                                    <span class="menu__item--span">các hãng khác</span>
                                    <ul>
                                        <?php
                                        $selectCategory1 = "SELECT * FROM `categories` WHERE `high_class` = 2";
                                        $queryCategory1 = mysqli_query($conn, $selectCategory1);
                                        while ($rowCategory = mysqli_fetch_array($queryCategory1)) {
                                        ?>
                                            <a href="../trangtim/trangtimdanhmuc.php?id=<?php echo $rowCategory["category_id"] ?>">
                                                <li><?php echo $rowCategory["category_name"] ?></li>
                                            </a>
                                        <?php
                                        } ?>
                                    </ul>
                                </li>
                                <li class="menu__item">
                                    <span class="menu__item--span">phân loại đồng hồ</span>
                                    <ul>
                                        <a href="">
                                            <li>đồng hồ giây da</li>
                                        </a>
                                        <a href="">
                                            <li>đồng hồ dây da</li>
                                        </a>
                                        <a href="">
                                            <li>đồng hồ kim loại</li>
                                        </a>
                                        <a href="">
                                            <li>đồng hồ cơ</li>
                                        </a>
                                        <a href="">
                                            <li>đồng hồ pin</li>
                                        </a>
                                        <a href="">
                                            <li>đồng hồ điện tử</li>
                                        </a>
                                    </ul>
                                </li>
                                <li class="menu__item">
                                    <span class="menu__item--span">Phong Cách</span>
                                    <ul>
                                        <a href="">
                                            <li>quân đội</li>
                                        </a>
                                        <a href="">
                                            <li>thể thao</li>
                                        </a>
                                        <a href="">
                                            <li>dân văn phòng</li>
                                        </a>
                                        <a href="">
                                            <li>mặt vuông</li>
                                        </a>
                                        <a href="">
                                            <li>unisex</li>
                                        </a>
                                        <a href="">
                                            <li>giống rolex</li>
                                        </a>
                                        <a href="">
                                            <li>giống hubot</li>
                                        </a>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <a href="../trangtim/trangBoy.php">
                            <div class="heading--layout__nam">Nam</div>
                        </a>
                        <a href="../trangtim/trangGirl.php">
                            <div class="heading--layout__nu">Nữ</div>
                        </a>
                        <a href="">
                            <div class="heading--layout__luxury">Luxury</div>
                        </a>
                    </div>
                    <!-- xong menu  -->
                    <div class="heading--layout__search">
                        <form class="input-group" action="../trangtim/trangtim.php" method="POST">
                            <input type="text" name="text_search" class="form-control txtTimKiem" placeholder="tìm theo hãng, tên ,....">
                            <button class="btn btn-secondary btnTimKiem" type="submit" id="button-addon1" name="buttom_search">
                                <i class="bi bi-search"></i>
                            </button>
                        </form>
                    </div>
                    <!-- xong tìm kiếm  -->
                    <div class="d-flex flex-row">
                        <a href="../trangGioHang/trangGioHang.php">
                            <div class="heading--layout__gioHang">
                                <i class="bi bi-cart4"></i>
                                <?php
                                if ($userName != null) {
                                    $cart__product = "SELECT * FROM `cart_product` WHERE `userName` LIKE '%$userName%'";
                                    $queryCart = mysqli_query($conn, $cart__product);
                                    $num = mysqli_num_rows($queryCart); ?>
                                    <p class="gioHang__soluong">(<?php echo $num ?>)</p>
                                <?php
                                }
                                ?>
                            </div>
                        </a>
                        <?php
                        if ($fullName == null) { ?>
                            <a href="../login/LoGin/loGin.php">
                                <div id="heading--layout__user" class="heading--layout__yeuThich">
                                    <i class="bi bi-person-circle"></i>
                                </div>
                            </a>
                        <?php
                        } else { ?>
                            <div id="" class="heading--layout__logOut">
                                <?php echo ($fullName) ?>
                                <a href="../login/LoGin/logOut.php" onclick="return confirm('BẠN CÓ MUỐN ĐĂNG XUẤT TÀI KHOẢN NÀY KHÔNG ?');">
                                    <div class="layout__logOut"> Đăng xuất </div>
                                </a>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <!-- xong Giỏ hàng yêu thích  và user-->
                </div>
            </div>
            <!-- xong hết  header  -->
            <!-- xong baner đầu trang  -->
        </div>
        <!-- xong  hết đầu trang web đầu trang -->
        <div class="theBody">
            <a href="../index.php"><i class="bi bi-house-fill"></i></a>
            <!-- xong nut home  -->
            <div class="theBody__containner d-flex flex-row justify-content-start">
                <div class="containner__title ">
                    <?php echo $row["brand"] . " " . $row["sizeHeadder"] . "mm " . $row["gender"] . " " . $row["SKU_UPC_MPN"] ?>
                </div>
                <div class="containner__star">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                </div>
                <div class="containner__yeuthich">
                    <div class="heading--layout__yeuThich">|
                        <i class="bi bi-house-heart"></i>
                    </div>
                </div>
            </div>
            <!-- xong contentner  -->
            <div class="layout__card d-flex flex-row justify-content-between align-items-start">
                <div class="layout__card--left">
                    <div #swiperRef="" class="swiper mySwiperImg ">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img id="image" src="../<?php echo $row["image_url"] ?>" alt="ảnh này không còn tồn tại ">
                            </div>
                            <div class="swiper-slide">
                                <img id="image" src="https://wscdn.vn/upload/image/OP990-45ADGS-GL-T-1-1308159693-1054341034.jpg?size=800x800&fomat=webp" alt="ảnh này không còn tồn tại ">
                            </div>
                            <div class="swiper-slide">
                                <img id="image" src="https://wscdn.vn/upload/image/OP990-45ADGS-GL-T-1-1308159693-1054341034.jpg?size=800x800&fomat=webp" alt="ảnh này không còn tồn tại ">
                            </div>
                            <div class="swiper-slide">
                                <img id="image" src="https://wscdn.vn/upload/image/OP990-45ADGS-GL-T-1-1308159693-1054341034.jpg?size=800x800&fomat=webp" alt="ảnh này không còn tồn tại ">
                            </div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <div class="layout__card--right ">
                    <div class="theproduct__card d-flex flex-row justify-content-start align-items-start">
                        <div class="theproduct__price"><?php echo number_format(($row["price"] - ($row["price"] * ($row["discount"] / 100))), 3, '.', '.') ?>₫</div>
                        <div class="theproduct__sale"><?php echo number_format($row["price"], 3, '.', '.') ?>₫</div>
                        <div class="theProduct__persentSale">-<span><?php echo $row["discount"] ?></span>%</div>
                    </div>
                    <div class="card--discount">
                        <table class="table table-hover" border="1">
                            <thead>
                                <tr>
                                    <th scope="col">Khuyến mãi áp dụng từ 01/10/2023 đến 30/10/2023</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row">Nhập mã <b>SWT9200</b> đơn >= 8 triệu giảm 200k
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">Nhập mã <b>SWT9150</b> đơn >= 4 triệu giảm 150k
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">Nhập mã <b>SWT9100</b> đơn >= 2 triệu giảm 100k
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- xong phần mã giảm giá  -->
                    <div class="btn__product d-flex flex-row justify-content-between">
                        <?php
                        if ($userName == null) { ?>
                            <a style="z-index: -1; opacity: 0.5;" href=""><button onclick="message();" type="button" class="btn__product--white btn__product--blue">Mua ngay - Freeship</button></a>
                            <a href="../trangGioHang/trangthemGiohang.php?id=<?php echo $row['product_id']; ?>"><button onclick="message();" type="button" class="btn__product--white ">Thêm vào giỏ hàng</button></a>
                        <?php
                        } else { ?>
                            <a style="z-index: -1;  opacity: 0.5;" href=""><button type="button" class="btn__product--white btn__product--blue">Mua ngay - Freeship</button></a>
                            <?php if ($row["length"] < 1) {
                            ?>
                                <a style="z-index: -1; opacity: 0.5;" href=""><button type="button" class="btn__product--white ">Sản phẩm không còn</button></a>
                            <?php
                            } else {
                            ?>
                                <a href="../trangGioHang/trangthemGiohang.php?id=<?php echo $row['product_id']; ?>"><button type="button" class="btn__product--white ">Thêm vào giỏ hàng</button></a>
                            <?php
                            } ?>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="card__lienhe m-3">
                        <p>Đặt mua/tư vấn (8h30 - 22h30)</p>
                        <p>093.189.2222 - 097.189.3333 - 096.139.5555</p>
                    </div>
                    <div class="card__chinhSach">
                        <table class="table table-hover" border="1">
                            <thead>
                                <tr>
                                    <th colspan="2" class="text-warning text-bg-dark">Chính sách mua hàng tại ThanhHai.Swatch</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row">
                                        <i class="bi bi-truck icon"></i>
                                        <span>FreeShip toàn quốc</span>
                                    </td>
                                    <td scope="row">
                                        <i class="bi bi-recycle icon"></i>
                                        <span>Đổi trả hàng trong 7 ngày</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <i class="bi bi-hand-thumbs-up-fill icon"></i>
                                        <span>Cam kết hàng chính hãng </span>
                                    </td>
                                    <td scope="row">
                                        <i class="bi bi-check-square-fill icon"></i>
                                        <span>Chế độ bảo hành 5 năm</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- xong phần chính sách mua hàng  -->
                    <div class="containner__title">Thông số <span>Olym Pianus 42mm Nam OP990-45ADGS-GL-T</span></div>
                    <!-- xong title sản phẩm -->
                    <div class="card__thongtin card--discount w-100">
                        <table class="table table-striped table-hover w-100">
                            <tbody>
                                <tr>
                                    <td class="text-danger-emphasis fw-medium" scope="row">Thương hiệu</td>
                                    <td><?php echo $row["brand"] ?></td>
                                </tr>
                                <tr>
                                    <td class="text-danger-emphasis fw-medium" scope="row">Đối tượng dùng</td>
                                    <td><?php echo $row["gender"] ?></td>
                                </tr>
                                <tr>
                                    <td class="text-danger-emphasis fw-medium" scope="row">SKU_UPC_MPN</td>
                                    <td><?php echo $row["SKU_UPC_MPN"] ?></td>
                                </tr>
                                <tr>
                                    <td class="text-danger-emphasis fw-medium" scope="row">Số lượng còn</td>
                                    <td><?php echo $row["length"] ?></td>
                                </tr>
                                <tr>
                                    <td class="text-danger-emphasis fw-medium" scope="row">Size mặt</td>
                                    <td><?php echo $row["sizeHeadder"] ?></td>
                                </tr>
                                <tr>
                                    <td class="text-danger-emphasis fw-medium" scope="row">Chi tiết sản phẩm</td>
                                    <td><?php echo $row["description"] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- xong thông tin chi tiết sản phẩm  -->
                </div>
                <!-- xong alll body chi tiết  -->
            </div>
        </div>
        <div class="Thefooter">
            <div class="Thefooter__layout">
                <div class="Thefooter__lienHe">
                    <h4>Liên hệ</h4>
                    <p>Địa chỉ: <a href="">Xóm 3 Đông Xuyên - Tiền Hải - Thái Bình</a></p>
                    <p>Điện thoại: <a href="">0387249884</a></p>
                    <p>Email: <a href="">danghoanghai2k2@gmail.com</a></p>
                </div>
                <div class="Thefooter__chinhSach">
                    <h4>Chính sách</h4>
                    <p><a href="">Chính sách đổi trả</a></p>
                    <p><a href="">Chính sách bảo mật</a></p>
                    <p><a href="">Chính sách vận chuyển</a></p>
                    <p><a href="">Quy định sử dụng</a></p>
                </div>
                <div class="Thefooter__lienKet">
                    <h4>Liên kết</h4>
                    <p>Hãy liên kết với chúng tôi</p>
                    <div class="Thefooter__lienKet--icon d-flex flex-row ">
                        <a href=""><i class="bi bi-facebook fs-3"></i></a>
                        <a href=""><i class="bi bi-youtube fs-3"></i></a>
                        <a href=""><i class="bi bi-twitter fs-3"></i></a>
                        <a href=""><i class="bi bi-google fs-3"></i></a>
                        <a href=""><i class="bi bi-instagram fs-3"></i></a>
                    </div>
                </div>
                <div class="Thefooter__dichi">
                    <h4>Địa Chỉ Cửa Hàng</h4>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6287.5191122041115!2d106.56201619610566!3d20.441307222493414!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314a07513053c73d%3A0x17536bb25a26208d!2zVOG6oXAgSG_DoSBZ4bq_biBUaOG6oW8!5e0!3m2!1svi!2s!4v1696756690431!5m2!1svi!2s" width="300" height="150" style="border-radius: 5px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="hr"></div>
            <center>Đặng Thanh Hải - 0387249884 - danghoanghai2k2@gmail.com</center>
            <?php
            $conn = null;
            ?>
        </div>
        <!-- xong chân trang -->
    </div>
    <script defer src="../thu vien/bootstrap/js/bootstrap.js"></script>
    <script src="../thu vien/swiper/cdn.jsdelivr.net_npm_swiper@10.3.1_swiper-bundle.min.js"></script>
    <script src="trangchitiet.js"></script>
</body>

</html>