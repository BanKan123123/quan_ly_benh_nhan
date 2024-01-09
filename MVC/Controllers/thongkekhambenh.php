<?php
class ThongKeKhamBenh extends controller
{
    protected $ls;

    function __construct()
    {
        $this->ls = $this->model('thongkekhambenhModel');
    }

    function Get_data()
    {
        $this->view('MasterLayout',  [
            'page' => 'benhnhan/benhnhankhambenh_v',
            'listKhamBenh' => $this->getListKhamBenh(),
            'listBacSi' => $this->getListDoctors(),
            'listBenhNhan' => $this->getDataPatients(),
            'listExportExcelKhamBenh' => $this->ls->exportExcelKhamBenh(),
        ]);
    }

    function getListKhamBenh()
    {
        $result = $this->ls->getListKhamBenh();
        return $result;
    }

    function getListDoctors()
    {
        $result = $this->ls->getListDoctors();
        return $result;
    }

    function getDataPatients()
    {
        $result = $this->ls->getDataPatients();
        return $result;
    }

    function themluotkham()
    {
        $date = date('H:i:s');
        $currentDateTime = new DateTime($date);
        $seconds = $currentDateTime->getTimestamp();
        $makhambenh = "kb" . $seconds;
        $mabenhnhan = $_POST['mabenhnhan'];

        $ngaykham = $_POST['ngaykham'];
        $ngaykham_date = new DateTime($ngaykham);
        $ngaykham = $ngaykham_date->format("d-m-Y");

        $dichvu = $_POST['dichvu'];
        $donthuoc = $_POST['donthuoc'];
        $ghichu = $_POST['ghichu'];
        $bacsi = $_POST['bacsi'];

        $soluongthuocAssoc =  mysqli_fetch_assoc($this->ls->getAcountFromPrescription($donthuoc));
        $soluongthuoc = $soluongthuocAssoc['soluong'];

        $vienphi = 200000 +  ((intval($soluongthuoc) * 3000) * 80) / 100;

        $result = $this->ls->listKhamBenh_ins($makhambenh,  $mabenhnhan, $ngaykham, $ghichu, $bacsi, $donthuoc, $dichvu, $vienphi);
        if ($result) {
            echo "<script> alert('Thêm lượt khám thành công') </script>";
        } else {
            echo "<script> alert('Thêm lượt khám thất bại') </script>";
        }
        echo "<script>window.location.href= 'http://localhost/ManagerPatientPHP/thongkekhambenh' </script>";
    }

    function xoaluotkham()
    {
        $actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        // Parse the query string
        $query = parse_url($actual_link, PHP_URL_QUERY);

        if ($query) {
            parse_str($query, $params);

            $result = $this->ls->xoaHoaSoKHamBenh($params['id']);

            if ($result) {
                echo "<script> alert('Xóa lượt khám thành công') </script>";
            } else {
                echo "<script> alert('Xóa lượt khám thất bại') </script>";
            }
            echo "<script>window.location.href= 'http://localhost/ManagerPatientPHP/thongkekhambenh' </script>";
        }
    }

    function sualuotkham()
    {
        $actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        // Parse the query string
        $query = parse_url($actual_link, PHP_URL_QUERY);

        if ($query) {
            parse_str($query, $params);
            $result = mysqli_fetch_assoc($this->ls->getLuotKhamById($params['id']));
            print_r($result['mabenhnhan']);
            $this->view('MasterLayout', [
                'page' => 'benhnhan/editluotkham_v',
                'luotkham' =>  $result,
                'listDonThuoc' => $this->ls->getDonThuocByBenhNhan($result['mabenhnhan']),
                'listBacSi' => $this->getListDoctors(),
                'listBenhNhan' => $this->getDataPatients(),
            ]);
        }
    }

    function xacnhansualuotkham()
    {
        $mahosokhambenh = $_POST['mahosokhambenh'];
        $mabenhnhan = $_POST['mabenhnhan'];

        $ngaykham = $_POST['ngaykham'];
        $ngaykham_date = new DateTime($ngaykham);
        $ngaykham = $ngaykham_date->format("d-m-Y");

        $dichvu = $_POST['dichvu'];
        $ghichu = $_POST['ghichu'];
        $bacsi = $_POST['bacsi'];
        $donthuoc = $_POST['donthuoc'];

        $soluongthuocAssoc =  mysqli_fetch_assoc($this->ls->getAcountFromPrescription($donthuoc));
        $soluongthuoc = $soluongthuocAssoc['soluong'];

        $vienphi = 200000 +  ((intval($soluongthuoc) * 3000) * 80) / 100;
        echo $vienphi;

        $result = $this->ls->listKhamBenh_update($mahosokhambenh, $mabenhnhan, $ngaykham, $ghichu, $bacsi, $donthuoc, $vienphi, $dichvu);

        if ($result) {
            echo "<script> alert('Sửa lượt khám thành công') </script>";
        } else {
            echo "<script> alert('Sửa lượt khám thất bại') </script>";
        }
        echo "<script>window.location.href= 'http://localhost/ManagerPatientPHP/thongkekhambenh' </script>";
        print_r($_POST);
    }

    function timkiem()
    {
        $keyword = $_POST['keyword'];
        $result = $this->ls->listKhamBenh_timkiem($keyword);
        $this->view('Masterlayout', [
            'page' => 'benhnhan/benhnhankhambenh_v',
            'listKhamBenh' =>  $result,
            'listBacSi' => $this->getListDoctors(),
            'listBenhNhan' => $this->getDataPatients(),
            'listExportExcelKhamBenh' => $this->ls->exportExcelKhamBenh(),
        ]);
    }
}
