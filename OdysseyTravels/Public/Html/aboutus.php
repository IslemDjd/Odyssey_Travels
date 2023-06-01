<?php
require_once "../../core/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


session_start();
$page="aboutus";
$error=0;
if(isset($_POST['submit']))
{

    if(!isset($_POST['name']) || empty($_POST['name']))
    {
        $e_name="required!";
        $error=1;
    }else if(filter_var($_POST['name'],FILTER_VALIDATE_INT))
    {
        $e_name="Enter a text not a number!";
        $error=1;
    }else
    {
        $name=clear($_POST['name']);
        if(empty($name))
        {
            $e_name="required!";
            $error=1;
        }else if(strlen($_POST['name']) > 15 )
        {
            $e_name="Big name!";
            $error=1;
        }
    }


    if(!isset($_POST['email']) || empty($_POST['email']))
    {
        $e_email="required!";
        $error=1;
    }else if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL) || strlen($_POST['email']) > 25)
    {
        $e_email="Enter a correct Email!";
        $error=1;
    }else
    {
        $email=clear($_POST['email']);
    }


    if(!isset($_POST['message']) || empty($_POST['message']))
    {
        $e_message="required!";
        $error=1;
    }else if(filter_var($_POST['message'],FILTER_VALIDATE_INT))
    {
        $e_message="Enter a text not a number!";
        $error=1;

    }else
    {
        $message=$_POST['message'];
        if(empty($message))
        {
            $e_message="required!";
            $error=1;
        }else if(strlen($_POST['name']) > 60 )
        {
            $e_message="Big message!";
            $error=1;
        }

    }

    if($error==0)
    {
        $_SESSION['creat']="Your message has been sent succssesfully";
        $mail = new PHPMailer(true);            
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.gmail.com';                    
        $mail->SMTPAuth   = true;                                  
        $mail->Username   = 'anissannabi2@gmail.com';                    
        $mail->Password   = 'kkbgmtahiadbadzk';                           
        $mail->SMTPSecure = 'ssl';           
        $mail->Port       = 465;                                   
        $mail->setFrom('anissannabi2@gmail.com');
        $mail->addAddress('islemas23@gmail.com');    
        $mail->isHTML(true);                           
        $mail->Subject = 'Message From Contact';
        $style = " Name: $name <br> Email: $email <br> Message: $message ";
        $mail->Body  = $style;
        $mail->send();
          header('location:aboutus.php');
          die;

          
    }



}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="NavBar/nav.css">
    <link rel="stylesheet" href="../Css/aboutus.css">

    <title>About Us</title>
</head>

<style>
    .ok{
    background-color: rgb(148, 179, 101);
     color: #ffffff;
   text-align: center;
    padding: 10px;
   
}
</style>
<body>
    <nav class="navbar">

        <div class="brand-title">
            <div><a href="home.php"><img class="logo" src="image/Logo.png" alt="logo"></a></div>
            <h1>ODYSSEY<span class="travels">Travels</span></h1>
        </div>
        <a href="#" class="toggle_button">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </a>

        <div class="navbar_links">
            <ul>
            <li><a href="home.php" class='<?php if($page== "home"){echo "active";}?>'>HOME</a></li>
          <li><a href="hotels.php" class='<?php if($page== "hotels"){echo "active";}?>'>HOTELS</a></li>
          <li><a href="ourtours.php" class='<?php if($page== "ourtours"){echo "active";}?>'>OUR TOURS</a></li>
          <li><a href="destinations.php" class='<?php if($page== "destinations"){echo "active";}?>'>DESTINATIONS</a></li>
          <li><a href="aboutus.php" class='<?php if($page== "aboutus"){echo "active";}?>'>ABOUT US</a></li>
          <?php if(isset($_SESSION['email'])):?>
               
               <!-- <li><a href="compte.php" class='<?php if($page== "account"){echo "active";}?>'>ACCOUNT</a></li> -->
               <li><a href="profil.php" class='<?php if($page== "profil"){echo "active";}?>'>PROFIL</a></li>

               
               
<?php endif;?>
<?php if(!isset($_SESSION['email'])):?>
<div class="navbuttons">
    <a href="login.php"><button class="login">LOG IN</button></a>
    <a href="register.php"><button class="signup">SIGN UP</button></a>
    </div>
<?php endif;?>
            </ul>
        </div>

    </nav>
    <script>
        const toggleButton = document.getElementsByClassName('toggle_button')[0];
        const navbarLinks = document.getElementsByClassName('navbar_links')[0];

        toggleButton.addEventListener('click', () => {
            navbarLinks.classList.toggle('active');
        });
    </script>
     <?php if(isset($_SESSION['creat']) && $_SESSION['creat']!=""):?>

<div class="ok">
    <?php
    {
        echo $_SESSION['creat'];
    }
    unset($_SESSION['creat']);
    ?>
</div>
<?php endif; ?>


    <div class="container">
        <div class="about">
      <h2>About Us</h2>

<p>Welcome to our travel agency! We are dedicated to providing our clients with unforgettable travel experiences that exceed their expectations. Our team is composed of passionate and knowledgeable travel experts who are committed to helping you plan the perfect trip.</p><br>
<p>At our agency, we understand that every traveler is unique, which is why we offer a wide range of customizable travel packages to meet your individual needs and preferences. From adventurous excursions to luxurious getaways, we have something for everyone.</p><br>
<p>We take pride in our exceptional customer service and attention to detail. Our team will work closely with you to ensure that every aspect of your trip is perfectly planned and executed, from flights and accommodations to activities and sightseeing.</p><br>
<p>Whether you're looking to embark on a solo adventure or plan a family vacation, we are here to make your travel dreams a reality. Contact us today to start planning your next unforgettable journey!</p>
<br>
<h2 style="font-size: 35px;">Contact us</h2>
<p>Phone: +213 7-95-33-75-74</p>
<p>Email: <a href="mailto:odysseytravelsagency23@gmail.com" style="color:red;">Odysseytravelsagency23@gmail.com</a></p>
<p>Address: ADDEl sidi Achour, Annaba, Algeria</p>
<pre>                Oued Kouba 2, Annaba, Algeria</pre>
        </div>
        <div class="contact-box">
            <h2 style="color: brown; font-size: 25px;">Contacter Nous</h2>
            <form action="" method="post">
                <div class="form-group">
                    <label for="name">Full name:  <?php if(isset($e_name)) echo $e_name;?></label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:  <?php if(isset($e_email)) echo $e_email;?></label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="message">Message:  <?php if(isset($e_message)) echo $e_message; ?></label>
                    <textarea id="message" name="message" required></textarea>
                </div>
                <button type="submit" name="submit">Send</button>
            </form>
        </div>


    </div>






</html>
</body>

</html>