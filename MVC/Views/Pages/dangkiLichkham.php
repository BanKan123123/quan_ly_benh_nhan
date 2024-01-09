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
                <p class="name__page">Lịch hẹn</p>
                <p class="desc__page">Danh sách lịch hẹn</p>
            </div>
            <span class="btn--add">
                Đặt lịch khám
            </span>
        </header>
        <div class="container">

            <div class="container__content">
                <table class="donthuoc">
                    <tr>
                        <th style="text-align: left" class="col-1">STT</th>
                        <th style="text-align: left" class="col-1">Ngày hẹn</th>
                        <th style="text-align: left" class="col-2">Ghi chú</th>
                    </tr>


                    <?php
                    if (isset($data["data"]) && $data["data"] != null) {
                        $i = 0;
                        while ($row = mysqli_fetch_array($data["data"])) {
                    ?>
                    <tr>
                        <td style="text-align: left" class="col-1"><?php echo ++$i ?></td>
                        <td style="text-align: left" class="col-1"><?php echo $row['ngayhen'] ?></td>
                        <td style="text-align: left" class="col-2"><?php echo $row['ghichu'] ?></td>
                    </tr>
                    <?php
                        }
                    }
                    ?>

                </table>
            </div>
        </div>
    </div>
    <form class="form" method="post" action="http://localhost/ManagerPatientPHP/dangKiLichKham/ins">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm lịch hẹn mới</h4>
                    <button type="button" class="close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                transform="rotate(-45 6 17.3137)" fill="black"></rect>
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                fill="black"></rect>
                        </svg>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row__2">
                        <div class="drug__content">
                            <div class="drug__content__label">
                                <p>Thời gian hẹn</p>
                                <span class="require">*</span>
                            </div>
                            <div class="drug__content__input">
                                <input type="date" value="<?php echo date('Y-m-d'); ?>"
                                    min="<?php echo date('Y-m-d'); ?>" name="txtNgayHen" id="txtDrugContent" required>
                            </div>
                        </div>
                    </div>
                    <div class="note">
                        <div class="note__label">
                            <p>Ghi chú</p>
                            <span class="require">*</span>
                        </div>
                        <div class="note__input">
                            <input type="text" name="txtGhiChu" id="txtNote" required placeholder="Ghi chú">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="modal-btn btn-cancel">Hủy</button>
                    <input type="submit" name="btnLuu" class="modal-btn btn-add" value="Đặt lịch" />
                </div>
            </div>
        </div>
    </form>
    <script src="http://localhost/ManagerPatientPHP/Public/js/medicalBox.js"></script>
</body>

</html>