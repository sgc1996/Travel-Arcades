<?php
//index.php
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\SMTP;
 use PHPMailer\PHPMailer\Exception;

function clean_text($string)
{
 $string = trim($string);
 $string = stripslashes($string);
 $string = htmlspecialchars($string);
 return $string;
}

error_reporting(0);
$msg='';

if (isset($_POST['submit'])) {
// Check if the "Return Date" is provided or not
$returnDate = isset($_POST["return-date"]) ? $_POST["return-date"] : "None";
$message = '
  <h3 align="center">Sender Details</h3>
  <table border="1" width="100%" cellpadding="5" cellspacing="5">
   <tr>
    <td width="30%">Trip</td>
    <td width="70%">'.$_POST["trip"].'</td>
   </tr>
   <tr>
    <td width="30%">Name</td>
    <td width="70%">'.$_POST["name"].'</td>
   </tr>
   <tr>
    <td width="30%">Email</td>
    <td width="70%">'.$_POST["email"].'</td>
   </tr>
   <tr>
    <td width="30%">Contact Number</td>
    <td width="70%">'.$_POST["cntact"].'</td>
   </tr>
   <tr>
    <td width="30%">Number of Travelers</td>
    <td width="70%">'.$_POST["num-trvl"].'</td>
   </tr>
   <tr>
    <td width="30%">From</td>
    <td width="70%">'.$_POST["from-where"].'</td>
   </tr>
   <tr>
    <td width="30%">To</td>
    <td width="70%">'.$_POST["to-where"].'</td>
   </tr>
   <tr>
    <td width="30%">Depart Date</td>
    <td width="70%">'.$_POST["depart-date"].'</td>
   </tr>
   <tr>
     <td width="30%">Return Date</td>
     <td width="70%">' . $returnDate . '</td>
    </tr>
  </table>
 ';

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';
    $mail = new PHPMailer;
    $mail->IsSMTP();        //Sets Mailer to send message using SMTP
    $mail->Host = 'mail.forestrockgarden.lk';  //Sets the SMTP hosts of your Email hosting, this for Godaddy
    $mail->Port = '465';        //Sets the default SMTP server port
    $mail->SMTPAuth = true;       //Sets SMTP authentication. Utilizes the Username and Password variables
    $mail->Username = 'mail@forestrockgarden.lk';     //Sets SMTP username
    $mail->Password = 'webmail@1234';     //Sets SMTP password
    $mail->SMTPSecure = 'ssl';       //Sets connection prefix. Options are "", "ssl" or "tls"
    $mail->From = $_POST["email"];     //Sets the From email address for the message
    $mail->FromName = $_POST["name"];    //Sets the From name of the message
    $mail->AddAddress('gayanc@aitech.lk', 'Travel Arcade'); //Adds a "To" address
    //$mail->AddAddress('buwanekav@aitech.lk', 'Travel Arcade'); //Adds a "To" address
    $mail->AddAddress('ameshm@aitech.lk', 'Travel Arcade'); //Adds a "To" address
    $mail->AddAddress('gayanchathuranga1992@gmail.com', 'Travel Arcade'); //Adds a "To" address
    $mail->AddAddress('info@travelarcades.com', 'Travel Arcade'); //Adds a "To" address
    $mail->WordWrap = 50;       //Sets word wrapping on the body of the message to a given number of characters
    $mail->IsHTML(true);       //Sets message type to HTML
    // $mail->AddAttachment($path);     //Adds an attachment from a path on the filesystem
    $mail->Subject = $_POST["trip"] . ' New Traveler Details';    //Sets the Subject of the message
    $mail->Body = $message;       //An HTML or plain text message body

 if($mail->Send())        //Send an Email. Return true on success or false on error
 {
  $msg = '<div class="alert alert-success" style="text-align: center; color: green;">Email Sent Successfully</div>';
  // unlink($path);
 }
 else
 {
  $msg = '<div class="alert alert-danger" style="text-align: center; color: red;">There is an Error</div>';
 }
}

?>

