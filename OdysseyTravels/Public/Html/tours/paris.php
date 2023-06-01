<?php
require_once "../../../core/autoload.php";

session_start();
$page="Paris";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../NavBar/nav.css">
    <link rel="stylesheet" href="../../Css/barcelone_paris.css">
    <title>Paris</title>
</head>
<body>
    <nav class="navbar">
        
        <div class="brand-title">
            <div><a href="home.html"><img class="logo" src="../image/Logo.png" alt="logo"></a></div>
            <h1>ODYSSEY<span class="travels">Travels</span></h1></div>
            <a href="#" class="toggle_button">
                 <span class="bar"></span>
                 <span class="bar"></span>
                 <span class="bar"></span>
            </a>

  <div class="navbar_links">
      <ul>
          <li><a href="../home.php" class='<?php if($page== "home"){echo "active";}?>'>HOME</a></li>
          <li><a href="../hotels.php" class='<?php if($page== "hotels"){echo "active";}?>'>HOTELS</a></li>
          <li><a href="../ourtours.php" class='<?php if($page== "ourtours"){echo "active";}?>'>OUR TOURS</a></li>
          <li><a href="../destinations.php" class='<?php if($page== "destinations"){echo "active";}?>'>DESTINATIONS</a></li>
          <li><a href="../aboutus.php" class='<?php if($page== "aboutus"){echo "active";}?>'>ABOUT US</a></li>
          <?php if(isset($_SESSION['email'])):?>
               
               <!-- <li><a href="../compte.php" class='<?php if($page== "account"){echo "active";}?>'>ACCOUNT</a></li> -->
               <li><a href="../profil.php" style="color:#cc0000 ;font-size:20px; font-weight:700;" class='<?php if($page== "profil"){echo "active";}?>'>PROFIL</a></li>

               
               
<?php endif;?>

<?php if(!isset($_SESSION['email'])):?>
      <div class="navbuttons">
          <a href="../login.php"><button class="login">LOG IN</button></a>
          <a href="../register.php"><button class="signup">SIGN UP</button></a>
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

<div id="container">
    <!-- Full-width images with number text -->
    <div class="mySlides">
        <div class="numbertext" style="background-image: url(paris/4.jpg); width: 100%; height:700px; background-size: cover;">1 / 7</div>
        <!-- <img src="barcelone/4.jpg" style="width:100%" height="600px"> -->
    </div>
    
    <div class="mySlides">
      <div class="numbertext" style="background-image: url(paris/5.jpg); width: 100%; height:700px; background-size: cover;">2 / 7</div>
      <!-- <img src="barcelone/6.jpg" style="width:100%" height="600px"> -->
    </div>
    
    <div class="mySlides">
      <div class="numbertext" style="background-image: url(paris/3.jpg); width: 100%; height:700px; background-size: cover;">3 / 7</div>
        <!-- <img src="barcelone/3.jpg" style="width:100%" height="600px"> -->
    </div>
    
    <div class="mySlides">
      <div class="numbertext" style="background-image: url(paris/1.jpg); width: 100%; height:700px; background-size: cover;">4 / 7</div>
      <!-- <img src="barcelone/1.jpg" style="width:100%"  height="contain"> -->
    </div>
  
    <div class="mySlides">
      <div class="numbertext" style="background-image: url(paris/2.jpg); width: 100%; height:700px; background-size: cover;">5 / 7</div>
        <!-- <img src="barcelone/2.jpg" style="width: 100%" height="contain" > -->
    </div>
  
    <div class="mySlides">
      <div class="numbertext" style="background-image: url(paris/6.jpg); width: 100%; height:700px; background-size: cover;">6 / 7</div>
      <!-- <img src="barcelone/6.jpg" style="width:100%" height="600px"> -->
    </div>

    <div class="mySlides">
      <div class="numbertext" style="background-image: url(paris/7.jpg); width: 100%; height:700px; background-size: cover;">7 / 7</div>
      <!-- <img src="barcelone/6.jpg" style="width:100%" height="600px"> -->
    </div>
  
    <!-- Next and previous buttons -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
    <br>
    <br><br>
  </div>
  <script>
    let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("demo");
  let captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>
