<?php
$getLuotKham = $data['luotkham'];
$dt = new DateTime($getLuotKham['ngaykham']);
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
                <h1 class="name__page">Bênh nhân</h1>
                <h3 class="desc __page">Sửa bênh nhân</h3>
            </div>
        </header>

        <div class="container">
            <form method="POST" action="http://localhost/ManagerPatientPHP/thongkekhambenh/xacnhansualuotkham">
                <div class="mb-3">
                    <label for="patient" class="form-label">Mã hồ sơ khám bệnh</label>
                    <input readonly name="mahosokhambenh" type="text" class="form-control" id="patient" value="<?php echo $getLuotKham['mahosokhambenh'] ?>">
                </div>

                <div class="mb-3">
                    <label for="patient" class="form-label">Mã bệnh nhân</label>
                    <input readonly name="mabenhnhan" type="text" class="form-control" id="patient" value="<?php echo $getLuotKham['mabenhnhan'] ?>">
                </div>
                <div class="mb-3">
                    <label for="patient" class="form-label">Họ và tên</label>
                    <input readonly name="name" type="text" class="form-control" id="patient" value="<?php echo $getLuotKham['name'] ?>">
                </div>

                <div class="mb-3">
                    <label for="date" class="form-label">Ngày khám</label>
                    <input value="<?php echo $dt->format('Y-m-d') ?>" required name="ngaykham" type="date" class="form-control" id="date">
                </div>

                <div class="mb-3">
                    <label for="dichvu" class="form-label">Dịch vụ</label>
                    <select id="dichvu" required name="dichvu" class="select-service form-select" aria-label="Default select example" autocomplete="on">
                        <option selected>Chọn dịch vụ</option>
                        <option>Khám mắt</option>
                        <option>Tai Mũi họng</option>
                        <option>Nội soi</option>
                        <option>Khác</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="dichvu" class="form-label">Dịch vụ khác</label>
                    <input required placeholder="Dịch vụ" name="dichvu" type="text" class="service-others form-control" id="dichvu">
                </div>

                <div class="mb-3">
                    <label for="donthuoc" class="form-label">Đơn thuốc</label>
                    <select id="donthuoc" name='donthuoc' class="form-select" aria-label="Default select example" autocomplete="on">
                        <?php
                        if (mysqli_num_rows($data['listDonThuoc']) > 0) {
                            while ($row = mysqli_fetch_array($data['listDonThuoc'])) {
                        ?>
                                <option <?php echo $getLuotKham['mabenhnhan'] == $row['mabenhnhan'] ? 'selected' : '' ?> value="<?php echo $row['madonthuoc'] ?>"><?php echo $row['madonthuoc'] ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </div>


                <div class="mb-3">
                    <label for="file" class="form-label">Bác sĩ</label>
                    <select required name='bacsi' class="form-select" aria-label="Default select example" autocomplete="on">
                        <?php
                        if (mysqli_num_rows($data['listBacSi']) > 0) {
                            while ($row = mysqli_fetch_array($data['listBacSi'])) {
                        ?>
                                <option <?php echo $getLuotKham['mabacsi'] == $row['mabacsi'] ? 'selected' : '' ?> value="<?php echo $row['mabacsi'] ?>"><?php echo $row['hoten'] ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="ghichu" class="form-label">Ghi chú</label>
                    <input value="<?php echo $getLuotKham['ghichu'] ?>" name="ghichu" required placeholder="Ghi chú" type="text" class="form-control" id="ghichu">
                </div>
                <div>
                    <a href="http://localhost/ManagerPatientPHP/thongkekhambenh"><button style="height: 50px;" type="button" class="btn btn-danger">Hủy</button></a>
                    <button style="height: 50px;" type="submit" class="btn btn-primary">Sửa</button>
                </div>

            </form>
        </div>
    </div>
</body>

</html>