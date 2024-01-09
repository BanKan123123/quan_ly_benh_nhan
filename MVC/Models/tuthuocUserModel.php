<?php
    class tuthuocUserModel extends connectDB {

        function medicalBox_find ($mt, $tt) {
            $sql = "SELECT * FROM thuoc WHERE mathuoc like '%$mt%' AND tenthuoc like '%$tt%'";
            return mysqli_query($this->con, $sql);
        }

        function checkId ($id) {
            $sql = "SELECT * FROM thuoc Where mathuoc = '$id'";
            return mysqli_query($this->con, $sql);
        }

        function medicalBox_findOne ($mt) {
            $sql = "SELECT * FROM thuoc WHERE mathuoc like '$mt'";
            return mysqli_query($this->con, $sql);
        }

        
    }
?>