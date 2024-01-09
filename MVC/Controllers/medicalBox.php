<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class medicalBox extends controller
{
    protected $ls;
    function __construct()
    {
        $this->ls = $this->model('medicalBoxModel');
    }

    // http://localhost/ManagerPatientPHP/medicalBox/Get_data?page=1
    function Get_data()
    {
        $this->view('MasterLayout', [
            'page' => 'medicalBox_v',
            'data' => $this->ls->medicalBox_find('', '')
        ]);
    }

    // http://localhost/ManagerPatientPHP/medicalBox/Insert_data
    function Insert_data()
    {
        if (isset($_POST['btnLuu'])) {
            if ($this->checkData()) {
                $mathuoc = $_POST['txtIdMedicine'];
                $check = $this->ls->checkId($mathuoc);
                $tenthuoc = $_POST['txtNameMedicine'];
                $dangbaoche = $_POST['txtDosageForms'];
                $hamluong = $_POST['txtDrugContent'];
                $duongdung = $_POST['txtRouteOfUse'];
                $soluong = $_POST['txtQuantity'];
                $gia = $_POST['txtPrice'];
                $nhacungcap = $_POST['txtSupplier'];
                $ngayhethan = $_POST['txtexpirationDate'];
                $ghichu = $_POST['txtNote'];
                if ($check->num_rows > 0) {
                    echo "<script>alert('Mã thuốc đã tồn tại!')</script>";
                } else {
                    $kq = $this->ls->medicalBox_add($mathuoc, $tenthuoc, $dangbaoche, $hamluong, $duongdung, $soluong, $gia, $nhacungcap, $ngayhethan, $ghichu);
                    if ($kq)
                        echo "<script>alert('Thêm thuốc mới thành công!')</script>";
                    else
                        echo "<script>alert('Thêm thuốc mới thất bại!')</script>";
                }
            }
            $this->view('MasterLayout', [
                'page' => 'medicalBox_v',
                'data' => $this->ls->medicalBox_find('', '')
            ]);
            echo "<script>window.location.href = 'http://localhost/ManagerPatientPHP/medicalBox/Get_data';</script>";
        }
    }

    function checkData()
    {
        $mathuoc = $_POST['txtIdMedicine'];
        $tenthuoc = $_POST['txtNameMedicine'];
        $dangbaoche = $_POST['txtDosageForms'];
        $hamluong = $_POST['txtDrugContent'];
        $duongdung = $_POST['txtRouteOfUse'];
        $soluong = $_POST['txtQuantity'];
        $gia = $_POST['txtPrice'];
        $nhacungcap = $_POST['txtSupplier'];
        $ngayhethan = $_POST['txtexpirationDate'];

        if ($mathuoc == null) {
            echo "<script>alert('Bạn chưa nhập mã thuốc')</script>";
            return false;
        } else if ($tenthuoc == null) {
            echo "<script>alert('Bạn chưa nhập tên thuốc')</script>";
            return false;
        } else if ($dangbaoche == null) {
            echo "<script>alert('Bạn chưa nhập dạng bào chế')</script>";
            return false;
        } else if ($hamluong == null) {
            echo "<script>alert('Bạn chưa nhập hàm lượng)</script>";
            return false;
        } else if ($duongdung == null) {
            echo "<script>alert('Bạn chưa nhập đường dùng')</script>";
            return false;
        } else if ($soluong < 0) {
            echo "<script>alert('Số lượng không hợp lệ')</script>";
            return false;
        } else if ($gia < 0) {
            echo "<script>alert('Giá không hợp lệ')</script>";
            return false;
        } else if ($nhacungcap == null) {
            echo "<script>alert('Bạn chưa nhập nhà cung cấp')</script>";
            return false;
        } else if ($ngayhethan == null) {
            echo "<script>alert('Bạn chưa nhập ngày hết hạn')</script>";
            return false;
        }
        return true;
    }

    function timKiem()
    {
        if (isset($_POST['btnSearch'])) {
            $tt = $_POST['txtSearch'];
            $this->view('MasterLayout', [
                'page' => 'medicalBox_v',
                'data' => $this->ls->medicalBox_find('', $tt),
                'tt' => $tt
            ]);
        }
    }

    function delete($mt)
    {
        $kq = $this->ls->medicalBox_del($mt);
        if ($kq) {
            echo "<script>alert('Xóa thành công!')</script>";
        } else {
            echo "<script>alert('Xóa thất bại!')</script>";
        }
        echo "<script>window.location.href= 'http://localhost/ManagerPatientPHP/medicalBox' </script>";
    }

    function sua($ml)
    {
        $this->view('MasterLayout', [
            'page' => 'medicalBoxEdit_v',
            'data' => $this->ls->medicalBox_findOne($ml)
        ]);
    }

    function suadl()
    {
        if (isset($_POST['btnSave'])) {
            $tt = $_POST['txtNameMedicine'];
            $mt = $_POST['txtIdMedicine'];
            $dbc = $_POST['txtDosageForms'];
            $hl = $_POST['txtDrugContent'];
            $ncc = $_POST['txtSupplier'];
            $dd = $_POST['txtRouteOfUse'];
            $sl = $_POST['txtQuantity'];
            $gia = $_POST['txtPrice'];
            $nhh = $_POST['txtexpirationDate'];
            $gc = $_POST['txtNote'];

            $kq = $this->ls->medicalBox_upd($mt, $tt, $dbc, $hl, $dd, $sl, $gia, $ncc, $nhh, $gc);
            if ($kq) {
                echo "<script>alert('Sửa thành công!')</scrip>";
            } else {
                echo "<script>alert('Sửa thất bại!')</script>";
            }

            $this->view('MasterLayout', [
                'page' => 'medicalBox_v',
                'data' => $this->ls->medicalBox_find('', '')
            ]);
            echo "<script>window.location.href = 'http://localhost/ManagerPatientPHP/medicalBox/Get_data';</script>";
        }
    }

    function xuat()
    {
        if (isset($_POST['excel'])) {
            $data = $this->ls->medicalBox_find('', '');
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            // Header row
            $headerRowData = ['Mã thuốc', 'Tên thuốc', 'Dạng bào chế', 'Hàm lượng', 'Cách dùng', 'Số lượng', 'Giá', 'Nhà cung cấp', 'Hạn sử dụng', 'Ghi chú'];
            $columnIndex = 1;
            foreach ($headerRowData as $headerCell) {
                $cellCoordinate = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($columnIndex) . '1';
                $sheet->setCellValue($cellCoordinate, $headerCell);
                $columnIndex++;
            }

            // Data rows
            $dataRow = 2;
            foreach ($data as $rowData) {
                $columnIndex = 1;
                foreach ($rowData as $propertyValue) {
                    $cellCoordinate = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($columnIndex) . $dataRow;
                    $sheet->setCellValue($cellCoordinate, $propertyValue);
                    $columnIndex++;
                }
                $dataRow++;
            }

            // $writer = new Xlsx($spreadsheet);
            $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
            // Set the appropriate headers for Excel file download
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            $filename = time() . ".xlsx";
            $writer->save($filename);
            header("location:" . $filename);
            // header('Content-Disposition: attachment;filename="exported_data.xlsx"');
            // header('Cache-Control: max-age=0');
            // $writer->save("ex.xlsx");
        }
    }
}
