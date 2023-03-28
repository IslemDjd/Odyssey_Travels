<?php
require_once "../../core/autoload.php";
$r = mysqli_query($conn, "select * from ville_depart");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Your Flight</title>
    <link rel="stylesheet" href="NavBar/nav.css">
    <link rel="stylesheet" href="../Css/home2.css">
</head>
<body>
    <video src="../Backgrounds/4k Plane Landing at Sunset Light Sky.mp4" autoplay muted loop></video>
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
  const navbarLinks  = document.getElementsByClassName('navbar_links')[0];

  toggleButton.addEventListener('click',() =>{
      navbarLinks.classList.toggle('active');
  });
</script>
    <div class="main">
    <div class="flightbox">
        <form action="" onsubmit="return validateDates()">
            <fieldset>
                <legend>Book Now</legend>
        
                <select name="country_from" id="country">
                    <option value="from" selected disabled>  From</option>
                    <?php
                while($row = mysqli_fetch_array($r)){
                    echo "<option value=".$row['code_iata'].">". $row['code_iata']." --- ".$row['nom_ville']."</option>";
                }
            
            ?>
                </select>
                <br>
                
                <select name="country_to" id="country">
                    <option value="to" selected disabled>  To</option>
                    <option value="France">France</option>
                    <option value="United Kingdom">Uk</option>
                    <option value="Usa">Usa</option>
                    <option value="Spain">Spain</option>
                    <option value="Italy">Italy</option>
                </select>
                <br><br>
                
                <label class="date_depart" for="date_depart" >Depart</label> <br>
                <input type="date" id="date_depart">
                <br>
                <label class="date_return" for="date_return" >Return</label> <br>
                <input type="date" id="date_return">
                <script>
                    let today = new Date();
                    let nextmonth = new Date();
                    nextWeek.setDate(today.getDate() + 30);
                    function validateDates() {
                        let departDate = new Date(document.getElementById('date_depart').value);
                        let retourDate = new Date(document.getElementById('date_return').value);
                                            
                        if (departDate < today || departDate > nextmonth) {
                          alert('Veuillez choisir une date d\'aller entre aujourd\'hui et les prochaines 30 jours.');
                          return false;
                        }
                        

                        if (retourDate < today || retourDate > nextmonth) {
                          alert('Veuillez choisir une date de retour entre aujourd\'hui et les prochaines 30 jours.');
                          return false;
                        }
                                              
                        if (departDate >= retourDate) {
                          alert('La date d\'aller doit être antérieure à la date de retour.');
                          return false;
                        }
                                            
                        return true;
                    }
                </script>
                <br>
                <label for="d">Adults</label>
                <select name="" id="nb_passenger">
                   <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option>                                                  
                </select>
                <a href="#"><button class="learn-more">
                    <span class="circle" aria-hidden="true">
                    <span class="icon arrow"></span>
                    </span>
                    <span class="button-text">Book Now</span>
                  </button></a>
            </fieldset>
             
        </form>
    </div>
    </div>
</body>
</html>