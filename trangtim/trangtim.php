<?php
include "../connect.php";
global $conn;
if (isset($_POST["buttom_search"])) {
    $search = $_POST["text_search"];
    if ($search == "") {
        header("location:../index.php");
    } else {

        $search = isset($_POST['text_search']) ? $_POST['text_search'] : '';
        $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
        $price = isset($_POST['price']) ? $_POST['price'] : '';

        // Base SQL query to select products
        $sql_search = "SELECT * FROM `products` WHERE 1";

        // Append conditions based on provided search parameters
        if (!empty($search)) {
            $sql_search .= " AND `brand` LIKE '%$search%'";
        }

        if (!empty($gender)) {
            $sql_search .= " AND `gender` = '$gender'";
        }

        if (!empty($price)) {
            // Extract min and max price from price range
            $priceRange = explode('-', $price);
            $minPrice = $priceRange[0];
            $maxPrice = isset($priceRange[1]) ? $priceRange[1] : PHP_INT_MAX;

            // Add price range condition
            $sql_search .= " AND `price` >= $minPrice AND `price` <= $maxPrice";
        }

        // Perform the SQL query
        $queyrySelect = mysqli_query($conn, $sql_search);

        // Check if query was successful
        $num_rows = mysqli_num_rows($queyrySelect);
    }
}
$fullName = null;
$username = null;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <a href=""></a>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đồng Hồ Đeo Tay Thời Trang Chính Hãng Giá Rẻ</title>
    <link rel="stylesheet" href="../trangChu/trangchu.css">
    <link rel="stylesheet" href="../trangtim/trangtim.css">
    <link rel="icon" href="../img/icon/icon-watch-home.svg">
    <link rel="stylesheet" href="../thu vien/bootstrap-icons-1.10.5/00font/bootstrap-icons.css">
    <link rel="stylesheet" href="../thu vien/swiper/cdn.jsdelivr.net_npm_swiper@10.3.1_swiper-bundle.min.css">
    <link rel="stylesheet" href="../thu vien/bootstrap/css/bootstrap.css">
</head>
<?php
session_start();
if (isset($_SESSION['loGin']["fullName"])) {
    $fullName  = $_SESSION['loGin']["fullName"];
    $username = $_SESSION['loGin']["userName"];
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
                                            <a href="trangtimdanhmuc.php?id=<?php echo $rowCategory["category_id"] ?>">
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
                                            <a href="trangtimdanhmuc.php?id=<?php echo $rowCategory["category_id"] ?>">
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
                                            <a href="trangtimdanhmuc.php?id=<?php echo $rowCategory["category_id"] ?>">
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
                        <a href="trangBoy.php">
                            <div class="heading--layout__nam">Nam</div>
                        </a>
                        <a href="trangGirl.php">
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
                        <a href="../trangGioHang/trangGioHang.php">
                            <div class="heading--layout__gioHang">
                                <i class="bi bi-cart4"></i>
                                <?php
                                if ($username != null) {
                                    $cart__product = "SELECT * FROM `cart_product` WHERE `userName` LIKE '%$username%'";
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
                            <a href="../login/LoGin/loGin.php" onclick="return confirm('BẠN CÓ MUỐN ĐĂNG XUẤT TÀI KHOẢN NÀY KHÔNG ?');">
                                <div id="heading--layout__user" class="heading--layout__yeuThich">
                                    <i class="bi bi-person-circle"></i>
                                </div>
                            </a>
                        <?php
                        } else { ?>
                            <div id="" class="heading--layout__logOut">
                                <?php echo ($fullName) ?>
                                <a href="../login/LoGin/logOut.php">
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
        </div>
        <!-- xong hết  header  -->
        <div class="theBody">
            <div class="containner__title">Đã tìm thấy <?php echo $num_rows ?> với từ khóa : <span><?php echo $search ?></span></div>
            <?php
            if ($num_rows == 0) { ?>
                <div class="containner__title">Không tìm thấy kết quả trên</div>
            <?php
            }
            ?>
            <div class="containner__layout justify-content-start d-flex flex-row align-self-start flex-wrap">
                <?php
                while ($row = mysqli_fetch_array($queyrySelect)) {
                ?>
                    <div class="theproduct swiper" style="text-align: left;">
                        <a href="../trangchitiet/trangchitiet.php?id=<?php echo $row['product_id']; ?>">
                            <div class="card overflow-hidden theproduct__card swiper-slide" style="transition: color 0.1s linear;">
                                <img src="../<?php echo $row["image_url"] ?>" class="card-img-top" alt="...">
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
        </div>
    </div>
    <!-- xong chân trang -->
    <script defer src="../thu vien/bootstrap/js/bootstrap.js"></script>
    <script src="../thu vien/swiper/cdn.jsdelivr.net_npm_swiper@10.3.1_swiper-bundle.min.js"></script>
    <script src="../trangChu/trangchuuu.js"></script>
</body>

</html>