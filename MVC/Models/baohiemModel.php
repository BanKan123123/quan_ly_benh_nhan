<?php

    class baohiemModel extends connectDB {
        function find ($mbh) {
            $sql = "SELECT * FROM baohiemyte, acount where mabaohiem like '%$mbh%' AND acount.username = baohiemyte.email";
            return mysqli_query($this->con, $sql);
        }
    }
