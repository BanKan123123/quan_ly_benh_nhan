<?php
class doctorBoxModel extends connectDB
{
    function getDataDoctors()
    {
        $query = "SELECT * FROM `bacsi`,`khoa` WHERE bacsi.makhoa = khoa.makhoa AND bacsi.mabacsi <> '0'";
        return mysqli_query($this->con, $query);
    }

    function addDoctor($mabacsi, $hoten, $anh, $tuoi, $ngaysinh,  $gioitinh, $sodienthoai, $email, $trinhdo, $makhoa, $tinhtrang)
    {
        $query = "INSERT INTO `bacsi` VALUES('$mabacsi', '$hoten', '$anh', '$tuoi', '$ngaysinh', '$gioitinh', '$sodienthoai', '$email','$trinhdo', '$makhoa', '$tinhtrang')";
        return mysqli_query($this->con, $query);
    }

    function checkIdentical($mabacsi)
    {
        $query = "SELECT * FROM `bacsi` WHERE `mabacsi` = '$mabacsi'";
        return mysqli_query($this->con, $query);
    }

    function getDataKhoa()
    {
        $query = "SELECT * FROM `khoa` ";
        return mysqli_query($this->con, $query);
    }

    function deleteDoctorById($mabacsi)
    {
        $sql = "SELECT COUNT(*) FROM hosokhambenh, hosobenhnhannhapvien, donthuoc WHERE hosokhambenh.mabacsi = '$mabacsi' OR hosobenhnhannhapvien.mabacsi = '$mabacsi' OR donthuoc.mabacsi = '$mabacsi'";

        $ketqua = $this->con->query($sql);
        if (mysqli_num_rows($ketqua) > 0) {
            echo "<script> alert('Không thể xóa bác sĩ vì bác sĩ đang làm việc.') </script>";
        } else {
            $query = "DELETE FROM `bacsi` WHERE `mabacsi` = '$mabacsi'";
            return mysqli_query($this->con, $query);
        }
    }

    function editDoctor($mabacsi, $hoten, $anh, $tuoi, $ngaysinh,  $gioitinh, $sodienthoai, $email, $trinhdo, $makhoa, $tinhtrang)
    {
        $query = "UPDATE `bacsi` SET `hoten`='$hoten',`anh`='$anh',`tuoi`='$tuoi',`ngaysinh`='$ngaysinh',`gioitinh`='$gioitinh',`sodienthoai`='$sodienthoai',`email`='$email',`trinhdo`='$trinhdo',`makhoa`='$makhoa',`tinhtrang`=' $tinhtrang' WHERE `mabacsi` = '$mabacsi'";
        return mysqli_query($this->con, $query);
    }

    function getListDataByKeyWord($keyword)
    {
        $query = "SELECT * FROM `bacsi`, `khoa` WHERE bacsi.makhoa = khoa.makhoa AND (`hoten` LIKE '%$keyword%' OR `mabacsi` = '$keyword')";
        return mysqli_query($this->con, $query);
    }
}
