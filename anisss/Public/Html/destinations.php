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
</body>
</html>