<?php
class danhsachvienphiModel extends connectDB
{
    function listvienphi_get()
    {
        $query = "SELECT * FROM `vienphi`,`hosobenhnhannhapvien`, `donthuoc`, `baohiemyte`, `benhnhan`, `acount`, `thuoc` WHERE vienphi.mabenhnhannoitru = hosobenhnhannhapvien.mabenhnhannoitru AND vienphi.madonthuoc = donthuoc.madonthuoc AND vienphi.idbaohiem = baohiemyte.idbaohiem AND hosobenhnhannhapvien.mabenhnhan = benhnhan.mabenhnhan AND acount.id = benhnhan.idtaikhoan AND acount.role = '0' AND thuoc.mathuoc = donthuoc.mathuoc";
        return mysqli_query($this->con, $query);
    }

    function listvienphi_ins($mavienphi, $mabenhnhannoitru, $madonthuoc, $vienphi, $idbaohiem)
    {
        $query = "INSERT INTO vienphi VALUES('$mavienphi', '$mabenhnhannoitru', '$madonthuoc', '$vienphi', '$idbaohiem')";
        return mysqli_query($this->con, $query);
    }

    function listvienphi_delete($mavienphi)
    {
        $sql = "SELECT COUNT(*) FROM thanhtoan WHERE mavienphi = '$mavienphi'";
        $ketqua = $this->con->query($sql);
        if (mysqli_num_rows($ketqua) > 0) {
            echo "<script> alert('Viện phí đang ở bên thanh toán') </script>";
        } else {
            $query = "DELETE FROM `vienphi` WHERE `mavienphi` = '$mavienphi'";
            return mysqli_query($this->con, $query);
        }
    }

    function listvienphi_edit($mavienphi, $madonthuoc, $vienphi)
    {
        $query = "UPDATE `vienphi` SET `madonthuoc` = '$madonthuoc', `vienphi` = '$vienphi' WHERE `mavienphi` = '$mavienphi'";
        return mysqli_query($this->con, $query);
    }

    function getBenhNhanNoiTru()
    {
        $query = "SELECT * FROM hosobenhnhannhapvien hb JOIN benhnhan ON hb.mabenhnhan = benhnhan.mabenhnhan JOIN acount ON benhnhan.idtaikhoan = acount.id WHERE hb.ngayxuatvien <> 'No' AND mabenhnhannoitru NOT IN ( SELECT mabenhnhannoitru FROM vienphi )";
        return mysqli_query($this->con, $query);
    }

    function getDonThuoc()
    {
        $query = "SELECT * FROM `donthuoc`, `thuoc` WHERE donthuoc.mathuoc = thuoc.mathuoc";
        return mysqli_query($this->con, $query);
    }

    function getThuoc()
    {
        $query = "SELECT * FROM `thuoc`";
        return mysqli_query($this->con, $query);
    }

    function getBaoHiem()
    {
        $query = "SELECT baohiemyte.idbaohiem, baohiemyte.mabaohiem FROM baohiemyte LEFT JOIN vienphi v ON baohiemyte.idbaohiem = v.idbaohiem WHERE v.idbaohiem IS NULL";
        return mysqli_query($this->con, $query);
    }

    function getListAccount()
    {
        $query = "SELECT * FROM benhnhan, acount WHERE benhnhan.idtaikhoan = acount.id";
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

    function getAcountFromPrescription($madonthuoc)
    {
        $query = "SELECT soluong FROM `donthuoc` WHERE donthuoc.madonthuoc = '$madonthuoc'";
        return mysqli_query($this->con, $query);
    }

    function getHopitalFee($mavienphi)
    {
        $query = "SELECT * FROM `vienphi`,`hosobenhnhannhapvien`, `donthuoc`, `baohiemyte`, `benhnhan`, `acount`, `thuoc` WHERE vienphi.mabenhnhannoitru = hosobenhnhannhapvien.mabenhnhannoitru AND vienphi.madonthuoc = donthuoc.madonthuoc AND vienphi.idbaohiem = baohiemyte.idbaohiem AND hosobenhnhannhapvien.mabenhnhan = benhnhan.mabenhnhan AND acount.id = benhnhan.idtaikhoan AND acount.role = '0' AND thuoc.mathuoc = donthuoc.mathuoc AND `mavienphi` = '$mavienphi'";
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
}
