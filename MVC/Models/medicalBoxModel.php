<?php
class medicalBoxModel extends connectDB
{

    function medicalBox_find($mt, $tt)
    {
        $sql = "SELECT * FROM thuoc WHERE mathuoc like '%$mt%' and tenthuoc like '%$tt%'";
        return mysqli_query($this->con, $sql);
    }

    function checkId($id)
    {
        $sql = "SELECT * FROM thuoc Where mathuoc = '$id'";
        return mysqli_query($this->con, $sql);
    }

    function medicalBox_findOne($mt)
    {
        $sql = "SELECT * FROM thuoc WHERE mathuoc like '$mt'";
        return mysqli_query($this->con, $sql);
    }

    function medicalBox_add($mathuoc, $tenthuoc, $dangbaoche, $hamluong, $duongdung, $soluong, $gia, $nhacungcap, $ngayhethan, $ghichu)
    {

        $sql = "SELECT * FROM thuoc where mathuoc = '$mathuoc'";
        $data = mysqli_query($this->con, $sql);

        if (mysqli_num_rows($data) <= 0) {
            $sql = "INSERT INTO `thuoc` VALUES ('$mathuoc', '$tenthuoc', '$dangbaoche', '$hamluong', '$duongdung', '$soluong', '$gia', '$nhacungcap', '$ngayhethan', '$ghichu')";
            return mysqli_query($this->con, $sql);
        } else {
            echo "<script>alert('Mã thuốc đã tồn tại')</script>";
        }
    }

    function medicalBox_del($mathuoc)
    {
        $sql = "SELECT COUNT(*) FROM donthuoc WHERE mathuoc = '$mathuoc'";
        $ketqua = $this->con->query($sql);

        if (mysqli_num_rows($ketqua) > 0) {
            echo "<script> alert('Không thể xóa thuốc vì có thuốc đang sử dụng đơn thuốc này.') </script>";
        } else {
            $sql = "DELETE From thuoc where mathuoc = '$mathuoc'";
            return  mysqli_query($this->con, $sql);
        }
    }

    function medicalBox_upd($mt, $tt, $dbc, $hl, $dd, $sl, $gia, $ncc, $nhh, $gc)
    {
        $sql = "UPDATE thuoc SET tenthuoc='$tt', dangbaoche ='$dbc', hamluong = '$hl', duongdung = '$dd', soluong = '$sl', gia = '$gia', nhacungcap = '$ncc', ngayhethan = '$nhh', ghichu = '$gc' where mathuoc = '$mt'";
        return mysqli_query($this->con, $sql);
    }
}
