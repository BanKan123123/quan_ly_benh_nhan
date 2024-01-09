<?php 
    class account extends controller {
        protected $ls;

        function __construct () {
            $this->ls = $this->model('accountModel');
        }

        function Get_data () {
            $this->view ('MasterLayout', [
                'page' => 'taikhoan/taikhoan',
                'data' => $this->ls->find('', ''),
                'role' => $this->ls->role()
            ]);
        }

        function find () {
            if (isset($_POST['btnSearch'])) {
                $tnd = $_POST['txtSearch'];
                $this->view ('MasterLayout', [
                    'page' => 'taikhoan/taikhoan',
                    'data' => $this->ls->find('', $tnd),
                    'id' => $tnd
                ]);
            }
        }

        function delete ($id) {
            $kq = $this->ls->delete($id);
            if($kq) {
                echo "<script>alert('Xóa thành công!')</script>";
            } else {
                echo "<script>alert('Xóa thất bại!')</script>";
            }
            echo "<script>window.location.href= 'http://localhost/ManagerPatientPHP/account/Get_data' </script>";
        }

        function insert () {
            if(isset($_POST['btnLuu'])) {
                $id = $_POST['txtMaTaiKhoan'];
                $name = $_POST['txtTenNguoiDung'];
                $email = $_POST['txtEmail'];
                $password = $_POST['txtMatKhau'];
                $phone = $_POST['txtSoDienThoai'];
                $role = $_POST['quyen'];
                $checkId = $this->ls->checkId($id);
                if($checkId->num_rows > 0) {
                    echo "<script>alert('Mã tài khoản đã tồn tại!')</script>";
                } else {
                    $checkEmail = $this->ls->checkEmail($email);
                    if($checkEmail->num_rows > 0) {
                        echo "<script>alert('Email này đã được đăng ký tài khoản!')</script>";
                    } else {
                        $kq=$this->ls->insert ($id, $name, $email, $password, $phone, $role);
                        if($kq) {
                            echo "<script>alert('Thêm tài khoản thành công!')</script>";
                        } else {
                            echo "<script>alert('Thêm tài khoản thất bại!')</script>";
                        }
                    }
                }
                $this->view ('MasterLayout', [
                    'page' => 'taikhoan/taikhoan',
                    'data' => $this->ls->find ('', '')
                ]);
                echo "<script>window.location.href = 'http://localhost/ManagerPatientPHP/account/Get_data';</script>";
            }
        }
    }
?>