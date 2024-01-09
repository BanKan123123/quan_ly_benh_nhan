<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();

$sheet = $spreadsheet->getActiveSheet();

$dataExport = $data['listExport'];

// if (isset($_POST['excel'])) {
//     $spreadsheet = new Spreadsheet();
//     $sheet = $spreadsheet->getActiveSheet();

//     // Header row
//     $headerRowData = ['mabacsi', 'hoten', 'anh', 'tuoi', 'ngaysinh', 'gioitinh', 'sodienthoai', 'email', 'trinhdo', 'makhoa', 'tinhtrang'];
//     $columnIndex = 1;
//     foreach ($headerRowData as $headerCell) {
//         $cellCoordinate = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($columnIndex) . '1';
//         $sheet->setCellValue($cellCoordinate, $headerCell);
//         $columnIndex++;
//     }

//     // Data rows
//     $dataRow = 2;
//     foreach ($dataExport as $rowData) {
//         $columnIndex = 1;
//         foreach ($rowData as $propertyValue) {
//             $cellCoordinate = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($columnIndex) . $dataRow;
//             $sheet->setCellValue($cellCoordinate, $propertyValue);
//             $columnIndex++;
//         }
//         $dataRow++;
//     }

//     $writer = new Xlsx($spreadsheet);

//     // Set the appropriate headers for Excel file download
//     header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
//     header('Content-Disposition: attachment;filename="exported_data.xlsx"');
//     header('Cache-Control: max-age=0');

//     $writer->save('ex.xlsx');
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://localhost/ManagerPatientPHP/Public/css/medicalBox.css">
    <link rel="stylesheet" href="http://localhost/ManagerPatientPublic/css/editdoctor.css">
</head>

