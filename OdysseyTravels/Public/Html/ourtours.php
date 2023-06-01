<?php

session_start();
$page="ourtours";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="NavBar/nav.css">
    <link rel="stylesheet" href="../Css/ourtoursss.css">
    <title>Our Tours</title>
    <!-- <style>
        .pays1{
            background-color:red;
        }
    </style> -->
</head>
<body>
    <nav class="navbar">
        
        <div class="brand-title">
            <div><a href="home.html"><img class="logo" src="image/Logo.png" alt="logo"></a></div>
            <h1>ODYSSEY<span class="travels">Travels</span></h1></div>
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
  const navbarLinks  = document.getElementsByClassName('navbar_links')[0];

  toggleButton.addEventListener('click',() =>{
      navbarLinks.classList.toggle('active');
  });
  </script>
  <!-- <img src="ot/barcelone.jpg" alt="barcelone"> -->
  <div class="grp1">
      <div class="pays1">
            <div class="img1"></div>
            <div class="dsp1">
                <h1>PARIS</h1><br>
                <h3>Nous vous offrons un Voyage Complet a la Capitale Francaise <br> La Ville de la Lumiére et de L'Amour </h3><br>
                <a href="https://wwws.airfrance.dz/">
                    <div class="air" style=" margin-top:15px;">
                        <img src="ot/airfrance2.png" alt="iberia">
                    </div>
                </a>
                <a href="tours/paris.php"><button type="submit" name="reserve" class="learn-more">
                    <span class="circle" aria-hidden="true">
                        <span class="icon arrow"></span>
                    </span>
                    <span class="button-text">Voir Les Détails</span>
                </button></a>
            </div>
        </div>
        <div class="pays2">
            <div class="img2"></div>
            <div class="dsp2">
                <h1>BARCELONE</h1><br>
                <h3>Nous vous offrons un voyage complet a la capitale de la CATALOGNE <br> et la ville de F.C BARCELONA </h3><br>
                <a href="https://www.iberia.com/">
                    <div class="air">
                        <img src="ot/iberia.png" alt="iberia">
                    </div>
                </a>
                <a href="tours/barcelone.php"><button type="submit" name="reserve" class="learn-more">
                    <span class="circle" aria-hidden="true">
                    <span class="icon arrow"></span>
                    </span>
                    <span class="button-text">Voir Les Détails</span>
                  </button></a>

            </div>
      </div>

      </div>
  </div>
  <br><br><br>


</body>
</html>