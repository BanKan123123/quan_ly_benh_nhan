<?php
class patientBoxModel extends connectDB
{
    function getDataPatients()
    {
        $query = "SELECT * FROM `benhnhan`, `acount` WHERE benhnhan.idtaikhoan = acount.id AND acount.role = '0' AND benhnhan.mabenhnhan <> '0'";
        return mysqli_query($this->con, $query);
    }

    function listPatients_ins($mabenhnhan, $idtaikhoan, $nhapvien)
    {
        $query = "INSERT INTO `benhnhan` VALUES('$mabenhnhan', '$idtaikhoan', $nhapvien)";
        return mysqli_query($this->con, $query);
    }

    function getDataPatientById($mabenhnhan, $idtaikhoan)
    {
        $query = "SELECT * FROM `benhnhan` WHERE `mabenhnhan` = '$mabenhnhan' OR `idtaikhoan` = $idtaikhoan";
        return mysqli_query($this->con, $query);
    }

    function getPatientByIf($mabenhnhan)
    {
        $query = "SELECT * FROM `benhnhan`, `acount` WHERE `mabenhnhan` = '$mabenhnhan' AND benhnhan.idtaikhoan = acount.id";
        return mysqli_query($this->con, $query);
    }

    function listPatients_update($mabenhnhan, $ngaysinh, $gioitinh, $quequan, $anh)
    {
        $query = "UPDATE `benhnhan`, `acount` SET `ngaysinh` = '$ngaysinh', `gioitinh` = '$gioitinh', `quequan` = '$quequan', `anh` = '$anh' WHERE `mabenhnhan` = '$mabenhnhan' AND benhnhan.idtaikhoan = acount.id";
        return mysqli_query($this->con, $query);
    }

    function listPatients_delete($mabenhnhan)
    {

        $sql = "SELECT COUNT(*) FROM hosokhambenh, hosobenhnhannhapvien WHERE hosokhambenh.mabenhnhan = '$mabenhnhan' OR hosobenhnhannhapvien.mabenhnhan = '$mabenhnhan'";
        $ketqua = $this->con->query($sql);

        if (mysqli_num_rows($ketqua)) {
            echo "<script> alert('Không thể xóa bênh bởi bệnh nhân đang được điều trị.') </script>";
        } else {
            $query = "DELETE FROM `benhnhan` WHERE `mabenhnhan` = '$mabenhnhan'";
            return mysqli_query($this->con, $query);
        }
    }

    function listPatients_timkiem($keyword)
    {
        $query = "SELECT * FROM `benhnhan`, `acount` WHERE (`name` LIKE '%$keyword%' OR `mabenhnhan` = '$keyword') AND benhnhan.idtaikhoan =  acount.id";
        return mysqli_query($this->con, $query);
    }

    function listAccounts()
    {
        $query = "SELECT acount.* FROM acount LEFT JOIN benhnhan ON acount.id = benhnhan.idtaikhoan WHERE benhnhan.idtaikhoan IS NULL AND acount.role = '0'";
        return mysqli_query($this->con, $query);
    }

    function getListDoctors()
    {
        $query = "SELECT * FROM `bacsi` WHERE mabacsi <> '0'";
        return mysqli_query($this->con, $query);
    }

    function getDiseases()
    {
        $query =  "SELECT * FROM `benh`";
        return mysqli_query($this->con, $query);
    }

    function getPreventions()
    {
        $query = "SELECT * FROM `phongbenh`";
        return mysqli_query($this->con, $query);
    }

    function getBedHopitals()
    {
        $query = "SELECT * FROM `giuong` WHERE `tinhtrang` = '0'";
        return mysqli_query($this->con, $query);
    }

    function getPatientsNotYetHapitalized()
    {
        $query = "SELECT * FROM `benhnhan`, `acount` WHERE benhnhan.idtaikhoan = acount.id AND `nhapvien` = '0' AND benhnhan.mabenhnhan <> '0'";
        return mysqli_query($this->con, $query);
    }

    function listHoSoBenhNhan_ins($mabenhnhannoitru, $mabenhnhan, $mabenh, $ngaynhapvien, $ngayxuatvien, $maphong, $ghichu, $magiuong, $mabacsi)
    {
        $query = "INSERT INTO `hosobenhnhannhapvien` VALUES('$mabenhnhannoitru', '$mabenhnhan', '$mabenh','$ngaynhapvien','$ngayxuatvien', '$maphong', '$ghichu', '$magiuong', '$mabacsi')";
        return mysqli_query($this->con, $query);
    }

    function getListsNhapVien()
    {
        $query = "SELECT * FROM `hosobenhnhannhapvien`";
        return mysqli_query($this->con, $query);
    }

    function updateBenhNhanNhapVien($mabenhnhan, $nhapvien)
    {
        $query = "UPDATE `benhnhan` SET `nhapvien` = '$nhapvien' WHERE `mabenhnhan` = '$mabenhnhan'";
        return mysqli_query($this->con, $query);
    }

    function getDataPatient()
    {
        $query = "SELECT `name`, `ngaysinh`, `gioitinh`, `quequan`, `sodienthoai`, `username`, `anh` FROM `benhnhan` , `acount` WHERE benhnhan.idtaikhoan = acount.id";
        return mysqli_query($this->con, $query);
    }
}
