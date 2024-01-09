<?php 
    class dangKiLichKham extends controller {
        protected $ls;

        function __construct () {
            $this->ls = $this->model('dangKiLichKhamModel');
        }

        function Get_data () {
            $email = $_SESSION['email'];
            $this->view('MasterLayout', [
                'page'=> 'dangkiLichkham',
                'data'=> $this->ls->getdata($email)
            ]);
        }

        function ins () {
            $nh = $_POST['txtNgayHen'];
            $gc = $_POST['txtGhiChu'];
            $email = $_SESSION['email'];
            $date = date("H:s:i");
            $currentDateTime = new DateTime($date);
            $seconds = $currentDateTime->getTimestamp();
            $mlh = "LH" . $seconds;
            $kq=$this->ls->ins ($nh, $gc, $mlh, $email);
            if($kq) {
                echo "<script>alert('Đăng ký lịch khám thành công!')</script>";
            }else {
                echo "<script>alert('Đăng ký lịch khám thất bại!')</script>";
            }
            $this->view ('MasterLayout', [
                'page' => 'dangkiLichkham',
                'data'=> $this->ls->getdata($email)
            ]);
            echo "<script>window.location.href = 'http://localhost/ManagerPatientPHP/dangKiLichKham/getdata';</script>";
        }
    }
?>