<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://localhost/ManagerPatientPHP/Public/css/donthuocUser.css">
</head>

<body>
    <div class="main">
        <header class="header">
            <div class="page">
                <p class="name__page">Đơn thuốc</p>
                <p class="desc__page">Danh sách đơn thuốc</p>
            </div>
        </header>
        <div class="container">
            <div class="container__header">
                <div class="search">
                    <form class="form_search" action="http://localhost/ManagerPatientPHP/donthuocUser/timkiem" method="POST">
                        <label for="" class="search__label">Tìm kiếm</label>
                        <input type="text" name="txtSearch" placeholder="Nhập tên thuốc" value="<?php if (isset($data['id'])) echo $data['id'] ?>" id="txtSearch" class="search__input">
                        <input class="btnSearch" name="btnSearch" type="submit" value="Tìm kiếm">
                    </form>
                </div>
            </div>
            <div class="container__content">
                <table class="donthuoc drug--info table table-striped table-hover">
                    <tr>
                        <th style="text-align: left" class="col-1">STT</th>
                        <th style="text-align: left" class="col-1">Tên thuốc</th>
                        <th style="text-align: left" class="col-1">Hàm lượng</th>
                        <th style="text-align: left" class="col-1">Số lượng</th>
                        <th style="text-align: left" class="col-1">Hướng dẫn</th>
                    </tr>


                    <?php
                    if (isset($data["data"]) && $data["data"] != null) {
                        $i = 0;
                        while ($row = mysqli_fetch_array($data["data"])) {
                    ?>
                            <tr>
                                <td style="text-align: left" class="col-1"><?php echo ++$i ?></td>
                                <td style="text-align: left" class="col-1"><?php echo $row['tenthuoc'] ?></td>
                                <td style="text-align: left" class="col-1"><?php echo $row['hamluong'] ?></td>
                                <td style="text-align: left" class="col-1"><?php echo $row['soluong'] ?></td>
                                <td style="text-align: left" class="col-2"><?php echo $row['huongdan'] ?></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>

                </table>
            </div>
        </div>
    </div>

    <script src="http://localhost/ManagerPatientPHP/Public/js/medicalBox.js"></script>
</body>

</html>