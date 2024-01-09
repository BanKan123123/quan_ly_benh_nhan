<?php

ob_start(); //<--- Dòng code yêu cầu Output Buffering

$patient = array();

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
while ($row = mysqli_fetch_assoc($data['getPatient'])) {
    array_push($patient, $row);
}

if (isset($_POST['excel'])) {
    // Header row
    $headerRowData = ['Họ tên', 'Ngày sinh', 'Giới tính', 'Quê quán', 'Số điện thoại', 'Email', 'Ảnh'];
    $columnIndex = 1;
    foreach ($headerRowData as $headerCell) {
        $cellCoordinate = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($columnIndex) . '1';
        $sheet->setCellValue($cellCoordinate, $headerCell);
        $columnIndex++;
    }
    // Data rows
    $dataRow = 2;
    foreach ($patient as $rowData) {
        $columnIndex = 1;
        foreach ($rowData as $propertyValue) {
            $cellCoordinate = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($columnIndex) . $dataRow;
            $sheet->setCellValue($cellCoordinate, $propertyValue);
            $columnIndex++;
        }
        $dataRow++;
    }
    $writer = new Xlsx($spreadsheet);
    $writer->save('ex.xlsx');
    ob_end_flush(); //<--- Dòng code yêu cầu in ra tất cả và trả về reponse cho người dùng (Client) 
}