<!DOCTYPE html>
<html lang="zxx">
    <head>
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-927QTPZFR1"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-927QTPZFR1');
        </script>
        <meta charset="utf-8">
        <meta name="description" content="Travel Arcade offers efficient and convenient air ticket services, characterized by correct pricing and exceptional efficiency. Choose from a wide selection of airlines and itineraries, enjoy savings through expert deal-finding, and experience hassle-free convenience with luggage and seat options. Whether it's a round trip, one way, or multi-city itinerary, Travel Arcade's dedicated support team ensures a smooth journey from booking to after-flight assistance. Innovation and personal touches set Travel Arcade's air ticket services apart in the travel sector.">
        <meta name="keywords" content="Travel Arcade, air tickets, flight booking, airline tickets, travel agency, round trip, one way, multi-city itinerary, booking support, convenience, luggage options, seat options, efficient travel, innovation in travel, Colombo, Sri Lanka, international flights, domestic flights, travel assistance, deal-finding, travel savings, malaysia airline, Srilankan Airline, Singapore Airlines, Emirates, Etihad, Gulf Air, Qatar Airways, Turkish Airline, Air India, Air Canada, Fly Dubai, IndiGo, Oman Air, United Airlines, American Airline">
        <meta name="author" content="A.I Technologies">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
        <title>Travel Arcade - Travel & Air Tickets </title>
        <link rel="icon" href="assets/images/favicon.png" type="image/png" sizes="16x16">

        <!-- bootstrap css -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css" media="all" />
        <!-- animate css -->
        <link rel="stylesheet" href="assets/css/animate.min.css" type="text/css" media="all" />
        <!-- owl carousel css -->
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css"  type="text/css" media="all" />
        <link rel="stylesheet" href="assets/css/owl.theme.default.min.css"  type="text/css" media="all" />
        <!-- meanmenu css -->
        <link rel="stylesheet" href="assets/css/meanmenu.min.css" type="text/css" media="all" />
        <!-- jquery ui css -->
        <link rel="stylesheet" href="assets/css/jquery-ui.min.css" type="text/css" media="all" />
        <!-- selectize css -->
        <link rel="stylesheet" href="assets/css/selectize.min.css" type="text/css" media="all" />
        <!-- magnific popup css -->
        <link rel="stylesheet" href="assets/css/magnific-popup.min.css" type="text/css" media="all" />
        <!-- icofont css -->
        <link rel='stylesheet' href='assets/css/icofont.min.css' type="text/css" media="all" />
        <!-- flaticon css -->
        <link rel='stylesheet' href='assets/css/flaticon.css' type="text/css" media="all" />
        <!-- style css -->
        <link rel="stylesheet" href="assets/css/style.css" type="text/css" media="all" />
        <!-- responsive css -->
        <link rel="stylesheet" href="assets/css/responsive.css" type="text/css" media="all" />
    </head>

    <style>
        .radio-item {
            display: block;
            margin-bottom: 10px;
        }
        .form-style {
            font-family: "Oswald", sans-serif;
            font-size: 16px;
        }
    </style>

    <body>
        <!-- preloader -->
        <div class="preloader">
            <div class="preloader-wrapper">
                <div class="preloader-grid">
                    <div class="preloader-grid-item preloader-grid-item-1"></div>
                    <div class="preloader-grid-item preloader-grid-item-2"></div>
                    <div class="preloader-grid-item preloader-grid-item-3"></div>
                    <div class="preloader-grid-item preloader-grid-item-4"></div>
                    <div class="preloader-grid-item preloader-grid-item-5"></div>
                    <div class="preloader-grid-item preloader-grid-item-6"></div>
                    <div class="preloader-grid-item preloader-grid-item-7"></div>
                    <div class="preloader-grid-item preloader-grid-item-8"></div>
                    <div class="preloader-grid-item preloader-grid-item-9"></div>
                </div>
            </div>
        </div>
        <!-- .end preloader -->
         <!-- Topbar -->
         <div class="topbar">
            <div class="container position-relative z-index-1">
                <div class="row align-items-center">
                    <div class="topbar-item topbar-item-left">
                        <ul class="social-list">
                            <li>
                                <a href="https://web.facebook.com/travelarcade" target="_blank"><i class="flaticon-facebook"></i></a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/travel_arcade_pvt_ltd/" target="_blank"><i class="flaticon-instagram"></i></a>
                            </li>
                            <li>
                                <a href="https://www.linkedin.com/company/info-travel-arcade-pvt-ltd" target="_blank"><i class="flaticon-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="topbar-item justify-content-end">
                        <ul class="topbar-action">
                            <li>
                                <i class="flaticon-mail"></i>
                                <a href="info@travelarcades.com">info@travelarcades.com</a>
                            </li>
                            <li>
                                <i class="flaticon-telephone"></i>
                                <a href="tel:+94 11 259 1290">+94 11 259 1290</a>
                            </li>
                            <li>
                                <i class="flaticon-address"></i>
                                15, Police Park Avenue, Colombo 5, Sri Lanka.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Topbar -->
        <!-- Navbar -->
        <div class="fixed-top">
            <div class="navbar-area">
                <div class="container">
                    <div class="mobile-nav">
                        <a href="index.php" class="mobile-brand">
                            <img src="assets/images/ta-logo-1.png" alt="logo" class="logo default-logo" style="margin-top: 2px; max-width: 70%;" >
                            <img src="assets/images/ta-logo.png" alt="logo" class="sticky-logo" style="margin-top: 2px; max-width: 70%;">
                        </a>
                    </div>
                </div>
                <div class="main-nav">
                    <div class="container">
                        <nav class="navbar navbar-expand-md navbar-light">
                            <a class="navbar-brand" href="index.php">
                                <img src="assets/images/ta-logo-1.png" alt="logo" class="logo default-logo"  style="margin-top: -15px; max-width: 70%;">
                                <img src="assets/images/ta-logo.png" alt="logo" class="sticky-logo"  style="margin-top: -15px; max-width: 70%;">
                            </a>
                            <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                                <ul class="navbar-nav mx-auto">
                                    <li class="nav-item">
                                        <a href="index.php" class="nav-link -toggle" onmouseover="this.style.color='#6b52a3'" onmouseout ="this.style.color=''">Home</a>
                                        
                                    </li>

                                    <li class="nav-item">
                                        <a href="who-we-are.php" class="nav-link -toggle "onmouseover="this.style.color='#6b52a3'" onmouseout ="this.style.color=''">About us</a>
                                        
                                    </li>
                                    <li class="nav-item">
                                        <a href="inbound-tours.php" class="nav-link -toggle "onmouseover="this.style.color='#6b52a3'" onmouseout ="this.style.color=''">Sri Lanka</a>
                                        
                                    </li>
                                    <li class="nav-item">
                                        <a href="outbound-tours.php" class="nav-link -toggle" onmouseover="this.style.color='#6b52a3'" onmouseout ="this.style.color=''">World Tours</a>
                                        
                                    </li>
                                    <li class="nav-item">
                                        <a href="airticket.php" class="nav-link " style="background-color: #6b52a3 ;color: white; " onmouseover="this.style.color='black'" onmouseout ="this.style.color='white'">Air Tickets</a>
                                        
                                    </li>
                                    <li class="nav-item">
                                        <a href="visa.php" class="nav-link -toggle "onmouseover="this.style.color='#6b52a3'" onmouseout ="this.style.color=''">Visa</a>
                                        
                                    </li>
                                    <li class="nav-item">
                                        <a href="blogs.php" class="nav-link" onmouseover="this.style.color='#6b52a3'" onmouseout ="this.style.color=''">Blog</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="contact.php" class="nav-link" onmouseover="this.style.color='#6b52a3'" onmouseout ="this.style.color=''">Contact</a>
                                    </li>
                                    
                                    
                                </ul>
                            </div>
                            <div class="navbar-option">
                                <div class="navbar-option-item">
                                    <a href="contact.php#contact-area" class="btn main-btn main-btn-arrow">Inquiry Now <i class="flaticon-right-arrow"></i></a>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar -->
        <!-- Header -->
        <header class="inner-page-header inner-page-header-3">
            <div class="inner-header-shape"></div>
            <!-- header-content -->
            <div class="container">
                <div class="header-content m-auto">
                    <h1>Air Tickets</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Air Tickets</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </header>
        <!-- Header -->
        <!-- About -->
        <section class="about-section position-relative pb-70" style="margin-top: 3em;">
        <?php print_r($msg); ?>
            <div class="map-shapes">
                <div class="map-shape map-shape-1 map-shape-top">
                    <img src="assets/images/shapes/map-1.png" alt="shape">
                </div>
            </div>
            <div class="container">
                <div class="section-title">
                    <!-- <small>Air Ticket</small> -->
                    <h2>Air Ticket</h2>
                </div>
                <div class="row lign-items-lg-start">
                    <div class="col-lg-6 pb-30">
                        <div class="about-content-details desk-pad-right-40">
                            <p>Travel Arcade's air ticket services are characterized by correct pricing, maximum client convenience, and exceptional efficiency. Utilizing up-to-date technology, they provide tickets outside regular hours, ensuring continuous availability. The agency caters to niche markets and offers complimentary enhancements, like hand-delivering tickets in Colombo and using couriers for other areas. Clients can expect a wide choice of airlines and itineraries, savings through expert deal-finding, and hassle-free convenience with luggage and seat options. Flexibility extends to one-way, round-trip, and multi-city itineraries. Their dedicated support team assists before, during, and after flights, while innovation and personal touches set Travel Arcade's services apart in the travel sector.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 pb-30">
                        <div class="about-content-image border-radius-10">
                            <img src="assets/images/airticket-description.jpg" alt="Air Ticket">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About -->

        <!-- Form -->
        <div class="contact-section pt-70 pb-70 position-relative"  >
            <div class="map-shapes">
                <div class="map-shape map-shape-1 map-shape-top">
                    <img src="assets/images/shapes/map-1.png" alt="shape">
                </div>
                <div class="map-shape map-shape-2 map-shape-bottom">
                    <img src="assets/images/shapes/map-2.png" alt="shape">
                </div>
            </div>
            <div class="container" style="background-color: #6b52a3; height:max-content">
                <div class="col-lg-12 pb-30 desk-pad-left-40 pad-left-40 desk-pad-right-40 pad-right-40">
                    <div class="section-title about-title section-title-left text-start">
                        <small  style="padding-top: 1em; color: #ffffff;">Contact Us</small>
                        <h2>We'll Love To Hear From You</h2>
                    </div>
                    
                    <form action="<?= $SERVER['PHP_SELF'] ?>" method="post" role="form" class="row g-3">
                        <div class="col-md-12">
                            <span class="wpcf7-form-control-wrap" data-name="your-flight-type">
                                <span class="wpcf7-form-control wpcf7-radio">
                                    <div class="radio-item">
                                        <input type="radio" id="direct" name="trip" value="Round Trip" style="cursor: pointer;" checked>
                                        <label class="form-style" for="direct" style="color: #dddddd; cursor: pointer;">Round Trip</label>&nbsp;&nbsp;&nbsp;
                                        <input type="radio" id="direct-and-connecting" name="trip" value="One Way" style="cursor: pointer;">
                                        <label class="form-style" for="direct-and-connecting" style="color: #dddddd; cursor: pointer;">One Way</label>
                                    </div>
                                </span>
                            </span>
                        </div>
                        <div class="col-md-3" >
                            <label class="form-style" style="color: #ffffff;">Full Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Name*" required data-error="Please Enter Your Name" />
                        </div>
                        <div class="col-md-3">
                            <label class="form-style" style="color: #ffffff;">Email ID</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email*" required data-error="Please Enter Email Adress" />
                        </div>
                        <div class="col-md-3">
                            <label class="form-style" style="color: #ffffff;">Contact No.</label>
                            <input type="text" name="cntact" id="cntact" class="form-control" placeholder="Contact*" required data-error="Please Enter Contact Number" />
                          </div>
                        <div class="col-md-3">
                            <label class="form-style" style="color: #ffffff;">Number of Travelers</label>
                            <input type="text" name="num-trvl" id="numTrvl" class="form-control" value="1 Adult 1 Child 1 Infant" required data-error="Please Enter Number of Travelers" />
                        </div>
                        <div class="col-md-3" >
                            <label class="form-style" style="color: #ffffff;">From Where?</label>
                            <input type="text" name="from-where" id="fWhere" class="form-control" placeholder="Country*" required data-error="Please Enter Country" />
                        </div>
                               
                        <div class="col-md-3" >
                            <label class="form-style" style="color: #ffffff;">To Where?</label>
                            <input type="text" name="to-where" id="tWhere" class="form-control" placeholder="Country*" required data-error="Please Enter Country" />
                        </div>
                        <div class="col-md-3">
                            <label class="form-style" style="color: #ffffff;">Depart Date</label>
                            <input type="date" name="depart-date" id="departDate" class="form-control" placeholder="Deport" required data-error="Please Enter The Deport Date" />
                        </div>
                        <div class="col-md-3" id="needHide">
                            <label class="form-style" style="color: #ffffff;">Return Date</label>
                            <input type="date" name="return-date" id="returnDate" class="form-control" placeholder="Return" required data-error="Please Enter The Return Date" />
                        </div>
                        <div class="col-md-12" >
                            <button class="btn main-btn main-btn-arrow" name="submit" type="submit" style="background-color: #b3b3b35c; width: 12em;" ><a style="color: #ffffff;">Send Message </a><i class="flaticon-right-arrow"></i></button>
                        </div>           
                    </form>
                    
                </div>
            </div>
        </div>
        <!-- Form -->

        <!-- Air Line Logos -->
        <section class="team-section">
            <div class="container">
                <div class="air-ticket-logo owl-carousel owl-theme default-owl-theme">
                    <div class="item">
                        <div class="card-1">
                            <div class="card-1-image">
                                <div>
                                    <img src="assets/images/Air Line Logos/1.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card-1">
                            <div class="card-1-image">
                                <div>
                                    <img src="assets/images/Air Line Logos/2.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card-1">
                            <div class="card-1-image">
                                <div>
                                    <img src="assets/images/Air Line Logos/3.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card-1">
                            <div class="card-1-image">
                                <div>
                                    <img src="assets/images/Air Line Logos/4.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card-1">
                            <div class="card-1-image">
                                <div>
                                    <img src="assets/images/Air Line Logos/5.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card-1">
                            <div class="card-1-image">
                                <div>
                                    <img src="assets/images/Air Line Logos/6.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card-1">
                            <div class="card-1-image">
                                <div>
                                    <img src="assets/images/Air Line Logos/7.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card-1">
                            <div class="card-1-image">
                                <div>
                                    <img src="assets/images/Air Line Logos/8.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card-1">
                            <div class="card-1-image">
                                <div>
                                    <img src="assets/images/Air Line Logos/9.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card-1">
                            <div class="card-1-image">
                                <div>
                                    <img src="assets/images/Air Line Logos/10.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card-1">
                            <div class="card-1-image">
                                <div>
                                    <img src="assets/images/Air Line Logos/11.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card-1">
                            <div class="card-1-image">
                                <div>
                                    <img src="assets/images/Air Line Logos/12.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card-1">
                            <div class="card-1-image">
                                <div>
                                    <img src="assets/images/Air Line Logos/13.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card-1">
                            <div class="card-1-image">
                                <div>
                                    <img src="assets/images/Air Line Logos/14.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card-1">
                            <div class="card-1-image">
                                <div>
                                    <img src="assets/images/Air Line Logos/15.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card-1">
                            <div class="card-1-image">
                                <div>
                                    <img src="assets/images/Air Line Logos/16.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card-1">
                            <div class="card-1-image">
                                <div>
                                    <img src="assets/images/Air Line Logos/17.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Air Line Logos -->
      
        <!-- Footer -->
        <footer class="footer footer-bg">
            <div class="footer-upper position-relative">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="footer-content-item">
                                <div class="footer-logo">
                                    <a href="index.php"><img src="assets/images/ta-logo-2.png" alt="logo"></a>
                                </div>
                                <ul class="footer-details footer-address">
                                    <li>
                                        <i class="flaticon-mail"></i>
                                        <a href="mailto:hello@traip.com">info@travelarcades.com</a>
                                    </li>
                                    <li>
                                        <i class="flaticon-telephone"></i>
                                        <a href="tel:+44-5346-338">+94 11 259 1290</a>
                                    </li>
                                    <li>
                                        <i class="flaticon-address"></i>
                                        15, Police Park Avenue, Colombo 5, Sri Lanka.
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="footer-content-list footer-content-item desk-pad-left-70">
                                <div class="footer-content-title">
                                    <h3>Quick Links</h3>
                                </div>
                                <ul class="footer-details footer-list">
                                    <li>
                                        <a href="adventure-tours.php">Adventure Tours</a>
                                    </li>
                                    <li>
                                        <a href="sea-beach-tours.php">Sea Beach Tours</a>
                                    </li>
                                    <li>
                                        <a href="mountain-tours.php">Mountain Tours</a>
                                    </li>
                                    <li>
                                        <a href="couple-tours.php">Couple Tours</a>
                                    </li>
                                    <li>
                                        <a href="night-fall-tours.php">Night Fall Tours</a>
                                    </li>
                                    <li>
                                        <a href="cultural-tours.php">Cultural Tours</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="footer-content-list footer-content-item desk-pad-left-70">
                                <div class="footer-content-title">
                                    <h3>Important Links</h3>
                                </div>
                                <ul class="footer-details footer-list">
                                    <li>
                                        <a href="who-we-are.php">About Us</a>
                                    </li>
                                    <li>
                                        <a href="inbound-tours.php">Sri Lanka</a>
                                    </li>
                                    <li>
                                        <a href="outbound-tours.php">World Tours</a>
                                    </li>
                                    <li>
                                        <a href="airticket.php">Air Tickets</a>
                                    </li>
                                    <li>
                                        <a href="visa.php">Visa Services</a>
                                    </li>
                                    <li>
                                        <a href="contact.php">Contact Us</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="footer-content-list footer-content-item desk-pad-left-30">
                                <div class="footer-content-title">
                                    <h3>Instafeed</h3>
                                </div>
                                <div class="footer-details">
                                    <ul class="footer-gallery">
                                        <li>
                                            <a target="_blank" href="https://www.instagram.com/">
                                            <img src="assets/images/instafeed/instafeed-1.jpg" alt="insta"></a>
                                        </li>
                                        <li>
                                            <a target="_blank" href="https://www.instagram.com/">
                                            <img src="assets/images/instafeed/instafeed-2.jpg" alt="insta"></a>
                                        </li>
                                        <li>
                                            <a target="_blank" href="https://www.instagram.com/">
                                            <img src="assets/images/instafeed/instafeed-3.jpg" alt="insta"></a>
                                        </li>
                                        <li>
                                            <a target="_blank" href="https://www.instagram.com/">
                                            <img src="assets/images/instafeed/instafeed-4.jpg" alt="insta"></a>
                                        </li>
                                        <li>
                                            <a target="_blank" href="https://www.instagram.com/">
                                            <img src="assets/images/instafeed/instafeed-5.jpg" alt="insta"></a>
                                        </li>
                                        <li>
                                            <a target="_blank" href="https://www.instagram.com/">
                                            <img src="assets/images/instafeed/instafeed-6.jpg" alt="insta"></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-lower">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col footer-lower-item">
                        <div class="footer-copyright-text">
                            <p>Copyright ©<script>document.write(new Date().getFullYear());</script> . Designed & Developed By <a href="https://aitech.lk/" target="_blank">A.I TECH</a></p>
                        </div>
                        </div>
                        <div class="col footer-lower-item footer-lower-right">
                            Follow:
                            <ul class="social-list">
                                <li>
                                    <a href="https://web.facebook.com/travelarcade" target="_blank"><i class="flaticon-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/travel_arcade_pvt_ltd/" target="_blank"><i class="flaticon-instagram"></i></a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/company/info-travel-arcade-pvt-ltd" target="_blank"><i class="flaticon-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer -->

        <!-- Top Sidebar -->
        <div class="top-sidebar-wrapper">
            <div class="top-sidebar-modal">
                <div class="top-sidebar-body">
                    <div class="topbar-sidebar-header">
                        <div class="topbar-sidebar-brand">
                            <a href="index.php">
                                <img src="assets/images/ta-logo-2.png" alt="logo">
                            </a>
                        </div>
                        <div class="topbar-sidebar-close">
                            <i class="flaticon-close"></i>
                        </div>
                    </div>
                    <div class="topbar-sidebar-item">
                        <h3>Contact Us</h3>
                        <ul class="topbar-sidebar-lists">
                            <li>
                                <i class="flaticon-mail"></i>
                                <a href="mailto:hello@traip.com">info@travelarcades.com</a>
                            </li>
                            <li>
                                <i class="flaticon-telephone"></i>
                                <a href="tel:+44-5346-338">+94 11 259 1290/a>
                            </li>
                            <li>
                                <i class="flaticon-address"></i>
                                15, Police Park Avenue, Colombo 5, Sri Lanka.
                            </li>
                        </ul>
                    </div>
                    <div class="topbar-sidebar-item">
                        <h3>Follow Us</h3>
                        <ul class="social-list">
                            <li>
                                <a href="https://web.facebook.com/travelarcade" target="_blank"><i class="flaticon-facebook"></i></a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/travel_arcade_pvt_ltd/" target="_blank"><i class="flaticon-instagram"></i></a>
                            </li>
                            <li>
                                <a href="https://www.linkedin.com/company/info-travel-arcade-pvt-ltd" target="_blank"><i class="flaticon-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top Sidebar -->

        <!-- Search Wrapper -->
        <div class="searchbar-wrapper">
        <div class="searchbar-body">
            <div class="searchbar-close page-searchbar-close">
                <i class="flaticon-close"></i>
            </div>
            <div class="searchbar-form">
                <img src="assets/images/ta-logo-1.png" alt="logo">
                <form>
                    <div class="form-group">
                        <input type="text" placeholder="Search*" class="form-control" required>
                        <button class="btn main-btn" type="submit">Search Now</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
        <!-- Search Wrapper -->
        
        
        <!-- Scroll-top -->
        <div class="scroll-top" id="scrolltop">
            <div class="scroll-top-inner">
                <i class="icofont-long-arrow-up"></i>
            </div>
        </div>
        <!-- Scroll-top -->


        <!-- essential js -->
        <script src="assets/js/jquery-3.6.0.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <!-- jquery ui js -->
        <script src="assets/js/jquery-ui.js"></script>
        <!-- selectize js -->
        <script src="assets/js/selectize.min.js"></script>
        <!-- magnific popup js -->
        <script src="assets/js/jquery.magnific-popup.min.js"></script>
        <!-- owl carousel js -->
        <script src="assets/js/owl.carousel.min.js"></script>
        <!-- form ajazchimp js -->
        <script src="assets/js/jquery.ajaxchimp.min.js"></script>
        <!-- form validator js  -->
        <script src="assets/js/form-validator.min.js"></script>
        <!-- contact form js -->
        <script src="assets/js/contact-form-script.js"></script>
        <!-- meanmenu js -->
        <script src="assets/js/jquery.meanmenu.min.js"></script>
        <!-- main js -->
        <script src="assets/js/script.js"></script>

        <!-- form function -->
        <!-- Add an event listener to the radio buttons -->
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                // Get references to the radio buttons, the "Return Date" input, and the "needHide" div
                const directRadio = document.getElementById("direct");
                const directAndConnectingRadio = document.getElementById("direct-and-connecting");
                const returnDateInput = document.getElementById("returnDate");
                const needHideDiv = document.getElementById("needHide");

                // Add an event listener to the radio buttons
                directRadio.addEventListener("change", function () {
                    returnDateInput.disabled = !directRadio.checked;
                    needHideDiv.style.display = directAndConnectingRadio.checked ? "none" : "block";
                });

                directAndConnectingRadio.addEventListener("change", function () {
                    returnDateInput.disabled = !directRadio.checked;
                    needHideDiv.style.display = directAndConnectingRadio.checked ? "none" : "block";
                });

                // Initialize the visibility based on the initial radio button state
                needHideDiv.style.display = directAndConnectingRadio.checked ? "none" : "block";
            });
        </script>
    </body>
</html>