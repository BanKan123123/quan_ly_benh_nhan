<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/ManagerPatientPHP/Public/css/medicalBoxEdit.css">
    <title>Document</title>
</head>

<body>
    <form class="form__edit" method="POST" action="http://localhost/ManagerPatientPHP/medicalBox/suadl">
        <div class="content">
            <?php
            // B3: Xử lý kết quả
            if (isset($data['data']) && $data['data'] != null) {
                $i = 0;
                while ($row = mysqli_fetch_array($data['data'])) {
            ?>
                    <div class="row__1">
                        <div class="name_medicine">
                            <div class="name_medicine__label">
                                <p>Tên thuốc</p>
                                <span class="require">*</span>
                            </div>
                            <div class="name_medicine__input">
                                <input type="text" name="txtNameMedicine" required id="txtNameMedicine" value="<?php echo $row['tenthuoc'] ?>" />
                            </div>
                        </div>
                        <div class="id_medicine">
                            <div class="id_medicine__label">
                                <p>Mã thuốc</p>
                                <span class="require">*</span>
                            </div>
                            <div class="id_medicine__input">
                                <input type="text" name="txtIdMedicine" required id="txtIdMedicine" value="<?php echo $row['mathuoc'] ?>" readonly />
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
                                <input type="text" name="txtDosageForms" required id="txtDosageForms" value="<?php echo $row['dangbaoche'] ?>" />
                            </div>
                        </div>
                        <div class="drug__content">
                            <div class="drug__content__label">
                                <p>Hàm lượng</p>
                                <span class="require">*</span>
                            </div>
                            <div class="drug__content__input">
                                <input type="text" name="txtDrugContent" required id="txtDrugContent" value="<?php echo $row['hamluong'] ?>" />
                            </div>
                        </div>
                        <div class="supplier">
                            <div class="supplier__label">
                                <p>Nhà cung cấp</p>
                                <span class="require">*</span>
                            </div>
                            <div class="supplier__input">
                                <input type="text" name="txtSupplier" required id="txtSupplier" value="<?php echo $row['nhacungcap'] ?>" />
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
                                <input type="text" name="txtRouteOfUse" required id="txtRouteOfUse" value="<?php echo $row['duongdung'] ?>" />
                            </div>
                        </div>
                        <div class="quantity">
                            <div class="quantity__label">
                                <p>Số lượng</p>
                                <span class="require">*</span>
                            </div>
                            <div class="quantity__input">
                                <input type="number" name="txtQuantity" min="0" required id="txtQuantity" value="<?php echo $row['soluong'] ?>" />
                            </div>
                        </div>
                        <div class="price">
                            <div class="price__label">
                                <p>Giá</p>
                                <span class="require">*</span>
                            </div>
                            <div class="price__input">
                                <input type="number" name="txtPrice" min="0" required id="txtPrice" value="<?php echo $row['gia'] ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="expiration__date">
                        <div class="expiration__date__label">
                            <p>Ngày hết hạn</p>
                            <span class="require">*</span>
                        </div>
                        <div class="expiration__date__input">
                            <input type="date" min="<?php echo date('Y-m-d') ?>" name="txtexpirationDate" required id="txtexpirationDate" value="<?php echo $row['ngayhethan'] ?>" />
                        </div>
                    </div>
                    <div class="note">
                        <div class="note__label">
                            <p>Ghi chú</p>
                        </div>
                        <div class="note__input">
                            <input type="text" name="txtNote" id="txtNote" required value="<?php echo $row['ghichu'] ?>" />
                        </div>
                        <div class="footer">
                            <a href="http://localhost/ManagerPatientPHP/medicalBox/Get_data" class="btnCancel">Hủy</a>
                            <input type="submit" value="Lưu" name="btnSave" class="btnSave">
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </form>
</body>

</html>