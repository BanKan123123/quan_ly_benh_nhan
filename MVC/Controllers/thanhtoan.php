<?php

class Thanhtoan extends controller
{
    protected $ls;

    function __construct()
    {
        $this->ls = $this->model('thanhtoanuserModel');
    }
    function Get_data()
    {
        $this->view('MasterLayout', [
            'page' => 'thanhtoan/danhsach_thanhtoan_v',
            'listPayment' => $this->ls->getListPatientPaymentsById(),
            'patient' => $this->ls->getPatientByEmail(),
            'donthuoc1' => $this->ls->getDonthuoc(),
            'vienphi' => $this->ls->getVienphi(),
            'listPayments' => $this->ls->getListPaymentForUser(),
        ]);
    }

    function getListPaymentForUser()
    {
        $result = mysqli_fetch_assoc($this->ls->getListPaymentForUser());
        return $result;
    }
    function getPatientByEmail()
    {
        $result = $this->ls->getPatientByEmail();
        return $result;
    }
    function getDonthuoc()
    {
        $result = $this->ls->getDonthuoc();
        return $result;
    }
    function getVienphi()
    {
        $result = $this->ls->getVienphi();
        return $result;
    }

    function thanhtoanhoadon()
    {
        $this->view('MasterLayout', [
            'page' => 'thanhtoan/thanhtoan_v',
            'listPayment' => $this->ls->getListPatientPaymentsById(),
            'patient' => $this->ls->getPatientByEmail(),
            'donthuoc1' => $this->ls->getDonthuoc(),
            'vienphi' => $this->ls->getVienphi(),
            'listPayments' => $this->ls->getListPaymentForUser(),
        ]);
    }

    function Xacnhanthanhtoan()
    {
        $mathanhtoan = $_POST['mathanhtoan'];
        $resultDataThanhToan = mysqli_fetch_assoc($this->ls->getDataThanhToanById($mathanhtoan));

        if ($resultDataThanhToan['tinhtrang'] == '0') {
            $result = $this->ls->listPatients_update($mathanhtoan);
            if ($result) {
                echo "<script> alert('Thanh toán thành công') </script>";
            } else {
                echo "<script> alert('Thanh toán thất bại') </script>";
            }
        } else {
            echo "<script> alert('Hóa đơn đã thanh toán ') </script>";
        }
        echo "<script>window.location.href= 'http://localhost/ManagerPatientPHP/thanhtoan' </script>";
    }
}
