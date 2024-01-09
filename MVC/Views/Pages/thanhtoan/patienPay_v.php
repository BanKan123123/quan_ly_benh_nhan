<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://localhost/ManagerPatientPHP/Public/css/medicalBox.css">
    <link rel="stylesheet" href="http://localhost/ManagerPatientPHP/Public/css/editdoctor.css">
</head>

<body>
    <div class="main">
        <header class="header">
            <div class="page">
                <h1 class="name__page">Thanh toán</h1>
                <h3 class="desc__page">Quản lý thanh toán </h3>
            </div>
            <span class="btn--add" style="font-size: 13px; font-weight: 700" data-bs-toggle="modal" data-bs-target="#addNewDoctor">
                Thêm thanh toán
            </span>
            <form method="POST" action="http://localhost/ManagerPatientPHP/danhsachthanhtoan/themthanhtoan" class="modal needs-validation" id="addNewDoctor">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Thêm mới thanh toán</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="account" class="form-label">Mã bệnh nhân</label>
                                <select id="select-name" required name="mabenhnhan" class="form-select" aria-label="Default select example">
                                    <option selected>Chọn mã bệnh nhân</option>
                                    <?php
                                    if (mysqli_num_rows($data['listBenhnhan']) > 0) {
                                        while ($row = mysqli_fetch_array($data['listBenhnhan'])) {
                                    ?>
                                            <option data-name="<?php echo $row['name'] ?>" value="<?php echo $row['mabenhnhan'] ?>"><?php echo $row['mabenhnhan'] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Họ và tên</label>
                                <input placeholder="Họ và tên" required name="hovaten" type="text" class="form-control" id="name">
                            </div>
                            <div class="mb-3">
                                <label for="date" class="form-label">Ngày thanh toán</label>
                                <input required name="ngaythanhtoan" type="date" class="form-control" id="date">
                            </div>

                            <div class="mb-3">
                                <label for="sex" class="form-label">Phương thức thanh toán</label>
                                <select required name="phuongthucthanhtoan" class="form-select">                         
                                    <option value="Tiền Mặt">Tiền mặt</option>
                                    <option value="Chuyển Khoản">Chuyển khoản</option>
                                </select>
                            </div>

                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Hủy</button>
                            <button type="submit" class="btn btn-primary">Thêm mới</button>
                        </div>
                    </div>
                </div>
            </form>

        </header>
        <div class="container">
            <div class="container__header">
                <form method="POST" action="" class="main-functions">
                    <button name="excel" class="btn btn--excel">
                        <span>Excel</span>
                    </button>
                    <button class="btn btn--pdf">
                        <span>Pdf</span>
                    </button>
                </form>
                <form method="POST" action="http://localhost/ManagerPatientPHP/danhsachthanhtoan/timkiem" class="search">
                    <label for="" class="search__label">Tìm kiếm</label>
                    <input placeholder="Tìm kiếm" type="text" name="keyword" id="txtSearch" class="search__input" />
                </form>
            </div>

            <div class="container__content">
                <table class="drug--info table table-striped table-hover">
                    <tr>
                        <th style="text-align: left" class="col-1">Mã thanh toán</th>
                        <th style="text-align: left" class="col-1">Mã bệnh nhân</th>
                        <th style="text-align: left" class="col-1">Ngày thanh toán</th>
                        <th style="text-align: left" class="col-1">Phương thức tt</th>
                        <th style="text-align: left" class="col-1">Mã viện phí</th>
                        <th style="text-align: left" class="col-1">Mã bảo hiểm</th>
                        <th style="text-align: left" class="col-2">Tình trạng</th>
                        <th class="col-1-4"></th>
                        <th class="col-1-4"></th>
                    </tr>
                    <?php
                    // B3: Xử lý kết quả
                    if (isset($data["listPatient"]) && $data["listPatient"] != null) {
                        while ($row = mysqli_fetch_array($data["listPatient"])) {
                    ?>
                            <tr>
                                <td style="text-align: left" class="col-1"><?php echo $row['mathanhtoan'] ?></td>
                                <td style="text-align: left" class="col-1"><?php echo $row['mabenhnhan'] ?></td>
                                <td style="text-align: left" class="col-1"><?php echo $row['ngaythanhtoan'] ?></td>
                                <td style="text-align: left" class="col-1"><?php if ($row['phuongthucthanhtoan'] == '0') echo "Chuyển khoản";
                                                                            else echo "Tiền mặt" ?></td>
                                <td style="text-align: left" class="col-1"><?php echo $row['mavienphi'] ?></td>
                                <td style="text-align: left" class="col-1"><?php echo $row['mabaohiemyte'] ?></td>
                                <td style="text-align: left" class="col-1"><?php if ($row['tinhtrang'] == '0') echo "Chưa thanh toán";
                                                                            else echo "Đã thanh toán" ?></td>

                                <td style="text-align: left" class="col-1-4">
                                    <a href="http://localhost/ManagerPatientPHP/danhsachthanhtoan/suathanhtoan/?id=<?php echo $row['mathanhtoan']; ?>" class="btn--edit">
                                        <lord-icon src="https://cdn.lordicon.com/hiqmdfkt.json" trigger="hover" colors="primary:#26577C,secondary:#cb5eee" style="width:30px;height:30px">
                                        </lord-icon>
                                    </a>
                                </td>
                                <td style="text-align: left" class="col-1-4">
                                    <a href="#" class="btn--remove" data-bs-toggle="modal" data-bs-target="#delete<?php echo $row['mathanhtoan']; ?>">
                                        <lord-icon src="https://cdn.lordicon.com/tntmaygd.json" trigger="hover" colors="primary:#D80032,secondary:#cb5eee" style="width:30px;height:30px">
                                        </lord-icon>
                                    </a>

                                    <div class=" modal fade" id="delete<?php echo $row['mathanhtoan']; ?>" tabindex="-1" aria-labelledby="deleteLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteLabel">Xóa thanh toán</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <h5>Bạn có chắc muốn xóa thanh toán không</h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                                    <a href="http://localhost/ManagerPatientPHP/danhsachthanhtoan/xoathanhtoan/?id=<?php echo $row['mathanhtoan']; ?>"> <button style="width: 200px;" type="button" class="btn btn-danger">Xác nhận</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </table>
            </div>
        </div>

        <script>
            document.getElementById('select-name').addEventListener('change', function() {
                var selectedValue = this.value;

                // Lấy giá trị trường "name" từ tùy chọn đã chọn
                var selectedOption = this.options[this.selectedIndex];
                var nameValue = selectedOption.getAttribute('data-name');

                console.log(nameValue);
                if (nameValue) {
                    document.getElementById('name').value = nameValue;
                } else {
                    document.getElementById('name').value = "";
                }
            })
        </script>
</body>

</html>