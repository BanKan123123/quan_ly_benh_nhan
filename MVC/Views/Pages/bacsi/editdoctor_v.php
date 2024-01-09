<?php
$getDoctorById = $data['dataDoctor'];
$dt = new DateTime($getDoctorById['ngaysinh']);
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
                <h1 class="name__page">Bác sĩ</h1>
                <h3 class="desc __page">Sửa bác sĩ</h3>
            </div>
        </header>

        <div class="container">
            <form method="POST" action="http://localhost/ManagerPatientPHP/danhsachbacsi/xacnhansuabacsi">
                <div>
                    <div class="mb-3">
                        <label for="mabacsi" class="form-label">Mã bác sĩ</label>
                        <input readonly required placeholder="Mã bác sĩ" name="mabacsi" type="text" class="form-control" id="mabacsi" value="<?php echo $getDoctorById['mabacsi'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="hoten" class="form-label">Họ tên</label>
                        <input readonly required placeholder="Họ và tên" name="hoten" type="text" class="form-control" id="hoten" value="<?php echo $getDoctorById['hoten'] ?>">
                    </div>

                    <div class="mb-3">
                        <label for="date" class="form-label">Ngày sinh</label>
                        <input required name="ngaysinh" type="date" max="<?php echo date('Y-m-d') ?>" class="form-control" id="date" value="<?php echo $dt->format('Y-m-d') ?>">
                    </div>

                    <div class="mb-3">
                        <label for="sex" class="form-label">Giới tính</label>
                        <select required name="sex" class="form-select">
                            <option value="Nam" <?php echo $getDoctorById['gioitinh'] == 'Nam' ? 'selected' : '' ?>>Nam</option>
                            <option <?php echo $getDoctorById['gioitinh'] == 'Nữ' ? 'selected' : '' ?> value="Nữ">Nữ</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Số điện thoại</label>
                        <input required placeholder="Số điện thoại" name="phone" type="number" class="form-control" id="phone" value="<?php echo $getDoctorById['sodienthoai'] ?>">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Địa chỉ email</label>
                        <input required placeholder="Địa chỉ email" name="email" type="email" class=" form-control" id="email" aria-describedby="emailHelp" value="<?php echo $getDoctorById['email'] ?>">
                    </div>

                    <div class="mb-3">
                        <label for="level" class="form-label">Trình độ</label>
                        <select required name="trinhdo" class="form-select" id="level">
                            <option <?php
                                    if ($getDoctorById['trinhdo'] == 'Tiến sĩ') {
                                        echo  'selected';
                                    } else {
                                        echo '';
                                    } ?> value="Tiến sĩ">Tiến sĩ</option>
                            <option <?php
                                    if ($getDoctorById['trinhdo'] == 'Thực tập') {
                                        echo  'selected';
                                    } else {
                                        echo '';
                                    } ?> value="Thực tập">Thực tập</option>
                            <option <?php
                                    if ($getDoctorById['trinhdo'] == 'Thạc sĩ') {
                                        echo  'selected';
                                    } else {
                                        echo '';
                                    } ?> value="Thạc sĩ">Thạc sĩ</option>
                            <option <?php
                                    if ($getDoctorById['trinhdo'] == 'Phó giáo sư') {
                                        echo  'selected';
                                    } else {
                                        echo '';
                                    } ?> value="Phó giáo sư">Phó giáo sư</option>
                            <option <?php
                                    if ($getDoctorById['trinhdo'] == 'Giáo sư') {
                                        echo  'selected';
                                    } else {
                                        echo '';
                                    } ?> value="Giáo sư">Giáo sư</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="specialist" class="form-label">Khoa</label>
                        <select required name="khoa" class="form-select" aria-label="Default select example" value="<?php echo $getDoctorById['khoa'] ?>">
                            <?php
                            if (mysqli_num_rows($data['dataSpec']) > 0) {
                                while ($row = mysqli_fetch_array($data['dataSpec'])) {
                            ?>
                                    <option <?php echo $getDoctorById['makhoa'] == $row['makhoa'] ? 'selected' : '' ?> value="<?php echo $row['makhoa'] ?>"><?php echo $row['tenkhoa'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Trạng thái</label>
                        <select required name="level" class="form-select">
                            <option <?php echo $getDoctorById['tinhtrang'] == '1' ? 'selected' : '' ?> value="1">Rảnh</option>
                            <option <?php echo $getDoctorById['tinhtrang'] == '0' ? 'selected' : '' ?> value="0">Bận</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="file" class="form-label">Ảnh</label>
                        <input required name="image" type="file" class="form-control" id="file" value="<?php echo $getDoctorById['anh'] ?>">
                    </div>
                </div>
                <div>
                    <a href="http://localhost/ManagerPatientPHP/danhsachbacsi"><button type="button" class="btn btn-danger">Hủy</button></a>
                    <button name="submitDoctor" type="submit" class="btn btn-primary">Sửa</button>
                </div>

            </form>
        </div>
    </div>

</body>

</html>