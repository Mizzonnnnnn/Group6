<?php
include "connect.php";
global $conn;
$fullName = null;
$userName = null;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đồng Hồ Đeo Tay Thời Trang Chính Hãng Giá Rẻ</title>
    <link rel="stylesheet" href="trangChu/trangchu.css">
    <link rel="icon" href="img/icon/icon-watch-home.svg">
    <link rel="stylesheet" href="thu vien/bootstrap-icons-1.10.5/00font/bootstrap-icons.css">
    <link rel="stylesheet" href="thu vien/swiper/cdn.jsdelivr.net_npm_swiper@10.3.1_swiper-bundle.min.css">
    <link rel="stylesheet" href="thu vien/bootstrap/css/bootstrap.css">
</head>
<?php
session_start();
if (isset($_SESSION['loGin']["fullName"])) {
    $fullName  = $_SESSION['loGin']["fullName"];
    $userName = $_SESSION['loGin']["userName"];
}
?>

<body>
    <div class="inThebodyAll">
        <div class="theheader">

            <div class="theheader__heading">
                <div class="theheader__heading--laypout d-flex flex-row justify-content-between align-items-center">
                    <div class="heading--layout__logo"><a href="index.php" style="color: #d63031 !important;">Thanh Hải.Swatch</a></div>
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
                                            <a href="trangtim/trangtimdanhmuc.php?id=<?php echo $rowCategory["category_id"] ?>">
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
                                            <a href="trangtim/trangtimdanhmuc.php?id=<?php echo $rowCategory["category_id"] ?>">
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
                                            <a href="trangtim/trangtimdanhmuc.php?id=<?php echo $rowCategory["category_id"] ?>">
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
                        <a href="trangtim/trangBoy.php">
                            <div class="heading--layout__nam">Nam</div>
                        </a>
                        <a href="trangtim/trangGirl.php">
                            <div class="heading--layout__nu">Nữ</div>
                        </a>
                        <a href="">
                            <div class="heading--layout__luxury">Luxury</div>
                        </a>
                    </div>
                    <!-- xong menu  -->
                    <div class="heading--layout__search">

                        <form class="input-group" action="trangtim/trangtim.php" method="POST">
                            <div class="row">
                                <div class="col-md-4">
                                    <!-- Name Input -->
                                    <label for="name" class="form-label">Tên:</label>
                                    <input type="text" name="text_search" class="form-control txtTimKiem" placeholder="tìm theo hãng, tên ,....">
                                </div>
                                <div class="col-md-4">
                                    <!-- Gender Selection -->
                                    <label for="gender" class="form-label">Giới tính:</label>
                                    <select name="gender" id="gender" class="form-select">
                                        <option value="">Không chọn</option>
                                        <option value="Nam" <?= (isset($_GET['gender']) && $_GET['gender'] === 'Nam') ? 'selected' : '' ?>>Nam</option>
                                        <option value="Nữ" <?= (isset($_GET['gender']) && $_GET['gender'] === 'Nữ') ? 'selected' : '' ?>>Nữ</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <!-- Price Range Selection -->
                                    <label for="price" class="form-label">Khoảng giá:</label>
                                    <select name="price" id="price" class="form-select">
                                        <option value="">Không chọn</option>
                                        <option value="0-1000" <?= (isset($_GET['price']) && $_GET['price'] === '0-1000') ? 'selected' : '' ?>>Dưới 1 triệu</option>
                                        <option value="1000-5000" <?= (isset($_GET['price']) && $_GET['price'] === '1000-5000') ? 'selected' : '' ?>>1 triệu - 5 triệu</option>
                                        <option value="5000-10000" <?= (isset($_GET['price']) && $_GET['price'] === '5000-10000') ? 'selected' : '' ?>>5 triệu - 10 triệu</option>
                                        <option value="10000-20000" <?= (isset($_GET['price']) && $_GET['price'] === '10000-20000') ? 'selected' : '' ?>>10 triệu - 20 triệu</option>
                                        <option value="20000-50000" <?= (isset($_GET['price']) && $_GET['price'] === '20000-50000') ? 'selected' : '' ?>>20 triệu - 50 triệu</option>
                                        <option value="50000" <?= (isset($_GET['price']) && $_GET['price'] === '50000') ? 'selected' : '' ?>>Trên 50 triệu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <!-- Submit Button -->
                                    <button class="btn btn-secondary btnTimKiem" type="submit" id="button-addon1" name="buttom_search">
                                        <i class="bi bi-search"></i>
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- xong tìm kiếm  -->
                    <div class="d-flex flex-row">
                        <a href="trangGioHang/trangGioHang.php">
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
                            <a href="login/LoGin/loGin.php">
                                <div id="heading--layout__user" class="heading--layout__yeuThich">
                                    <i class="bi bi-person-circle"></i>
                                </div>
                            </a>
                        <?php
                        } else { ?>
                            <div id="" class="heading--layout__logOut">
                                <?php echo ($fullName) ?>
                                <a href="login/LoGin/logOut.php" onclick="return confirm('BẠN CÓ MUỐN ĐĂNG XUẤT TÀI KHOẢN NÀY KHÔNG ?');">
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
            <div class="swiper mySwiper theHeader_img">
                <div class="swiper-wrapper">
                    <div class="swiper-pagination"></div>
                    <div class="swiper-slide">
                        <a href=""></a>
                        <img id="image" src="https://wscdn.vn/upload/image/20-215277433-1011937651.jpg?size=1920x512&fomat=webp" alt="ảnh này không tồn tại trong web đồng hồ">
                    </div>
                    <div class="swiper-slide">
                        <img id="image" src="img/baner/baner3.jpg" alt="ảnh này không tồn tại trong web đồng hồ">
                    </div>
                    <div class="swiper-slide">
                        <img id="image" src="img/baner/Banner2.png" alt="ảnh này không tồn tại trong web đồng hồ">
                    </div>
                    <div class="swiper-slide">
                        <img id="image" src="img/baner/banner-4.jpg" alt="ảnh này không tồn tại trong web đồng hồ">
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <!-- xong baner đầu trang  -->
        </div>
        <!-- xong  hết đầu trang web đầu trang -->
        <div class="theBody">
            <div class="layout__infomation d-flex flex-row justify-content-between">
                <div class="layout__infomation--item d-flex flex-row ustify-content-between ">
                    <div class="infomation--item__img">
                        <img src="img/icon/icon-watch-home.svg" alt="ảnh này không tồn tại trong web đồng hồ">
                    </div>
                    <div class="infomation--item__title">
                        <h6>Mẫu mã dạng dạng</h6>
                        <p>Hoàn tiền 20 lần nếu hàng giả</p>
                    </div>
                </div>
                <div class="layout__infomation--item d-flex flex-row ustify-content-between ">
                    <div class="infomation--item__img">
                        <img src="img/icon/icon-freeship.svg" alt="ảnh này không tồn tại trong web đồng hồ">
                    </div>
                    <div class="infomation--item__title">
                        <h6>Miễn phí vận chuyển</h6>
                        <p>Giao hàng nhanh, đóng gói cẩn thận</p>
                    </div>
                </div>
                <div class="layout__infomation--item d-flex flex-row ustify-content-between ">
                    <div class="infomation--item__img">
                        <img src="img/icon/icon-doi-tra.svg" alt="ảnh này không tồn tại trong web đồng hồ">
                    </div>
                    <div class="infomation--item__title">
                        <h6>Đổi hàng 7 ngày</h6>
                        <p>1 đổi 1 trong 7 ngày với sản phẩm lỗi</p>
                    </div>
                </div>
                <div class="layout__infomation--item d-flex flex-row ustify-content-between ">
                    <div class="infomation--item__img">
                        <img src="img/icon/ShieldCheck.svg" alt="ảnh này không tồn tại trong web đồng hồ">
                    </div>
                    <div class="infomation--item__title">
                        <h6>Bảo hành 5 năm</h6>
                        <p>Thụ tục nhanh gọn, thay pin miễn phí</p>
                    </div>
                </div>
                <div class="layout__infomation--item d-flex flex-row ustify-content-between ">
                    <div class="infomation--item__img">
                        <img src="img/icon/CircleWavyCheck.svg" alt="ảnh này không tồn tại trong web đồng hồ">
                    </div>
                    <div class="infomation--item__title">
                        <h6>Đeo trước trả sau</h6>
                        <p>Trả trước 1 phần, 2 phần còn lại trả sau</p>
                    </div>
                </div>
            </div>
            <!-- xong phần dưới baner  -->
            <div class="layout__donghoCaoCap">
                <div class="donghoCaoCap__img">
                    <img src="	https://wscdn.vn/upload/original-image/Banner-1200x120.png?size=1200x120&fomat=webp" alt="ảnh này không tồn tại trong web đồng hồ">
                </div>
                <div class="donghoCaoCap__layout">
                    <div class="swiper swiperss ">
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-wrapper">
                            <?php
                            $select = "SELECT * FROM `products` WHERE `discount` >= 30";
                            $queyrySelect = mysqli_query($conn, $select);
                            while ($row = mysqli_fetch_array($queyrySelect)) {
                            ?>
                                <div class="theproduct swiper-slide" style="text-align: left;">
                                    <a href="trangchitiet/trangchitiet.php?id=<?php echo $row['product_id']; ?>">
                                        <div class="card overflow-hidden theproduct__card" style="transition: color 0.1s linear;">
                                            <img src="<?php echo $row["image_url"] ?>" class="card-img-top" alt="ảnh này không tồn tại trong web đồng hồ...">
                                            <div class="card-body">
                                                <div class="theproduct__title">
                                                    <h5><?php echo $row["brand"] . " " . $row["sizeHeadder"] . "mm " . $row["gender"] . " " . $row["SKU_UPC_MPN"] ?></h5>
                                                </div>
                                                <div class="theproduct__price card-text"><?php echo number_format(($row["price"] - ($row["price"] * ($row["discount"] / 100))), 3, '.', '.') ?>₫</div>
                                                <div class="theproduct__sale card-text">
                                                    <span><?php echo number_format($row["price"], 3, '.', '.') ?>₫</span>
                                                    <div class="theProduct__persentSale">-<span class="theProduct__persent"><?php echo $row["discount"] ?></span>%</div>
                                                </div>
                                                <div class="theproduct__star">
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <?php
                                                    if ($row["length"] <= 0) { ?>
                                                        <span class="theProduct__lenght text-danger">Hết hàng</span>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <span class="theProduct__lenght"><?php echo $row["length"] ?></span>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php
                            }
                            ?> <!-- xong card product  -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="layout__option">
                <div class="layout__option__title">
                    <h4>CHỌN ĐỒNG HỒ PHÙ HỢP</h4>
                </div>
                <div class="layout__option__cmt">
                    <p>ThanhHai.Swatch cung cấp đa dạng mẫu đồng hồ theo nhiều phong cách khác nhau</p>
                </div>
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <div class="layout__option--flex layout__product--flex">
                            <div class="theproduct option--flex__item ">
                                <a href="">
                                    <img src="img/options/dh-nam.webp" alt="ảnh này không tồn tại trong web đồng hồ">
                                    <p>đồng hồ nam</p>
                                </a>
                            </div>
                            <div class="theproduct option--flex__item ">
                                <a href=""><img src="img/options/dh-nu.webp" alt="ảnh này không tồn tại trong web đồng hồ">
                                    <p>đồng hồ nữ</p>
                                </a>
                            </div>
                            <div class="theproduct option--flex__item ">
                                <a href="">
                                    <img src="img/options/dh-thuy-sy.webp" alt="ảnh này không tồn tại trong web đồng hồ">
                                    <p>đồng hồ thụy sỹ</p>
                                </a>
                            </div>
                            <div class="theproduct option--flex__item ">
                                <a href="">
                                    <img src="img/options/dh-dien-tu.webp" alt="ảnh này không tồn tại trong web đồng hồ">
                                    <p>đồng hồ điện tử</p>
                                </a>
                            </div>
                            <div class="theproduct option--flex__item ">
                                <a href="">
                                    <img src="img/options/dh-cao-cap.webp" alt="ảnh này không tồn tại trong web đồng hồ">
                                    <p>đồng hồ cao cấp</p>
                                </a>
                            </div>
                            <div class="theproduct option--flex__item ">
                                <a href=""> <img src="img/options/dh-co.webp" alt="ảnh này không tồn tại trong web đồng hồ">
                                    <p>đồng hồ cơ</p>
                                </a>
                            </div>
                            <div class="theproduct option--flex__item ">
                                <a href=""><img src="img/options/dh-nhat-ban.webp" alt="ảnh này không tồn tại trong web đồng hồ">
                                    <p>đồng hồ nhật bản</p>
                                </a>
                            </div>
                            <div class="theproduct option--flex__item ">
                                <a href=""> <img src="img/options/dh-pin.webp" alt="ảnh này không tồn tại trong web đồng hồ">
                                    <p>đồng hồ pin</p>
                                </a>
                            </div>
                            <div class="theproduct option--flex__item ">
                                <a href=""><img src="img/options/dh-day-kim-loai.webp" alt="ảnh này không tồn tại trong web đồng hồ">
                                    <p>đồng hồ dây kim loại</p>
                                </a>
                            </div>
                            <div class="theproduct option--flex__item ">
                                <a href=""><img src="img/options/dh-day-da.webp" alt="ảnh này không tồn tại trong web đồng hồ">
                                    <p>đồng hồ da</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- xong phần chọn đồng hồ phù hợp  -->
            <div class="layout__luxury layout__option">
                <div class="layout__option__title">
                    <h4>THƯƠNG HIỆU NỔI BẬT</h4>
                </div>
                <div class="layout__option__cmt">
                    <p>ThanhHai.Swatch đang có sẵn hơn 10.000+ sản phẩm đến từ 60 thương hiệu nổi tiếng</p>
                </div>
                <div class="swiper swiperSanPham">
                    <div class="swiper-wrapper layout__option__img">
                        <div class="swiper-slide option__img">
                            <a href=""><img src="https://wscdn.vn/upload/original-image/CS.jpg?size=260x81&fomat=webp" alt="ảnh này không tồn tại trong web đồng hồ"></a>
                            <a href=""><img src="https://wscdn.vn/upload/original-image/logo-seiko.jpg?size=260x81&fomat=webp" alt="ảnh này không tồn tại trong web đồng hồ"></a>
                        </div>
                        <div class="swiper-slide option__img">
                            <a href=""><img src="https://wscdn.vn/upload/original-image/OV.jpg?size=260x81&fomat=webp" alt="ảnh này không tồn tại trong web đồng hồ"></a>
                            <a href=""><img src="https://wscdn.vn/upload/original-image/LG.jpg?size=260x81&fomat=webp" alt="ảnh này không tồn tại trong web đồng hồ"></a>
                        </div>
                        <div class="swiper-slide option__img">
                            <a href=""><img src="https://wscdn.vn/upload/original-image/BL.jpg?size=260x81&fomat=webp" alt="ảnh này không tồn tại trong web đồng hồ"></a>
                            <a href=""><img src="https://wscdn.vn/upload/original-image/OM.jpg?size=260x81&fomat=webp" alt="ảnh này không tồn tại trong web đồng hồ"></a>
                        </div>
                        <div class="swiper-slide option__img">
                            <a href=""><img src="https://wscdn.vn/upload/original-image/CT.jpg?size=260x81&fomat=webp" alt="ảnh này không tồn tại trong web đồng hồ"></a>
                            <a href=""><img src="https://wscdn.vn/upload/original-image/logo-Tissot.jpg?size=260x81&fomat=webp" alt="ảnh này không tồn tại trong web đồng hồ"></a>
                        </div>
                        <div class="swiper-slide option__img">
                            <a href=""><img src="https://wscdn.vn/upload/original-image/logo-SRWatch.jpg?size=260x81&fomat=webp" alt="ảnh này không tồn tại trong web đồng hồ"></a>
                            <a href=""><img src="https://wscdn.vn/upload/original-image/GK.jpg?size=260x81&fomat=webp" alt="ảnh này không tồn tại trong web đồng hồ"></a>
                        </div>
                        <div class="swiper-slide option__img">
                            <a href=""><img src="https://wscdn.vn/upload/original-image/HB.jpg?size=260x81&fomat=webp" alt="ảnh này không tồn tại trong web đồng hồ"></a>
                            <a href=""><img src="https://wscdn.vn/upload/original-image/OP.jpg?size=260x81&fomat=webp" alt="ảnh này không tồn tại trong web đồng hồ"></a>
                        </div>
                        <div class="swiper-slide option__img">
                            <a href=""><img src="https://wscdn.vn/upload/original-image/MD.jpg?size=260x81&fomat=webp" alt="ảnh này không tồn tại trong web đồng hồ"></a>
                            <a href=""><img src="https://wscdn.vn/upload/original-image/ML.jpg?size=260x81&fomat=webp" alt="ảnh này không tồn tại trong web đồng hồ"></a>
                        </div>
                        <div class="swiper-slide option__img">
                            <a href=""><img src="https://wscdn.vn/upload/original-image/MV.jpg?size=260x81&fomat=webp" alt="ảnh này không tồn tại trong web đồng hồ"></a>
                            <a href=""><img src="https://wscdn.vn/upload/original-image/OG.jpg?size=260x81&fomat=webp" alt="ảnh này không tồn tại trong web đồng hồ"></a>
                        </div>
                        <div class="swiper-slide option__img">
                            <a href=""><img src="https://wscdn.vn/upload/original-image/DK.jpg?size=260x81&fomat=webp" alt="ảnh này không tồn tại trong web đồng hồ"></a>
                            <a href=""><img src="https://wscdn.vn/upload/original-image/CK.jpg?size=260x81&fomat=webp" alt="ảnh này không tồn tại trong web đồng hồ"></a>
                        </div>
                        <div class="swiper-slide option__img">
                            <a href=""><img src="https://wscdn.vn/upload/original-image/OR.jpg?size=260x81&fomat=webp" alt="ảnh này không tồn tại trong web đồng hồ"></a>
                            <a href=""><img src="https://wscdn.vn/upload/original-image/FL.jpg?size=260x81&fomat=webp" alt="ảnh này không tồn tại trong web đồng hồ"></a>
                        </div>
                        <div class="swiper-slide option__img">
                            <a href=""><img src="https://wscdn.vn/upload/original-image/CA.jpg?size=260x81&fomat=webp" alt="ảnh này không tồn tại trong web đồng hồ"></a>
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
            <!-- xong phần thương  hiệu nổi bật  -->
            <div class="layout__option layout__banChayNhat">
                <div class="layout__option__title">
                    <h4>BÁN CHẠY NHẤT HỆ THỐNG</h4>
                </div>
                <div class="swiper swiperss ">
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-wrapper">
                        <?php
                        $select = "SELECT * FROM `products` ";
                        $queyrySelect = mysqli_query($conn, $select);
                        while ($row = mysqli_fetch_array($queyrySelect)) {
                        ?>
                            <div class="theproduct swiper-slide" style="text-align: left;">
                                <a href="trangchitiet/trangchitiet.php?id=<?php echo $row['product_id']; ?>">
                                    <div class="card overflow-hidden theproduct__card" style="transition: color 0.1s linear;">
                                        <img src="<?php echo $row["image_url"] ?>" class="card-img-top" alt="ảnh này không tồn tại trong web đồng hồ...">
                                        <div class="card-body">
                                            <div class="theproduct__title">
                                                <h5><?php echo $row["brand"] . " " . $row["sizeHeadder"] . "mm " . $row["gender"] . " " . $row["SKU_UPC_MPN"] ?></h5>
                                            </div>
                                            <div class="theproduct__price card-text"><?php echo number_format(($row["price"] - ($row["price"] * ($row["discount"] / 100))), 3, '.', '.') ?>₫</div>
                                            <div class="theproduct__sale card-text">
                                                <span><?php echo number_format($row["price"], 3, '.', '.') ?>₫</span>
                                                <div class="theProduct__persentSale">-<span class="theProduct__persent"><?php echo $row["discount"] ?></span>%</div>
                                            </div>
                                            <div class="theproduct__star">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <?php
                                                if ($row["length"] <= 0) { ?>
                                                    <span class="theProduct__lenght text-danger">Hết hàng</span>
                                                <?php
                                                } else {
                                                ?>
                                                    <span class="theProduct__lenght"><?php echo $row["length"] ?></span>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php
                        }
                        ?> <!-- xong card product  -->
                    </div>
                </div>

            </div>
            <!-- xong phần bán chạy nhất hệ thống  -->

            <!-- xong phần bán chạy nhất hệ thống  -->

            <!-- xong phần giảm giá 50%  -->

        </div>
    </div>
    <!-- thoát ra ngoài thezbody  -->
    <div class="layout__donghoChinhHang--black d-flex flex-row justify-content-start">
        <div class="layout__donghochinhhang__img flex-grow-1">
            <img src="https://wscdn.vn/upload/original-image/gioithieu-home-desktop.png?size=600x447&fomat=webp" alt="ảnh này không tồn tại trong web đồng hồ">
        </div>
        <div class="layout__donghochinhhang__title layout__option flex-grow-1">
            <div class="heading--layout__logo"><a href="" style="color: #d63031 !important;">Thanh Hải.Swatch</a></div>
            <h3>Thế giới đồng hồ chính hãng</h3>
            <p>
                Được thành lập vào năm 2023, được <a target="_blank" style="color: var(--yellowBold) !important;" href="https://www.facebook.com/danghoanghai2002/">Đặng Thanh Hải</a> hoạt động và phát triển, Thanh Hải.Swatch trở thành đại lý ủy quyền cho rất nhiều thương hiệu đến từ Việt Nam và Nước Ngoài chuyên bán đồng hồ chính hãng
            </p>
            <br>
            <p>Chính sách bảo hành cùng với các chương trình giảm giá tốt sẽ giúp bạn mua sắm dễ dàng. Với đội ngũ nhân viên tận tình, am hiểu về đồng hồ, Thanh Hải.Swatch rất vui được phục vụ quý khách</p>
        </div>
        <!-- xong phần quảng cáo nền đen  -->
    </div>
    <br>
    <div class="swiper  swiperImg ">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <a href="">
                    <img src="https://wscdn.vn/upload/original-image/3-91561352-657125876.jpg" alt="ảnh này không tồn tại trong web đồng hồ">
                </a>
            </div>
            <div class="swiper-slide">
                <a href="">
                    <img src="https://wscdn.vn/upload/original-image/11-1871112100-737619434.jpg?size=547x342&fomat=webp" alt="ảnh này không tồn tại trong web đồng hồ">
                </a>
            </div>
            <div class="swiper-slide">
                <a href="">
                    <img src="https://wscdn.vn/upload/original-image/4-972254444-494037725.jpg?size=547x342&fomat=webp" alt="ảnh này không tồn tại trong web đồng hồ">
                </a>
            </div>
            <div class="swiper-slide">
                <a href="">
                    <img src="https://wscdn.vn/upload/original-image/5-420469639-1679299960.jpg?size=547x342&fomat=webp" alt="ảnh này không tồn tại trong web đồng hồ">
                </a>
            </div>
            <div class="swiper-slide ">
                <a href="">
                    <img src="https://wscdn.vn/upload/original-image/11-1871112100-737619434.jpg?size=547x342&fomat=webp" alt="ảnh này không tồn tại trong web đồng hồ">
                </a>
            </div>
            <div class="swiper-slide">
                <a href="">
                    <img src="https://wscdn.vn/upload/original-image/6-96273303-1108068105.jpg?size=547x342&fomat=webp" alt="ảnh này không tồn tại trong web đồng hồ">
                </a>
            </div>
            <div class="swiper-slide">
                <a href="">
                    <img src="https://wscdn.vn/upload/original-image/4-972254444-494037725.jpg?size=547x342&fomat=webp" alt="ảnh này không tồn tại trong web đồng hồ">
                </a>
            </div>
            <div class="swiper-slide ">
                <a href="">
                    <img src="https://wscdn.vn/upload/original-image/7-723871612-1337313133.jpg?size=547x342&fomat=webp" alt="ảnh này không tồn tại trong web đồng hồ">
                </a>
            </div>
            <div class="swiper-slide ">
                <a href="">
                    <img src="https://wscdn.vn/upload/original-image/8-1684183425-2141744429.jpg?size=547x342&fomat=webp" alt="ảnh này không tồn tại trong web đồng hồ">
                </a>
            </div>
            <div class="swiper-slide ">
                <a href="">
                    <img src="https://wscdn.vn/upload/original-image/10-1531806116-342350087.jpg?size=547x342&fomat=webp" alt="ảnh này không tồn tại trong web đồng hồ">
                </a>
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
    <!-- xong body  -->
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
    <script defer src="thu vien/bootstrap/js/bootstrap.js"></script>
    <script src="thu vien/swiper/cdn.jsdelivr.net_npm_swiper@10.3.1_swiper-bundle.min.js"></script>
    <script src="trangChu/trangchu.js"></script>
</body>

</html>