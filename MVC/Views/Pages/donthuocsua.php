<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/ManagerPatientPHP/Public/css/donthuocsua.css">
    <title>Document</title>
</head>
<body>
    <form class="form__edit" method="POST" action="http://localhost/ManagerPatientPHP/donthuoc/suadl">
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
                        <p>Mã đơn thuốc</p>
                        <span class="require">*</span>
                    </div>
                    <div class="name_medicine__input">
                        <input type="text" name="txtMaDonThuoc" id="txtNameMedicine" value="<?php echo $row['madonthuoc']?>" readonly/>
                    </div>
                </div>
                <div class="id_medicine">
                    <div class="id_medicine__label">
                        <p>Tên bệnh nhân</p>
                        <span class="require">*</span>
                    </div>
                    <div class="id_medicine__input">
                        <select name="namebenhnhan" class="namebenhnhan">
                        <?php
                            if(isset($data['name']) && $data['name'] != null) {
                            $i = 0;
                                while($row1 = mysqli_fetch_array($data['name'])) {
                        ?>
                            <option value="<?php echo $row1['name']?>" <?php echo $row1['name'] == $row['name'] ? 'selected' : '' ?>><?php echo $row1['name']?></option>
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
                                    if(isset($data['hoten']) && $data['hoten'] != null) {
                                    $i = 0;
                                        while($row1 = mysqli_fetch_array($data['hoten'])) {
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
                        <p>Ngày kê đơn</p>
                        <span class="require">*</span>
                    </div>
                    <div class="drug__content__input">
                        <input type="date" name="txtNgayKeDon" id="txtDrugContent" value="<?php $dt = new DateTime($row['ngaykedon']); echo $dt->format('Y-m-d') ?>"/>
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
                                    if(isset($data['tenthuoc']) && $data['tenthuoc'] != null) {
                                    $i = 0;
                                        while($row1 = mysqli_fetch_array($data['tenthuoc'])) {
                                ?>
                                    <option value="<?php echo $row1['tenthuoc']?>" <?php echo $row1['tenthuoc'] == $row['tenthuoc'] ? 'selected' : '' ?>><?php echo $row1['tenthuoc']?></option>
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
                        <input type="number" name="txtsoluong" id="txtRouteOfUse" value="<?php echo $row['soluong']?>"/>
                    </div>
                </div>
                <div class="quantity">
                    <div class="quantity__label">
                        <p>Đơn vị</p>
                        <span class="require">*</span>
                    </div>
                    <div class="quantity__input">
                        <input type="text" name="txtdonvi" id="txtQuantity" value="<?php echo $row['donvi']?>"/>
                    </div>
                </div>
            </div>
            <div class="note">
                <div class="note__label">
                    <p>Hướng dẫn</p>
                </div>
                <div class="note__input">
                    <input type="text" name="txthuongdan" id="txtNote"  value="<?php echo $row['huongdan']?>"/>
                </div>
                <div class="footer">
                    <a href="http://localhost/ManagerPatientPHP/donthuoc/Get_data" class="btnCancel">Hủy</a>
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