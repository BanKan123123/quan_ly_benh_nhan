<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://localhost/ManagerPatientPHP/Public/css/donthuoc.css">
</head>
<body>
    <div class="main">
        <header class="header">
            <div class="page">
                <p class="name__page">Danh sách lịch đã khám</p>
                <p class="desc__page">Danh sách lịch đã khám bệnh</p>
            </div>
            <a href="http://localhost/ManagerPatientPHP/lichkham/Get_data" class="btn--add">
                Danh sách lịch chờ khám
            </a>
        </header>
        <div class="container">
            <div class="container__header">
                <div class="search">
                    <form class="form_search" action="http://localhost/ManagerPatientPHP/lichdakham/timkiem" method="POST">
                        <label for="" class="search__label">Tìm kiếm</label>
                        <input type="text" name="txtSearch" placeholder="Nhập mã lịch hẹn" value="<?php if(isset($data['mlh'])) echo $data['mlh'] ?>" id="txtSearch" class="search__input">
                        <input class="btnSearch" name="btnSearch" type="submit" value="Tìm kiếm">
                    </form>
                </div>
            </div>
            <div class="container__content">
                <table class="donthuoc">
                    <tr>
                        <th style="text-align: left" class="col-1-4">Mã lịch hẹn</th>
                        <th style="text-align: left" class="col-1">Tên bệnh nhân</th>
                        <th style="text-align: left" class="col-1">Tên bác sỹ</th>
                        <th style="text-align: left" class="col-1">Ngày khám</th>
                        <th style="text-align: left" class="col-1">Tình trạng</th>
                        <th style="text-align: left" class="col-1">Ngày khám</th>
                        <th style="text-align: left" class="col-1">Chuẩn đoán</th>
                        <th style="text-align: left" class="col-1">Ghi chú</th>
                    </tr>


                    <?php
                    if (isset($data["data"]) && $data["data"] != null) {
                        while ($row = mysqli_fetch_array($data["data"])) {
                    ?>
                        <tr>
                            <td style="text-align: left" class="col-1-4"><?php echo $row['malichhen'] ?></td>
                            <td style="text-align: left" class="col-1"><?php echo $row['name'] ?></td>
                            <td style="text-align: left" class="col-1"><?php echo $row['hoten'] ?></td>
                            <td style="text-align: left" class="col-1"><?php echo $row['ngaykham'] ?></td>
                            <td style="text-align: left" class="col-1"><?php if($row['tinhtrang'] != "0") echo "Đã khám"?></td>
                            <td style="text-align: left" class="col-1"><?php echo $row['ngaykham']?></td>
                            <td style="text-align: left" class="col-1"><?php echo $row['chuandoan']?></td>
                            <td style="text-align: left" class="col-1"><?php echo $row['ghichu'] ?></td>
                        </tr>
                    <?php
                        }
                    }
                    ?>

                </table>
            </div>
        </div>
    </div>
</body>
</html>