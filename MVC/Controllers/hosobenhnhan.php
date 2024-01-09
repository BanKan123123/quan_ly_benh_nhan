<?php
class HoSoBenhNhan extends controller
{
    protected $ls;

    function __construct()
    {
        $this->ls = $this->model('hosobenhnhanModel');
    }

    function Get_data()
    {
        $this->view('Masterlayout', [
            'page' => 'benhnhan/thongkepatient_v',
            'listDocs' => $this->getHoSoBenhNhan(),
            'listNotYetDischarge' => $this->getPatientNotYetDischarge(),
            'listNhapVien' => $this->ls->exportExcelHoSoNhapVien(),
        ]);
    }

    function getHoSoBenhNhan()
    {
        $result = $this->ls->getListDocsPatient();
        return $result;
    }

    function getPatientNotYetDischarge()
    {
        $result = $this->ls->getListPatientNotYetDischarge();
        return $result;
    }

    function xuatvien()
    {
        $mabenhnhannoitru = $_POST['hoten'];
        $ngayxuatvien = $_POST['ngayxuatvien'];

        $result = $this->ls->xuatvien($mabenhnhannoitru, $ngayxuatvien);


        $date = date("H:s:i");
        $currentDateTime = new DateTime($date);
        $seconds = $currentDateTime->getTimestamp();

        $mavienphi = 'vp' . $seconds;
        $resultgetBaoHiem = mysqli_fetch_assoc($this->ls->getBaoHiemByEmail($mabenhnhannoitru));
        $idbaohiem = $resultgetBaoHiem['idbaohiem'];

        $queryGetDonThuoc = mysqli_fetch_assoc($this->ls->getDonThuocById($mabenhnhannoitru));
        $madonthuoc = $queryGetDonThuoc['madonthuoc'];
        echo $madonthuoc;

        $queryGetDataThuoc = mysqli_fetch_assoc($this->ls->getDataThuocByMaThuoc($madonthuoc));
        print_r($queryGetDataThuoc);

        $ngaynhapvien = mysqli_fetch_assoc($this->ls->getDateHopitalizeFromDoc($mabenhnhannoitru));
        $ngaynhapvien_date = new DateTime($ngaynhapvien['ngaynhapvien']);

        $ngayxuatvien = mysqli_fetch_assoc($this->ls->getDateDischargedFromDoc($mabenhnhannoitru));
        $ngayxuatvien_date = new DateTime($ngayxuatvien['ngayxuatvien']);

        $songaynhapvien_date = $ngaynhapvien_date->diff($ngayxuatvien_date);
        $songaynhapvien = $songaynhapvien_date->days;

        if ($queryGetDonThuoc == null) {
            $madonthuoc = 0;
            echo $songaynhapvien;
            $vienphi = 200000 + (((intval($songaynhapvien) + 1) * 30000) * 20) / 100;
        } else {
            $madonthuoc = $queryGetDonThuoc['madonthuoc'];
            $queryGetDataThuoc = mysqli_fetch_assoc($this->ls->getDataThuocByMaThuoc($madonthuoc));
            $vienphi = 200000 + ((intval($songaynhapvien + 1) * 30000 + intval($queryGetDataThuoc['soluong']) * intval($queryGetDataThuoc['gia'])) * 20) / 100;
        }

        if ($result) {
            $resultVienPhi = $this->ls->listvienphi_ins($mavienphi, $mabenhnhannoitru, $madonthuoc, $vienphi, $idbaohiem);

            if ($resultVienPhi) {
                echo "<script> alert('Xuất viện cho bệnh nhân thành công') </script>";
            }
        } else {
            echo "<script> alert('Xuất viện cho bệnh nhân thất bại') </script>";
        }
        echo "<script>window.location.href= 'http://localhost/ManagerPatientPHP/hosobenhnhan' </script>";
    }

    function timkiem()
    {
        $keyword = $_POST['keyword'];
        $result = $this->ls->listNhapVien_timkiem($keyword);
        $this->view('Masterlayout', [
            'page' => 'benhnhan/thongkepatient_v',
            'listDocs' =>  $result,
            'listNotYetDischarge' => $this->getPatientNotYetDischarge(),
            'listNhapVien' => $this->ls->exportExcelHoSoNhapVien(),
        ]);
    }

    function xoabenhnhannhapvien()
    {
        $actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        // Parse the query string
        $query = parse_url($actual_link, PHP_URL_QUERY);


        if ($query) {
            parse_str($query, $params);

            $result = $this->ls->listHoSoNhapVien_delete($params['id']);

            if ($result) {
                echo "<script> alert('Xóa bệnh nhân nhập viện thành công') </script>";
            } else {
                echo "<script> alert('Xóa bệnh nhân nhập viện thất bại') </script>";
            }
            echo "<script>window.location.href= 'http://localhost/ManagerPatientPHP/hosobenhnhan' </script>";
        }
    }
}
