<?php
require_once "../../core/autoload.php";
session_start();
$page="hotels";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="NavBar/nav.css">

    <title>Hotels</title>
</head>
<style>
    #det {
    background-color: orange;
    color: white;
    font-size: 18px;
    font-weight: bold;
    padding: 15px 20px;
    border-radius: 2em;
    cursor: pointer;
    transition: 0.1s ease;
    border-width: 0;
    box-shadow: 1px 5px 0 0 #0e285d;
  }

  
     .ok{
    background-color: rgb(148, 179, 101);
     color: #red;
   text-align: center;
    padding: 10px;
   
}

  
#det:hover {
    transform: translateY(-4px);
    box-shadow: 1px 9px 0 0 #0e285d;
  }
  
#det:active {
    transform: translateY(4px);
    box-shadow: 0px 0px 0 0 #0e285d;
  }

  .navbar{
    background: linear-gradient(to left, #A5CC82, #00467F);

  }
  .shadow{
    height :70px;
    background: linear-gradient(to left, #A5CC82, #00467F);
    box-shadow bottom:inset 0 -50px 20px white;

  }
  body{
    background: linear-gradient(to left, #A5CC82, #00467F);

  }
</style>
<body>
    <nav class="navbar">
        
        <div class="brand-title">
            <div><a href="home.php"><img class="logo" src="image/Logo.png" alt="logo"></a></div>
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
<div>
<?php if(!isset($_SESSION['email'])):?>
      <div class="navbuttons">
          <a href="login.php"><button class="login">LOG IN</button></a>
          <a href="register.php"><button class="signup">SIGN UP</button></a>
          </div>
      <?php endif;?>
      </div>
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
<section style="position: relative;top: 80px;" class="Hotels" id="Hotels">
    <div class="titre">
        <h2 class="titre-texte"><span>H</span>otels</h2>
    </div>
</section>
<h3 class="desp" style="font-size:32px; font-weight:700; width:100%; text-align:center">Reserver Votre Hotel Avec Nos Partenaires de Classes</h3>
<!-- <section  class="Accueilhotels" id="Accueil">
    <div style="position: relative; bottom: 80px;" class="contenu">
        <h1 style="color: #fb911f; font-size: 50px;">Explorer le monde</h1>
        <h3 style="color: black;">Au sein du groupe <span style="color: #fb911f; font-size: 25px;">ODYSSEY</span>, ce sont des specialistes par destination qui sont à votre service pour organiser votre voyage.
             Leur expérience, la formation qu'ils ont reçue, leur passion  du voyage ou d'un pays en ont fait des experts. il sont à votre disposition pour élaborer 
             ,  avec vous, votre voyage et vous conseiller les meilleurs hotels ou itinéraire .</h3>
    </div>
</section class="contenu"> -->

<section style="position: relative;top: 10px;" class="Hotels" id="Hotels width:100%;">
    
<section>
    <div id="myBtnContainer">
        <button class="btn active" onclick="filterSelection('all')"> Show all</button>
        <button class="btn" onclick="filterSelection('maldives')"> Maldives</button>
        <button class="btn" onclick="filterSelection('istanbul')"> istanbul</button>
        <button class="btn" onclick="filterSelection('dubai')"> Dubai</button>
        <button class="btn" onclick="filterSelection('algeria')"> Algeria</button>
        <button class="btn" onclick="filterSelection('spain')"> Spain</button>
        <button class="btn" onclick="filterSelection('france')"> France</button>
        <button class="btn" onclick="filterSelection('greece')"> Greece</button>
      </div>

      <!--filter hotels-->
      
      <!--Hotel kudadoo-maldives-private-->

    <div class="contenu">
        <div style="background-color:white; border-radius:1em;" class="filterDiv maldives">
            <div>
                <img style="border-radius:1em;" src="images/kudadoo-maldives-private.jpg" alt="kudadoo-maldives-private" width="315px" height="310px">
            </div>
            <div style="position: relative; bottom: 40px;line-height: 1.5; background-color:white;">
                <h3 style="color: orange;">Hôtel kudadoo-maldives-private</h3>
                <p style="color: black;"> <img src="images/icons8-google-maps.gif" alt="icons8-google-maps" width="30px">Mahoe Bay, Montego Bay 167 Jamaïque</p>
                <br>
                <span><img src="images/icons8-5-star-hotel-64.png" alt="icons8-4-star-hotel-64"></span>
                <div style="position: relative; top: 20px;">
                    <a href="Hôtel kudadoo-maldives-private.php" id="det">Details</a>
                </div>
            </div>
        </div>

    <!--Algeria filter-->

        <!--Hôtel Sheraton Oran, Algérie-->
        <div style="background-color:white; border-radius:1em;" class="filterDiv spain">
            <div>
                <img style="border-radius:1em;" src="images/br1.jpg" alt="sheraton-oran-immeuble" width="317px" height="310px">
            </div>
            <div style="position: relative; bottom: 40px;line-height: 1.5;">
                <h3 style="color: orange;">Gran Hotel La Florida G.L Monumento</h3>
                <p style="color: black;"> <img src="images/icons8-google-maps.gif" alt="icons8-google-maps" width="30px">Carretera Vallvidrera-Tibidabo, 83-93, Horta-Guinardó, 08035 Barcelone, Espagne</p>
                <br>
                <span><img src="images/icons8-5-star-hotel-64.png" alt="icons8-4-star-hotel-64"></span>
                <div style="position: relative; top: 20px;">
                    <a href="#" id="det">Details</a>
                </div>
            </div>
        </div>



         
        <!--Le Meridien Oran Hotel-->
        <div style="background-color:white; border-radius:1em;" class="filterDiv algeria">
            <div>
                <img style="border-radius:1em;" src="images/Le Meridien.jpg" alt="Le Meridien
                " width="317px" height="310px">
            </div>
            <div style="position: relative; bottom: 40px;line-height: 1.5;">
                <h3 style="color: orange;">Hôtel Le Meridien</h3>
                <p style="color: black;"> <img src="images/icons8-google-maps.gif" alt="icons8-google-maps" width="30px">Route 75 Chemin De Wilaya, Oran 31000 Algérie</p>
                <br>
                <span><img src="images/icons8-5-star-hotel-64.png" alt="icons8-4-star-hotel-64"></span>
                <div style="position: relative; top: 20px;">
                    <a href="#" id="det">Details</a>
                </div>
            </div>
        </div>





        <!--Hôtel Sheraton Annaba-->
        <div style="background-color:white; border-radius:1em;" class="filterDiv algeria">
            <div>
                <img style="border-radius:1em;" src="images/Sheraton Hotel, Annaba.jpg" alt="Sheraton Hotel, Annaba" width="317px" height="310px">
            </div>
            <div style="position: relative; bottom: 40px;line-height: 1.5;">
                <h3 style="color: orange;">Hôtel Sheraton Annaba</h3>
                <p style="color: black;"> <img src="images/icons8-google-maps.gif" alt="icons8-google-maps" width="30px"> Boulevard Victor Hugo, Annaba 23000 Algérie</p>
                <br>
                <span><img src="images/icons8-5-star-hotel-64.png" alt="icons8-4-star-hotel-64"></span>
                <div style="position: relative; top: 20px;">
                    <a href="#" id="det">Details</a>
                </div>
            </div>
        </div>


        <!--Hôtel Sabri Annaba-->
        <div style="background-color:white; border-radius:1em;" class="filterDiv france">
            <div>
                <img style="border-radius:1em;" src="images/pa1.jpg" alt="Hôtel Sabri à Annaba" width="317px" height="310px">
            </div>
            <div style="position: relative; bottom: 40px;line-height: 1.5;">
                <h3 style="color: orange;">InterContinental Paris Le Grand, an IHG Hotel</h3>
                <p style="color: black;"> <img src="images/icons8-google-maps.gif" alt="icons8-google-maps" width="30px">2 Rue Scribe, 9e arr., 75009 Paris, France
                </p>
                <span><img src="images/icons8-5-star-hotel-64.png" alt="icons8-4-star-hotel-64"></span>
                <div style="position: relative; top: 20px;">
                    <a href="#" id="det">Details</a>
                </div>
            </div>
        </div>

        <!--Hôtel Marriott Bab Ezzouar-->
        <div style="background-color:white; border-radius:1em;" class="filterDiv algeria">
            <div>
                <img style="border-radius:1em;" src="images/Algiers Marriott Hotel Bab Ezzouar.jpg" alt="Algiers Marriott Hotel Bab Ezzouar
                " width="317px" height="310px">
            </div>
            <div style="position: relative; bottom: 40px;line-height: 1.5;">
                <h3 style="color: orange;">Hôtel Marriott Bab Ezzouar</h3>
                <p style="color: black;"> <img src="images/icons8-google-maps.gif" alt="icons8-google-maps" width="30px">Nouveau Quartier Des Affaires, Bab Ezzouar, Alger 16311 Algérie</p>
                <br>
                <span><img src="images/icons8-5-star-hotel-64.png" alt="icons8-4-star-hotel-64"></span>
                <div style="position: relative; top: 20px;">
                    <a href="#" id="det">Details</a>
                </div>
            </div>
        </div>
        
        
        <!--La Gazelle d'or-->
        <div style="background-color:white; border-radius:1em;" class="filterDiv greece">
            <div>
                <img style="border-radius:1em;" src="images/my1.jpg" alt="La Gazelle d'or" width="317px" height="310px">
            </div>
            <div style="position: relative; bottom: 40px;line-height: 1.5;">
                <h3 style="color: orange;">Petinos Hotel</h3>
                <p style="color: black;"> <img src="images/icons8-google-maps.gif" alt="icons8-google-maps" width="30px">  Platis Yialos Beach, Platis Gialos, 84600, Grèce</p>
                <br>
                <span><img src="images/icons8-4-star-hotel-64.png" alt="icons8-4-star-hotel-64"></span>
                <div style="position: relative; top: 20px;">
                    <a href="#" id="det">Details</a>
                </div>
            </div>
        </div>


    <!-- End Algeria filter-->


        <!--Hotel The Ritz-Carlton-->
        <div style="background-color:white; border-radius:1em;" class="filterDiv maldives">
            <div>
                <img style="border-radius:1em;" src="images/The Ritz-Carlton Maldives.jpeg" alt="The Ritz-Carlton Maldives" width="310px" height="310px">
            </div>
            <div style="position: relative; bottom: 40px;line-height: 1.5;">
                <h3 style="color: orange;">Hotel The Ritz-Carlton</h3>
                <p style="color: black;"> <img src="images/icons8-google-maps.gif" alt="icons8-google-maps" width="30px">Fari Islands maldives,Numéro 3 Malé 20013</p>
                <br>
                <span><img src="images/icons8-5-star-hotel-64.png" alt="icons8-4-star-hotel-64"></span>
                <div style="position: relative; top: 20px;">
                    <a href="#" id="det">Details</a>
                </div>
            </div>
        </div>




        <!--Hotel Heritance Aarah-->
        <div style="background-color:white; border-radius:1em;" class="filterDiv maldives">
            <div>
                <img style="border-radius:1em;" src="images/Heritance Aarah.jpg" alt="Heritance Aarah" width="310px" height="310px">
            </div>
            <div style="position: relative; bottom: 40px;line-height: 1.5;">
                <h3 style="color: orange;">Hotel Heritance Aarah</h3>
                <p style="color: black;"> <img src="images/icons8-google-maps.gif" alt="icons8-google-maps" width="30px">Aarah 05150 Nº 1 sur 1 hébergement tout compris à Aarah</p>
                <br>
                <span><img src="images/icons8-5-star-hotel-64.png" alt="icons8-4-star-hotel-64"></span>
                <div style="position: relative; top: 20px;">
                    <a href="#" id="det">Details</a>
                </div>
            </div>
        </div>
        



        <!--Hotel Naladhu-->
        <div style="background-color:white; border-radius:1em;" class="filterDiv maldives">
            <div>
                <img style="border-radius:1em;" src="images/Naladhu.jpg" alt="Naladhu" width="310px" height="310px">
            </div>
            <div style="position: relative; bottom: 40px;line-height: 1.5;">
                <h3 style="color: orange;">Hotel Naladhu</h3>
                <p style="color: black;"> <img src="images/icons8-google-maps.gif" alt="icons8-google-maps" width="30px">Veligandhu Huraa, 2098 Numéro 1 sur 1 hôtels à Naladhu Island</p>
                <br>
                <span><img src="images/icons8-5-star-hotel-64.png" alt="icons8-4-star-hotel-64"></span>
                <div style="position: relative; top: 20px;">
                    <a href="#" id="det">Details</a>
                </div>
            </div>
        </div>

    
        <!--Hotel North Male Atoll-->
        <div style="background-color:white; border-radius:1em;" class="filterDiv maldives">
            <div>
                <img style="border-radius:1em;" src="images/North Male Atoll, Maldives.jpg" alt="North Male Atoll" width="310px" height="310px">
            </div>
            <div style="position: relative; bottom: 40px;line-height: 1.5;">
                <h3 style="color: orange;">Hotel North Male Atoll</h3>
                <p style="color: black;"> <img src="images/icons8-google-maps.gif" alt="icons8-google-maps" width="30px">Lot 10717, Kaani Magu Crystal View, Hulhu</p>
                <br>
                <span><img src="images/icons8-4-star-hotel-64.png" alt="icons8-4-star-hotel-64"></span>
                <div style="position: relative; top: 20px;">
                    <a href="#" id="det">Details</a>
                </div>
            </div>
        </div>


        <!--Hotel Soneva Jani-->
        <div style="background-color:white; border-radius:1em;" class="filterDiv maldives">
            <div>
                <img style="border-radius:1em;" src="images/Soneva Jani.jpg" width="310px" height="310px">
            </div>
            <div style="position: relative; bottom: 40px;line-height: 1.5;">
                <h3 style="color: orange;">Hotel Soneva Jani</h3>
                <p style="color: black;"> <img src="images/icons8-google-maps.gif" alt="icons8-google-maps" width="30px">20001 Nº 1 sur 1 complexe touristique à Medhufaru</p>
                <br>
                <span><img src="images/icons8-5-star-hotel-64.png" alt="icons8-4-star-hotel-64"></span>
                <div style="position: relative; top: 20px;">
                    <a href="#" id="det">Details</a>
                </div>
            </div>
        </div>


       <!--istanbul Hotels-->

        <!--InterContinental Istanbul-->
        <div style="background-color:white; border-radius:1em;" class="filterDiv  istanbul">
            <div>
                <img style="border-radius:1em;" src="images/Tripadvisor.jpg" alt="InterContinental Istanbul" width="310px" height="310px">
            </div>
            <div style="position: relative; bottom: 40px;line-height: 1.5;">
                <h3 style="color: orange;">Hotel InterContinental Istanbul</h3>
                <p style="color: black;"> <img src="images/icons8-google-maps.gif" alt="icons8-google-maps" width="30px">Gümüşsuyu Mah. Asker Ocağı Cad. No: 1, Istanbul 34435 Turquie</p>
                <br>
                <span><img src="images/icons8-5-star-hotel-64.png" alt="icons8-4-star-hotel-64"></span>
                <div style="position: relative; top: 20px;">
                    <a href="#" id="det">Details</a>
                </div>
            </div>
        </div>

        
        <!--Celal Aga Konagi Metro Hotel-->
        <div style="background-color:white; border-radius:1em;" class="filterDiv istanbul">
            <div>
                <img style="border-radius:1em;" src="images/Hôtels près de Place Taksim.jpg" alt="Celal Aga Konagi Metro Hotel" width="310px" height="310px">
            </div>
            <div style="position: relative; bottom: 40px;line-height: 1.5;">
                <h3 style="color: orange;">Hotel Celal Aga Konagi Metro</h3>
                <p style="color: black;"> <img src="images/icons8-google-maps.gif" alt="icons8-google-maps" width="30px">Kemalpaşa Mah.Sehzadebası Cad. No</p>
                <br>
                <span><img src="images/icons8-5-star-hotel-64.png" alt="icons8-4-star-hotel-64"></span>
                <div style="position: relative; top: 20px;">
                    <a href="#" id="det">Details</a>
                </div>
            </div>
        </div>


        <!--Hotel Ajwa Sultanahmet-->
        <div style="background-color:white; border-radius:1em;" class="filterDiv istanbul">
            <div>
                <img style="border-radius:1em;" src="images/Ajwa Hotel Sultanahmet, Istanbul, Marmara.jpg" alt="Ajwa Hotel Sultanahmet, Istanbul, Marmara" width="310px" height="310px">
            </div>
            <div style="position: relative; bottom: 40px;line-height: 1.5;">
                <h3 style="color: orange;">Hotel Ajwa SultanAhmet</h3>
                <p style="color: black;"> <img src="images/icons8-google-maps.gif" alt="icons8-google-maps" width="30px">Piyerloti Caddesi Sultanahmet, Istanbul 34126 Turquie
                </p>
                <br>
                <span><img src="images/icons8-5-star-hotel-64.png" alt="icons8-4-star-hotel-64"></span>
                <div style="position: relative; top: 20px;">
                    <a href="#" id="det">Details</a>
                </div>
            </div>
        </div>


        <!--Hotel-titanic-antalya-->
        <div style="background-color:white; border-radius:1em;" class="filterDiv istanbul">
            <div>
                <img style="border-radius:1em;" src="images/hotel-titanic-antalya.jpg" alt="Hotel-titanic-antalya" width="310px" height="310px">
            </div>
            <div style="position: relative; bottom: 40px;line-height: 1.5;">
                <h3 style="color: orange;">Hotel Titanic Antalya</h3>
                <p style="color: black;"> <img src="images/icons8-google-maps.gif" alt="icons8-google-maps" width="30px">Guzeloba Mah. Yasar Sobutay Bul. No:36, Muratpasa, Ant
                </p>
                <br>
                <span><img src="images/icons8-5-star-hotel-64.png" alt="icons8-4-star-hotel-64"></span>
                <div style="position: relative; top: 20px;">
                    <a href="#" id="det">Details</a>
                </div>
            </div>
        </div>


        <!--Hotel Delphin Palace Hotel-->
        <div style="background-color:white; border-radius:1em;" class="filterDiv istanbul">
            <div>
                <img style="border-radius:1em;" src="images/Delphin Palace Hotel.jpg" alt="Delphin Palace Hotel" width="310px" height="310px">
            </div>
            <div style="position: relative; bottom: 40px;line-height: 1.5;">
                <h3 style="color: orange;">Hotel Ajwa Sultanahmet</h3>
                <p style="color: black;"> <img src="images/icons8-google-maps.gif" alt="icons8-google-maps" width="30px">Piyerloti Caddesi Sultanahmet, Istanbul 34126 Turquie
                </p>
                <br>
                <span><img src="images/icons8-5-star-hotel-64.png" alt="icons8-4-star-hotel-64"></span>
                <div style="position: relative; top: 20px;">
                    <a href="#" id="det">Details</a>
                </div>
            </div>
        </div>

         <!--fin-->


         
        <!-- Dubai hotels-->

        <!--Hotel Burj al Arab-->
        <div style="background-color:white; border-radius:1em;" class="filterDiv dubai">
            <div>
                <img style="border-radius:1em;" src="images/Burj al Arab Dubai.jpg" alt="Burj al Arab Dubai" width="310px" height="310px">
            </div>
            <div style="position: relative; bottom: 40px;line-height: 1.5;">
                <h3 style="color: orange;">Hotel Burj al Arab</h3>
                <p style="color: black;"> <img src="images/icons8-google-maps.gif" alt="icons8-google-maps" width="30px">Jumeirah St, Dubaï 74147 Émirats arabes unis
                </p>
                <br>
                <span><img src="images/icons8-5-star-hotel-64.png" alt="icons8-4-star-hotel-64"></span>
                <div style="position: relative; top: 20px;">
                    <a href="#" id="det">Details</a>
                </div>
            </div>
        </div>


        <!--Hotel l-Atlantis-The-Palm-->
        <div style="background-color:white; border-radius:1em;" class="filterDiv dubai ">
            <div>
                <img style="border-radius:1em;" src="images/L-hotel-parc-d-attractions-l-Atlantis-The-Palm-a-Dubai.jpg" alt="L-hotel-parc-d-attractions-l-Atlantis-The-Palm-a-Dubai" width="310px" height="310px">
            </div>
            <div style="position: relative; bottom: 40px;line-height: 1.5;">
                <h3 style="color: orange;">Hotel l-Atlantis-The-Palm</h3>
                <p style="color: black;"> <img src="images/icons8-google-maps.gif" alt="icons8-google-maps" width="30px">Numéro 153 Hotel l-Atlantis-The-Palm
                </p>
                <br>
                <span><img src="images/icons8-5-star-hotel-64.png" alt="icons8-4-star-hotel-64"></span>
                <div style="position: relative; top: 20px;">
                    <a href="#" id="det">Details</a>
                </div>
            </div>
        </div>

        <!--Hotel Voco Dubai-->

        <div style="background-color:white; border-radius:1em;" class="filterDiv dubai">
            <div>
                <img style="border-radius:1em;" src="images/Voco Dubai.jpg" alt="voco Dubai" width="310px" height="310px">
            </div>
            <div style="position: relative; bottom: 40px;line-height: 1.5;">
                <h3 style="color: orange;">Hotel Voco Dubai</h3>
                <p style="color: black;"> <img src="images/icons8-google-maps.gif" alt="icons8-google-maps" width="30px">Plot 49, Sheikh Zayed Road Trade Centre District, Dubaï 99
                </p>
                <br>
                <span><img src="images/icons8-5-star-hotel-64.png" alt="icons8-4-star-hotel-64"></span>
                <div style="position: relative; top: 20px;">
                    <a href="#" id="det">Details</a>
                </div>
            </div>
        </div>

        <!--Jumeirah Al Naseem-->

        <div style="background-color:white; border-radius:1em;" class="filterDiv dubai">
            <div>
                <img style="border-radius:1em;" src="images/Jumeirah Al Naseem.jpg" alt="Jumeirah Al Naseem" width="310px" height="310px">
            </div>
            <div style="position: relative; bottom: 40px;line-height: 1.5;">
                <h3 style="color: orange;">Hotel Jumeirah Al Naseem</h3>
                <p style="color: black;"> <img src="images/icons8-google-maps.gif" alt="icons8-google-maps" width="30px">Jumeirah Road Umm Suqeim 3, Dubaï 75157 Émirats
                </p>
                <br>
                <span><img src="images/icons8-5-star-hotel-64.png" alt="icons8-4-star-hotel-64"></span>
                <div style="position: relative; top: 20px;">
                    <a href="#" id="det">Details</a>
                </div>
            </div>
        </div>

        <!--JW Marriott Marquis Hotel-->

        <div style="background-color:white; border-radius:1em;" class="filterDiv dubai">
            <div>
                <img style="border-radius:1em;" src="images/JW Marriott Marquis Hotel.jpg" alt="JW Marriott Marquis Hotel" width="310px" height="310px">
            </div>
            <div style="position: relative; bottom: 40px;line-height: 1.5;">
                <h3 style="color: orange;">Hotel JW Marriott Marquis</h3>
                <p style="color: black;"> <img src="images/icons8-google-maps.gif" alt="icons8-google-maps" width="30px">Sheikh Zayed Road Business Bay, Dubaï 121000 Émirats
                </p>
                <br>
                <span><img src="images/icons8-5-star-hotel-64.png" alt="icons8-4-star-hotel-64"></span>
                <div style="position: relative; top: 20px;">
                    <a href="#" id="det">Details</a>
                </div>
            </div>
        </div>

        <!--Hotel Sheraton Mall of Emirates-->


        <div style="background-color:white; border-radius:1em;" class="filterDiv dubai">
            <div>
                <img style="border-radius:1em;" src="images/Sheraton Mall of the Emirates Hotel.jpg" alt="Sheraton Mall of the Emirates Hotel" width="310px" height="310px">
            </div>
            <div style="position: relative; bottom: 40px;line-height: 1.5;">
                <h3 style="color: orange;">Hotel Sheraton Mall of Emirates</h3>
                <p style="color: black;"> <img src="images/icons8-google-maps.gif" alt="icons8-google-maps" width="30px">Sheikh Zayed Road of the Emirates, Dubaï 283825 Émirats
                </p>
                <br>
                <span><img src="images/icons8-5-star-hotel-64.png" alt="icons8-4-star-hotel-64"></span>
                <div style="position: relative; top: 20px;">
                    <a href="#" id="det">Details</a>
                </div>
            </div>
        </div>

        <!--  Fin Dubai hotels-->

        <!--Hotel Swissotel The Bosphorus-->

        <div style="background-color:white; border-radius:1em;" class="filterDiv istanbul">
            <div>
                <img style="border-radius:1em;" src="images/Swissotel The Bosphorus Istanbul.jpg" alt="Swissotel The Bosphorus Istanbul" width="310px" height="310px">
            </div>
            <div style="position: relative; bottom: 40px;line-height: 1.5;">
                <h3 style="color: orange;">Hotel Swissotel The Bosphorus</h3>
                <p style="color: black;"> <img src="images/icons8-google-maps.gif" alt="icons8-google-maps" width="30px">Vişnezade Mah. Acısu Sok. No: 19 Macka Besiktas, Istanbul
                </p>
                <br>
                <span><img src="images/icons8-5-star-hotel-64.png" alt="icons8-4-star-hotel-64"></span>
                <div style="position: relative; top: 20px;">
                    <a href="#" id="det">Details</a>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    filterSelection("all")
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("filterDiv");
  if (c == "all") c = "";
  // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

// Show filtered elements
function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {
      element.className += " " + arr2[i];
    }
  }
}

// Hide elements that are not selected
function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);
    }
  }
  element.className = arr1.join(" ");
}

// Add active class to the current control button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
    ///////////////////////////
     window.addEventListener('scroll', function(){
         const header =document.querySelector('header');
         header.classList.toggle("sticky", window.scrollY > 0 );
     });

   
 </script>
</body>
</html>

