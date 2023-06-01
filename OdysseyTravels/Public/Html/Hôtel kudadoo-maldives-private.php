<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/hotel.css">
    <link rel="stylesheet" href="NavBar/nav.css">

    <link rel="icon" type="image/png" href="images/Aircare.jpg">
</head>

    <title>Travel</title>
<body>
  <style>
    .navbar{
      background: linear-gradient(to left, #A5CC82, #00467F);

    }
    body
    {
      /* background-color:  #f2f2f2; */
      background: linear-gradient(to left, #A5CC82, #00467F);

    }
  </style>
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


<div style="position: relative; top: 100px;" class="titre">
    <b><h1 style="display: flex; justify-content: center; color: orange; font-size: 25px;" class="titre">Sandals Royal Caribbean Resort and Private Island</h1></b>
    <div style="display: flex;justify-content: center;">
       
    </div>
    <div style="display: flex;justify-content: center;">
    <span style="color: black;"> <img src="images/icons8-google-maps.gif" alt="icons8-google-maps" width="15px"> <b> Mahoe Bay, Montego Bay 167 Jamaïque </b> </span>&nbsp;/&nbsp;
    <b><span><img src="images/phone.png" alt="phone" width="15px"> Telephone 00 33 805 11 94 71</span></b>
    </div>

</div>
<br><br>
<div style="position: relative;" class="container">
          <!-- Container for the image gallery -->
 <div id="container">

    <!-- Full-width images with number text -->
    <div class="mySlides">
      <div class="numbertext">1 / 6</div>
      <img src="images/sandals-royal-caribbean.jpg" style="width:100%"  height="600px">
    </div>
  
    <div class="mySlides">
      <div class="numbertext">2 / 6</div>
        <img src="images/Sandals Royal Caribbean Resort and Private Island CHAMBRE.jpg" style="width:100%" height="600px">
    </div>
  
    <div class="mySlides">
      <div class="numbertext">3 / 6</div>
        <img src="images/ch2.jpg" style="width:100%" height="600px">
    </div>
  
    <div class="mySlides">
      <div class="numbertext">4 / 6</div>
        <img src="images/rest1.jpeg" style="width:100%" height="600px">
    </div>
  
    <div class="mySlides">
      <div class="numbertext">5 / 6</div>
        <img src="images/picine1.jpg" style="width:100%" height="600px">
    </div>
  
    <div class="mySlides">
      <div class="numbertext">6 / 6</div>
      <img src="images/fete foraine 1.jpg" style="width:100%" height="600px">
    </div>
  
    <!-- Next and previous buttons -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
  <br>
    <!-- Image text -->
    <div style="border-radius: 6px; padding: 15px; " id="caption-container">
      <p style="color: #ffffff; font-size: 23px;" id="caption"></p>
    </div>
    <br><br>
  
    <!-- Thumbnail images -->
    <div class="row">
      <div class="column">
        <img style="height: 70px;" class="demo cursor" src="images/sandals-royal-caribbean.jpg" style="width:100%" onclick="currentSlide(1)" alt="kudadoo Maldives private">
      </div>
      <div class="column">
        <img style="height: 70px;" class="demo cursor" src="images/Sandals Royal Caribbean Resort and Private Island CHAMBRE.jpg" style="width:100%" onclick="currentSlide(2)" alt="Chambre">
      </div>
      <div class="column">
        <img style="height: 70px;" class="demo cursor" src="images/ch2.jpg" style="width:100%" onclick="currentSlide(3)" alt="Chambre">
      </div>
      <div class="column">
        <img style="height: 70px;" class="demo cursor" src="images/rest1.jpeg" style="width:100%" onclick="currentSlide(4)" alt="restaurant">
      </div>
      <div class="column">
        <img style="height: 70px;" class="demo cursor" src="images/picine1.jpg" style="width:100%" onclick="currentSlide(5)" alt="La picine">
      </div>
      <div class="column">
        <img style="height: 70px;" class="demo cursor" src="images/fete foraine 1.jpg" style="width:100%" onclick="currentSlide(6)" alt="fete foraine">
      </div>
    </div>
  </div>


  <!--fin-->

    <div class="contact-box">
            <h2 style="color: orange; font-size: 40px; display: flex;justify-content: center;">Formulaire de Reservation</h2>
            <form action="" method="post">
                <div class="form-group">
                    <label for="name">Nom complet:</label>
                    <input type="text" id="name" name="name" required>
                </div>

                <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="email" id="email" name="email" required>
              </div>

                <div class="form-group">
                  <label for="tel">Numéro de contact:</label>
                  <input style="width: 100%; padding: 10px; border-radius: 6px; border: #ffffff solid; " type="tel" id="tel" name="tel" required>
              </div>

              <div class="form-group">
                  <label for="email">Type de chambres:</label>
                   <select  name="Type de chambres" id="sel">
                    <option value="Select S'il te plaît" selected disabled>Select S'il te plaît</option>
                    <option value="Suite">Suite</option>
                    <option value="Chambre standard (1 à 2 personnes)">Chambre standard (1 à 2 personnes)</option>
                    <option value="Chambre familiale (1 à 4 personnes)">Chambre familiale (1 à 4 personnes)</option>
                   </select>
              </div>

              <div class="form-group">
                <label for="number">Nombre de personnes:</label>
                <input style="width: 100%; padding: 10px; border-radius: 6px; border: #ffffff solid; " type="number" id="number" name="number" min="0" required>
            </div>

              <div class="form-group">
                <label for="date">Date d'arrivée:</label>
                <input style="width: 100%; padding: 10px; border-radius: 6px; border: #ffffff solid; " type="date" id="date" name="date" required>
            </div>

          <div class="form-group">
            <label for="Adresse de destination">Adresse de destination:</label>
            <input type="text" id="Adresse de destination" name="Adresse de destination" required>
        </div>

        <div class="form-group">
          <label for="numero de vols">Numéro de vol:</label>
          <input type="text" id="numero de vols" name="numero de vol" required>
      </div>
                <button style="width: 100%;" type="submit" name="submit">Soumettre</button>
            </form>
     </div>
</div>

<main style="position: relative; top: 200px;">
<div style="background-color: #ffffff; padding: 100px; border-radius: 6px; box-shadow: 0px 1px 20px 1px;">
  <h1 style="position: relative; bottom: 40px; display: flex; justify-content: center; font-size: 40px; color: orange;">Infos pratiques</h1>

  <section class="services">
    <h2 style="color: orange;">Équipements de l'établissement</h2>
    <ul>
      <li><span style="position: relative; top: 5px;"><img  src="images/pa.png" alt="pa" width="25px"></span> Parking gratuit</li>
      <li><span style="position: relative; top: 5px;"><img  src="images/wi.png" alt="pa" width="25px"></span> Internet haut débit gratuit (Wi-Fi)</li>
      <li><span style="position: relative; top: 5px;"><img  src="images/picene.png" alt="pa" width="25px"></span> Piscine</li>
      <li><span style="position: relative; top: 5px;"><img  src="images/Petit-déjeuner inclus.png" alt="pa" width="25px"></span> Petit-déjeuner inclus</li>
      <li><span style="position: relative; top: 5px;"><img  src="images/Court de tennis.png" alt="pa" width="25px"></span> Court de tennis</li>
      <li><span style="position: relative; top: 5px;"><img  src="images/Centre de remise en forme-Salle de sport.png" alt="pa" width="25px"></span> Centre de remise en<span>forme/Salle de sport</span> </li>
      <li><span style="position: relative; top: 5px;"><img  src="images/Navettes aéroport gratuites.png" alt="pa" width="25px"></span> Navettes aéroport gratuites</li>
    </ul>
  </section>

  <section class="services">
    <h2 style="color: orange;">Équipements de la chambre</h2>
    <ul>
      <li><span style="position: relative; top: 8px;"><img  src="images/Climatisation.png" alt="Climatisation" width="25px"> Climatisation</li>
      <li><span style="position: relative; top: 8px;"><img  src="images/Coffre-fort.png" alt="Coffre-fort" width="25px"> Coffre-fort</li>
      <li><span style="position: relative; top: 8px;"><img  src="images/Service en chambre.png" alt="Service en chambre" width="25px"> Service en chambre</li>
      <li><span style="position: relative; top: 8px;"><img  src="images/Télévision à écran plat.png" alt="Télévision à écran plat" width="25px"> Télévision à écran plat</li>
      <li><span style="position: relative; top: 8px;"><img  src="images/Réfrigérateur.png" alt="Réfrigérateur" width="25px"> Réfrigérateur</li>
    </ul>
  </section>
  
  <section class="services">
    <h2 style="color: orange;">Services</h2>
    <ul>
      <li><span style="position: relative; top: 5px;"><img  src="images/picene.png" alt="pa" width="25px"> Piscine</li>
      <li><span style="position: relative; top: 5px;"><img  src="images/Spa.png" alt="spa" width="25px"> Spa</li>
      <li><span style="position: relative; top: 5px;"><img  src="images/Restaurant.png" alt="Restauran" width="25px"> Restaurant</li>
      <li><span style="position: relative; top: 5px;"><img  src="images/Bar.png" alt="Bar" width="25px"> Bar</li>
      <li><span style="position: relative; top: 5px;"><img  src="images/Salle de conférence.png" alt="Salle de conférence" width="25px"> Salle de conférence</li>
    </ul>
  </section>

  <section class="services">
    <h2 style="color: orange;">Types de chambre</h2>
    <ul>
      <li><span style="position: relative; top: 5px;"><img  src="images/Vue sur l'océan.png" alt="Vue sur l'océan" width="25px"> Vue sur l'océan</li>
      <li><span style="position: relative; top: 5px;"><img  src="images/Suites.png" alt="Suites" width="25px"> Suites</li>
      <li><span style="position: relative; top: 5px;"><img  src="images/Chambres familiales.png" alt="Chambres familiales" width="25px"> Chambres familiales</li>
      <li><span style="position: relative; top: 5px;"><img  src="images/Chambres fumeurs disponibles.png" alt="Chambres fumeurs disponibles" width="25px"> Chambres fumeurs disponibles</li>
    </ul>
  </section>
</div>
<br><br>
  <section class="commentaires">
    <h2 style="color: orange;">Commentaires</h2>
    <br>
    <div class="commentaire">
      <img src="images/lok.jpg" alt="Photo du client 1"  width="80px">
      <blockquote>"C'était un séjour incroyable à l'hôtel. Les chambres étaient propres et confortables, le personnel était sympathique et le service était excellent."</blockquote>
      <br>
      <p>- Lokman amine</p>
    </div>

    <div class="commentaire">
      <img src="images/ab.jpg" alt="Photo du client 1"  width="80px">
      <blockquote>"Agreable séjour à Four point. J'ai passé un agreable séjour à Four point.Acceuil & service, surtout avec Hamza & Chamse Eddine; très gentils et Sampas; souris, communication, support, orientation... macha allah (bonne continuation à vous les deux)
         A bien tot nchalah."</blockquote>
         <br>
      <p>- Abdou hamla</p>
    </div>

    <div class="commentaire">
      <img src="images/nisou.jpg" alt="Photo du client 1"  width="80px">
      <blockquote>"Toujours agréable de regarder un match de foot au lotus avec une vue imprenable sur oran et ambiance magnifique j’ai aimé,
         Barbecue boisson grillades...etc tout y est merci chef breksi pour son service Je reviendrai c'est sûre inshallah ."</blockquote>
      <br>
      <p>- Anis Anis</p>
    </div>

    <div class="commentaire">
      <img src="images/sa.jpg" alt="Photo du client 1"  width="80px" height="80px">
      <blockquote>"Agréable.J'ai passé un agréable weekend à Four Points by Sheraton avec une vue magnifique sur la mer.
         Un énorme merci à la réceptionniste Hanane Bridja pour son accueil chaleureux et ses orientations tout au long de mon séjour."</blockquote>
      <br>
      <p>- Sara ben</p>
    </div>

  </section>
</main>
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

</body>
</html>