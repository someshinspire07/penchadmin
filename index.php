<?php
session_start();
?>

<!doctype html>
<html lang="en">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="style/styless.css">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/style2.css">
    <!-- Style -->

    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            /* background-image: url('img/pic_05.jpg');  */
            background-size: 100% 100%;
            background-position: 0% 0%;
            background-repeat: no-repeat;
            background-color: lightblue;
            overflow-x:hidden;

        }


        .footer {
            text-align: center;
            color: black;
        }


        #imgbg {
            background-image: url('https://source.unsplash.com/random/?nature');
            background-size: 100% 100%;
            background-position: 0% 0%;
            background-repeat: no-repeat;
        }

        .card shadow-sm {
            width: 70%;
            height: 35%;
            box-sizing: border-box;
            display: flex;
        }
    </style>


    <title>Irrigation</title>
</head>



<body>

    <?php

    include 'config/dbcon.php';

    if (isset($_POST['submit'])) {
        $user = $_POST['username'];
        $password = $_POST['password'];

        $email_search = "select * from admin_login where username='$user'";
        $query = mysqli_query($con, $email_search);

        $email_count = mysqli_num_rows($query);

        if ($email_count) {
            $email_pass = mysqli_fetch_assoc($query);

            $db_pass = $email_pass['password'];

            $pass_decode = password_verify($password, $db_pass);

            $_SESSION['username'] = $email_pass['username'];



            if ($pass_decode) {
    ?>
                <script>
                    
                    location.replace("pages/admin/wua_section.php");
                </script>
            <?php
            } else {
            ?>
                <script>
                    alert('Wrong Password Inserted');
                </script>
            <?php
            }
        } else {
            ?>
            <script>
                alert('Invalid Admin ID');
            </script>
    <?php
        }
    }
    ?>



    <div id="imgbg"style="padding-top:1%;">
        <div class="container">
            <div class="row" style="margin-top:2% ;">
                <div class="col">
                    <img src="img/logo2.png" height="95%" ; width="80%" ;>
                </div>
                <div class="col-6" style="margin-top: 7%;color:white">
                    <h2><b>विदर्भ पाटबंधारे विकास महामंडळ</b></h2>
                </div>
                <div class="col">
                    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                        <div class="input-group input-group-lg" style="margin-top:16%;">
                            <span class="input-group-text" id="inputGroup-sizing-lg">Admin ID</span>
                            <input type="username" name="username" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                        </div>
                        <div class="input-group input-group-lg" style="margin-top:5%;">
                            <span class="input-group-text" id="inputGroup-sizing-lg">Password</span>
                            <input type="password" name="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                        </div>
                        <div class="container d-flex justify-content-center" style="margin-top:4% ;">
                            <button type="submit" name="submit" class="btn btn-primary btn-lg">LOGIN</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row" style="margin-top:3%;">
                <div class="col" style="margin-top:3% ;margin-bottom: 8%;">
                    <div class="container " style="margin-left:20% ;">
                        <h3 style="color:white;">Linked List</h3>
                    </div>
                    <div class="container" style="background-color: white; border-radius: 4mm; opacity: 80%;padding-top: 8%; padding-bottom: 8%; margin-top:1%;">
                        <marquee direction="up" scrollamount="2">
                            <h5 style="margin-top:10%;"><a href="all pdf/pdf1.pdf" style="text-decoration:none;" target="_blank">1. प्रकल्पाची व्याप्ती व सद्यःस्थिती</a></h5>
                            <h5 style="margin-top:10%;"><a href="all pdf/pdf2.pdf" style="text-decoration:none;" target="_blank">2. पेंच प्रकल्पाचा डावा व उजवा मुख्य कालवा</a></h5>
                            <h5 style="margin-top:10%;"><a href="all pdf/pdf3.pdf" style="text-decoration:none;" target="_blank">3. द्वितीय सुप्रमा अंतर्गत सन 2020-2१ मध्ये करण्यात आलेली काम</a></h5>
                            <h5 style="margin-top:10%;"><a href="all pdf/pdf4.pdf" style="text-decoration:none;" target="_blank">4. विस्तार व सुधारणा अंतर्गत सन 2020-2१ मध्ये करण्यात आलेली कामे</a></h5>
                            <h5 style="margin-top:10%;"><a href="all pdf/pdf5.pdf" style="text-decoration:none;" target="_blank">5. प्रकल्पांतर्गत देखभाल व दुरुस्तयींच्या कामांची सद्यःस्थिती</a></h5>
                            <h5 style="margin-top:10%;"><a href="all pdf/pdf6.pdf" style="text-decoration:none;" target="_blank">6. हंगामनिहाय पाणी सोडण्याचे प्रमाण</a></h5>
                            <h5 style="margin-top:10%;"><a href="all pdf/pdf7.pdf" style="text-decoration:none;" target="_blank">7. पाणी वापर संस्थाची सद्यःस्थिती</a></h5>
                            <h5 style="margin-top:10%;"><a href="all pdf/pdf8.pdf" style="text-decoration:none;" target="_blank">8. पेंच प्रकल्पाचेआतापर्यंतर्चे झालेले सिचंन व प्राप्त महसुल</a></h5>
                            <h5 style="margin-top:10%;"><a href="all pdf/pdf9.pdf" style="text-decoration:none;" target="_blank">9. पेंच प्रकल्पांतर्गत वितरण प्रणाली</a></h5>
                        </marquee>
                    </div>
                </div>
                <div class="col-5">
                    <h3 style="margin-left:24%; color:white;"><b>Irrigation in India</b></h3>
                    <br>
                    <h5 style="background-color: white; border-radius: 4mm; opacity: 80%; padding: 4% ; ">बिलाची भौतिक प्रक्रिया रूपांतरित करणे हा या प्रकल्पाचा उद्देश आहे
                        ऑनलाइन प्लॅटफॉर्मवर रक्कम गोळा करणे. हे साध्य करण्यासाठी आम्ही विकसित केले आहे
                        सहभागी सर्व प्रक्रियांच्या व्यवस्थापनासाठी अॅप आणि वेबसाइट. या प्रकल्पाला आहे
                        विधेयकाच्या प्रक्रियेत मानवी अवलंबित्व कमी करण्यासाठी विकसित केले गेले आहे
                        कनेक्शन आणि मानवी चुकांची शक्यता कमी करणे, संभाव्य भ्रष्टाचार किंवा
                        चुकीचे स्थान देणे किंवा चुकीचे हाताळणे.
                        संकलन प्रक्रियेचे ऑनलाइन रूपांतर करून वरील समस्या होऊ शकते
                        मागील पेमेंट रेकॉर्डमध्ये सुलभ आणि अधिक सोयीस्कर प्रवेशाच्या अतिरिक्त लाभासह सहजपणे हाताळले. तसेच, अॅप प्रलंबित आणि पूर्ण झालेल्यांची यादी करेल
                        पेमेंट सोप्या समजण्यासाठी सीझनच्या विभागांमध्ये क्रमवारी लावले. अॅप आणि वेबसाइट दोन्ही 5 महिन्यांच्या कालावधीत म्हणजेच मार्च 2022 ते जुलै 2022 या कालावधीत विकसित केले गेले आहेत. सध्या हा प्रकल्प पहिल्या टप्प्यात आहे त्यामुळे पेंच पाटबंधारे विभागाच्या अखत्यारीतील संपूर्ण क्षेत्राचा एक छोटासा भाग आहे, टप्पा 2 मध्ये संपूर्ण क्षेत्र कव्हर केले जाईल.</b>
                    </h5>
                    <br>

                </div>
                <div class="col" style="margin-top:3% ;">
                    <div class="container d-flex justify-content-center">
                        <a href="pages/login/reg.php" style="text-decoration:none; color:white;">
                            <h3>Gallery</h3>
                        </a>
                    </div>
                    <div class="background" style=" box-sizing: border-box;background-color: white; border-radius: 4mm; opacity: 80%;padding-top: 8%; padding-bottom: 8%; ">
                        <marquee direction="up">
                            <div class="container" style="filter: contrast(200%);">
                                <img src="img/bg1.jpg" alt="" height="20%" ; width="100%" style="border-radius:10%;">
                            </div>
                            <br>
                            <div class="container" style="filter: contrast(200%);">
                                <img src="img/bg2.jpg" alt="" height="20%" ; width="100%" style="border-radius:10%">
                            </div>
                            <br>
                            <div class="container" style="filter: contrast(200%);">
                                <img src="img/bg3.jpg" alt="" height="20%" ; width="100%" style="border-radius:10%">
                            </div>
                        </marquee>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container d-flex justify-content-center mt-5 mb-5" style="margin-top:2%;display:flex;margin-left:209px;box-sizing:border-box ; margin: auto;">

        <div class="row row-cols-8 row-cols-sm-2 row-cols-md-4 g-3  justify-content-center">
            <div class="col">
                <div class="card shadow-sm">
                    <img src="img/pic0.jpeg" width="100%" height="195" alt="" style="border-radius:10%;margin-right:400px; filter: contrast(130%);">



                    <div class="card-body">
                        <p class="card-text">
                        <h5 class="d-flex justify-content-center">Pravin Y. Zoad</h5>Executive Engineer, Pench Irrigation Division, <br>Nagpur</p>

                    </div>
                </div>
            </div>
            <div class="col" style="margin-left:2% ;">
                <div class="card shadow-sm">
                    <img src="img/img 2.jpeg" width="100%" height="195" alt="" style="border-radius:10%;filter: contrast(130%);">

                    <div class="card-body">
                        <p class="card-text">
                        <h5 class="d-flex justify-content-center">Sonali R. Nahar</h5>Deputy Executive Engineer,Pench Irrigation Division,Nagpur</p>

                    </div>
                </div>
            </div>

        </div>
    </div>



    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel" style="margin-top: 7%;">
        <div class="container">
            <div class="carousel-item active" data-bs-interval="2000">
                <img src="img/img a.jpg" height="700px" class="d-block w-100" alt="..." style="border-radius:5%">
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="img/img b.jpg" height="700px" class="d-block w-100" alt="..." style="border-radius:5%">
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="img/img c.jpg" height="700px" class="d-block w-100" alt="..." style="border-radius:5%">
            </div>
            <div class="carousel-item" data-interval="2000">
                <img src="img/img d.jpg" height="700px" class="d-block w-100" alt="..." style="border-radius:5%">
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="img/img e.jpg" height="700px" class="d-block w-100" alt="..." style="border-radius:5%">
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="img/img f.jpg" height="700px" class="d-block w-100" alt="..." style="border-radius:5%">
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="img/img g.jpg" height="700px" class="d-block w-100" alt="..." style="border-radius:5%">
            </div>
        </div>
    </div>
    <br><br><br><br><br><br>

    <div class="footer" style=" margin-top:40% ">
        <footer class="py-3 my-4 ">
            <ul class="nav justify-content-center  pb-6 mb-6">
                <h2>कार्यालय </h2>
            </ul>
            <ul class="nav justify-content-center  pb-6 mb-6">
                <h3> महाराष्ट्र शासन, जलसंपदा विभाग. </h3><br>
            </ul>
            <ul class="nav justify-content-center pb-6 mb-6">
                <h4> कार्यकारी अभियंता, पेंच पाटबंधारे विभाग, वैनगंगानगर अजनी, नागपूर.</h4> <br>
            </ul>
            <ul class="nav justify-content-center pb-6 mb-6">

                <h4> Email-eepidngp1@gmail.com, pongp@rediffmail.com </h4><br>
                <h4> फोन नं. 0712-2980143, 2980144 </h4>

            </ul>
            <ul class="nav justify-content-center pb-6 mb-6">


                <h4> फोन नं. 0712-2980143, 2980144 </h4>

            </ul>

            <p style="color:black;text-align:center">© Goverment of Maharashtra</p>
        </footer>
    </div>
    <script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>

</body>

</html>






<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>




</body>

</html>