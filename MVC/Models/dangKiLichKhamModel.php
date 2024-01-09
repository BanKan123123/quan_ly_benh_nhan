<?php
class dangKiLichKhamModel extends connectDB
{
    function getdata ($email) {
        
        $tbn = $this->getName($email);
        $mbn = $this->mabn($tbn);
        $sql = "SELECT * FROM lichhen where mabenhnhan = '$mbn'";
        return mysqli_query($this->con, $sql);
    }

    function getName($email) {
        $query = "SELECT * FROM `acount`, `benhnhan` WHERE acount.username = '$email' AND benhnhan.idtaikhoan = acount.id";
        $result = mysqli_query($this->con, $query);
        $row = mysqli_fetch_assoc($result);
        $tbn = $row['name'];
        return $tbn;
    }

    function mabn($tbn)
    {
        $sql = "SELECT benhnhan.mabenhnhan FROM `benhnhan`, `acount` WHERE acount.id = benhnhan.idtaikhoan and acount.name = '$tbn'";
        $result = mysqli_query($this->con, $sql);
        $row = mysqli_fetch_assoc($result);
        $mbn = $row['mabenhnhan'];
        return $mbn;
    }

    function ins ($nh, $gc, $mlh, $email) {
        $tbn = $this->getName($email);
        $mbn = $this->mabn($tbn);
        $mbn = $this->maBN($tbn);
        $sql = "INSERT INTO `lichhen` VALUES ('$mlh','$mbn','bs001', NULL, NULL,'$nh','0','$gc')";
        return mysqli_query($this->con, $sql);
    }
}