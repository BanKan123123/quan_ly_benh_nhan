<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/ManagerPatientPHP/Public/css/donthuocsua.css">
    <title>Document</title>
</head>
<body>
    <form class="form__edit" method="POST" action="http://localhost/ManagerPatientPHP/lichkham/suadl">
        <div class="content">
            <?php
                // B3: Xử lý kết quả
                if(isset($data['data']) && $data['data'] != null) {
                    $i = 0;
                    while($row = mysqli_fetch_array($data['data'])) {
            ?>
            <div class="row__1">
                <div class="name_medicine">
                    <div class="name_medicine__label">
                        <p>Mã lịch hẹn</p>
                        <span class="require">*</span>
                    </div>
                    <div class="name_medicine__input">
                        <input type="text" name="txtMaLichHen" id="txtNameMedicine" value="<?php echo $row['malichhen']?>" readonly/>
                    </div>
                </div>
                <div class="id_medicine">
                    <div class="id_medicine__label">
                        <p>Tên bệnh nhân</p>
                        <span class="require">*</span>
                    </div>
                    <div class="id_medicine__input">
                        <input type="text" name="txtName" value="<?php echo $row['name'] ?>" required id="txtNameBenhNhan" readonly>
                    </div>
                </div>
            </div>
            <div class="row__2">
                <div class="dosage__forms">
                    <div class="dosage__forms__label">
                        <p>Tên bác sĩ</p>
                        <span class="require">*</span>
                    </div>
                    <div class="dosage__forms__input">
                        <select name="namebacsi" class="namebenhnhan">
                            <?php
                                    if(isset($data['name']) && $data['name'] != null) {
                                    $i = 0;
                                        while($row1 = mysqli_fetch_array($data['name'])) {
                                ?>
                                    <option value="<?php echo $row1['hoten']?>" <?php echo $row1['hoten'] == $row['hoten'] ? 'selected' : '' ?>><?php echo $row1['hoten']?></option>
                                    <?php
                                        }
                                    }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="drug__content">
                    <div class="drug__content__label">
                        <p>Ngày khám</p>
                        <span class="require">*</span>
                    </div>
                    <div class="drug__content__input">
                        <input type="date" name="txtNgayKham" value = "<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d'); ?>" id="txtDrugContent"/>
                    </div>
                </div>
            </div>
            <div class="row__3">
                <div class="route_of_use">
                    <div class="route_of_use__label">
                        <p>Chuẩn đoán</p>
                        <span class="require">*</span>
                    </div>
                    <div class="route_of_use__input">
                        <select name="namechuandoan" class="namebenhnhan">
                            <?php
                                if(isset($data['chuandoan']) && $data['chuandoan'] != null) {
                                $i = 0;
                                    while($row1 = mysqli_fetch_array($data['chuandoan'])) {
                            ?>
                                <option value="<?php echo $row1['ICD']?>"><?php echo $row1['chuandoan']?></option>
                                <?php
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="quantity">
                    <div class="quantity__label">
                        <p>Điều trị</p>
                        <span class="require">*</span>
                    </div>
                    <div class="quantity__input">
                        <input type="text" name="txtdieutri" id="txtQuantity"/>
                    </div>
                </div>
            </div>
            <div class="note">
                <div class="note__label">
                    <p>Ghi chú</p>
                </div>
                <div class="note__input">
                    <input type="text" name="txtghichu" id="txtNote"  value="<?php echo $row['ghichu']?>"/>
                </div>
                <div class="footer">
                    <a href="http://localhost/ManagerPatientPHP/lichkham/Get_data" class="btnCancel">Hủy</a>
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