<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="http://localhost/ManagerPatientPHP/Public/css/medicalBox.css">
  <link rel="stylesheet" type="text/css" href="http://localhost/ManagerPatientPHP/Public/css/Navbar.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <style>
    input {
      border: none;
      outline: none;
    }

    a {
      color: #9899ac;
      text-decoration: none;
    }
  </style>
</head>

<body>
  <div class="card">
    <form action="http://localhost/ManagerPatientPHP/thanhtoan/xacnhanthanhtoan" method="POST" class="card-body">
      <div class="container mb-5 mt-3">
        <div class="container">
          <div class="col-md-12">
            <div class="text-center">
              <i class="fab fa-mdb fa-4x ms-0" style="color:#5d9fc5 ;"></i>
              <p class="pt-0">HÓA ĐƠN VIỆN PHÍ</p>
            </div>
          </div>
          <div class="row">
            <?php
            $i = 1;
            $chiphithuoc = 0;
            if (isset($data["patient"]) && $data["patient"] != null) {
              $row = $data["patient"];
              $Ngaythanhtoan = date("d-m-Y");

            ?>
              <div class="col-xl-8">
                <ul class="list-unstyled">
                  <li class="text-muted">Mã thanh toán:&nbsp;&nbsp;&nbsp;<input name="mathanhtoan" type="text" value="<?php echo $row['mathanhtoan'] ?>"></li>
                  <li class="text-muted">Họ tên:&nbsp;&nbsp;&nbsp;<?php echo $row['name'] ?></li>
                  <li class="text-muted">Giới tính:&nbsp;&nbsp;&nbsp;<?php echo $row['gioitinh'] ?></li>
                </ul>
              </div>
              <div class="col-xl-4">
                <ul class="list-unstyled">
                  <li class="text-muted"> <span class="">Ngày thanh toán:&nbsp;&nbsp;&nbsp;</span><?php echo               $Ngaythanhtoan ?></li>
                  <li class="text-muted"><span class="">Phương thức thanh toán:&nbsp;&nbsp;&nbsp;</span><?php if ($row['phuongthucthanhtoan'] == 1) {
                                                                                                          echo "Tiền mặt";
                                                                                                        } else echo "Chuyển khoản"; ?></li>
                  <li class="text-muted"><span class="fw-bold">Mã bảo hiểm:&nbsp;&nbsp;&nbsp;</span><?php echo $row['mabaohiemyte'] ?></li>
                </ul>
              </div>
            <?php

            }
            ?>
            <div class="row my-2 mx-1 justify-content-center">
              <table class="table table-striped table-borderless">
                <?php
                $i = 1;
                $chiphithuoc = 0;

                if (isset($data["donthuoc1"]) && $data["donthuoc1"] != null) {
                  $row = $data["donthuoc1"];
                  $chiphithuoc = $row['thanhtien1'];
                ?>
                  <thead class="text-white">
                    <th scope="col" colspan="5" style="text-align: center;">ĐƠN THUỐC </th>
                    <tr>
                      <th scope="col">STT </th>
                      <th scope="col">Nội dung </th>
                      <th scope="col">Số lượng</th>
                      <th scope="col">Đơn giá </th>
                      <th scope="col">Thành tiền </th>
                    </tr>
                  </thead>
                  <tr>
                    <td style="text-align: start" class="col-1"><?php echo $i++ ?></td>
                    <td style="text-align: start" class="col-2"><?php echo $row['tenthuoc'] ?></td>
                    <td style="text-align: start" class="col-1"><?php echo $row['soluong'] ?></td>
                    <td style="text-align: start" class="col-1"><?php echo number_format(($row['gia']), 0, '.', ',') . ' VND'  ?></td>
                    <td style="text-align: start" class="col-1"><?php echo number_format(($row['thanhtien1']), 0, '.', ',') . ' VND' ?></td>
                  </tr>
                <?php

                }
                ?>
              </table>
              <table class="table table-striped table-borderless">
                <?php
                if (isset($data["vienphi"]) && $data["vienphi"] != null) {
                  $row = $data["vienphi"];
                  $vienphi = 0;
                  $ngaynhapvien = $row['ngaynhapvien'];
                  $ngayxuatvien = $row['ngayxuatvien'];
                  $ngaynhapvien_date = new DateTime($row['ngaynhapvien']);
                  $ngayxuatvien_date = new DateTime($row['ngayxuatvien']);
                  $songaynhapvien_date = $ngaynhapvien_date->diff($ngayxuatvien_date);
                  $songaynhapvien = $songaynhapvien_date->days;
                  $vienphi = ((intval($songaynhapvien) + 1) * 30000);
                  $tongchiphi = $vienphi + $chiphithuoc;

                ?>
                  <thead style="" class="text-white">
                    <th scope="col" colspan="5" style="text-align: center;">CHI PHÍ NẰM VIỆN</th>
                    <tr>
                      <th scope="col"> </th>
                      <th scope="col">Ngày nhập viện </th>
                      <th scope="col">Ngày xuất viện</th>
                      <th scope="col">Thành tiền </th>
                    </tr>
                  </thead>
                  <tr>
                    <td style="text-align: left" class="col-1"></td>

                    <td style="text-align: left" class="col-1"><?php echo $row['ngaynhapvien'] ?></td>
                    <td style="text-align: left" class="col-1"><?php echo $row['ngayxuatvien'] ?></td>
                    <td style="text-align: left" class="col-1"><?php echo number_format(($vienphi), 0, '.', ',') . ' VND'  ?></td>
                  </tr>
                <?php

                } else {
                  $vienphi = 0;
                }
                ?>
              </table>
            </div>

          </div>
          <div class="row">
            <div class="col-xl-8">
              <p class="ms-3 fw-bold">Chi phí cần thanh toán</p>
            </div>
            <div class="col-xl-3" style="inline-size:auto">
              <ul class="list-unstyled">
                <li class="text-muted ms-3"><span class="text-black me-4">Chi phí nằm viện</span><?php echo number_format(($vienphi), 0, '.', ',') . ' VND'  ?></li>
                <li class="text-muted ms-3 mt-2"><span class="text-black me-4">Chi phí thuốc</span><?php echo number_format(($chiphithuoc), 0, '.', ',') . ' VND'   ?></li>
              </ul>
              <p class="text-black float-start"><span class="text-black me-3"> Thành tiền</span><span style="font-size: 25px;"><?php $tongvienphi = number_format((($vienphi  + $chiphithuoc)), 0, '.', ',') . ' VND';
                                                                                                                                echo $tongvienphi;   ?></span></p>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-xl-10">
            </div>
            <form method="POST" acction="http://localhost/ManagerPatientPHP/danhsachthanhtoan/Xacnhanthanhtoan">
              <div class="col-xl-2">
                <button type="submit" class="btn btn-primary text-capitalize " style=" background-color:#60bdf3 ;inline-size:100%">Thanh toán</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>