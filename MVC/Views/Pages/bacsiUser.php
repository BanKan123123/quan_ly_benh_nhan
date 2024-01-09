<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();

$sheet = $spreadsheet->getActiveSheet();

$dataExport = $data['listExport'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://localhost/ManagerPatientPHP/Public/css/bacsiUser.css">
</head>

<body>
    <div class="main">
        <header class="header">
            <div class="page">
                <h1 class="name__page">Bác sĩ</h1>
            </div>

        </header>
        <div class="container">
            <div class="container__header">
                <form method="POST" action="http://localhost/ManagerPatientPHP/bacsiUser/timkiem" class="search">
                    <label for="" class="search__label">Tìm kiếm</label>
                    <input placeholder="Tìm kiếm" type="text" name="keyword" id="txtSearch" class="search__input" value="<?php if (isset($data['keyword'])) echo $data['keyword'] ?>">
                </form>
            </div>

            <div class="container__content">
                <table class="drug--info table table-striped table-hover">
                    <tr>
                        <th style="text-align: left" class="col-1">STT</th>
                        <th style="text-align: left" class="col-1">Họ tên</th>
                        <th style="text-align: left" class="col-1">Tuổi</th>
                        <th style="text-align: left" class="col-1">Giới tính</th>
                        <th style="text-align: left" class="col-1">Số điện thoại</th>
                        <th style="text-align: left" class="col-2">Email</th>
                        <th style="text-align: left" class="col-1">Trình độ</th>
                        <th style="text-align: left" class="col-2">Khoa</th>
                    </tr>
                    <?php
                    // B3: Xử lý kết quả
                    if (isset($data["data"]) && $data["data"] != null) {
                        $i = 0;
                        while ($row = mysqli_fetch_array($data["data"])) {
                    ?>
                            <tr>
                                <td style="text-align: left" class="col-1"><?php echo ++$i ?></td>
                                    <td style="text-align: left" class="col-1"><?php echo $row['hoten'] ?></td>
                                <td style="text-align: left" class="col-1"><?php echo $row['tuoi'] ?></td>
                                <td style="text-align: left" class="col-1"><?php echo $row['gioitinh'] ?></td>
                                <td style="text-align: left" class="col-1"><?php echo $row['sodienthoai'] ?></td>
                                <td style="text-align: left" class="col-1"><?php echo $row['email'] ?></td>
                                <td style="text-align: left" class="col-1"><?php echo $row['trinhdo'] ?></td>
                                <td style="text-align: left" class="col-1"><?php echo $row['tenkhoa'] ?></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
        <footer class="footer">
            <div class="pagination">

            </div>
        </footer>
    </div>

    <script src="http://localhost/ManagerPatientPHP/Public/js/medicalBox.js"></script>
</body>

</html>