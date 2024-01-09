<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Document</title>


    <link rel="stylesheet" href="http://localhost/ManagerPatientPHP/Public/css/homeUser.css">
    <script>
    var add;

    function chooseFile(fileinput) {
        if (fileinput.files && fileinput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                add = e.target.result;
                $('#image').attr('src', add);
            }
            reader.readAsDataURL(fileinput.files[0]);
        }
    }

    function saveImage() {

        console.log(add);
    }
    </script>
</head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
</script>

<body>

    <div class="container info">
        <!-- User -->
        <div class="user__info">
            <div class="info__top">
                <?php
                if (isset($data["dataName"]) && $data["dataName"] != null) {
                while ($row = mysqli_fetch_array($data["dataName"])) {
                ?>
                <img src="<?php echo $row['anh'] ?>" alt="<?php echo $row['name'] ?>" class="user__img">
                <p class="user__name"><?php echo $row['name'] ?></p>
                <?php 
                        }
                    }
                    ?>

                <!-- Change Info User -->
                <button type="button" class="btn btn-primary btn__user" data-toggle="modal" data-target="#exampleModal"
                    name="btnthaydoi">Sửa thông tin</button>

                <!-- Form Info -->
                <?php
                        if (isset($data["dataTT"]) && $data["dataTT"] != null) {
                        while ($row = mysqli_fetch_array($data["dataTT"])) {
                    ?>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <form method="post" action="http://localhost/ManagerPatientPHP/HomeUser/EditData"
                        class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">THONG TIN </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="row gutters">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <h6 class="mb-2 text-primary">Personal Details</h6>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label for="fullName">Họ Tên</label>
                                                    <input type="text" value="<?php echo  $row["name"] ?>"
                                                        class="form-control" name="txtName" placeholder="Nhập họ tên">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label for="birthday">Ngày sinh</label>
                                                    <input type="date"
                                                        value="<?php $dt = new DateTime($row['ngaysinh']); echo $dt->format('Y-m-d') ?>"
                                                        class="form-control" name="txtBirth"
                                                        placeholder="Nhập ngày sinh">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label for="Sex">Giới tính</label>
                                                    <input type="text" value="<?php echo  $row['gioitinh'] ?>"
                                                        class="form-control" name="txtSex" placeholder="Nhập giới tính">
                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label for="eMail">Email</label>
                                                    <input type="email" value="<?php echo  $row["username"] ?>"
                                                        class="form-control" name="txtEmail" placeholder="Enter email">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label for="phone">Số điện thoại</label>
                                                    <input type="tel" value="<?php echo  $row["sodienthoai"] ?>"
                                                        class="form-control" name="txtPhone"
                                                        placeholder="Nhập số điện thoại">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label for="ciTy">Quê quán</label>
                                                    <input type="text" value="<?php echo  $row["quequan"] ?>"
                                                        class="form-control" name="txtAddress"
                                                        placeholder="Nhập quê quán">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="ciTy">Ảnh</label>
                                                <div>
                                                    <img src="<?php echo $row['anh'] ?>"
                                                        alt="<?php echo $row['name'] ?>" id="image" width="200"
                                                        height="200">
                                                    <input type="file" name="imageFile" onchange="chooseFile(this)"
                                                        accept="image/gif,image/png,image/jpeg,image/jpg">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <input type="submit" name="btnLuu" class="btn btn-primary" value="Lưu"></input>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <?php
                        }
                    }
                    ?>

            </div>


            <!-- Bottom info -->
            <div class="info__bottom">
                <p class="desc">Thông tin</p>
                <div class="info__id">
                    <lord-icon src="https://cdn.lordicon.com/wluyqhxh.json" trigger="hover" colors="primary:#121331">
                    </lord-icon>
                    <?php
                        if (isset($data["dataId"]) && $data["dataId"] != null) {
                        while ($row = mysqli_fetch_array($data["dataId"])) {
                    ?>
                    <p class="desc"><?php echo $row['mabenhnhan'] ?></p>
                    <?php
                        }
                    }
                    ?>
                </div>
                <div class="info__address">
                    <lord-icon class="icon__address" src="https://cdn.lordicon.com/osuxyevn.json" trigger="hover"
                        colors="primary:#121331">
                    </lord-icon>
                    <?php
                        if (isset($data["dataAddress"]) && $data["dataAddress"] != null) {
                        while ($row = mysqli_fetch_array($data["dataAddress"])) {
                    ?>
                    <p class="desc"><?php echo $row['quequan'] ?></p>
                    <?php
                        }
                    }
                    ?>
                </div>
                <div class="info__birth">
                    <lord-icon src="https://cdn.lordicon.com/pmegrqxm.json" trigger="hover" colors="primary:#121331">
                    </lord-icon>
                    <?php
                        if (isset($data["dataBirth"]) && $data["dataBirth"] != null) {
                        while ($row = mysqli_fetch_array($data["dataBirth"])) {
                    ?>
                    <p class="desc"><?php echo $row['ngaysinh'] ?></p>
                    <?php
                        }
                    }
                    ?>
                </div>
                <div class="info__phone">
                    <lord-icon src="https://cdn.lordicon.com/ssvybplt.json" trigger="hover" colors="primary:#121331">
                    </lord-icon>
                    <?php
                        if (isset($data["dataPhone"]) && $data["dataPhone"] != null) {
                        while ($row = mysqli_fetch_array($data["dataPhone"])) {
                    ?>
                    <p class="desc"><?php echo $row['sodienthoai'] ?></p>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

        <!-- Patient -->
        <div class="patient__info">

            <?php
                if (isset($data["dataName1"]) && $data["dataName1"] != null) {
                while ($row = mysqli_fetch_array($data["dataName1"])) {
                ?>
            <h1 class="patient__name">Bệnh án - Bệnh nhân: <br><?php echo $row['name'] ?>
            </h1>
            <?php 
                        }
                    }
                    ?>

            <div class="patient__content">
                <table class="drug--info table table-striped table-hover">
                    <tr>
                        <th style="text-align: left; padding-left: 20px;" class="col-2">STT</th>
                        <th style="text-align: center" class="col-4">Tên bệnh</th>
                        <th style="text-align: center" class="col-4">Ghi chú</th>
                    </tr>

                    <?php
                    // B3: Xử lý kết quả
                    if (isset($data["data"]) && $data["data"] != null) {
                        $i=0;
                        while ($row = mysqli_fetch_array($data["data"])) {
                    ?>

                    <tr>
                        <td style="text-align: left; padding-left: 20px;" class="col-2"><?php echo ++$i?></td>
                        <td style="text-align: left" class="col-4"><?php echo $row['tenbenh'] ?></td>
                        <td style="text-align: center" class="col-4"><?php echo $row['ghichu'] ?></td>
                    </tr>

                    <?php
                        }
                    }
                    ?>
                </table>
            </div>
        </div>

        <!-- Judge -->
        <div class="judge">
            <p class="desc">BÁC SĨ HỘI CHUẨN</p>
            <div class="doctor">
                <?php
                        if (isset($data["dataNameDoctor"]) && $data["dataNameDoctor"] != null) {
                        while ($row = mysqli_fetch_array($data["dataNameDoctor"])) {
                    ?>
                <div class="doctor__inline">
                    <lord-icon src="https://cdn.lordicon.com/dxjqoygy.json" trigger="hover"
                        colors="primary:#121331,secondary:#08a88a">
                    </lord-icon>
                    <p class="desc" style="display: block;"><?php echo $row['hoten'] ?></p>
                </div>
                <?php
                        }
                    }
                    ?>
            </div>
            <p class="desc">KẾT QUẢ</p>
            <?php
                        if (isset($data["dataKQ"]) && $data["dataKQ"] != null) {
                        while ($row = mysqli_fetch_array($data["dataKQ"])) {
                    ?>
            <textarea name="" id="" cols="30" rows="4"><?php echo $row['chuandoan'] ?></textarea>
            <?php
                        }
                    }
                    ?>

        </div>
    </div>

    <script src="https://cdn.lordicon.com/bhenfmcm.js"></script>

</body>

</html>