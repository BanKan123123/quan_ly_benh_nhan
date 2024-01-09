
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
                <p class="name__page">Tài khoản</p>
                <p class="desc__page">Danh sách tài khoản</p>
            </div>
            <span class="btn--add">
                Thêm tài khoản
            </span>
            </header>
        <div class="container">
            <div class="container__header">
                <div class="search">
                    <form class="form_search" action="http://localhost/ManagerPatientPHP/account/find" method="POST">
                        <label for="" class="search__label">Tìm kiếm</label>
                        <input type="text" name="txtSearch" placeholder="Nhập tên người dùng" value="<?php if(isset($data['id'])) echo $data['id'] ?>" id="txtSearch" class="search__input">
                        <input class="btnSearch" name="btnSearch" type="submit" value="Tìm kiếm">
                    </form>
                </div>
            </div>
            <div class="container__content">
                <table class="donthuoc">
                    <tr>
                        <th style="text-align: left" class="col-1">Mã tài khoản</th>
                        <th style="text-align: left" class="col-2">Tên người dùng</th>
                        <th style="text-align: left" class="col-2">Email</th>
                        <th style="text-align: left" class="col-1">Số điện thoại</th>
                        <th style="text-align: left" class="col-2">Loại tài khoản</th>
                        <th class="col-1-4"></th>
                    </tr>


                    <?php
                    if (isset($data["data"]) && $data["data"] != null) {
                        while ($row = mysqli_fetch_array($data["data"])) {
                    ?>
                        <tr>
                            <td style="text-align: left" class="col-1"><?php echo $row['id'] ?></td>
                            <td style="text-align: left" class="col-2"><?php echo $row['name'] ?></td>
                            <td style="text-align: left" class="col-2"><?php echo $row['username'] ?></td>
                            <td style="text-align: left" class="col-1"><?php echo $row['sodienthoai'] ?></td>
                            <td style="text-align: left" class="col-2">
                                <?php if($row['role'] == "1") echo "Tài khoản admin"; else echo "Tài khoản thường" ?>
                            </td>
                            <td style="text-align: left" class="col-1-4">
                                <a href="http://localhost/ManagerPatientPHP/account/delete/<?php echo $row['id'] ?>">
                                    <lord-icon
                                        src="https://cdn.lordicon.com/tntmaygd.json"
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
    <form class="form" method="post" action="http://localhost/ManagerPatientPHP/account/insert">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm tài khoản</h4>
                    <button type="button" class="close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"></rect>
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"></rect>
                        </svg>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row__1">
                        <div class="dosage__forms">
                            <div class="dosage__forms__label">
                                <p>Mã tài khoản</p>
                                <span class="require">*</span>
                            </div>
                            <div class="dosage__forms__input">
                                <input type="text" name="txtMaTaiKhoan" id="txtDosageForms" required placeholder="01">
                            </div>
                        </div>
                        <div class="id_medicine">
                            <div class="id_medicine__label">
                                <p>Tên người dùng</p>
                                <span class="require">*</span>
                            </div>
                            <div class="id_medicine__input">
                            <input type="text" name="txtTenNguoiDung" id="txtIdMedicine" required placeholder="Bùi Văn A">
                            </div>
                        </div>
                    </div>
                    <div class="row__2">
                        <div class="name_medicine">
                            <div class="name_medicine__label">
                                <p>Email</p>
                                <span class="require">*</span>
                            </div>
                            <div class="name_medicine__input">
                                <input type="email" name="txtEmail" id="txtNameMedicine" required placeholder="khambenh1@gmail.com">
                            </div>
                        </div>
                        <div class="drug__content">
                            <div class="drug__content__label">
                                <p>Mật khẩu</p></p>
                                <span class="require">*</span>
                            </div>
                            <div class="drug__content__input">
                                <input type="text" name="txtMatKhau" id="txtDrugContent" required>
                            </div>
                        </div>
                    </div>
                    <div class="row__3">
                        <div class="supplier">
                            <div class="supplier__label">
                                <p>Số điện thoại</p>
                                <span class="require">*</span>
                            </div>
                            <div class="supplier__input">
                                <input type="tel" name="txtSoDienThoai" id="txtSupplier" required>
                            </div>
                        </div>
                        <div class="route_of_use">
                            <div class="route_of_use__label">
                                <p>Quyền</p>
                                <span class="require">*</span>
                            </div>
                            <div class="route_of_use__input">
                                <select name="quyen" class="namebenhnhan">
                                    <option disabled>--Phân quyền--</option>
                                    <option value="1">Admin</option>
                                    <option value="0">Tài khoản thường</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="modal-btn btn-cancel">Hủy</button>
                    <input type="submit" name="btnLuu" class="modal-btn btn-add" value="Thêm tài khoản" />
                </div>
            </div>
        </div>
    </form>
    <script src="http://localhost/ManagerPatientPHP/Public/js/medicalBox.js"></script>
</body>
</html>