<body>
    <div class="main">
        <header class="header">
            <div class="page">
                <h1 class="name__page">Bác sĩ</h1>
                <h3 class="desc__page">Quản lý bác sĩ</h3>
            </div>
            <span class="btn--add" style="font-size: 13px; font-weight: 700" data-bs-toggle="modal" data-bs-target="#addNewDoctor">
                Thêm bác sĩ mới
            </span>
            <form method="POST" action="http://localhost/ManagerPatientPHP/danhsachbacsi/thembacsi" class="modal needs-validation" id="addNewDoctor">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Thêm mới bác sĩ</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="hoten" class="form-label">Họ tên</label>
                                <input required placeholder="Họ và tên" name="hoten" type="text" class="form-control" id="hoten">
                            </div>

                            <div class="mb-3">
                                <label for="date" class="form-label">Ngày sinh</label>
                                <input required name="ngaysinh" type="date" max="<?php echo date('Y-m-d') ?>" class="form-control" id="date">
                            </div>

                            <div class="mb-3">
                                <label for="sex" class="form-label">Giới tính</label>
                                <select required name="sex" class="form-select">
                                    <option selected>Chọn giới tính</option>
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Số điện thoại</label>
                                <input required placeholder="Số điện thoại" name="phone" type="number" class="form-control" id="phone">
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Địa chỉ email</label>
                                <input required placeholder="Địa chỉ email" name="email" type="email" class=" form-control" id="email" aria-describedby="emailHelp">
                            </div>

                            <div class="mb-3">
                                <label for="level" class="form-label">Trình độ</label>
                                <select required name="level" class="form-select">
                                    <option selected>Chọn trình độ</option>
                                    <option value="Tiến sĩ">Tiến sĩ</option>
                                    <option value="Thực tập">Thực tập</option>
                                    <option value="Thạc sĩ">Thạc sĩ</option>
                                    <option value="Phó giáo sư">Phó giáo sư</option>
                                    <option value="Giáo sư">Giáo sư</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="specialist" class="form-label">Khoa</label>
                                <select required name="khoa" class="form-select" aria-label="Default select example">
                                    <option selected>Chọn khoa</option>
                                    <?php
                                    if (mysqli_num_rows($data['dataSpec']) > 0) {
                                        while ($row = mysqli_fetch_array($data['dataSpec'])) {

                                    ?>
                                            <option value="<?php echo $row['makhoa'] ?>"><?php echo $row['tenkhoa'] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="file" class="form-label">Ảnh</label>
                                <input required name="image" type="file" class="form-control" id="file">
                            </div>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Hủy</button>
                            <button name="submitDoctor" type="submit" class="btn btn-primary">Thêm mới</button>
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
                <form method="POST" action="http://localhost/ManagerPatientPHP/danhsachbacsi/timkiem" class="search">
                    <label for="" class="search__label">Tìm kiếm</label>
                    <input placeholder="Tìm kiếm" type="text" name="keyword" id="txtSearch" class="search__input">
                </form>
            </div>

            <div class="container__content">
                <table class="drug--info table table-striped table-hover">
                    <tr>
                        <th style="text-align: left" class="col-1">Họ tên</th>
                        <th style="text-align: left" class="col-1">Tuổi</th>
                        <th style="text-align: left" class="col-1">Ngày sinh</th>
                        <th style="text-align: left" class="col-1">Giới tính</th>
                        <th style="text-align: left" class="col-1">Số điện thoại</th>
                        <th style="text-align: left" class="col-2">Email</th>
                        <th style="text-align: left" class="col-1">Trình độ</th>
                        <th style="text-align: left" class="col-2">Khoa</th>
                        <th class="col-1-4"></th>
                        <th class="col-1-4"></th>
                    </tr>
                    <?php
                    // B3: Xử lý kết quả
                    if (isset($data["data"]) && $data["data"] != null) {
                        while ($row = mysqli_fetch_array($data["data"])) {
                    ?>
                            <tr>
                                <td style="text-align: left" class="col-1"><?php echo $row['hoten'] ?></td>
                                <td style="text-align: left" class="col-1"><?php echo $row['tuoi'] ?></td>
                                <td style="text-align: left" class="col-1"><?php echo $row['ngaysinh'] ?></td>
                                <td style="text-align: left" class="col-1"><?php echo $row['gioitinh'] ?></td>
                                <td style="text-align: left" class="col-1"><?php echo $row['sodienthoai'] ?></td>
                                <td style="text-align: left" class="col-1"><?php echo $row['email'] ?></td>
                                <td style="text-align: left" class="col-1"><?php echo $row['trinhdo'] ?></td>
                                <td style="text-align: left" class="col-1"><?php echo $row['tenkhoa'] ?></td>
                                <td style="text-align: left" class="col-1-4">
                                    <a href="http://localhost/ManagerPatientPHP/danhsachbacsi/suabacsi/?id=<?php echo $row['mabacsi'] ?>" class="btn--edit">
                                        <lord-icon src="https://cdn.lordicon.com/hiqmdfkt.json" trigger="hover" colors="primary:#26577C,secondary:#cb5eee" style="width:30px;height:30px">
                                        </lord-icon>
                                    </a>
                                </td>
                                <td style="text-align: left" class="col-1-4">
                                    <a href="#" class="btn--remove" data-bs-toggle="modal" data-bs-target="#delete<?php echo $row['mabacsi']; ?>">
                                        <lord-icon src="https://cdn.lordicon.com/tntmaygd.json" trigger="hover" colors="primary:#D80032,secondary:#cb5eee" style="width:30px;height:30px">
                                        </lord-icon>
                                    </a>

                                    <div class=" modal fade" id="delete<?php echo $row['mabacsi']; ?>" tabindex="-1" aria-labelledby="deleteLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteLabel">Xóa bác sĩ</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <h5>Bạn có chắc muốn xóa bác sĩ không</h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                                    <a href="http://localhost/ManagerPatientPHP/danhsachbacsi/xoabacsi/?id=<?php echo $row['mabacsi']; ?>"> <button style="width: 200px;" type="button" class="btn btn-danger">Xác nhận</button></a>
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
        <footer class="footer">
            <div class="pagination">

            </div>
        </footer>
    </div>

    <script src="http://localhost/ManagerPatientPHP/Public/js/medicalBox.js"></script>
</body>

</html>