<?php
class hosobenhnhanModel extends connectDB
{

    function getListDocsPatient()
    {
        $query = "SELECT * FROM `hosobenhnhannhapvien` as hsnv, `benhnhan`, `benh`,`bacsi`, `phongbenh`,`giuong`, `acount` WHERE hsnv.mabenhnhan = benhnhan.mabenhnhan AND hsnv.mabenh = benh.mabenh AND hsnv.maphong = phongbenh.maphongbenh AND hsnv.magiuong = giuong.magiuong AND hsnv.mabacsi = bacsi.mabacsi AND benhnhan.idtaikhoan = acount.id AND acount.role = '0'";
        return mysqli_query($this->con, $query);
    }

    function getListPatientNotYetDischarge()
    {
        $query = "SELECT * FROM `hosobenhnhannhapvien` as hsnv, `benhnhan`, `acount` WHERE ngayxuatvien = 'No' AND hsnv.mabenhnhan = benhnhan.mabenhnhan AND benhnhan.idtaikhoan = acount.id AND acount.role = '0'";
        return mysqli_query($this->con, $query);
    }

    function listHoSoNhapVien_delete($mabenhnhannoitru)
    {
        $query = "DELETE FROM `hosobenhnhannhapvien` WHERE `mabenhnhannoitru` = '$mabenhnhannoitru'";
        return mysqli_query($this->con, $query);
    }

    function xuatvien($mabenhnhannoitru, $ngayxuatvien)
    {
        $query = "UPDATE `hosobenhnhannhapvien` SET `ngayxuatvien` = '$ngayxuatvien' WHERE `mabenhnhannoitru` = '$mabenhnhannoitru'";
        $query1 = "UPDATE benhnhan
        SET nhapvien = 0
        WHERE mabenhnhan IN (
          SELECT mabenhnhan
          FROM hosobenhnhannhapvien
          WHERE mabenhnhannoitru = '$mabenhnhannoitru'
        )";
        mysqli_query($this->con, $query1);
        return mysqli_query($this->con, $query);
    }

    function exportExcelHoSoNhapVien()
    {
        $query = "SELECT `name`, `tenbenh`, `ngaynhapvien`, `ngayxuatvien`, `tenphongbenh`, `sogiuong`, `hoten`  FROM `hosobenhnhannhapvien` as hsnv , `benhnhan`, `acount`, `benh`, `phongbenh`, `giuong`, `bacsi` WHERE hsnv.mabenhnhan = benhnhan.mabenhnhan AND hsnv.mabenh = benh.mabenh AND hsnv.maphong = phongbenh.maphongbenh AND hsnv.magiuong = giuong.magiuong AND hsnv.mabacsi = bacsi.mabacsi AND benhnhan.idtaikhoan = acount.id AND acount.role = '0'";
        return mysqli_query($this->con, $query);
    }

    function listNhapVien_timkiem($keyword)
    {
        $query = "SELECT * FROM `hosobenhnhannhapvien` as hsnv, `benhnhan`, `benh`,`bacsi`, `phongbenh`,`giuong`, `acount` WHERE hsnv.mabenhnhan = benhnhan.mabenhnhan AND hsnv.mabenh = benh.mabenh AND hsnv.maphong = phongbenh.maphongbenh AND hsnv.magiuong = giuong.magiuong AND hsnv.mabacsi = bacsi.mabacsi AND benhnhan.idtaikhoan = acount.id AND acount.role = '0' AND (`name` LIKE '%$keyword%')";
        return mysqli_query($this->con, $query);
    }

    function getDonThuocById($mabenhnhannoitru)
    {
        $query = "SELECT * FROM `hosobenhnhannhapvien`, `donthuoc`, `benhnhan` WHERE hosobenhnhannhapvien.mabenhnhan = benhnhan.mabenhnhan AND donthuoc.mabenhnhan = benhnhan.mabenhnhan AND `mabenhnhannoitru` = '$mabenhnhannoitru'";
        return mysqli_query($this->con, $query);
    }

    function getDataThuocByMaThuoc($madonthuoc)
    {
        $query = "SELECT donthuoc.soluong, thuoc.gia FROM donthuoc, thuoc WHERE donthuoc.mathuoc = thuoc.mathuoc AND madonthuoc = '$madonthuoc'";
        return mysqli_query($this->con, $query);
    }

    function getBaoHiemByEmail($mabenhnhannoitru)
    {
        $query = "SELECT * FROM hosobenhnhannhapvien, benhnhan, acount, baohiemyte WHERE hosobenhnhannhapvien.mabenhnhan = benhnhan.mabenhnhan AND benhnhan.idtaikhoan = acount.id AND hosobenhnhannhapvien.mabenhnhannoitru = '$mabenhnhannoitru'";
        return mysqli_query($this->con, $query);
    }

    function getDateHopitalizeFromDoc($mabenhnhannoitru)
    {
        $query = "SELECT ngaynhapvien FROM `hosobenhnhannhapvien` as  hb WHERE hb.mabenhnhannoitru = '$mabenhnhannoitru'";
        return mysqli_query($this->con, $query);
    }

    function getDateDischargedFromDoc($mabenhnhannoitru)
    {
        $query = "SELECT ngayxuatvien FROM `hosobenhnhannhapvien` as  hb WHERE hb.mabenhnhannoitru = '$mabenhnhannoitru'";
        return mysqli_query($this->con, $query);
    }

    function listvienphi_ins($mavienphi, $mabenhnhannoitru, $madonthuoc, $vienphi, $idbaohiem)
    {
        $query = "INSERT INTO vienphi VALUES('$mavienphi', '$mabenhnhannoitru', '$madonthuoc', '$vienphi', '$idbaohiem')";
        return mysqli_query($this->con, $query);
    }
}
