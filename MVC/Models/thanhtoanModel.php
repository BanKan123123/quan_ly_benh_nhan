<?php
class thanhtoanModel extends connectDB
{

    function getDataPatient_TT()
    {
        $query = "SELECT * FROM `thanhtoan`";
        return mysqli_query($this->con, $query);
    }
    function listPatients_ins($mathanhtoan, $mabenhnhan, $ngaythanhtoan, $phuongthucthanhtoan,  $mavienphi, $tinhtrang, $mabaohiemyte)
    {
        $query = "INSERT INTO `thanhtoan` VALUES('$mathanhtoan', '$mabenhnhan', '$ngaythanhtoan', '$phuongthucthanhtoan', '$mavienphi', '$tinhtrang', '$mabaohiemyte')";
        return mysqli_query($this->con, $query);
    }
    function listPatients_update($mathanhtoan, $ngaythanhtoan, $phuongthucthanhtoan, $tinhtrang)
    {
        $query = "UPDATE `thanhtoan`SET`ngaythanhtoan` = '$ngaythanhtoan', `phuongthucthanhtoan` = '$phuongthucthanhtoan', `tinhtrang` = '$tinhtrang'WHERE `mathanhtoan` = '$mathanhtoan'";
        return mysqli_query($this->con, $query);
    }
    function getDataPatients()
    {
        $query = "SELECT thanhtoan.mathanhtoan,thanhtoan.mabenhnhan,thanhtoan.ngaythanhtoan,thanhtoan.phuongthucthanhtoan,thanhtoan.mavienphi,thanhtoan.tinhtrang , acount.mabaohiemyte FROM benhnhan, acount, thanhtoan,baohiemyte WHERE benhnhan.idtaikhoan = acount.id AND acount.role = '0' and thanhtoan.mabenhnhan= benhnhan.mabenhnhan and baohiemyte.idbaohiem=thanhtoan.idbaohiem";
        return mysqli_query($this->con, $query);
    }
    function listBenhnhan()
    {
        $query = "SELECT * FROM `benhnhan`, acount WHERE benhnhan.idtaikhoan = acount.id";
        return mysqli_query($this->con, $query);
    }

    function getPatientWithId($mabenhnhan)
    {
        $query = "SELECT * FROM thanhtoan, vienphi, benhnhan WHERE thanhtoan.mavienphi = vienphi.mavienphi AND thanhtoan.mabenhnhan = '$mabenhnhan' AND thanhtoan.mabenhnhan = benhnhan.mabenhnhan";
        return mysqli_query($this->con, $query);
    }

    function getKhambenhWithoutHopilize($mabenhnhan)
    {
        $query = "SELECT * FROM benhnhan WHERE benhnhan.nhapvien = '0'";
        return mysqli_query($this->con, $query);
    }

    function listVienphi($mabenhnhan)
    {
        $query = "SELECT * FROM `vienphi`, `benhnhan`, `baohiemyte`, `acount`, `hosobenhnhannhapvien` WHERE vienphi.mabenhnhannoitru = hosobenhnhannhapvien.mabenhnhannoitru AND benhnhan.mabenhnhan = hosobenhnhannhapvien.mabenhnhan AND vienphi.idbaohiem = baohiemyte.idbaohiem AND benhnhan.idtaikhoan = acount.id AND benhnhan.mabenhnhan = '$mabenhnhan'";
        return mysqli_query($this->con, $query);
    }
    function getPatientByIf($mathanhtoan)
    {
        $query = "SELECT * FROM `thanhtoan` WHERE `mathanhtoan` = '$mathanhtoan'";
        return mysqli_query($this->con, $query);
    }
    function getDataPatientById($mathanhtoan)
    {
        $query = "SELECT * FROM `thanhtoan` WHERE `mathanhtoan` = '$mathanhtoan";
        return mysqli_query($this->con, $query);
    }
    function listPatients_timkiem($keyword)
    {
        $query = "SELECT thanhtoan.mathanhtoan,thanhtoan.mabenhnhan,thanhtoan.ngaythanhtoan,thanhtoan.phuongthucthanhtoan,thanhtoan.mavienphi,thanhtoan.tinhtrang , acount.mabaohiemyte FROM benhnhan, acount, thanhtoan,baohiemyte WHERE benhnhan.idtaikhoan = acount.id AND acount.role = '0' and thanhtoan.mabenhnhan= benhnhan.mabenhnhan and baohiemyte.idbaohiem=thanhtoan.idbaohiem  and thanhtoan.mathanhtoan LIKE '%$keyword%'";
        return mysqli_query($this->con, $query);
    }
    function listPatients_delete($mathanhtoan)
    {
        $query = "DELETE FROM thanhtoan WHERE mathanhtoan = '$mathanhtoan'";
        return mysqli_query($this->con, $query);
    }
    function getPatientByMabenhnhan()
    {
        $query = "SELECT * FROM `benhnhan` ";
        return mysqli_query($this->con, $query);
    }
    function getPatienByVienPhi()
    {
        $query = "SELECT * FROM `vienphi`";
        return mysqli_query($this->con, $query);
    }
}
