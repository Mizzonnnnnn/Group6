<?php
include '../connect.php';
global $conn;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>ADMIN-quản trị sản phẩm</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />
    <link href="../img/icon/icon-watch-home.svg" rel="icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <?php
        include 'sidebarStrat.php';
        ?>
        <div class="content">
            <?php
            include 'navbarStart.php';
            ?>
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Thông tin các hóa đơn</h6>
                        
                        
                    </div>
                    <div class="table-responsive ">
                    <form action="" method="GET">
                            Từ ngày: <input type="text" name="start_date" required>
                            Đến ngày: <input type="text" name="end_date" required>
                            <input type="submit" value="Thống kê">
                    </form>

                        <a class="btn btn-sm btn-success p-2 m-1" href="../export/exportListOder.php">Export</a>
                        <table class="table text-start align-middle table-bordered table-striped mb-0 " id="myTable">
                            <thead>
                                <tr class="text-dark text-center">
                                <th scope="col">Chi tiết</th>
                                <th scope="col">ID Đơn hàng</th>
                                <th scope="col">Tên khách hàng</th>
               
                                <th scope="col">Tổng tiền</th>
                
             
                
                
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            // Kiểm tra xem có dữ liệu GET từ form hay không
                            if (isset($_GET['start_date']) && isset($_GET['end_date'])) 
                            $start_date = $_GET['start_date'];
                            $end_date = $_GET['end_date'];

                            // Chuyển đổi định dạng ngày tháng
                            $start_date_converted = date('Y-m-d', strtotime($start_date));
                            $end_date_converted = date('Y-m-d', strtotime($end_date));
                            // Assuming $conn is your MySQLi connection
                            $select = "
                            SELECT list_orders.idList, user_admin.userName, list_orders.dateOder, SUM(list_orders.price) AS total_order_value
                            FROM `list_orders`
                            JOIN `user_admin` ON list_orders.userName = user_admin.userName
                            WHERE list_orders.dateOder BETWEEN ? AND ?
                            GROUP BY list_orders.idList, user_admin.userName, list_orders.dateOder
                            ORDER BY total_order_value DESC;";

                            $stmt = $conn->prepare($select);
                            $stmt->bind_param('ss', $start_date, $end_date);
                            $stmt->execute();
                            $result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    ?>
    <tr class="text-dark">
        <td>
            <a class="btn btn-sm btn-secondary p-2 m-1" href="inforProduct.php?id=<?php echo ($row['idList']); ?>">Chi tiết</a>
        </td>
        <td class="text-center"><?php echo ($row['idList']); ?></td>
        <td class="text-capitalize"><?php echo ($row['userName']); ?></td>
        
        <td class="text-right"><?php echo number_format($row['total_order_value'], 0, ',', '.'); ?> VND</td>
    </tr>
    <?php
    if (isset($_POST['accept'])) {
        echo 'oke';
    }
}
$stmt->close();
?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php
            include 'footet.php';
            ?>
        </div>
    </div>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
    <script src="js/main.js"></script>
</body>

</html>