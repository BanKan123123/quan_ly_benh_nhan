<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/ManagerPatientPHP/Public/css/baohiem.css">
    <title>Document</title>
</head>
<body>
<div class="main">
        <header class="header">
            <div class="page">
                <p class="name__page">Bảo hiểm y tế</p>
                <p class="desc__page">Thông tin bảo hiểm y tế</p>
            </div>
        </header>
        <div class="container">
            <div class="container__header">
                <div class="search">
                    <form class="form_search" action="http://localhost/ManagerPatientPHP/baohiem/timkiem" method="POST">
                        <label for="" class="search__label">Tìm kiếm</label>
                        <input type="text" name="txtSearch" id="txtSearch" class="search__input" placeholder="Nhập mã bảo hiểm" value="<?php if(isset($data['mbh'])) echo $data['mbh']?>">
                        <input class="btnSearch" name="btnSearch" type="submit" value="Tìm kiếm">
                    </form>
                </div>
            </div>

            <div class="container__content">
                <table class="drug--info">
                    <tr>
                        <th style="text-align: start" class="col-1">Mã bảo hiểm</th>
                        <th style="text-align: start" class="col-1">Họ tên</th>
                        <th style="text-align: start" class="col-1">Ngày sinh</th>
                        <th style="text-align: start" class="col-2">Nơi khám chữa bệnh ban đầu</th>
                        <th style="text-align: start" class="col-1">Giá trị sử dụng từ</th>
                    </tr>
                    <?php
                    if (isset($data["data"]) && $data["data"] != null) {
                        while ($row = mysqli_fetch_array($data["data"])) {
                    ?>
                        <tr>
                            <td style="text-align: start" class="col-1"><?php echo $row['mabaohiem'] ?></td>
                            <td style="text-align: start" class="col-1"><?php echo $row['name'] ?></td>
                            <td style="text-align: start" class="col-1"><?php echo $row['ngaysinh'] ?></td>
                            <td style="text-align: start" class="col-2"><?php echo $row['noikhambenhbd'] ?></td>
                            <td style="text-align: start" class="col-1"><?php echo $row['giatrisudung'] ?></td>
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
</body>
</html>