<?php
class DanhSachBenhNhan extends controller
{

    protected $ls;

    function __construct()
    {
        $this->ls = $this->model('patientBoxModel');
    }

    function Get_data()
    {
        $this->view('MasterLayout', [
            'page' => 'benhnhan/patientBox_v',
            'listPatient' => $this->getDataPatients(),
            'listAccount' => $this->getDataAccounts(),
            'listDocstor' => $this->getListDoctors(),
            'listDiseases' => $this->getDiseases(),
            'listPreventions' => $this->getPreventions(),
            'listBedhopitals' => $this->getBedhopitals(),
            'listPatientNotYetHopitalized' => $this->getPatientsNotYetHapitalized(),
            'getPatient' => $this->ls->getDataPatient()
        ]);
    }

    function getDataPatients()
    {
        $result = $this->ls->getDataPatients();
        return $result;
    }
    function getPatientsNotYetHapitalized()
    {
        $result = $this->ls->getPatientsNotYetHapitalized();
        return $result;
    }
    function getListDoctors()
    {
        $result = $this->ls->getListDoctors();
        return $result;
    }

    function getDiseases()
    {
        $result = $this->ls->getDiseases();
        return $result;
    }
    function getPreventions()
    {
        $result = $this->ls->getPreventions();
        return $result;
    }
    function getBedHopitals()
    {
        $result = $this->ls->getBedHopitals();
        return $result;
    }
    function getDataAccounts()
    {
        $result = $this->ls->listAccounts();
        return $result;
    }


    function thembenhnhan()
    {
        $date = date("H:s:i");
        $currentDateTime = new DateTime($date);
        $seconds = $currentDateTime->getTimestamp();
        $mabenhnhan = 'bn' . $seconds;
        $taikhoan = $_POST['taikhoan'];
        $nhapvien = 0;

        $checkIndentical = $this->ls->getDataPatientById($mabenhnhan, $taikhoan);

        if ($taikhoan != "Null") {
            if (mysqli_num_rows($checkIndentical) == 0) {
                $resultAdd = $this->ls->listPatients_ins($mabenhnhan, $taikhoan, $nhapvien);
                if ($resultAdd) {
                    echo "<script> alert('Thêm bênh nhân thành công') </script>";
                } else {
                    echo "<script> alert('Thêm bênh nhân thất bại') </script>";
                }
            } else {
                // echo  $mabenhnhan, $taikhoan;
                echo "<script> alert('Bênh nhân đã được tạo') </script>";
            }
        } else {
            echo "<script> alert('Tài khoản trống không thể thêm được bệnh nhân') </script>";
        }
        echo "<script>window.location.href= 'http://localhost/ManagerPatientPHP/danhsachbenhnhan' </script>";
    }

    function xoabenhnhan()
    {
        $actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        // Parse the query string
        $query = parse_url($actual_link, PHP_URL_QUERY);

        if ($query) {
            parse_str($query, $params);

            $result = $this->ls->listPatients_delete($params['id']);
            if ($result) {
                echo "<script> alert('Xóa bênh nhân thành công') </script>";
            } else {
                echo "<script> alert('Xóa bênh nhân thất bại') </script>";
            }
            echo "<script>window.location.href= 'http://localhost/ManagerPatientPHP/danhsachbenhnhan' </script>";
        }
    }

    function suabenhnhan()
    {
        $actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        // Parse the query string
        $query = parse_url($actual_link, PHP_URL_QUERY);

        if ($query) {
            parse_str($query, $params);
            $result = mysqli_fetch_assoc($this->ls->getPatientByIf($params['id']));
            $this->view('MasterLayout', [
                'page' => 'benhnhan/editpatient_v',
                'listAccount' => $this->getDataAccounts(),
                'patient' => $result
            ]);
        }
    }

    function xacnhansuabenhnhan()
    {
        $mabenhnhan = $_POST['mabenhnhan'];
        $ngaysinh = $_POST['ngaysinh'];
        $ngaysinh_date = new DateTime($ngaysinh);
        $ngaysinh = $ngaysinh_date->format("d-m-Y");
        $gioitinh = $_POST['gioitinh'];
        $quequan = $_POST['quequan'];
        $image = "http://localhost/ManagerPatientPHP/Public/img/" . $_POST['anh'];

        $result = $this->ls->listPatients_update($mabenhnhan, $ngaysinh, $gioitinh, $quequan, $image);

        if ($result) {
            echo "<script> alert('Sửa bệnh nhân thành công') </script>";
        } else {
            echo "<script> alert('Sửa bệnh nhân thất bại') </script>";
        }
        echo "<script>window.location.href= 'http://localhost/ManagerPatientPHP/danhsachbenhnhan' </script>";
    }
    function timkiem()
    {
        $keyword = $_POST['keyword'];
        $result = $this->ls->listPatients_timkiem($keyword);
        $this->view('Masterlayout', [
            'page' => 'benhnhan/patientBox_v',
            'listPatient' =>  $result,
            'listAccount' => $this->getDataAccounts(),
            'listDocstor' => $this->getListDoctors(),
            'listDiseases' => $this->getDiseases(),
            'listPreventions' => $this->getPreventions(),
            'listBedhopitals' => $this->getBedhopitals(),
            'listPatientNotYetHopitalized' => $this->getPatientsNotYetHapitalized(),
            'getPatient' => $this->ls->getDataPatient()
        ]);
    }

    function nhapvien()
    {
        $date = date("H:s:i");
        $currentDateTime = new DateTime($date);
        $seconds = $currentDateTime->getTimestamp();
        $mahosobenhnhannhapvien = 'bnnt' . $seconds;
        $mabenhnhan = $_POST['hoten'];
        $mabenh = $_POST['benh'];
        $ngaynhapvien = $_POST['ngaynhapvien'];
        $ngaynhapvien_date = new DateTime($ngaynhapvien);
        $ngaynhapvien = $ngaynhapvien_date->format("d-m-Y");

        $ngayxuatvien = "No";
        $maphong = $_POST['phongbenh'];
        $ghichu = $_POST['ghichu'];
        $magiuong = $_POST['giuong'];
        $mabacsi = $_POST['bacsi'];
        $nhapvien = '1';

        $result = $this->ls->listHoSoBenhNhan_ins($mahosobenhnhannhapvien, $mabenhnhan, $mabenh, $ngaynhapvien, $ngayxuatvien, $maphong, $ghichu, $magiuong, $mabacsi);
        $resultNhapVien = $this->ls->updateBenhNhanNhapVien($mabenhnhan, $nhapvien);

        if ($result && $resultNhapVien) {
            echo "<script> alert('Nhập viện thành công') </script>";
        } else {
            echo "<script> alert('Nhập viện thất bại') </script>";
        }
        echo "<script>window.location.href= 'http://localhost/ManagerPatientPHP/danhsachbenhnhan' </script>";
    }

    function xuatexcel($data)
    {
    }
}