<div class="vide" style="height:700px; width:100%;"></div>
<div class="prgrm" style="background-color:#000;">
    <div class="bar"><h1>PARIS</h1></div>
  <div class="tour">
      <div class="left"> 
            <img src="../image/manuel.png" alt="img">   
            <h1>Programme de voyage</h1><br><br>
            
      <h2>Jour 1: Arrivée à Paris</h2>
      <ul>
        <li>Transfert depuis l'aéroport vers l'hôtel</li>
        <li>Temps libre pour se reposer ou explorer les environs de l'hôtel</li>
      </ul>

      <h2>Jour 2: Découverte de Paris</h2>
      <ul>
        <li>Visite guidée de la Tour Eiffel</li>
        <li>Déjeuner</li>
        <li>Visite de l'Arc de Triomphe</li>
        <li>Temps libre pour explorer la ville</li>
      </ul>

      <h2>Jour 3: Le Louvre et Notre-Dame de Paris</h2>
      <ul>
        <li>Visite guidée du musée du Louvre</li>
        <li>Déjeuner</li>
        <li>Visite de la cathédrale Notre-Dame de Paris</li>
        <li>Temps libre pour explorer la ville</li>
      </ul>

      <h2>Jour 4: Versailles et la Tour Montparnasse</h2>
      <ul>
        <li>Visite guidée du château de Versailles</li>
        <li>Déjeuner</li>
        <li>Ascension de la Tour Montparnasse pour une vue panoramique de Paris</li>
        <li>Retour à l'hôtel en fin de journée</li>
      </ul><br>
      </div>
      <div class="right">
          <br><br><br>
          <h2>Jour 5: Disneyland Paris</h2>
      <ul>
        <li>Transfert vers le parc Disneyland Paris</li>
        <li>Journée libre pour profiter des attractions et spectacles</li>
        <li>Retour à l'hôtel en fin de journée</li>
      </ul>

      <h2>Jour 6: Montmartre et Moulin Rouge</h2>
      <ul>
        <li>Visite guidée de la basilique du Sacré-Cœur à Montmartre</li>
        <li>Déjeuner</li>
        <li>Soirée au célèbre cabaret du Moulin Rouge</li>
        <li>Retour à l'hôtel en fin de soirée</li>
      </ul>

      <h2>Jour 7: Musées et shopping</h2>
      <ul>
        <li>Visite du musée d'Orsay ou du Centre Pompidou</li>
        <li>Déjeuner</li>
        <li>Temps libre pour faire du shopping dans les boutiques locales</li>
        <li>Retour à l'hôtel en fin de journée</li>
      </ul>

      <h2>Jour 8: Départ de Paris</h2>
      <ul>
        <li>Transfert depuis l'hôtel vers l'aéroport</li>
      </ul><br>
      </div>
  </div>
  <br><br>
  <div class="left2">
      <h1>Reserver Votre Place Pour Un Tour Inoubliable <br> Vite Les Places Sont Limitées</h1>
      <label for="d">Passengers</label>
      <select name="nbr" id="nb_passenger" >
        <option disabled></option><option value="1" selected>1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option>                                                  
      </select>
      <br><br><br>
      <div class="prix">
        <?php
          $r = mysqli_query($conn, "SELECT prix from sejour where ville_arrivee='CDG'");
          $p = mysqli_fetch_array($r);
          echo "<h1>"."PRIX : ".$p['prix']." DA"."</h1>";
        ?>
      </div>
      <div class="air">
        <h2>Fly With </h2>
        <a href="https://wwws.airfrance.dz/"><img src="../ot/airfrance2.png" alt="iberia"></a>
      </div>
    </div>
  <div class="card">
      <div class="circle"></div>
      <div class="circle"></div>
      <div class="card-inner">
        <a href="#">
          <button data-text="Awesome" class="button">
            <span class="actual-text">&nbsp;réserver&nbsp;</span>
            <span class="hover-text" aria-hidden="true">&nbsp;réserver&nbsp;</span>
          </button>
        </a> 
      </div>
  </div>
  <br><br><br><br><br>
  
</div>
<br><br>
</body>
</html>