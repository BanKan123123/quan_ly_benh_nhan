<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="http://localhost/ManagerPatientPHP/Public/css/auth.css" />
</head>

<body>
    <div class="auth">
        <div class="auth-container">
            <div class="container-left">
                <img src="http://localhost/ManagerPatientPHP/Public/img/logo-piincode.png" alt="hrlo">
                <h1>Chào mừng bạn đến với PiinCode</h1>
                <h3>Hệ thống quản lý bệnh nhân thông minh</h3>
                <h3>tích hợp điện toán đám mây và trí tuệ nhân tạo </h3>

                <lord-icon src="https://cdn.lordicon.com/kibcffov.json" trigger="loop" colors="outline:#121331,primary:#3a3347,secondary:#93150d,tertiary:#4bb3fd,quaternary:#ffc738,quinary:#ebe6ef,senary:#646e78" style="width:350px;height:350px"></lord-icon>
            </div>
            <div class="container-right">
                <h1>Đăng nhập</h1>
                <h3>Chưa có tài khoản? <a href="http://localhost/ManagerPatientPHP/taikhoan/dangky">Đăng ký ngay</a></h3>
                <form method="POST" action="http://localhost/ManagerPatientPHP/taikhoan/dangnhap">
                    <div class="mb-3">
                        <label for="email" class="form-label">Địa chỉ email</label>
                        <input name="email" required placeholder="Địa chỉ email" type="email" class="form-control" id="email" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="pasword" class="form-label">Mật khẩu</label>
                        <input name="password" required placeholder="Mật khẩu" type="password" class="form-control" id="pasword">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Remember</label>
                    </div>
                    <h3><a href="http://localhost/ManagerPatientPHP/taikhoan/quenmatkhau">Quên mật khẩu</a></h3>
                    <button name="login" type="submit" class="btn-signIn btn btn-primary">Đăng nhập</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.lordicon.com/bhenfmcm.js"></script>


</body>

</html>