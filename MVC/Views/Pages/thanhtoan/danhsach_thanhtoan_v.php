<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://localhost/ManagerPatientPHP/Public/css/medicalBox.css">
    <link rel="stylesheet" href="http://localhost/ManagerPatientPHP/Public/css/editdoctor.css">
</head>

<body>
    <div class="main">
        <header class="header">
            <div class="page">
                <h1 class="name__page">Thanh toán</h1>
                <h3 class="desc__page">Quản lý thanh toán </h3>
            </div>
        </header>
        <div class="container">
            <div class="container__header">
                <form method="POST" action="http://localhost/ManagerPatientPHP/danhsachthanhtoan/timkiem" class="search">
                    <label for="" class="search__label">Tìm kiếm</label>
                    <input placeholder="Tìm kiếm" type="text" name="keyword" id="txtSearch" class="search__input" />
                </form>
            </div>

            <div class="container__content">
                <table class="drug--info table table-striped table-hover">
                    <tr>
                        <th style="text-align: start" class="col-1">Mã thanh toán</th>
                        <th style="text-align: start" class="col-1">Mã bệnh nhân</th>
                        <th style="text-align: start" class="col-1">Ngày thanh toán</th>
                        <th style="text-align: start" class="col-1">Phương thức tt</th>
                        <th style="text-align: start" class="col-1">Mã viện phí</th>
                        <th style="text-align: start" class="col-1">Mã bảo hiểm</th>
                        <th style="text-align: start" class="col-2">Tình trạng</th>
                        <th class="col-1-4"></th>
                        <th class="col-1-4"></th>
                    </tr>
                    <?php
                    // B3: Xử lý kết quả
                    if (isset($data["listPayment"]) && $data["listPayment"] != null) {
                        while ($row = mysqli_fetch_array($data["listPayment"])) {
                    ?>
                            <tr>
                                <td style="text-align: start" class="col-1"><?php echo $row['mathanhtoan'] ?></td>
                                <td style="text-align: start" class="col-1"><?php echo $row['mabenhnhan'] ?></td>
                                <td style="text-align: start" class="col-1"><?php echo $row['ngaythanhtoan'] ?></td>
                                <td style="text-align: start" class="col-1"><?php if ($row['phuongthucthanhtoan'] == '0') echo "Chuyển khoản";
                                                                            else echo "Tiền mặt" ?></td>
                                <td style="text-align: start" class="col-1"><?php echo $row['mavienphi'] ?></td>
                                <td style="text-align: start" class="col-1"><?php echo $row['mabaohiemyte'] ?></td>
                                <td style="text-align: start" class="col-1"><?php if ($row['tinhtrang'] == '0') echo "Chưa thanh toán";
                                                                            else echo "Đã thanh toán" ?></td>
                                <td style="text-align: start" class="col-1-4">
                                    <a href="http://localhost/ManagerPatientPHP/thanhtoan/thanhtoanhoadon">
                                        <?php
                                        if ($row['tinhtrang'] == '1') {
                                        ?>
                                            <button type="button" class="btn btn-primary" disabled="disabled"> Đã thanh toán </button>
                                        <?php
                                        } else {
                                        ?>
                                            <button type="button" class="btn btn-primary">Thanh toán </button>
                                        <?php
                                        }
                                        ?>
                                    </a>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
</body>

</html>