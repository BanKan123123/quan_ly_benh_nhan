<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/ManagerPatientPHP/Public/css/medicalBox.css">
    <title>Tủ thuốc</title>

    <style>
        input {
            color: #333;
        }
    </style>
</head>

<body>
    <div class="main">
        <header class="header">
            <div class="page">
                <p class="name__page">Tủ thuốc</p>
                <p class="desc__page">Tủ thuốc của bạn</p>
            </div>
            <span class="btn--add">
                Thêm thuốc mới
            </span>
        </header>
        <div class="container">
            <div class="container__header">
                <div class="main-functions">
                    <form action="http://localhost/ManagerPatientPHP/medicalBox/xuat" method="POST">
                        <input type="submit" name="excel" class="btn btn--excel" value="Excel">
                    </form>
                </div>
                <div class="search">
                    <form class="form_search" action="http://localhost/ManagerPatientPHP/medicalBox/timkiem" method="POST">
                        <label for="" class="search__label">Tìm kiếm</label>
                        <input type="text" name="txtSearch" placeholder="Nhập tên thuốc" id="txtSearch" class="search__input" value="<?php if (isset($data["tt"])) echo $data["tt"] ?>" />
                        <input class="btnSearch" name="btnSearch" type="submit" value="Tìm kiếm">
                    </form>
                </div>

            </div>

            <div class="container__content">
                <table class="drug--info">
                    <tr>
                        <th style="text-align: left" class="col-1">Mã thuốc</th>
                        <th style="text-align: left" class="col-1">Tên thuốc</th>
                        <th style="text-align: left" class="col-1">Hàm lượng</th>
                        <th style="text-align: left" class="col-1">Nhà cung cấp</th>
                        <th style="text-align: left" class="col-1">Ngày hết hạn</th>
                        <th style="text-align: left" class="col-1">Số lượng</th>
                        <th style="text-align: left" class="col-1">Giá</th>
                        <th class="col-1-4"></th>
                        <th class="col-1-4"></th>
                    </tr>
                    <?php
                    if (isset($data["data"]) && $data["data"] != null) {
                        while ($row = mysqli_fetch_array($data["data"])) {
                            $ngayhethan = $row['ngayhethan'];
                            $ngaysinh_date = new DateTime($ngayhethan);
                            $ngayhethan = $ngaysinh_date->format("d-m-Y");
                    ?>
                            <tr>
                                <td style="text-align: left" class="col-1"><?php echo $row['mathuoc'] ?></td>
                                <td style="text-align: left" class="col-1"><?php echo $row['tenthuoc'] ?></td>
                                <td style="text-align: left" class="col-1"><?php echo $row['hamluong'] ?></td>
                                <td style="text-align: left" class="col-1"><?php echo $row['nhacungcap'] ?></td>
                                <td style="text-align: left" class="col-1"><?php echo $ngayhethan ?></td>
                                <td style="text-align: left" class="col-1"><?php echo $row['soluong'] ?></td>
                                <td style="text-align: left" class="col-1"><?php echo $row['gia'] ?></td>
                                <td style="text-align: left" class="col-1-4">
                                    <a href="http://localhost/ManagerPatientPHP/medicalBox/sua/<?php echo $row['mathuoc'] ?>">
                                        <lord-icon src="https://cdn.lordicon.com/hiqmdfkt.json" trigger="hover" colors="primary:#4be1ec,secondary:#cb5eee" style="width:30px;height:30px">
                                        </lord-icon>
                                    </a>
                                </td>
                                <td style="text-align: left" class="col-1-4">
                                    <a href="http://localhost/ManagerPatientPHP/medicalBox/delete/<?php echo $row['mathuoc'] ?>">
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
        <footer class="footer">
            <div class="pagination">

            </div>
        </footer>
    </div>
    <form class="form" method="post" action="http://localhost/ManagerPatientPHP/medicalBox/Insert_data">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm thuốc mới</h4>
                    <button type="button" class="close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"></rect>
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"></rect>
                        </svg>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row__1">
                        <div class="name_medicine">
                            <div class="name_medicine__label">
                                <p>Tên thuốc</p>
                                <span class="require">*</span>
                            </div>
                            <div class="name_medicine__input">
                                <input type="text" name="txtNameMedicine" required id="txtNameMedicine" placeholder="Tenovir">
                            </div>
                        </div>
                        <div class="id_medicine">
                            <div class="id_medicine__label">
                                <p>Mã thuốc</p>
                                <span class="require">*</span>
                            </div>
                            <div class="id_medicine__input">
                                <input type="text" name="txtIdMedicine" required id="txtIdMedicine" placeholder="10258.KD.12.1">
                            </div>
                        </div>
                    </div>
                    <div class="row__2">
                        <div class="dosage__forms">
                            <div class="dosage__forms__label">
                                <p>Bào chế dạng</p>
                                <span class="require">*</span>
                            </div>
                            <div class="dosage__forms__input">
                                <input type="text" required name="txtDosageForms" id="txtDosageForms" placeholder="viên">
                            </div>
                        </div>
                        <div class="drug__content">
                            <div class="drug__content__label">
                                <p>Hàm lượng</p>
                                <span class="require">*</span>
                            </div>
                            <div class="drug__content__input">
                                <input type="text" required name="txtDrugContent" id="txtDrugContent" placeholder="300mg">
                            </div>
                        </div>
                        <div class="supplier">
                            <div class="supplier__label">
                                <p>Nhà cung cấp</p>
                                <span class="require">*</span>
                            </div>
                            <div class="supplier__input">
                                <input type="text" required name="txtSupplier" id="txtSupplier" placeholder="Traphaco">
                            </div>
                        </div>
                    </div>
                    <div class="row__3">
                        <div class="route_of_use">
                            <div class="route_of_use__label">
                                <p>Đường dùng</p>
                                <span class="require">*</span>
                            </div>
                            <div class="route_of_use__input">
                                <input type="text" required name="txtRouteOfUse" id="txtRouteOfUse" placeholder="uống">
                            </div>
                        </div>
                        <div class="quantity">
                            <div class="quantity__label">
                                <p>Số lượng</p>
                                <span class="require">*</span>
                            </div>
                            <div class="quantity__input">
                                <input type="number" required min="0" name="txtQuantity" id="txtQuantity" placeholder="300">
                            </div>
                        </div>
                        <div class="price">
                            <div class="price__label">
                                <p>Giá</p>
                                <span class="require">*</span>
                            </div>
                            <div class="price__input">
                                <input type="number" required min="0" name="txtPrice" id="txtPrice" placeholder="300">
                            </div>
                        </div>
                    </div>
                    <div class="expiration__date">
                        <div class="expiration__date__label">
                            <p>Ngày hết hạn</p>
                            <span class="require">*</span>
                        </div>
                        <div class="expiration__date__input">
                            <input type="date" required min="<?php echo date('Y-m-d'); ?>" name="txtexpirationDate" id="txtexpirationDate" placeholder="01/01/2024">
                        </div>
                    </div>
                    <div class="note">
                        <div class="note__label">
                            <p>Ghi chú</p>
                        </div>
                        <div class="note__input">
                            <input type="text" name="txtNote" id="txtNote" placeholder="Dễ dị ứng">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="modal-btn btn-cancel">Hủy</button>
                    <input type="submit" name="btnLuu" class="modal-btn btn-add" value="Thêm thuốc" />
                </div>
            </div>
        </div>
    </form>
    <script src="http://localhost/ManagerPatientPHP/Public/js/medicalBox.js"></script>
</body>

</html>