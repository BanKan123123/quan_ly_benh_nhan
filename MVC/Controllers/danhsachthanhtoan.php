<?php
class DanhSachThanhToan extends controller
{

    protected $ls;

    function __construct()
    {
        $this->ls = $this->model('thanhtoanModel');
    }

    function Get_data()
    {
        $this->view('MasterLayout', [
            'page' => 'thanhtoan/patienPay_v',
            'listPatient' => $this->ls->getDataPatients(),
            'listBenhnhan' => $this->ls->listBenhnhan(),
            'listThanhtoan' => $this->ls->getDataPatient_TT(),

        ]);
    }

    function getDataMabaohiem()
    {
        $result = $this->ls->listMabaohiem();
        return $result;
    }
    function getDataPatients()
    {
        $result = $this->ls->getDataPatients();
        return $result;
    }
    function getDataPatient_TT()
    {
        $result = $this->ls->getDataPatient_TT();
        return $result;
    }
    function getDataBenhnhan()
    {
        $result = $this->ls->listBenhnhan();
        return $result;
    }

    function themthanhtoan()
    {
        try {
            $date = date("H:s:i");
            $currentDateTime = new DateTime($date);
            $seconds = $currentDateTime->getTimestamp();

            $mathanhtoan = 'tt' . $seconds;
            $mabenhnhan = $_POST['mabenhnhan'];
            $ngaythanhtoan = $_POST['ngaythanhtoan'];
            $ngaythanhtoan_data = new DateTime($ngaythanhtoan);
            $ngaythanhtoan = $ngaythanhtoan_data->format("d-m-Y");
            $phuongthucthanhtoan = $_POST['phuongthucthanhtoan'];
            $tinhtrang = 0;
            $resultGetDataVienPhi = mysqli_fetch_assoc($this->ls->listVienphi($mabenhnhan));

            if ($resultGetDataVienPhi == null) {
                echo "<script> alert('Bệnh nhân chưa được tính viện phí, vui long quay lại thực hiện!') </script>";
            } else {
                $resultAdd = $this->ls->listPatients_ins($mathanhtoan, $mabenhnhan, $ngaythanhtoan, $phuongthucthanhtoan,  $resultGetDataVienPhi['mavienphi'], $tinhtrang, $resultGetDataVienPhi['idbaohiem']);
                if (is_null($resultAdd)) {
                    echo "<script> alert('Thêm thanh toán thất bại') </script>";
                } else {
                    echo "<script> alert('Thêm thanh toán thành công') </script>";
                }
            }
            echo "<script>window.location.href= 'http://localhost/ManagerPatientPHP/danhsachthanhtoan' </script>";
        } catch (Exception $e) {
            echo "Chưa có dữ liệu ";
        }
    }

    function xoathanhtoan()
    {
        $actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $query = parse_url($actual_link, PHP_URL_QUERY);
        if ($query) {
            parse_str($query, $params);

            $result = $this->ls->listPatients_delete($params['id']);
            if ($result) {
                echo "<script> alert('Xóa thanh toán thành công') </script>";
                $this->view('MasterLayout', [
                    'page' => 'thanhtoan/patienPay_v',
                    'listPatient' => $this->getDataPatients(),
                    'listBenhnhan' => $this->getDataBenhnhan(),
                    'listThanhtoan' => $this->ls->getDataPatient_TT(),

                ]);
                echo "<script>window.location.href= 'http://localhost/ManagerPatientPHP/danhsachthanhtoan/Get_data' </script>";
            } else {
                echo "<script> alert('Xóa thanh  thất bại') </script>";
            }
        }
    }

    function suathanhtoan()
    {
        $actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $query = parse_url($actual_link, PHP_URL_QUERY);

        if ($query) {
            parse_str($query, $params);
            $result = mysqli_fetch_assoc($this->ls->getPatientByIf($params['id']));

            $this->view('MasterLayout', [
                'page' => 'thanhtoan/editThanhToan_v',
                'listAccount' => $this->getDataBenhnhan(),
                'patient' => $result,
                'Mbs' => $this->ls->getPatientByMabenhnhan(),
                'Mvp' => $this->ls->getPatienByVienPhi(),
                'Mbh' => $this->ls->getPatientByMabenhnhan()
            ]);
        }
    }

    function xacnhansuathanhtoan()
    {
        $mathanhtoan = $_POST['mathanhtoan'];
        $ngaythanhtoan = $_POST['ngaythanhtoan'];
        $ngaythanhtoan_date = new DateTime($ngaythanhtoan);
        $ngaythanhtoan = $ngaythanhtoan_date->format("d-m-Y");
        $phuongthucthanhtoan = $_POST['phuongthucthanhtoan'];
        $tinhtrang = $_POST['tinhtrang'];
        $result = $this->ls->listPatients_update($mathanhtoan, $ngaythanhtoan, $phuongthucthanhtoan, $tinhtrang);

        if ($result) {
            echo "<script> alert('Sửa thanh toán thành công') </script>";
            echo "<script>window.location.href= 'http://localhost/ManagerPatientPHP/danhsachthanhtoan/' </script>";
        } else {
            echo "<script> alert('Sửa thanh toán thất bại') </script>";
        }
    }
    function timkiem()
    {
        $keyword = $_POST['keyword'];
        // $result = $this->ls->listPatients_timkiem($keyword);
        $this->view('Masterlayout', [
            'page' => 'thanhtoan/patienPay_v',
            'listPatient' =>  $this->ls->listPatients_timkiem($keyword),
            'listBenhnhan' => $this->getDataBenhnhan(),
            'listThanhtoan' => $this->getDataPatient_TT(),
        ]);
    }
}
