<?php
class DanhSachBacSi extends controller
{
    protected $ls;

    function __construct()
    {
        $this->ls = $this->model('doctorBoxModel');
    }

    function getDataDoctors()
    {
        $result = $this->ls->getDataDoctors();
        return $result;
    }

    function getDataExport()
    {
        $listExport = array();
        $data = $this->getDataDoctors();
        if (mysqli_num_rows($data) > 0) {
            while ($row = mysqli_fetch_array($data)) {
                array_push($listExport, $row);
            }
        }
        return $listExport;
    }

    function getDataKhoa()
    {
        $result = $this->ls->getDataKhoa();
        return $result;
    }

    function getDoctorById($id)
    {
        $result = $this->ls->checkIdentical($id);
        return $result;
    }

    function Get_data()
    {
        $this->view('Masterlayout', [
            'page' => 'bacsi/doctorBox_v',
            'data' => $this->getDataDoctors(),
            'dataSpec' => $this->getDataKhoa(),
            'listExport' => $this->getDataExport()
        ]);
    }

    function thembacsi()
    {
        $date = date("H:s:i");
        $currentDateTime = new DateTime($date);
        $seconds = $currentDateTime->getTimestamp();

        $mabacsi = 'bs' . $seconds;
        $hoten = $_POST['hoten'];
        $ngaysinh = $_POST['ngaysinh'];
        $ngaysinh_date = new DateTime($ngaysinh);
        $ngaysinh = $ngaysinh_date->format("d-m-Y");

        $ngayhientai = new DateTime();

        $tuoi = $ngayhientai->diff($ngaysinh_date)->y;
        $sex = $_POST['sex'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $level = $_POST['level'];
        $khoa = $_POST['khoa'];
        $image = "http://localhost/ManagerPatientPHP/Public/img/" . $_POST['image'];
        $tinhtrang = 0;

        $resultChecked = $this->ls->checkIdentical($mabacsi);

        if (mysqli_num_rows($resultChecked) == 0) {
            $resultAdd = $this->ls->addDoctor($mabacsi, $hoten, $image,  $tuoi, $ngaysinh, $sex, $phone, $email, $level, $khoa, $tinhtrang);
            if ($resultAdd) {
                echo "<script> alert('Thêm bác sĩ thành công') </script>";
            } else {
                echo "<script> alert('Thêm bác sĩ thất bại') </script>";
            }
        }
        echo "<script>window.location.href= 'http://localhost/ManagerPatientPHP/danhsachbacsi' </script>";
    }

    function xoabacsi()
    {
        $actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        // Parse the query string
        $query = parse_url($actual_link, PHP_URL_QUERY);

        if ($query) {
            parse_str($query, $params);

            $result = $this->ls->deleteDoctorById($params['id']);
            if ($result) {
                echo "<script> alert('Xóa bác sĩ thành công') </script>";
            } else {
                echo "<script> alert('Xóa bác sĩ thất bại') </script>";
            }
        }
        echo "<script>window.location.href= 'http://localhost/ManagerPatientPHP/danhsachbacsi' </script>";
    }

    function suabacsi()
    {
        $actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        // Parse the query string
        $query = parse_url($actual_link, PHP_URL_QUERY);

        if ($query) {
            parse_str($query, $params);
            $this->view('Masterlayout', [
                'page' => 'bacsi/editdoctor_v',
                'dataSpec' => $this->getDataKhoa(),
                'dataDoctor' => mysqli_fetch_assoc($this->getDoctorById($params['id'])),
            ]);
        }
    }

    function xacnhansuabacsi()
    {
        $mabacsi = $_POST['mabacsi'];
        $hoten = $_POST['hoten'];
        $ngaysinh = $_POST['ngaysinh'];
        $ngaysinh_date = new DateTime($ngaysinh);

        $ngaysinh = $ngaysinh_date->format("d-m-Y");
        $ngayhientai = new DateTime();

        $tuoi = $ngayhientai->diff($ngaysinh_date)->y;
        $sex = $_POST['sex'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $level = $_POST['trinhdo'];
        $khoa = $_POST['khoa'];
        $image = "http://localhost/ManagerPatientPHP/Public/img/" . $_POST['image'];
        $tinhtrang = 0;

        print_r($_POST);

        $resultAdd = $this->ls->editDoctor($mabacsi, $hoten, $image,  $tuoi, $ngaysinh, $sex, $phone, $email, $level, $khoa, $tinhtrang);
        if ($resultAdd) {
            echo "<script> alert('Sửa bác sĩ thành công') </script>";
        } else {
            echo "<script> alert('Sửa bác sĩ thất bại') </script>";
        }
        echo "<script>window.location.href= 'http://localhost/ManagerPatientPHP/danhsachbacsi' </script>";
    }

    function timkiem()
    {
        $keyword = $_POST['keyword'];
        $result = $this->ls->getListDataByKeyWord($keyword);
        $this->view('Masterlayout', [
            'page' => 'bacsi/doctorBox_v',
            'data' =>  $result,
            'dataSpec' => $this->getDataKhoa(),
            'listExport' => $this->getDataExport()
        ]);
    }
}
