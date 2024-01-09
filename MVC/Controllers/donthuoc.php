<?php

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class donthuoc extends controller
{

    protected $ls;
    function __construct()
    {
        $this->ls = $this->model('donThuocModel');
    }

    function Get_data()
    {
        $this->view('MasterLayout', [
            'page' => 'donthuoc',
            'data' => $this->ls->donThuocModel_find(''),
            'name' => $this->ls->tenbenhnhan(),
            'hoten' => $this->ls->tenbacsi(),
            'tenthuoc' => $this->ls->tenthuoc()
        ]);
    }

    function checkdata()
    {
        $tbn = $_POST['namebenhnhan'];
        $nkd = $_POST['namebacsi'];
        $ngaykd = $_POST['txtNgayKeDon'];
        $tt = $_POST['tenthuoc'];
        $sl = $_POST['txtSoLuong'];
        $dv = $_POST['txtDonVi'];
        $hd = $_POST['txthuongdan'];

        if ($tbn == null) {
            echo "<script>alert('Bạn chưa chọn tên bệnh nhân')</script>";
            return false;
        } else if ($nkd == null) {
            echo "<script>alert('Bạn chưa chọn tên người kê đơn')</script>";
            return false;
        } else if ($ngaykd == null) {
            echo "<script>alert('Bạn chưa nhập ngày kê đơn')</script>";
            return false;
        } else if ($tt == null) {
            echo "<script>alert('Bạn chưa nhập tên thuốc')</script>";
            return false;
        } else if ($sl == null) {
            echo "<script>alert('Bạn chưa nhập số lượng')</script>";
            return false;
        } else if ($dv == null) {
            echo "<script>alert('Bạn chưa nhập đơn vị thuốc')</script>";
            return false;
        } else if ($hd == null) {
            echo "<script>alert('Bạn chưa nhập hướng dẫn')</script>";
            return false;
        }
        return true;
    }

    function them()
    {
        if (isset($_POST['btnLuu'])) {
            if ($this->checkdata()) {
                $date = date("H:s:i");
                $currentDateTime = new DateTime($date);
                $seconds = $currentDateTime->getTimestamp();
                $mdt = "DT" . $seconds;
                $check = $this->ls->checkId($mdt);
                $tbn = $_POST['namebenhnhan'];
                $nkd = $_POST['namebacsi'];
                $ngaykd = $_POST['txtNgayKeDon'];
                $tt = $_POST['tenthuoc'];
                $sl = $_POST['txtSoLuong'];
                $dv = $_POST['txtDonVi'];
                $hd = $_POST['txthuongdan'];

                if ($check->num_rows > 0) {
                    echo "<script>alert('Mã đơn thuốc đã tồn tại')</script>";
                } else {
                    $mt = $this->ls->mathuoc($tt);
                    $getThuocById = mysqli_fetch_assoc($this->ls->getThuocById($mt));
                    $soluong =  intval($getThuocById['soluong']) - intval($sl);
                    $a = $getThuocById['soluong'];
                    if ($soluong >= 0) {
                        $updateSoluongThuoc = $this->ls->accountingPres($soluong, $mt);
                        if ($updateSoluongThuoc) {
                            $kq = $this->ls->donThuocModel_ins($mdt, $tbn, $nkd, $ngaykd, $tt, $sl, $dv, $hd);
                            if ($kq) {
                                echo "<script>alert('Thêm đơn thuốc thành công!')</script>";
                            } else {
                                echo "<script>alert('Thêm đơn thuốc thất bại!')</script>";
                            }
                        } else {
                            echo "<script>alert('Thêm đơn thuốc thất bại!')</script>";
                        }
                    } else {
                        echo "<script>alert('Số lượng thuốc trong quầy không đủ')</script>";
                    }
                }
                $this->view('MasterLayout', [
                    'page' => 'donthuoc',
                    'data' => $this->ls->donThuocModel_find('')
                ]);
                echo "<script>window.location.href = 'http://localhost/ManagerPatientPHP/donthuoc/Get_data';</script>";
            }
        }
    }

    function timkiem()
    {
        if (isset($_POST['btnSearch'])) {
            $tbn = $_POST['txtSearch'];
            $this->view('MasterLayout', [
                'page' => 'donthuoc',
                'data' => $this->ls->donThuocModel_find($tbn),
                'tbn' => $tbn
            ]);
        }
    }

    function delete($mdt)
    {
        $kq = $this->ls->donThuocModel_del($mdt);
        if ($kq) {
            echo "<script>alert('Xóa thành công!')</script>";
        } else {
            echo "<script>alert('Xóa thất bại!')</script>";
        }
        echo "<script>window.location.href= 'http://localhost/ManagerPatientPHP/donthuoc' </script>";
    }

    function sua($mdt)
    {
        $this->view('MasterLayout', [
            'page' => 'donthuocsua',
            'data' => $this->ls->donThuocModel_findOne($mdt),
            'name' => $this->ls->tenbenhnhan(),
            'hoten' => $this->ls->tenbacsi(),
            'tenthuoc' => $this->ls->tenthuoc()
        ]);
    }

    function suadl()
    {
        if (isset($_POST['btnSave'])) {
            $mdt = $_POST['txtMaDonThuoc'];
            $tbn = $_POST['namebenhnhan'];
            $nkd = $_POST['namebacsi'];
            $ngaykd = $_POST['txtNgayKeDon'];
            $tt = $_POST['tenthuoc'];
            $sl = $_POST['txtsoluong'];
            $dv = $_POST['txtdonvi'];
            $hd = $_POST['txthuongdan'];
            $kq = $this->ls->donThuocModel_upd($mdt, $tbn, $nkd, $ngaykd, $tt, $sl, $dv, $hd);
            if ($kq) {
                echo "<script>alert('Sửa thành công!')</script>";
            } else {
                echo "<script>alert('Sửa không thành công!')</script>";
            }
            $this->view('MasterLayout', [
                'page' => 'donthuoc',
                'data' => $this->ls->donThuocModel_find('')
            ]);
            echo "<script>window.location.href = 'http://localhost/ManagerPatientPHP/donthuoc/Get_data';</script>";
        }
    }

    function xuat()
    {
        if (isset($_POST['excel'])) {
            $data = $this->ls->donThuocModel_find('');
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            // Header row
            $headerRowData = ['Mã thuốc', 'Họ tên người bệnh', 'Họ tên bác sĩ', 'Ngày kê đơn', 'Tên thuốc', 'Đơn vị thuốc', 'Hàm lượng', 'Số lượng', 'Hướng dẫn'];
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
