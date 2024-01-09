<?php
class thanhtoanuserModel extends connectDB
{
    function listThanhToan_get()
    {
        $query = "SELECT * FROM thanhtoan ";
        return mysqli_query($this->con, $query);
    }

    function getListPatientPaymentsById() {
        $email = $_SESSION['email'];
        $query = "SELECT * FROM thanhtoan, benhnhan, acount, baohiemyte WHERE thanhtoan.mabenhnhan = benhnhan.mabenhnhan AND benhnhan.idtaikhoan = acount.id AND thanhtoan.idbaohiem = baohiemyte.idbaohiem AND acount.username = '$email'";
        return mysqli_query($this->con, $query);
    }

    function getPatientByEmail()
    {
        $email = $_SESSION['email'];
        $query = "SELECT ac.name,ac.gioitinh,ac.quequan,ac.mabaohiemyte,tt.mathanhtoan,tt.ngaythanhtoan,tt.phuongthucthanhtoan FROM `acount` as ac , benhnhan as bn  , thanhtoan as tt WHERE tt.mabenhnhan=bn.mabenhnhan and bn.idtaikhoan=ac.id and ac.username='$email'";

        $data = mysqli_query($this->con, $query);
        if ($data) {
            $row = mysqli_fetch_array($data);
            if ($row) {
                return $row;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }

    function getDataPatientById($mathanhtoan)
    {
        $query = "SELECT * FROM `thanhtoan` WHERE `mathanhtoan` = '$mathanhtoan'";
        return mysqli_query($this->con, $query);
    }
    function listPatients_update($mathanhtoan)
    {
        $query = "UPDATE `thanhtoan`SET  `tinhtrang` = '1'WHERE `mathanhtoan` = '$mathanhtoan'";
        return mysqli_query($this->con, $query);
    }

    function getDonthuoc()
    {
        $email = $_SESSION['email'];
        $query = "SELECT thuoc.tenthuoc, thuoc.gia,donthuoc.ngaykedon,donthuoc.soluong,donthuoc.donvi, TRUNCATE(donthuoc.soluong * thuoc.gia * 2/10, 0) as thanhtien1 FROM `donthuoc` , thuoc , benhnhan,acount WHERE thuoc.mathuoc=donthuoc.mathuoc and benhnhan.mabenhnhan=donthuoc.mabenhnhan and acount.id=benhnhan.idtaikhoan and acount.username = '$email';";
        $data = mysqli_query($this->con, $query);
        if ($data) {
            $row = mysqli_fetch_array($data);
            if ($row) {
                return $row;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }
    function getVienphi()
    {
        $email = $_SESSION['email'];
        $query = "SELECT hsbnnv.mabenhnhan, hsbnnv.ngaynhapvien,hsbnnv.ngayxuatvien,vp.vienphi FROM `vienphi` as vp ,hosobenhnhannhapvien as hsbnnv, benhnhan as bn,acount as ac , thanhtoan as tt WHERE hsbnnv.mabenhnhannoitru = vp.mabenhnhannoitru and bn.mabenhnhan = hsbnnv.mabenhnhan and tt.mavienphi=vp.mavienphi and bn.idtaikhoan = ac.id AND ac.username = '$email'";
        $data = mysqli_query($this->con, $query);
        if ($data) {
            $row = mysqli_fetch_array($data);
            if ($row) {
                return $row;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }

    function getDataThanhToanById($mathanhtoan)
    {
        $query = "SELECT * FROM `thanhtoan` WHERE mathanhtoan = '$mathanhtoan'";
        return mysqli_query($this->con, $query);
    }

    function getListPaymentForUser()
    {
        $email = $_SESSION['email'];
        $query = "SELECT * FROM `thanhtoan`, `benhnhan`, `acount` WHERE thanhtoan.mabenhnhan = benhnhan.mabenhnhan AND benhnhan.idtaikhoan = acount.id AND acount.username = '$email'";
        return mysqli_query($this->con, $query);
    }
}
