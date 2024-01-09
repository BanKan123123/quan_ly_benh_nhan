<?php
class thongkekhambenhModel extends connectDB
{
    function getListKhamBenh()
    {
        $query = "SELECT * FROM hosokhambenh as hs, benhnhan, bacsi, donthuoc, acount WHERE hs.mabenhnhan = benhnhan.mabenhnhan AND hs.mabacsi = bacsi.mabacsi AND hs.madonthuoc = donthuoc.madonthuoc AND acount.id = benhnhan.idtaikhoan";
        return mysqli_query($this->con, $query);
    }

    function listKhamBenh_ins($makhambenh,  $mabenhnhan, $ngaykham, $ghichu, $bacsi, $donthuoc, $dichvu, $vienphi)
    {
        $query = "INSERT INTO `hosokhambenh` VALUES('$makhambenh', '$mabenhnhan', '$ngaykham','$ghichu', '$bacsi', '$donthuoc', '$vienphi','$dichvu')";
        return mysqli_query($this->con, $query);
    }

    function getListDoctors()
    {
        $query = "SELECT * FROM `bacsi` WHERE mabacsi <> '0'";
        return mysqli_query($this->con, $query);
    }

    function getDataPatients()
    {
        $query = "SELECT * FROM `benhnhan`, `acount`, `donthuoc` WHERE benhnhan.idtaikhoan = acount.id AND acount.role = '0' AND benhnhan.mabenhnhan = donthuoc.mabenhnhan AND benhnhan.mabenhnhan <> '0'";
        return mysqli_query($this->con, $query);
    }

    function xoaHoaSoKHamBenh($mahosokhambenh)
    {
        $query = "DELETE FROM `hosokhambenh` WHERE `mahosokhambenh` = '$mahosokhambenh'";
        return mysqli_query($this->con, $query);
    }

    function getLuotKhamById($mahosokhambenh)
    {
        $query = "SELECT * FROM `hosokhambenh`, `donthuoc`, acount, benhnhan WHERE `mahosokhambenh` = '$mahosokhambenh' AND donthuoc.madonthuoc = hosokhambenh.madonthuoc AND benhnhan.mabenhnhan = hosokhambenh.mabenhnhan AND benhnhan.idtaikhoan = acount.id";
        return mysqli_query($this->con, $query);
    }
    function getAcountFromPrescription($madonthuoc)
    {
        $query = "SELECT soluong FROM `donthuoc` WHERE donthuoc.madonthuoc = '$madonthuoc'";
        return mysqli_query($this->con, $query);
    }

    function getDonThuocByBenhNhan($mabenhnhan)
    {
        $query = "SELECT * FROM benhnhan, donthuoc WHERE benhnhan.mabenhnhan = donthuoc.mabenhnhan AND donthuoc.mabenhnhan = '$mabenhnhan'";
        return mysqli_query($this->con, $query);
    }
    function listKhamBenh_update($mahosokhambenh, $mabenhnhan, $ngaykham, $ghichu, $bacsi, $donthuoc, $vienphi, $dichvu)
    {
        $query = "UPDATE `hosokhambenh` SET `mabenhnhan`='$mabenhnhan',`ngaykham`='$ngaykham',`ghichu`='$ghichu',`mabacsi`='$bacsi', `madonthuoc` = '$donthuoc', `vienphi`='$vienphi', `dichvu`='$dichvu' WHERE `mahosokhambenh` = '$mahosokhambenh'";
        return mysqli_query($this->con, $query);
    }

    function exportExcelKhamBenh()
    {
        $query = "SELECT `name`, `ngaykham`,  `hoten`, hskb.madonthuoc, `dichvu`, `vienphi` FROM `hosokhambenh` as hskb , `bacsi`, `benhnhan`, `acount`, `donthuoc` WHERE hskb.mabenhnhan = benhnhan.mabenhnhan AND hskb.madonthuoc = donthuoc.madonthuoc AND hskb.mabacsi = bacsi.mabacsi AND benhnhan.idtaikhoan = acount.id";
        return mysqli_query($this->con, $query);
    }

    function listKhamBenh_timkiem($keyword)
    {
        $query = "SELECT * FROM `hosokhambenh` as hskb, `benhnhan`,`acount`, `chuandoan`, `bacsi` WHERE hskb.mabenhnhan = benhnhan.mabenhnhan AND hskb.ICD = chuandoan.ICD AND hskb.mabacsi = bacsi.mabacsi AND benhnhan.idtaikhoan = acount.id AND (`name` LIKE '%$keyword%')";
        return mysqli_query($this->con, $query);
    }
}
