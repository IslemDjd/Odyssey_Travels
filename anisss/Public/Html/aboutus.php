<?php
require_once "../../core/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


session_start();
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
        $message=clear($_POST['message']);
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
                <li><a href="home.php">HOME</a></li>
                <li><a href="hotels.php">HOTELS</a></li>
                <li><a href="ourtours.php">OUR TOURS</a></li>
                <li><a href="destinations.php">DESTINATIONS</a></li>
                <li><a href="aboutus.php">ABOUT US</a></li>
            </ul>
        </div>
        <div class="navbuttons">
            <a href="login.php"><button class="login">LOG IN</button></a>
            <a href="register.php"><button class="signup">SIGN UP</button></a>
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
            <h2 style="font-size: 35px;">About Us</h2><br>
            <p>Bienvenue dans notre agence de voyages ! Nous sommes dévoués à offrir à nos clients des expériences de
                voyage inoubliables qui dépassent leurs attentes. Notre équipe est composée d'experts en voyage
                passionnés et compétents qui sont engagés à vous aider à planifier le voyage parfait.</p><br>

            <p>Dans notre agence, nous comprenons que chaque voyageur est unique, c'est pourquoi nous offrons une large
                gamme de forfaits de voyage personnalisables pour répondre à vos besoins et préférences individuels. Des
                excursions aventureuses aux escapades de luxe, nous avons quelque chose pour tout le monde.</p><br>


            <p>Nous sommes fiers de notre service client exceptionnel et de notre attention aux détails. Notre équipe
                travaillera en étroite collaboration avec vous pour garantir que chaque aspect de votre voyage soit
                parfaitement planifié et exécuté, des vols et des hébergements aux activités et visites touristiques.
            </p><br>

            <p>Que vous cherchiez à partir à l'aventure en solo ou à planifier des vacances en famille, nous sommes là
                pour réaliser vos rêves de voyage. Contactez-nous aujourd'hui pour commencer à planifier votre prochain
                voyage inoubliable !</p>

            <br>

            <h2 style="font-size: 35px;">Contact us</h2>


            

            <p> Phone: +213 7-95-33-75-74 </p>

            <p> Email: OdysseyTravels@gmail.com </p>


            <p> Address: ADDEl sidi Achour, Annaba, Algeria </p>
        </div>
        <div class="contact-box">
            <h2 style="color: brown; font-size: 25px;">Contacter Nous</h2>
            <form action="" method="post">
                <div class="form-group">
                    <label for="name">Nom & Prenom:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" required></textarea>
                </div>
                <button type="submit" name="submit">Envoyer</button>
            </form>
        </div>


    </div>






</html>
</body>

</html>