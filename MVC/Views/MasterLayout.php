<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Patient</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
</head>
<style>
    body,
    .wrapper,
    .aside {
        width: 100%;
    }

    body {
        background-color: #f5f8fa;
    }

    .wrapper {
        display: flex;
    }

    .aside {
        margin-left: 265px;
    }
</style>

<body>
    <div class="wrapper">
        <?php
        if ($_SESSION['email'] == 'admin@gmail.com') {
            include_once "MVC/Views/Pages/navbar.php";
        } else {
            include_once "MVC/Views/Pages/navbar_user.php";
        }
        ?>
        <div class="aside">
            <?php
            include_once './MVC/Views/Pages/' . $data['page'] . '.php';
            ?>
        </div>
        <?php
        $actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        if ($actual_link == "http://localhost/ManagerPatientPHP/taikhoan" || $actual_link == "http://localhost/ManagerPatientPHP") {
            session_destroy();
        }
        ?>
    </div>
</body>

</html>