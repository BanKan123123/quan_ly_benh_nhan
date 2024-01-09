<?php
class bacsiUserModel extends connectDB
{
    function getDataDoctors()
    {
        $query = "SELECT * FROM `bacsi`,`khoa` WHERE bacsi.makhoa = khoa.makhoa AND mabacsi <> '0'";
        return mysqli_query($this->con, $query);
    }

    function checkIdentical($mabacsi)
    {
        $query = "SELECT * FROM `bacsi` WHERE `mabacsi` = '$mabacsi' ";
        return mysqli_query($this->con, $query);
    }

    function getDataKhoa()
    {
        $query = "SELECT * FROM `khoa` ";
        return mysqli_query($this->con, $query);
    }

    function getListDataByKeyWord($keyword)
    {
        $query = "SELECT * FROM `bacsi`, `khoa` WHERE bacsi.makhoa = khoa.makhoa AND (`hoten` LIKE '%$keyword%' OR `mabacsi` = '$keyword')";
        return mysqli_query($this->con, $query);
    }
    function check() 
    {
        $query = "SELECT * FROM `bacsi`, `hosokhambenh`, `benhnhan` WHERE bacsi.mabacsi = hosokhambenh.mabacsi AND hosokhambenh.mabenhnhan = benhnhan.mabenhnhan";
        return mysqli_query($this->con, $query);
    }
} 
