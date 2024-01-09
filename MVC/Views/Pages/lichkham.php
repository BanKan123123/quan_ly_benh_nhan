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
                <p class="name__page">Danh sách lịch khám</p>
                <p class="desc__page">Danh sách lịch chờ khám bệnh</p>
            </div>
            <a href="http://localhost/ManagerPatientPHP/lichdakham/Get_data" class="btn--add">
                Danh sách lịch đã khám
            </a>
            </header>
        <div class="container">
            <div class="container__header">
                <div class="search">
                    <form class="form_search" action="http://localhost/ManagerPatientPHP/lichkham/timkiem" method="POST">
                        <label for="" class="search__label">Tìm kiếm</label>
                        <input type="text" name="txtSearch" placeholder="Nhập tên bệnh nhân" value="<?php if(isset($data['tbn'])) echo $data['tbn'] ?>" id="txtSearch" class="search__input">
                        <input class="btnSearch" name="btnSearch" type="submit" value="Tìm kiếm">
                    </form>
                </div>
            </div>
            <div class="container__content">
                <table class="donthuoc">
                    <tr>
                        <th style="text-align: left" class="col-1">Mã lịch hẹn</th>
                        <th style="text-align: left" class="col-2">Tên bệnh nhân</th>
                        <th style="text-align: left" class="col-2">Tên bác sỹ</th>
                        <th style="text-align: left" class="col-1">Ngày hẹn</th>
                        <th style="text-align: left" class="col-1">Tình trạng</th>
                        <th style="text-align: left" class="col-2">Ghi chú</th>
                        <th class="col-1-4"></th>
                    </tr>


                    <?php
                    if (isset($data["data"]) && $data["data"] != null) {
                        while ($row = mysqli_fetch_array($data["data"])) {
                    ?>
                        <tr>
                            <td style="text-align: left" class="col-1"><?php echo $row['malichhen'] ?></td>
                            <td style="text-align: left" class="col-2"><?php echo $row['name'] ?></td>
                            <td style="text-align: left" class="col-2"><?php echo $row['hoten'] ?></td>
                            <td style="text-align: left" class="col-1"><?php echo $row['ngayhen'] ?></td>
                            <td style="text-align: left" class="col-1"><?php if($row['tinhtrang'] == "0") echo "Chưa khám"?></td>
                            <td style="text-align: left" class="col-2"><?php echo $row['ghichu'] ?></td>
                            <td style="text-align: left" class="col-1-4">
                                <a href="http://localhost/ManagerPatientPHP/lichkham/sua/<?php echo $row['malichhen'] ?>">
                                    <lord-icon
                                        src="https://cdn.lordicon.com/hiqmdfkt.json"
                                        trigger="hover"
                                        colors="primary:#4be1ec,secondary:#cb5eee"
                                        style="width:30px;height:30px">
                                    </lord-icon>
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
    </div>
</body>
</html>