?>

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
                <h1 class="name__page">Bệnh Nhân</h1>
                <h3 class="desc__page">Quản lý bệnh nhân</h3>

            </div>
            <span class="btn--add" style="font-size: 13px; font-weight: 700 ;margin-left: auto; margin-right: 20px;" data-bs-toggle="modal" data-bs-target="#addNewDoctor">
                Thêm bệnh nhân mới
            </span>
            <span class="btn--add" style="font-size: 13px; font-weight: 700" data-bs-toggle="modal" data-bs-target="#addHoplize">
                Nhập viện
            </span>

            <form method="POST" action="http://localhost/ManagerPatientPHP/danhsachbenhnhan/nhapvien" class="modal needs-validation" id="addHoplize">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Nhập viên</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Họ và tên</label>
                                <select required name="hoten" class="form-select" aria-label="Default select example">
                                    <option selected>Chọn bệnh nhân</option>
                                    <?php
                                    if (mysqli_num_rows($data['listPatientNotYetHopitalized']) > 0) {
                                        while ($row = mysqli_fetch_array($data['listPatientNotYetHopitalized'])) {
                                    ?>
                                            <option value="<?php echo $row['mabenhnhan'] ?>"><?php echo $row['name'] ?></option>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <option value="Null"><?php echo "Không còn bệnh nhân nào!" ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="date" class="form-label">Ngày nhập viện</label>
                                <input required name="ngaynhapvien" type="date" min="<?php echo date('Y-m-d') ?>" max=" <?php echo date('Y-m-d') ?>" class="form-control" id="date">
                            </div>

                            <div class="mb-3">
                                <label for="disease" class="form-label">Bệnh</label>
                                <select required name="benh" class="form-select" aria-label="Default select example">
                                    <option selected>Chọn bệnh</option>
                                    <?php
                                    if (mysqli_num_rows($data['listDiseases']) > 0) {
                                        while ($row = mysqli_fetch_array($data['listDiseases'])) {
                                    ?>
                                            <option value="<?php echo $row['mabenh'] ?>"><?php echo $row['tenbenh'] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="prevention" class="form-label">Phòng bệnh</label>
                                <select required name="phongbenh" class="form-select" aria-label="Default select example">
                                    <option selected>Chọn phòng bệnh</option>
                                    <?php
                                    if (mysqli_num_rows($data['listPreventions']) > 0) {
                                        while ($row = mysqli_fetch_array($data['listPreventions'])) {
                                    ?>
                                            <option value="<?php echo $row['maphongbenh'] ?>"><?php echo $row['tenphongbenh'] ?></option>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <option value="Null"><?php echo "Không còn phòng nào!" ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="bed" class="form-label">Giường bệnh</label>
                                <select required name="giuong" class="form-select" aria-label="Default select example">
                                    <option selected>Chọn giường bệnh</option>
                                    <?php
                                    if (mysqli_num_rows($data['listBedhopitals']) > 0) {
                                        while ($row = mysqli_fetch_array($data['listBedhopitals'])) {
                                    ?>
                                            <option value="<?php echo $row['magiuong'] ?>"><?php echo $row['sogiuong'] ?></option>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <option value="Null"><?php echo "Không còn giường nào!" ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="doctor" class="form-label">Bác sĩ phụ trách</label>
                                <select required name="bacsi" class="form-select" aria-label="Default select example">
                                    <option selected>Chọn bác sĩ</option>
                                    <?php
                                    if (mysqli_num_rows($data['listDocstor']) > 0) {
                                        while ($row = mysqli_fetch_array($data['listDocstor'])) {
                                    ?>
                                            <option value="<?php echo $row['mabacsi'] ?>"><?php echo $row['hoten'] ?></option>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <option value="Null"><?php echo "Không còn bác sĩ nào" ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="note" class="form-label">Ghi chú</label>
                                <input placeholder="Ghi chú" required name="ghichu" type="text" class="form-control" id="note">
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

            <form method="POST" action="http://localhost/ManagerPatientPHP/danhsachbenhnhan/thembenhnhan" class="modal needs-validation" id="addNewDoctor">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Thêm mới bệnh nhân</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="account" class="form-label">Họ và tên</label>
                                <select required name="taikhoan" class="form-select" aria-label="Default select example">
                                    <option selected>Chọn tên</option>
                                    <?php
                                    if (mysqli_num_rows($data['listAccount']) > 0) {
                                        while ($row = mysqli_fetch_array($data['listAccount'])) {
                                    ?>
                                            <option value="<?php echo $row['id'] ?>"><?php echo $row['username'] ?></option>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <option value="Null"><?php echo "Không còn tài khoản nào!" ?></option>
                                    <?php
                                    }
                                    ?>
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
                <form method="POST" action="http://localhost/ManagerPatientPHP/danhsachbenhnhan" class="main-functions">
                    <button type="submit" name="excel" class="btn btn--excel">
                        <span>Excel</span>
                    </button>
                    <button class="btn btn--pdf">
                        <span>Pdf</span>
                    </button>
                </form>
                <form method="POST" action="http://localhost/ManagerPatientPHP/danhsachbenhnhan/timkiem" class="search">
                    <label for="" class="search__label">Tìm kiếm</label>
                    <input placeholder="Tìm kiếm" type="text" name="keyword" id="txtSearch" class="search__input">
                </form>
            </div>

            <div class="container__content">
                <table class="drug--info table table-striped table-hover">
                    <tr>
                        <th style="text-align: left" class="col-1">Mã bệnh nhân</th>
                        <th style="text-align: left" class="col-1">Họ tên</th>
                        <th style="text-align: left" class="col-1">Ngày sinh</th>
                        <th style="text-align: left" class="col-1">Giới tính</th>
                        <th style="text-align: left" class="col-1">Quê quán</th>
                        <th style="text-align: left" class="col-1">Số điện thoại</th>
                        <th style="text-align: left" class="col-2">Email</th>
                        <th style="text-align: left" class="col-1">Ảnh</th>
                        <th class="col-1-4"></th>
                        <th class="col-1-4"></th>
                    </tr>
                    <?php
                    // B3: Xử lý kết quả
                    if (isset($data["listPatient"]) && $data["listPatient"] != null) {
                        while ($row = mysqli_fetch_array($data["listPatient"])) {
                    ?>
                            <tr>
                                <td style="text-align: left" class="col-1"><?php echo $row['mabenhnhan'] ?></td>
                                <td style="text-align: left" class="col-1"><?php echo $row['name'] ?></td>
                                <td style="text-align: left" class="col-1"><?php echo $row['ngaysinh'] ?></td>
                                <td style="text-align: left" class="col-1"><?php echo $row['gioitinh'] ?></td>
                                <td style="text-align: left" class="col-1"><?php echo $row['quequan'] ?></td>
                                <td style="text-align: left" class="col-1"><?php echo $row['sodienthoai'] ?></td>
                                <td style="text-align: left" class="col-1"><?php echo $row['username'] ?></td>
                                <td style="text-align: left" class="col-1"> <img style="height: 50px" src="<?php echo $row['anh'] ?>" alt="<?php echo $row['name'] ?>"></td>
                                <td style="text-align: left" class="col-1-4">
                                    <a href="http://localhost/ManagerPatientPHP/danhsachbenhnhan/suabenhnhan/?id=<?php echo $row['mabenhnhan']; ?>" class="btn--edit">
                                        <lord-icon src="https://cdn.lordicon.com/hiqmdfkt.json" trigger="hover" colors="primary:#26577C,secondary:#cb5eee" style="width:30px;height:30px">
                                        </lord-icon>
                                    </a>
                                </td>
                                <td style="text-align: left" class="col-1-4">
                                    <a href="#" class="btn--remove" data-bs-toggle="modal" data-bs-target="#delete<?php echo $row['mabenhnhan']; ?>">
                                        <lord-icon src="https://cdn.lordicon.com/tntmaygd.json" trigger="hover" colors="primary:#D80032,secondary:#cb5eee" style="width:30px;height:30px">
                                        </lord-icon>
                                    </a>

                                    <div class=" modal fade" id="delete<?php echo $row['mabenhnhan']; ?>" tabindex="-1" aria-labelledby="deleteLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteLabel">Xóa bệnh nhân</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <h5>Bạn có chắc muốn xóa bệnh nhân không</h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                                    <a href="http://localhost/ManagerPatientPHP/danhsachbenhnhan/xoabenhnhan/?id=<?php echo $row['mabenhnhan']; ?>"> <button style="width: 200px;" type="button" class="btn btn-danger">Xác nhận</button></a>
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
    </div>
</body>

</html>