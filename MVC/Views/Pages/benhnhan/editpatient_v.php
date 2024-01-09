<?php
$getDataById = $data['patient'];
$dt = new DateTime($getDataById['ngaysinh']);
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
            <form method="POST" action="http://localhost/ManagerPatientPHP/danhsachbenhnhan/xacnhansuabenhnhan">
                <div class="mb-3">
                    <label for="patient" class="form-label">Mã bệnh nhân</label>
                    <input readonly required name="mabenhnhan" type="text" class="form-control" id="patient" value="<?php echo $getDataById['mabenhnhan'] ?>">
                </div>
                <div class="mb-3">
                    <label for="account" class="form-label">Tài khoản</label>
                    <input readonly required name="mabenhnhan" type="text" class="form-control" id="patient" value="<?php echo $getDataById['idtaikhoan'] ?>">
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Ngày sinh</label>
                    <input required name="ngaysinh" type="date" max="<?php echo date('Y-m-d') ?>" class="form-control" id="date" value="<?php echo $dt->format('Y-m-d') ?>">
                </div>

                <div class="mb-3">
                    <label for="sex" class="form-label">Giới tính</label>
                    <select required name="gioitinh" class="form-select">
                        <option value="Nam" <?php echo $getDataById['gioitinh'] == 'Nam' ? 'selected' : '' ?>>Nam</option>
                        <option <?php echo $getDataById['gioitinh'] == 'Nữ' ? 'selected' : '' ?> value="Nữ">Nữ</option>

                    </select>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Quê quán</label>
                    <input required placeholder="Quê quán" name="quequan" type="text" class="form-control" id="address" value="<?php echo $getDataById['quequan'] ?>">
                </div>

                <div class="mb-3">
                    <label for="file" class="form-label">Ảnh</label>
                    <input required name="anh" type="file" class="form-control" id="file">
                </div>
                <div>
                    <a href="http://localhost/ManagerPatientPHP/danhsachbenhnhan"><button type="button" class="btn btn-danger">Hủy</button></a>
                    <button type="submit" class="btn btn-primary">Sửa</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>