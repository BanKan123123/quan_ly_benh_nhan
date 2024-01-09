<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://localhost/ManagerPatientPHP/Public/css/auth.css" />
</head>

<body>
    <div class="auth">
        <div class="auth-container">
            <div class="container-right">
                <h1>Đăng ký</h1>
                <h3>Đã có tài khoản? <a href="http://localhost/ManagerPatientPHP/taikhoan">Đăng nhập ngay</a></h3>
                <form method="POST" action="http://localhost/ManagerPatientPHP/taikhoan/confirmdangky" class="form-signUp">
                    <div class="mb-3">
                        <label for="name" class="form-label">Họ và tên</label>
                        <input name="name" required placeholder="Họ và tên" type="text" class="form-control" id="name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Địa chỉ email</label>
                        <input name="email" required placeholder="Địa chỉ email" type="email" class="form-control" id="email" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Số điện thoại</label>
                        <input name="phone" required placeholder="Số điện thoại" type="number" class="form-control" id="phone">
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Ngày sinh</label>
                        <input name="date" required placeholder="Ngày sinh" type="date" max="<?php echo date('Y-m-d') ?>" class="form-control" id="date">
                    </div>
                    <div class="mb-3">
                        <label for="gioitinh" class="form-label">Giới tính</label>
                        <select required name="gioitinh" class="form-select" aria-label="Default select example">
                            <option selected>Chọn giới tính</option>
                            <option value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="quequan" class="form-label">Quê quán</label>
                        <input name="quequan" required placeholder="Quê quán" type="text" class="form-control" id="quequan">
                    </div>
                    <div class="mb-3">
                        <label for="anh" class="form-label">Ảnh</label>
                        <input name="anh" required placeholder="Ảnh" type="file" class="form-control" id="anh">
                    </div>
                    <div class="mb-3">
                        <label for="baohiemyte" class="form-label">Mã bảo hiểm y tế</label>
                        <input name="baohiemyte" required placeholder="Mã bảo hiểm y tế" type="number" class="form-control" id="baohiemyte">
                    </div>

                    <div class="mb-3">
                        <label for="pasword" class="form-label">Mật khẩu</label>
                        <input name="password" required placeholder="Mật khẩu" type="password" class="form-control" id="pasword">
                    </div>
                    <div class="mb-3">
                        <label for="repasword" class="form-label">Nhập lại mật khẩu</label>
                        <input name="repassword" required placeholder="Nhập lại mật khẩu" type="password" class="form-control" id="repasword">
                    </div>
                    <button type="submit" class="btn-signIn btn btn-primary">Đăng ký</button>
                </form>
            </div>

            <div class="container-left">
                <img src="http://localhost/ManagerPatientPHP/Public/img/logo-piincode.png" alt="hrlo">
                <h1>Chào mừng bạn đến với PiinCode</h1>
                <h3>Hệ thống quản lý bệnh nhân thông minh</h3>
                <h3>tích hợp điện toán đám mây và trí tuệ nhân tạo </h3>

                <lord-icon src="https://cdn.lordicon.com/kibcffov.json" trigger="loop" colors="outline:#121331,primary:#3a3347,secondary:#93150d,tertiary:#4bb3fd,quaternary:#ffc738,quinary:#ebe6ef,senary:#646e78" style="width:350px;height:350px"></lord-icon>
            </div>
        </div>
    </div>
    <script src="https://cdn.lordicon.com/bhenfmcm.js"></script>

</body>

</html>