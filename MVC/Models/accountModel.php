<?php
class accountModel extends connectDB
{
    function find($id, $name)
    {
        $sql = "SELECT * FROM acount WHERE id like '%$id%' and name like '%$name%' AND acount.id <> '0' AND acount.role <> '1'";
        return mysqli_query($this->con, $sql);
    }

    function role()
    {
        $sql = "SELECT role FROM acount";
        return mysqli_query($this->con, $sql);
    }

    function delete($id)
    {
        $sql = "SELECT COUNT(*) FROM benhnhan WHERE idtaikhoan = '$id'";
        $ketqua = $this->con->query($sql);
        if (mysqli_num_rows($ketqua) > 0) {
            echo "<script> alert('Không thể xóa tài khoản vì vẫn còn bệnh nhân.') </script>";
        } else {
            $sql = "DELETE FROM acount Where id = '$id'";
            return mysqli_query($this->con, $sql);
        }
    }

    function insert($id, $name, $email, $password, $phone, $role)
    {
        $sql = "INSERT INTO `acount` VALUES ('$id','$name','$email','$password','$phone','$role')";
        return mysqli_query($this->con, $sql);
    }

    function checkId($id)
    {
        $sql = "SELECT * FROM acount WHERE id = '$id'";
        return mysqli_query($this->con, $sql);
    }

    function checkEmail($email)
    {
        $sql = "SELECT * FROM acount WHERE username = '$email'";
        return mysqli_query($this->con, $sql);
    }
}
