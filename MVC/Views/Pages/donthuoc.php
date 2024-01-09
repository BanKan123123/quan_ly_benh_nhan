<!DOCTYPE html>
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
                <p class="name__page">Đơn thuốc</p>
                <p class="desc__page">Danh sách đơn thuốc đã cho</p>
            </div>
            <span class="btn--add">
                Thêm đơn thuốc
            </span>
        </header>
        <div class="container">
            <div class="container__header">
                <div class="main-functions">
                    <form action="http://localhost/ManagerPatientPHP/donthuoc/xuat" method="POST">
                        <input type="submit" name="excel" class="btn btn--excel" value="Excel">
                    </form>
                </div>
                <div class="search">
                    <form class="form_search" action="http://localhost/ManagerPatientPHP/donthuoc/timkiem" method="POST">
                        <label for="" class="search__label">Tìm kiếm</label>
                        <input type="text" name="txtSearch" placeholder="Nhập tên bệnh nhân" value="<?php if (isset($data['tbn'])) echo $data['tbn'] ?>" id="txtSearch" class="search__input">
                        <input class="btnSearch" name="btnSearch" type="submit" value="Tìm kiếm">
                    </form>
                </div>
            </div>
            <div class="container__content">
                <table class="donthuoc">
                    <tr>
                        <th style="text-align: left" class="col-1">Mã đơn thuốc</th>
                        <th style="text-align: left" class="col-1">Tên bệnh nhân</th>
                        <th style="text-align: left" class="col-1">Người kê đơn</th>
                        <th style="text-align: left" class="col-1">Tên thuốc</th>
                        <th style="text-align: left" class="col-1">Ngày kê đơn</th>
                        <th style="text-align: left" class="col-1">Hàm lượng</th>
                        <th style="text-align: left" class="col-1">Số lượng</th>
                        <th class="col-1-4"></th>
                        <th class="col-1-4"></th>
                    </tr>


                    <?php
                    if (isset($data["data"]) && $data["data"] != null) {
                        while ($row = mysqli_fetch_array($data["data"])) {

                            $ngaykedon = $row['ngaykedon'];
                            $ngaykedon_date = new DateTime($ngaykedon);
                            $ngaykedon = $ngaykedon_date->format("d-m-Y");
                    ?>
                            <tr>
                                <td style="text-align: left" class="col-1"><?php echo $row['madonthuoc'] ?></td>
                                <td style="text-align: left" class="col-1"><?php echo $row['name'] ?></td>
                                <td style="text-align: left" class="col-1"><?php echo $row['hoten'] ?></td>
                                <td style="text-align: left" class="col-1"><?php echo $row['tenthuoc'] ?></td>
                                <td style="text-align: left" class="col-1"><?php echo $ngaykedon ?></td>
                                <td style="text-align: left" class="col-1"><?php echo $row['hamluong'] ?></td>
                                <td style="text-align: left" class="col-1"><?php echo $row['soluong'] ?></td>
                                <td style="text-align: left" class="col-1-4">
                                    <a href="http://localhost/ManagerPatientPHP/donthuoc/sua/<?php echo $row['madonthuoc'] ?>">
                                        <lord-icon src="https://cdn.lordicon.com/hiqmdfkt.json" trigger="hover" colors="primary:#4be1ec,secondary:#cb5eee" style="width:30px;height:30px">
                                        </lord-icon>
                                    </a>
                                </td>
                                <td style="text-align: left" class="col-1-4">
                                    <a href="http://localhost/ManagerPatientPHP/donthuoc/delete/<?php echo $row['madonthuoc'] ?>">
                                        <lord-icon src="https://cdn.lordicon.com/tntmaygd.json" trigger="hover" colors="primary:#4be1ec,secondary:#cb5eee" style="width:30px;height:30px">
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
    <form class="form" method="post" action="http://localhost/ManagerPatientPHP/donthuoc/them">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm đơn thuốc</h4>
                    <button type="button" class="close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"></rect>
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"></rect>
                        </svg>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row__1">
                        <div class="id_medicine">
                            <div class="id_medicine__label">
                                <p>Tên bệnh nhân</p>
                                <span class="require">*</span>
                            </div>
                            <div class="id_medicine__input">
                                <select name="namebenhnhan" class="namebenhnhan">
                                    <?php
                                    if (isset($data['name']) && $data['name'] != null) {
                                        $i = 0;
                                        while ($row1 = mysqli_fetch_array($data['name'])) {
                                    ?>
                                            <option value="<?php echo $row1['name'] ?>"><?php echo $row1['name'] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row__2">
                        <div class="dosage__forms">
                            <div class="dosage__forms__label">
                                <p>Người kê đơn</p>
                                <span class="require">*</span>
                            </div>
                            <div class="dosage__forms__input">
                                <select name="namebacsi" class="namebenhnhan">
                                    <?php
                                    if (isset($data['hoten']) && $data['hoten'] != null) {
                                        $i = 0;
                                        while ($row1 = mysqli_fetch_array($data['hoten'])) {
                                    ?>
                                            <option value="<?php echo $row1['hoten'] ?>"><?php echo $row1['hoten'] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="drug__content">
                            <div class="drug__content__label">
                                <p>Ngày kê đơn</p>
                                <span class="require">*</span>
                            </div>
                            <div class="drug__content__input">
                                <input type="date" max="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d'); ?>" name="txtNgayKeDon" id="txtDrugContent" required>
                            </div>
                        </div>
                        <div class="supplier">
                            <div class="supplier__label">
                                <p>Tên thuốc</p>
                                <span class="require">*</span>
                            </div>
                            <div class="supplier__input">
                                <select name="tenthuoc" class="namebenhnhan">
                                    <?php
                                    if (isset($data['tenthuoc']) && $data['tenthuoc'] != null) {
                                        $i = 0;
                                        while ($row1 = mysqli_fetch_array($data['tenthuoc'])) {
                                    ?>
                                            <option value="<?php echo $row1['tenthuoc'] ?>"><?php echo $row1['tenthuoc'] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row__3">
                        <div class="route_of_use">
                            <div class="route_of_use__label">
                                <p>Số lượng</p>
                                <span class="require">*</span>
                            </div>
                            <div class="route_of_use__input">
                                <input type="number" name="txtSoLuong" id="txtRouteOfUse" placeholder="300" min="0" required>
                            </div>
                        </div>
                        <div class="quantity">
                            <div class="quantity__label">
                                <p>Đơn vị</p>
                                <span class="require">*</span>
                            </div>
                            <div class="quantity__input">
                                <input type="text" name="txtDonVi" id="txtQuantity" required placeholder="viên">
                            </div>
                        </div>
                    </div>
                    <div class="note">
                        <div class="note__label">
                            <p>Hướng dẫn</p>
                            <span class="require">*</span>
                        </div>
                        <div class="note__input">
                            <input type="text" name="txthuongdan" id="txtNote" required placeholder="Dùng như nào?">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="modal-btn btn-cancel">Hủy</button>
                    <input type="submit" name="btnLuu" class="modal-btn btn-add" value="Thêm đơn thuốc" />
                </div>
            </div>
        </div>
    </form>
    <script src="http://localhost/ManagerPatientPHP/Public/js/medicalBox.js"></script>
</body>

</html>