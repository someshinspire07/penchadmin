<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location:../../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>WUA_Section</title>
    <style>
        /* label {
            display: inline-block;
            width: 142px;
        } */
        .gallery {
            /* background-color: #dbddf1; */
            background-color: #E9ECEF;
            padding: 80px 0;

        }

        .img {
            max-width: 100%;
        }

        .gallery h6 {
            background-color: #ffffff;
            padding: 15px;
            width: 100%;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
        }

        .gallery img {
            background-color: #ffffff;
            padding: 15px;
            width: 300px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
            height: 250px;

        }
    </style>

    <link href="../../style/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="../../style/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="../../style/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../../style/assets/css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <a class="navbar-brand" href="../index">Government Irrigation Admin</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Home">
                    <a class="nav-link  " href="wua_section.php" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-home"></i>
                        <span class="nav-link-text">Dashboard</span>
                    </a>

                </li>


                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Farmer">
                    <a class="nav-link " href="farmer_data.php" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-address-card-o"></i>
                        <span class="nav-link-text">Farmer</span>
                    </a>
                </li>

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Pending Bills">
                    <a class="nav-link " href="pendingbill.php" data-parent="#exampleAccordion">
                        <i class="fa fa-credit-card"></i>
                        <span class="nav-link-text">Pending Bills</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Farmer Data">
                    <a class="nav-link" href="paidbills.php" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-users"></i>
                        <span class="nav-link-text">Paid Bills</span>
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" href="logout.php">
                        <i class="fa fa-fw fa-sign-out"></i>Logout
                    </a>
                </li>
            </ul>
        </div>


    </nav>

    <!-- This Page  -->
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->

            <div class="breadcrumb">
                <div class="breadcrumb-item active text-center" style="margin-left:24%;"><b> खेड़ी पाणी वापर संस्था मर्या. खेड़ी ता. पारशिवनी जि. नागपूर <br>गृहत आराखड़ा क्र. ११९ व आधिसूचित दि. १ जुन २००६ &nbsp; &nbsp; नोंदणी क्रमांक - २३० दि. २९-९-२००६</b>
                    <!-- <a href="#">Users</a> -->
                </div>
            </div>
            
            <!-- Icon Cards-->


            <!-- Example DataTables Card-->
            <div class="gallery min-vh-100">


                <div class="container-lg">
                    <div class="row">
                        <!-- gy-4 row-cols-1 row-cols-2-sm-2 row-cols-md-3 -->
                        <div class="col">
                            <h6><br><br>लघु काल्व्याचे नाव - १)निसारखेड़ा वितरीका सा क्र. २२८० ते ६०१० मी. पर्यंत व त्यावरील विमोचक<br>
                                <br>२) निसारखेड़ा वितरीकेवरील उजवा लघु कालवा क्र. 1<br>
                                वितरीका - निसारखेड़ा वितरीका
                                शाखा कालवा - मौदा शाखा कालवा<br>
                                मुख्य कालवा - डावा तट कालवा<br>
                                प्रकल्प - पेंच प्रकल्प<br>
                                प्रकलपचे वर्गीकरन - मोठे<br>
                                खोरे - वैनगंगा खोरे पात्र
                            </h6>
                            <hr>
                            <h6><br>पथबंधारे शाखा - डुमरी उपविभाग -<br>पेंच पाठबंधारे व्यवस्थापन उपविभाग, टेकाडी<br>विभाग-<br>भू व जल व्यवस्थापन पथदर्शी प्रकल्प, नागपुर<br>मंडल-<br>लामक्षेत्र विकास प्राधिकरण, नागपूर<br>प्रदेश - नागपूर</h6>
                        </div>
                        <div class="col">
                            <img src="../../img/ranu_maam.jpeg" class="img-fluid rounded ml-5" style="margin:auto ;" alt="..."><br><br>
                            <h6 style="text-align:center;">Ranu Gawali (subdivision officer)</h6>
                            <hr>
                            <h6><br>- निरंक<br>
                                स्त्रोत- कालवा प्रवाही<br>
                                दोत्र - संस्थेचे ऐकुन क्षेत्र - ४४२.९४ हे.</h6>

                        </div>
                        <div class="col ">
                            <h6 class="pb-4"><br>गट ग्रामपंचायत-<br>खेड़ी, ता. पारशिवनी वोरीराणी, ता. पारशिवनी<br>जिल्हा - नागपूर<br>राज्य - महाराष्ट्र</h6>
                            <hr>
                            <h6 class="pb-4 pt-4">लाभ मिड्नार्या गावाची संख्या-२<br>गावाचे नाव - १) खेड़ी २) वोरीराणी</h6>
                            <hr>
                            <h6 class="pb-4"><br>मतदारांची संख्या:<br><br>&emsp;स्त्री - &emsp;&emsp;४३<br>&emsp;पुरुष - &emsp;१८३ <br><br>ऐकून संख्या - २२६</h6>

                        </div>
                    </div>


                </div>

            </div>

        </div>

        <footer class="sticky-footer mt-2">
            <div class="container">
                <div class="text-center">
                    <small><b>PENCH RECOVERY ADMIN PANEL</b></small>
                </div>
            </div>
        </footer>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <script src="assets/js/sb-admin.min.js"></script>
    <script src="assets/js/sb-admin-datatables.min.js"></script>
    <script src="assets/js/table2excel.js"></script>

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>