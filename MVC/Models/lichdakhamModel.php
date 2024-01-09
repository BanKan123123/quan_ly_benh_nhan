<?php
    class lichdakhamModel extends connectDB {
        function getdata () {
            $sql = "SELECT lichhen.malichhen, acount.name, chuandoan.chuandoan, hosokhambenh.ngaykham, bacsi.hoten, lichhen.ngayhen, lichhen.tinhtrang, lichhen.ghichu from lichhen, chuandoan, hosokhambenh, acount, benhnhan, bacsi where lichhen.mabenhnhan = benhnhan.mabenhnhan and hosokhambenh.mahosokhambenh = lichhen.mahosokhambenh and lichhen.machuandoan = chuandoan.ICD and benhnhan.idtaikhoan = acount.id and lichhen.mabacsi = bacsi.mabacsi and lichhen.tinhtrang = '1'";
            return mysqli_query($this->con, $sql);
        }

        function find ($mlh) {
            $sql = "SELECT lichhen.malichhen, acount.name, chuandoan.chuandoan, hosokhambenh.ngaykham, bacsi.hoten, lichhen.ngayhen, lichhen.tinhtrang, lichhen.ghichu from lichhen, chuandoan, hosokhambenh, acount, benhnhan, bacsi where lichhen.mabenhnhan = benhnhan.mabenhnhan and hosokhambenh.mahosokhambenh = lichhen.mahosokhambenh and lichhen.machuandoan = chuandoan.ICD and benhnhan.idtaikhoan = acount.id and lichhen.mabacsi = bacsi.mabacsi and lichhen.tinhtrang = '1' and malichhen like '%$mlh%'";
            return mysqli_query($this->con, $sql);
        }
    }
?>