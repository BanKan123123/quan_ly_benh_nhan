<?php
$getDataById = $data['patient'];
$getDataByM = $data['Mbs'];
$getDataByV = $data['Mvp'];
$dt = new DateTime($getDataById['ngaythanhtoan']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://localhost/ManagerPatientPHP/Public/css/editdoctor.css">
</head>

<body>
    <div class="main">
        <header class="header">
            <div class="page">
                <h1 class="name__page">Thanh toán</h1>
                <h3 class="desc __page">Sửa thanh toán</h3>
            </div>
        </header>

        <div class="container">
            <form method="POST" action="http://localhost/ManagerPatientPHP/danhsachthanhtoan/xacnhansuathanhtoan">
                <div class="mb-3">
                    <label for="patient" class="form-label">Mã thanh toán</label>
                    <input required name="mathanhtoan" type="text" class="form-control" id="patient" readonly value="<?php echo $getDataById['mathanhtoan'] ?>   ">
                </div>

                <div class="mb-3">
                    <label for="account" class="form-label">Chọn mã bệnh nhân</label>
                    <input required readonly name="mabenhnhan" type="text" class="form-control" id="vienphi" value="<?php echo $getDataById['mabenhnhan']  ?>">
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Ngày thanh toán</label>
                    <input required name="ngaythanhtoan" type="date" class="form-control" id="date" value="<?php echo $dt->format('Y-m-d') ?>">
                </div>

                <div class="mb-3">
                    <label for="sex" class="form-label">Phương thức thanh toán</label>
                    <select required name="phuongthucthanhtoan" class="form-select">
                        <option value=1 <?php echo $getDataById['phuongthucthanhtoan'] == 'Tiền mặt ' ? 'selected' : '' ?>>Tiền mặt</option>
                        <option <?php echo $getDataById['phuongthucthanhtoan'] == 'Chuyển khoản' ? 'selected' : '' ?> value=0>Chuyển khoản</option>

                    </select>
                </div>

                <div class="mb-3">
                    <label for="vienphi" class="form-label">Mã viện phí</label>
                    <input required readonly name="mavienphi" type="text" class="form-control" id="vienphi" value="<?php echo $getDataById['mavienphi']  ?>">
                </div>

                <div class="mb-3">
                    <label for="file" class="form-label">Tình trạng</label>
                    <select name="tinhtrang" class="form-select" required>
                        <option value=1>Đã thanh toán</option>
                        <option value=0>Chưa thanh toán</option>
                    </select>
                </div>
                <div>
                    <a href="http://localhost/ManagerPatientPHP/danhsachthanhtoan"><button type="button" class="btn btn-danger">Hủy</button></a>
                    <input type="submit" class="btn btn-primary" value="Sửa"></input>
                </div>

            </form>

        </div>
    </div>
</body>

</html>