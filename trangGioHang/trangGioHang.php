<?php
include "../connect.php";
global $conn;
$product_id = null;
if (isset($_GET["id"])) {
    $product_id = $_GET["id"];
}
$fullName = null;
$userName = null;
$TongTien = 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Giỏ Hàng</title>
    <link rel="stylesheet" href="../trangChu/trangchu.css">
    <link rel="stylesheet" href="../trangGioHang/trangGioHang.css">
    <link rel="icon" href="../img/icon/icon-watch-home.svg">
    <link rel="stylesheet" href="../thu vien/bootstrap-icons-1.10.5/00font/bootstrap-icons.css">
    <link rel="stylesheet" href="../thu vien/swiper/cdn.jsdelivr.net_npm_swiper@10.3.1_swiper-bundle.min.css">
    <link rel="stylesheet" href="../thu vien/bootstrap/css/bootstrap.css">
</head>
<?php
session_start();
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
                                            <a href="">
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
                                            <a href="">
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
                                            <a href="">
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
        <div class="theBody d-flex">
            <div class="cart__product">
                <div class="cart__barTop d-flex flex-row justify-content-between align-items-center">
                    <a href="../index.php">
                        <div class="cart__home ">
                            <i class="bi bi-caret-left"></i>
                            Mua thêm sản phẩm khác
                        </div>
                    </a>
                    <div class="cart__title">Giỏ hàng của bạn</div>
                    <a href="statusProduct.php">
                        <div id="heading--layout__checkIn" class="heading--layout__yeuThich">
                            <i class="bi bi-cart-check-fill"></i>
                        </div>
                    </a>
                </div>
                <div class="cart--item__product align-items-stretch flex-wrap">
                    <?php
                    if ($fullName != null) {
                        $select = "SELECT * FROM `cart_product` WHERE `userName` LIKE '$userName'";
                        $queyrySelect = mysqli_query($conn, $select);

                        while ($row = mysqli_fetch_array($queyrySelect)) { ?>
                            <div class="list__cardProduct d-flex flex-row">
                                <div class="list--cardProduct__img">
                                    <a href="trangxoagiohang.php?id=<?php echo $row['id']; ?>"><i class="bi bi-x-circle icon__clossed"></i></a>
                                    <img src="../<?php echo $row["image_url"] ?>" alt="ảnh lỗi không hiện nên">
                                </div>
                                <div class="d-flex flex-row justify-content-between flex-fill p-2">
                                    <div class="list--cardProduct__title">
                                        <?php echo $row["brand"] . " " . $row["sizeHeadder"] . "mm " . $row["gender"] . " " . $row["SKU_UPC_MPN"] ?>
                                    </div>
                                    <div class="list--cardProduct__price ">
                                        <div class="cardProduct__price"><?php echo number_format(($row["price"] - ($row["price"] * ($row["discount"] / 100))), 3, '.', '.') ?>₫</div>
                                        <div class="cardProduct__sale">
                                            <?php echo number_format($row["price"], 3, '.', '.') ?>₫
                                        </div>
                                        <div class="cardProduct__lenght text-end">
                                            <a href="decreasLength.php?id=<?php echo $row['id']; ?>">
                                                <button><i class="bi bi-dash-square fs-5 opacity-50 "></i></button>
                                            </a>
                                            <span class="fs-5 p-3 rounded-1 "><?php echo $row["lengthBuy"] ?></span>
                                            <a href="increaseLength.php?id=<?php echo $row['id']; ?>">
                                                <button><i class="bi bi-plus-square fs-5 opacity-50 text-info"></i></button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                            $TongTien = $TongTien + ($row["price"] - ($row["price"] * ($row["discount"] / 100))) * $row["lengthBuy"];
                        }
                        ?>
                </div>
            <?php
                    } else {
                        echo "Mời Đăng Nhập vào !!!";
                    }
            ?>
            <?php
            if ($TongTien != 0) { ?>
                <div class="cart__barTop d-flex flex-row justify-content-between align-items-center">
                    <div class="cart__title">Tổng Tiền tạm tính</div>
                    <div class="cart__title cardProduct__price"><?php echo number_format($TongTien, 3, '.', '.'); ?>₫</div>
                </div>
                <hr>
                <h3 class="text-primary text-center">Thông tin đặt hàng </h3>
                <form action="xulymuaHang.php" method="post">
                    <div class="input-group">
                        <div class="input-group mt-3">
                            <span class="input-group-text">Họ và tên</span>
                            <input type="text" class="form-control" name="hoTen" placeholder="Nguyễn Văn A" required>
                            <span class="input-group-text ">Số điện thoại</span>
                            <input type="text" class="form-control" name="soDienThoai" placeholder="094******1" required>
                        </div>
                        <div class="input-group mt-3">
                            <span class="input-group-text">Địa chỉ</span>
                            <input type="text" class="form-control" name="address" placeholder="VD : số 1 Trần Đăng Ninh - Phường Năng Tĩnh - Nam Định" required>
                        </div>
                        <div class="input-group mt-3">
                            <span class="input-group-text">Email</span>
                            <input type="text" class="form-control" name="email" placeholder="abc@gmail.com" required>
                        </div>
                        <div class="input-group mt-3">
    <span class="input-group-text">Thời gian đặt hàng</span>
    <input type="text" class="form-control" name="dateOders" id="dateOders" placeholder="chú ý khi giao hàng" required>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Lấy ngày tháng năm hiện tại
        const currentDate = new Date().toISOString().slice(0, 10);

        // Đặt giá trị của input thành ngày tháng năm hiện tại
        document.getElementById('dateOders').value = currentDate;
    });
</script>
                        <div class="input-group mt-3">
                            <span class="input-group-text">Hình thức thanh toán</span>
                            <input type="radio" class="input-group-text" name="payment" checked id="cash" value="cash">
                            <label class="input-group-text" for="cash">Tiền mặt</label>
                            <input type="radio" class="input-group-text" name="payment" checked id="atm" value="atm">
                            <label class="input-group-text" for="atm">Chuyển khoản</label>
                        </div>
                        <div class="input-group mt-3">
                            <span class="input-group-text">Ghi chú</span>
                            <input type="text" class="form-control" name="note" placeholder="Ghi chú thêm (nếu có)" required>
                        </div>
                        <div class="cart__title cardProduct__price " style="display: none;">
                            <input type="text" name="giaTien" id="" value="<?php echo ($TongTien); ?>">
                        </div>
                    </div>
                    <center class="mt-3 mb-3">
                        <button type="su" class="btn btn-primary" name="muaHang">Đặt Hàng</button>
                    </center>
                </form>
            <?php
            }
            ?>
            </div>
        </div>
        <script defer src="../thu vien/bootstrap/js/bootstrap.js"></script>
        <script src="../thu vien/swiper/cdn.jsdelivr.net_npm_swiper@10.3.1_swiper-bundle.min.js"></script>
        <script src="trangchitieT.js"></script>
        <script src="timer.js"></script>
</body>

</html>