<?php 
    class lichkham extends controller {
        protected $ls;

        function __construct () {
            $this->ls = $this->model('lichkhamModel');
        }

        function Get_data () {
            $this->view('MasterLayout', [
                'page'=> 'lichkham',
                'data'=> $this->ls->getdata()
            ]);
        }

        function timkiem () {
            if(isset($_POST['btnSearch'])) {
                $tenbenhnhan = $_POST['txtSearch'];
                $this->view('MasterLayout', [
                    'page'=> 'lichkham',
                    'data'=> $this->ls->find($tenbenhnhan),
                    'tbn' => $tenbenhnhan
                ]);
            }
        }

        function sua ($mlh) {
            $this->view('MasterLayout', [
                'page'=> 'lichkhamsua',
                'data'=> $this->ls->findOne($mlh),
                'name'=> $this->ls->tenBacSi(),
                'chuandoan' => $this->ls->chuandoan()
            ]);
        }

        function suadl () {
            if (isset($_POST['btnSave'])) {
                $date = date("H:s:i");
                $currentDateTime = new DateTime($date);
                $seconds = $currentDateTime->getTimestamp();
                $mhskb = "MHSKB" . $seconds;
                $mlh = $_POST['txtMaLichHen'];
                $tbn = $_POST['txtName'];
                $tbs =  $_POST['namebacsi'];
                $nk = $_POST['txtNgayKham'];
                $icd = $_POST['namechuandoan'];
                $dc = $_POST['txtdieutri'];
                $gc = $_POST['txtdieutri'];
                $checkIdHSKB = $this->ls->checkIdHSKB($mhskb);
                if($checkIdHSKB->num_rows > 0) {
                    echo "<script>alert('Mã hồ sơ khám bệnh đã tồn tại')</script>";
                } else {
                    $inshskb = $this->ls->insertHSKB ($mhskb, $tbn, $nk, $gc, $tbs);
                    if($inshskb) {
                        $kq = $this->ls->updLH ($tbn, $tbs, $icd, $mhskb, $gc, $mlh);
                        if($kq) {
                            echo "<script>alert('Cập nhật thông tin khám bệnh thành công')</script>";
                        } else {
                            echo "<script>alert('Cập nhật thông tin khám bệnh thất bại')</script>";
                        }
                    } else {
                        echo "<script>alert('Thêm hồ sơ khám bệnh thất bại')</script>";
                    }
                }
                $this->view('MasterLayout', [
                    'page'=> 'lichkham',
                    'data'=> $this->ls->getdata()
                ]);
                echo "<script>window.location.href = 'http://localhost/ManagerPatientPHP/lichkham/Get_data';</script>";
            }
        }
    }
?>