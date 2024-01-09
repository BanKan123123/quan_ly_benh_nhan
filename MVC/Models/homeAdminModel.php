<?php
class homeAdminModel extends connectDB
{
    function getListPatient()
    {
        $query = "SELECT * FROM `benhnhan`";
        return mysqli_query($this->con, $query);
    }

    function getPrescriptionListForMonth()
    {
        $query = "SELECT * FROM `donthuoc` WHERE  YEAR(ngaykedon) = YEAR(CURRENT_DATE) AND  MONTH(ngaykedon) = MONTH(CURRENT_DATE)";
        return mysqli_query($this->con, $query);
    }

    function getDrugListExpired()
    {
        $query = "SELECT * FROM `thuoc` WHERE thuoc.ngayhethan <= CURRENT_DATE";
        return mysqli_query($this->con, $query);
    }

    function getCountDrugList()
    {
        $query = "SELECT * FROM thuoc";
        return mysqli_query($this->con, $query);
    }

    function getMedicalScheduleListForMonth()
    {
        $query = "SELECT *  FROM `hosokhambenh` WHERE YEAR(STR_TO_DATE(hosokhambenh.ngaykham, '%d-%m-%Y')) = YEAR(CURRENT_DATE) AND MONTH(STR_TO_DATE(hosokhambenh.ngaykham, '%d-%m-%Y')) = MONTH(CURRENT_DATE) ORDER BY hosokhambenh.mahosokhambenh DESC";
        return mysqli_query($this->con, $query);
    }
}
