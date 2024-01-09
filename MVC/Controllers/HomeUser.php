<?php
class HomeUser extends controller
{
    protected $ls;

    function __construct()
    {
        $this->ls = $this->model('homeUserModel');
    }

    function Get_data()
    {
        $email = $_SESSION['email'];
        $this->view('MasterLayout', [
            'page' => 'HomeUser_v',
            'dataId' => $this->ls->getId($email),
            'dataName' =>$this->ls->getName($email),
            'dataName1' =>$this->ls->getName1($email),
            'dataAddress' =>$this->ls->getAddress($email),
            'dataBirth' =>$this->ls->getBirth($email),
            'dataPhone' =>$this->ls->getPhone($email),
            'dataNameDoctor' =>$this->ls->getNameDoctor($email),
            'dataKQ' =>$this->ls->getKQ($email),
            'data' =>$this->ls->getData($email),
            'dataTT' =>$this->ls->getTT($email)
        ]);
    }

    function EditData() {
        if(isset($_POST['btnLuu'])) {
            $ten = $_POST['txtName'];
            $ns = $_POST['txtBirth'];
            $gt = $_POST['txtSex'];
            $email= $_POST['txtEmail'];
            $sdt = $_POST['txtPhone'];
            $qq = $_POST['txtAddress'];
            $anh = $_POST['imageFile'];
            $kq = $this->ls->TT_Update($ten, $ns, $gt, $email, $sdt, $qq, $anh);
            if($kq) {
                echo "<script>alert('Sửa thành công!')</script>";
            } else {
                echo "<script>alert('Sửa không thành công!')</script>";
            }
            $this->view('MasterLayout', [
                'page' => 'HomeUser_v',
                'dataId' => $this->ls->getId($email),
                'dataName' =>$this->ls->getName($email),
                'dataName1' =>$this->ls->getName1($email),
                'dataAddress' =>$this->ls->getAddress($email),
                'dataBirth' =>$this->ls->getBirth($email),
                'dataPhone' =>$this->ls->getPhone($email),
                'dataNameDoctor' =>$this->ls->getNameDoctor($email),
                'dataKQ' =>$this->ls->getKQ($email),
                'data' =>$this->ls->getData($email),
                'dataTT' =>$this->ls->getTT($email)
            ]);
            echo "<script>window.location.href = 'http://localhost/ManagerPatientPHP/HomeUser/Get_data';</script>";
        }
    }
}