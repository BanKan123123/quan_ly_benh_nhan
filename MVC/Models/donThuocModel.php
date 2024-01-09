<?php
class donThuocModel extends connectDB
{
    function donThuocModel_find($tenbenhnhan)
    {
        $sql = "SELECT donthuoc.madonthuoc, acount.name, bacsi.hoten, donthuoc.ngaykedon, thuoc.tenthuoc, donthuoc.donvi, thuoc.hamluong, donthuoc.soluong, donthuoc.huongdan FROM `donthuoc`, `thuoc`, `bacsi`, `benhnhan`, `acount`  WHERE acount.id = benhnhan.idtaikhoan and donthuoc.mabacsi = bacsi.mabacsi and donthuoc.mabenhnhan = benhnhan.mabenhnhan and donthuoc.mathuoc = thuoc.mathuoc and name like '%$tenbenhnhan%' AND donthuoc.madonthuoc <> '0'";
        return mysqli_query($this->con, $sql);
    }

    function donThuocModel_findOne($mdt)
    {
        $sql = "SELECT donthuoc.madonthuoc, acount.name, bacsi.hoten, donthuoc.ngaykedon, donthuoc.donvi, thuoc.tenthuoc, thuoc.hamluong, donthuoc.soluong, donthuoc.huongdan 
            FROM `donthuoc`, `thuoc`, `bacsi`, `benhnhan`, `acount`  
            WHERE acount.id = benhnhan.idtaikhoan and donthuoc.mabacsi = bacsi.mabacsi and donthuoc.mabenhnhan = benhnhan.mabenhnhan and donthuoc.mathuoc = thuoc.mathuoc and madonthuoc like '$mdt'";
        return mysqli_query($this->con, $sql);
    }

    function checkId($mdt)
    {
        $sql =  "SELECT * FROM donthuoc Where madonthuoc = '$mdt'";
        return mysqli_query($this->con, $sql);
    }

    function donThuocModel_ins($mdt, $tbn, $nkd, $ngaykd, $tt, $sl, $dv, $hd)
    {
        $mbn = $this->mabn($tbn);
        $mbs = $this->mabs($nkd);
        $mt = $this->mathuoc($tt);
        $sql = "INSERT INTO `donthuoc` VALUES ('$mdt','$mbn','$mbs','$ngaykd','$mt','$sl','$dv','$hd')";
        return mysqli_query($this->con, $sql);
    }

    function tenbenhnhan()
    {
        $sql = "SELECT name From acount Where role = '0' AND id <> '33'";
        return mysqli_query($this->con, $sql);
    }

    function tenbacsi()
    {
        $sql = "SELECT hoten From bacsi WHERE bacsi.mabacsi <> '0'";
        return mysqli_query($this->con, $sql);
    }

    function tenthuoc()
    {
        $sql = "SELECT tenthuoc From thuoc where soluong > 0";
        return mysqli_query($this->con, $sql);
    }

    function mabn($tbn)
    {
        $sql = "SELECT benhnhan.mabenhnhan FROM `benhnhan`, `acount` WHERE acount.id = benhnhan.idtaikhoan and acount.name = '$tbn'";
        $result = mysqli_query($this->con, $sql);
        $row = mysqli_fetch_assoc($result);
        $mbn = $row['mabenhnhan'];
        return $mbn;
    }

    function mabs($nkd)
    {
        $sql = "SELECT mabacsi FROM `bacsi` where hoten = '$nkd'";
        $result = mysqli_query($this->con, $sql);
        $row = mysqli_fetch_assoc($result);
        $mbs = $row['mabacsi'];
        return $mbs;
    }

    function mathuoc($tt)
    {
        $sql = "SELECT mathuoc From `thuoc` where tenthuoc = '$tt'";
        $result = mysqli_query($this->con, $sql);
        $row = mysqli_fetch_assoc($result);
        $mt = $row['mathuoc'];
        return $mt;
    }

    function donThuocModel_upd($mdt, $tbn, $nkd, $ngaykd, $tt, $sl, $dv, $hd)
    {
        $mbn = $this->mabn($tbn);
        $mbs = $this->mabs($nkd);
        $mt = $this->mathuoc($tt);
        $sql = "UPDATE `donthuoc` SET mabenhnhan = '$mbn', mabacsi = '$mbs', ngaykedon = '$ngaykd', mathuoc = '$mt', soluong = '$sl', donvi ='$dv', huongdan = '$hd' WHERE madonthuoc = '$mdt'";
        return mysqli_query($this->con, $sql);
    }

    function donThuocModel_del($mdt)
    {
        $sql = "SELECT COUNT(*) FROM hosokhambenh WHERE madonthuoc = '$mdt'";

        $ketqua = $this->con->query($sql);
        if (mysqli_num_rows($ketqua)) {
            echo "<script> alert('Không thể xóa đơn thuốc vì có đơn thuốc đang sử dụng.') </script>";
        } else {
            $sql = "DELETE FROM donthuoc where madonthuoc = '$mdt'";
            return mysqli_query($this->con, $sql);
        }
    }

    function getThuocById($mathuoc)
    {
        $query = "SELECT * FROM thuoc WHERE `mathuoc` = '$mathuoc'";
        return mysqli_query($this->con, $query);
    }

    function accountingPres($soluong, $mathuoc)
    {
        $query = "UPDATE `thuoc` SET `soluong` = '$soluong' WHERE `mathuoc` = '$mathuoc'";
        return mysqli_query($this->con, $query);
    }
}
