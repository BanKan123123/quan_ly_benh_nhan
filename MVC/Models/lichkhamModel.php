<?php
    class lichkhamModel extends connectDB {
        function getdata () {
            $sql = "SELECT lichhen.malichhen, acount.name, bacsi.hoten, lichhen.ngayhen, lichhen.tinhtrang, lichhen.ghichu from lichhen, acount, benhnhan, bacsi where lichhen.mabenhnhan = benhnhan.mabenhnhan and benhnhan.idtaikhoan = acount.id and lichhen.mabacsi = bacsi.mabacsi and lichhen.tinhtrang = '0'";
            return mysqli_query($this->con, $sql);
        }

        function find ($tenbenhnhan) {
            $sql = "SELECT lichhen.malichhen, acount.name, bacsi.hoten, lichhen.ngayhen, lichhen.tinhtrang, lichhen.ghichu from lichhen, acount, benhnhan, bacsi where lichhen.mabenhnhan = benhnhan.mabenhnhan and benhnhan.idtaikhoan = acount.id and lichhen.mabacsi = bacsi.mabacsi and lichhen.tinhtrang = '0' and name like '%$tenbenhnhan%'";
            return mysqli_query($this->con, $sql);
        }

        function findOne ($mlh) {
            $sql = "SELECT lichhen.malichhen, acount.name, bacsi.hoten, lichhen.ngayhen, lichhen.tinhtrang, lichhen.ghichu from lichhen, acount, benhnhan, bacsi where lichhen.mabenhnhan = benhnhan.mabenhnhan and benhnhan.idtaikhoan = acount.id and lichhen.mabacsi = bacsi.mabacsi and lichhen.malichhen = '$mlh'";
            return mysqli_query($this->con, $sql);
        }

        function tenBacSi () {
            $sql = "SELECT hoten FROM bacsi";
            return mysqli_query($this->con, $sql);
        }

        function chuandoan () {
            $sql = "SELECT chuandoan, ICD FROM chuandoan";
            return mysqli_query($this->con, $sql);
        }

        function maBN ($tbn) {
            $sql = "SELECT mabenhnhan FROM `benhnhan`, `acount` where benhnhan.idtaikhoan = acount.id and name = '$tbn'";
            $result = mysqli_query($this->con, $sql);
            $row = mysqli_fetch_assoc($result);
            $mbs = $row['mabenhnhan'];
            return $mbs;
        }

        function maBS ($tbs) {
            $sql = "SELECT mabacsi FROM `bacsi` where hoten = '$tbs'";
            $result = mysqli_query($this->con, $sql);
            $row = mysqli_fetch_assoc($result);
            $mbs = $row['mabacsi'];
            return $mbs;
        }

        function insertHSKB ($mhsbn, $tbn, $nk, $gc, $tbs) {
            $mbn = $this->maBN($tbn);
            $mbs = $this->maBS($tbs);
            $sql = "INSERT INTO `hosokhambenh` VALUES ('$mhsbn','$mbn','$nk', '$gc','$mbs', null, null, null)";
            return mysqli_query($this->con, $sql);
        }

        function checkIdHSKB ($mhskb) {
            $sql = "SELECT * FROM hosokhambenh where mahosokhambenh = '$mhskb'";
            return mysqli_query($this->con, $sql);
        }

        function updLH ($tbn, $tbs, $mcd, $mhskb, $gc, $mlh) {
            $mbn = $this->maBN($tbn);
            $mbs = $this->maBS($tbs);
            $sql = "UPDATE `lichhen` SET `mabenhnhan`='$mbn',`mabacsi`='$mbs',`machuandoan`='$mcd',`mahosokhambenh`='$mhskb',`tinhtrang`='1',`ghichu`='$gc' WHERE `malichhen`='$mlh'";
            return mysqli_query($this->con, $sql);
        }
    }
?>