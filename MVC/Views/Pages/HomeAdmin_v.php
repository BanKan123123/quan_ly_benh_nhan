<?php
$countPatients = $data['getListPatients'];

$countPrescription = $data['getPrescriptionListForMonth'];

$countDrugsExpired = $data['getDrugListExpired'];

$countDrugs = $data['getCountDrugList'];

$countMedicalSchedules = $data['getMedicalScheduleListForMonth'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://localhost/ManagerPatientPHP/Public/css/editdoctor.css">
    <style>
        .card {
            box-shadow: 0 10px 6px rgba(0, 0, 0, 0.08);
            transition: all 0.2s ease-in-out;
        }

        .card:hover {
            box-shadow: 4px 10px 6px rgba(0, 0, 0, 0.2);
        }

        .card-body a {
            text-decoration: none;
            color: #fff;
        }

        button.btn_redirect {
            min-inline-size: 100%;
            block-size: 40px;
            animation: none;
            outline: none;
            border: none;
            background: #0d6efd;
            color: #fff;
            border-radius: 7px;
        }

        p.card-text {
            font-size: 30px;
            font-weight: 600;
            text-align: center;
        }

        .card-title {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-title h3 {
            margin: 0;
            color: #333;
            inline-size: 100%;
        }

        .card-title lord-icon {
            inline-size: 80px;
            block-size: 80px;
        }

        .card-text {
            color: #333;
        }
    </style>
</head>

<body>
    <div class="main">
        <header class="header">
            <div class="page">
                <h1 class="name__page">Trang chủ</h1>
                <h3 class="desc __page">Thống kê bệnh viện</h3>
            </div>
        </header>

        <div class="container">

            <div class="container-home row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="card-title">
                                <lord-icon class="container-icon" src="https://cdn.lordicon.com/juasohjt.json" trigger="hover" colors="primary:#333">
                                </lord-icon>
                                <h3>
                                    Số lượng bệnh nhân
                                </h3>
                            </div>
                            <a href=""></a>
                            <p class="card-text">12</p>
                            <button class="btn_redirect">Quản lý bệnh nhân </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const containerHome = document.querySelector('.container-home');


        const varStastics = [{
                name: 'Số lượng bệnh nhân',
                counter: <?php echo $countPatients ?>,
                nameBtn: "Quản lý bệnh nhân",
                icon: "https://cdn.lordicon.com/juasohjt.json",
                link: 'http://localhost/ManagerPatientPHP/danhsachbenhnhan'
            },
            {
                name: 'Lượt khám tháng này',
                counter: <?php echo $countMedicalSchedules ?>,
                nameBtn: "Thống kê khám bệnh",
                icon: "https://cdn.lordicon.com/nocovwne.json",
                link: 'http://localhost/ManagerPatientPHP/thongkekhambenh'


            },
            {
                name: 'Số lượng thuốc hết hạn',
                counter: <?php echo $countDrugsExpired ?>,
                nameBtn: "Quản lý thuốc",
                icon: "https://cdn.lordicon.com/xawkzoxm.json",
                link: 'http://localhost/ManagerPatientPHP/medicalBox/Get_data'

            },
            {
                name: 'Tủ thuốc',
                counter: <?php echo $countDrugs ?>,
                nameBtn: "Quản lý thuốc",
                icon: "https://cdn.lordicon.com/xawkzoxm.json",
                link: 'http://localhost/ManagerPatientPHP/medicalBox/Get_data'


            },
            {
                name: 'Số lượng đơn thuốc trong tháng',
                counter: <?php echo $countPrescription ?>,
                nameBtn: "Quản lý đơn thuốc",
                icon: "https://cdn.lordicon.com/yyecauzv.json",
                link: 'http://localhost/ManagerPatientPHP/donthuoc/Get_data'

            },
        ]

        const htmls = varStastics.map((box, index) => (
            `
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="card-title">
                            <lord-icon class="container-icon" src="${box.icon}" trigger="hover" colors="primary:#333">
                            </lord-icon>
                            <h3>
                                ${box.name}
                            </h3>
                        </div>
                        <p class="card-text">${box.counter}</p>
                        <a href="${box.link}"> <button class="btn_redirect"> ${box.nameBtn} </button></a>
                    </div>
                </div>
            </div>
            `
        ))

        containerHome.innerHTML = htmls.join(' ');
    </script>
</body>

</html>