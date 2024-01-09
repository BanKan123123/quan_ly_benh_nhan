<?php
$hopitalFee = mysqli_fetch_assoc($data['hopitalFee']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://localhost/ManagerPatientPHP/Public/css/editdoctor.css">
</head>

<body>
    <div class="main">
        <header class="header">
            <div class="page">
                <h1 class="name__page">Viện phí</h1>
                <h3 class="desc __page">Sửa bênh nhân</h3>
            </div>
        </header>

        <div class="container">
            <form method="POST" action="http://localhost/ManagerPatientPHP/danhsachvienphi/xacnhansuavienphi">
                <div class="mb-3">
                    <label for="date" class="form-label">Mã viện phí</label>
                    <input readonly required name="mavienphi" type="text" class="form-control" id="date" value="<?php echo $hopitalFee['mavienphi']  ?>">
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Mã bệnh nhân nội trú</label>
                    <input readonly required name="mabenhnhannoitru" type="text" class="form-control" id="date" value="<?php echo $hopitalFee['mabenhnhannoitru'] ?>">
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Mã bệnh nhân</label>
                    <input readonly required name="mabenhnhan" type="text" class="form-control" id="date" value="<?php echo $hopitalFee['mabenhnhan'] ?>">
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Họ và tên</label>
                    <input readonly required name="name" type="text" class="form-control" id="date" value="<?php echo $hopitalFee['name'] ?>">
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Đơn thuốc</label>
                    <select required name="thuoc" class="select-prescription form-select" aria-label="Default select example" autocomplete="on">
                        <?php
                        if ($hopitalFee != null) {
                        ?>
                            <option value="<?php echo $hopitalFee['madonthuoc'] ?>"><?php echo $hopitalFee['madonthuoc'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="note" class="form-label">Mã bảo hiểm</label>
                    <input readonly required name="mabaohiem" type="text" class="form-control" id="date" value="<?php echo $hopitalFee['mabaohiem'] ?>">
                </div>

                <div>
                    <a href="http://localhost/ManagerPatientPHP/danhsachvienphi"><button type="button" class="btn btn-danger">Hủy</button></a>
                    <button type="submit" class="btn btn-primary">Sửa</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>