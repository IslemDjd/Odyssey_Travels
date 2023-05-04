<?php

session_start();
$page="destinations";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="NavBar/nav.css">
    <link rel="stylesheet" href="../Css/destinations.css">
    <title>Destinations</title>
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
               
               <li><a href="compte.php" class='<?php if($page== "account"){echo "active";}?>'>ACCOUNT</a></li>
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
<div class="titre"><h1>Nos Destinations</h1></div>
<br><br>
<div class="countries">
    <div class="p" style="display:flex;">
        <div class="pays" style="background-image: url(ot/bali2.jpg); background-size: cover; background-repeat: no-repeat; height: 100%; width:50%;"></div>
        <div class="text" style="width:50%;">
            <h1>BALI</h1>
            <h3>Indonésie</h3>
        </div>
    </div>
    <div class="p" style="display:flex;">
        <div class="pays" style="background-image: url(ot/mykonos2.jpg); background-size: cover; background-repeat: no-repeat; height: 100%; width:50%;"></div>
        <div class="text" style="width:50%;" >
            <h1>MYKONOS</h1>
            <h3>Gréece</h3>
        </div>
    </div>

    <div class="p" style="display:flex;">
        <div class="pays" style="background-image: url(ot/london2.jpg); background-size: cover; background-repeat: no-repeat; height: 100%; width:50%;"></div>
        <div class="text" style="width:50%;" >
            <h1>LONDON</h1>
            <h3>United Kingdom</h3>
        </div>
    </div>
    <div class="p" style="display:flex;">
        <div class="pays" style="background-image: url(ot/tokyo.jpg); background-size: cover; background-repeat: no-repeat; height: 100%; width:50%;"></div>
        <div class="text" style="width:50%;" >
            <h1>TOKYO</h1>
            <h3>Japan</h3>
        </div>
    </div>

    <div class="p" style="display:flex;">
        <div class="pays" style="background-image: url(ot/paris2.jpg); background-size: cover; background-repeat: no-repeat;  height: 100%; width:50%; "></div>
        <div class="text" style="width:50%;" >
            <h1>PARIS</h1>
            <h3>France</h3>
        </div>
    </div>
    <div class="p" style="display:flex;">
        <div class="pays" style="background-image: url(ot/barcelone.jpg); background-size: cover; background-repeat: no-repeat;  height: 100%; width:50%;"></div>
        <div class="text" style="width:50%;" >
            <h1>BARCELONE</h1>
            <h3>Spain</h3>
        </div>
    </div>

    <div class="p" style="display:flex;">
        <div class="pays" style="background-image: url(ot/newyork1.jpg); background-size: cover; background-repeat: no-repeat; height: 100%; width:50%;"></div>
        <div class="text" style="width:50%;" >
            <h1>NEW YORK</h1>
            <h3>USA</h3>
        </div>
    </div>
    <div class="p" style="display:flex;">
        <div class="pays" style="background-image: url(ot/brussel1.jpg); background-size: cover; background-repeat: no-repeat; height: 100%; width:50%;"></div>
        <div class="text" style="width:50%;" >
            <h1>Brussels</h1>
            <h3>Belgique</h3>
        </div>
    </div>

    <div class="P" style="display:flex;">
        <div class="pays" style="background-image: url(ot/sanfransisco1.jpg); background-size: cover; background-repeat: no-repeat; height: 100%; width:50%;"></div>
        <div class="text" style="width:50%;" >
            <h1>SAN FRANSISCO</h1>
            <h3>USA</h3>
        </div>
    </div>
    <div class="P" style="display:flex;">
        <div class="pays" style="background-image: url(ot/losangeles1.jpg); background-size: cover; background-repeat: no-repeat; height: 100%; width:50%;"></div>
        <div class="text" style="width:50%;" >
            <h1>LOS ANGELES</h1>
            <h3>USA</h3>
        </div>
    </div>
    <div class="P" style="display:flex;">
        <div class="pays" style="background-image: url(ot/berlin1.jpg); background-size: cover; background-repeat: no-repeat; height: 100%; width:50%;"></div>
        <div class="text" style="width:50%;" >
            <h1>BERLIN</h1>
            <h3>Allemagne</h3>
        </div>
    </div>
    <div class="P" style="display:flex;">
        <div class="pays" style="background-image: url(ot/milano1.jpg); background-size: cover; background-repeat: no-repeat; height: 100%; width:50%;"></div>
        <div class="text" style="width:50%;" >
            <h1>MILANO</h1>
            <h3>Italy</h3>
        </div>
    </div>

    <div class="p" style="display:flex;">
        <div class="pays" style="background-image: url(ot/rome1.jpg); background-size: cover; background-repeat: no-repeat; height: 100%; width:50%;"></div>
        <div class="text" style="width:50%;" >
            <h1>ROME</h1>
            <h3>Italy</h3>
        </div>
    </div>
    <div class="p" style="display:flex;">
        <div class="pays" style="background-image: url(ot/singapore1.jpg); background-size: cover; background-repeat: no-repeat; height: 100%; width:50%;"></div>
        <div class="text" style="width:50%;" >
            <h1>SINGAPORE</h1>
            <h3>Singapore</h3>
        </div>
    </div>


    <div class="p" style="display:flex;">
        <div class="pays" style="background-image: url(ot/amesterdam1.jpg); background-size: cover; background-repeat: no-repeat;  height: 100%; width:50%;"></div>
        <div class="text" style="width:50%;" >
            <h1>AMESTERDAM</h1>
            <h3>Pays-Bas</h3>
        </div>
    </div>
    <div class="p" style="display:flex;">
        <div class="pays" style="background-image: url(ot/kuala1.jpg); background-size: cover; background-repeat: no-repeat; height: 100%; width:50%;"></div>
        <div class="text" style="width:50%;" >
            <h1>KUALA LAMPUR</h1>
            <h3>Malysie</h3>
        </div>
    </div>
    <div class="p" style="display:flex;">
        <div class="pays" style="background-image: url(ot/venice1.jpg); background-size: cover; background-repeat: no-repeat; height: 100%; width:50%;"></div>
        <div class="text" style="width:50%;" >
            <h1>VENICE</h1>
            <h3>Italy</h3>
        </div>
    </div>
    <div class="p" style="display:flex;">
        <div class="pays" style="background-image: url(ot/florence1.jpg); background-size: cover; background-repeat: no-repeat; height: 100%; width:50%;"></div>
        <div class="text" style="width:50%;" >
            <h1>FLORENCE</h1>
            <h3>Italy</h3>
        </div>
    </div>
    <div class="p" style="display:flex;">
        <div class="pays" style="background-image: url(ot/moscow1.jpg); background-size: cover; background-repeat: no-repeat; height: 100%; width:50%;"></div>
        <div class="text" style="width:50%;" >
            <h1>MOSCOW</h1>
            <h3>Russia</h3>
        </div>
    </div>
    <div class="p" style="display:flex;">
        <div class="pays" style="background-image: url(ot/sydney1.jpg); background-size: cover; background-repeat: no-repeat; height: 100%; width:50%;"></div>
        <div class="text" style="width:50%;" >
            <h1>SYDNEY</h1>
            <h3>Australie</h3>
        </div>
    </div>
</div>
<br><br><br>
</body>
</html>