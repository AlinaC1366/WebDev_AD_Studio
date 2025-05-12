<?php
session_start();
$mesaj_succes = '';
$mesaj_logout = '';
$autentificat = isset($_SESSION['user_id']);

if (isset($_SESSION['success_message'])) {
  $mesaj_succes = $_SESSION['success_message'];
  unset($_SESSION['success_message']);
}

if (isset($_SESSION['logout_msg'])) {
  $mesaj_logout = $_SESSION['logout_msg'];
  unset($_SESSION['logout_msg']);
}
?>

<!DOCTYPE html>
<html lang="ro">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Proiectele Noastre</title>
  <link rel="stylesheet" href="../css/style-projects.css">
  <link rel="stylesheet" href="../css/style-header.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/countup.js/2.0.7/countUp.min.js"></script>
</head>

<script>
function animateCounter(id, endValue, duration = 2000) {
  const el = document.getElementById(id);
  if (!el) return;
  let start = 0;
  const range = endValue - start;
  const increment = endValue > start ? 1 : -1;
  const stepTime = Math.abs(Math.floor(duration / range));
  const timer = setInterval(function () {
    start += increment;
    el.textContent = start;
    if (start == endValue) clearInterval(timer);
  }, stepTime);
}

document.addEventListener("DOMContentLoaded", function () {
  const observer = new IntersectionObserver(function(entries, obs) {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        animateCounter("count1", 379);
        animateCounter("count2", 528);
        animateCounter("count3", 1000);
        animateCounter("count4", 746);
        obs.disconnect(); 
      }
    });
  }, { threshold: 0.5 });

  const section = document.querySelector(".countup-section");
  if (section) observer.observe(section);
});
</script>


<body>
  <header class="site-header">
    <div class="header-inner">
      <div class="logo">
        <a href="../index.php">A|D Studio</a>
      </div>
      <nav class="main-nav">
        <ul>
          <li><a href="../index.php">Acasa</a></li>
          <li><a href="servicii.php">Servicii</a></li>
          <li><a href="despre.php">Despre Noi</a></li>
          <?php if (isset($_SESSION['user_id'])): ?>
            <li><a href="comenzi.html">Comenzile Mele</a></li>
            <li><a href="../backend/routes/auth_logout.php">Logout</a></li>
          <?php else: ?>  
            <li><a href="register.html">Login</a></li>
          <?php endif; ?>
        </ul>
      </nav>
    </div>
  </header>

  <section class="project-carousel">
    <h2>Proiectele Noastre</h2>
    <div class="carousel">
      <div class="card">
        <div class="card-inner">
          <div class="card-front" style="background-image: url('../assets/photos/projectsPoza1.jpg');">
            <div class="overlay">
              Modernizarea României<br><span>Martie 2025</span></div>
            </div>
          <div class="card-back">Proiect de infrastructură națională, sustenabilă și adaptată secolului XXI.</div>
        </div>
      </div>
      <div class="card">
        <div class="card-inner">
            <div class="card-front" style="background-image: url('../assets/photos/projectsPoza2.jpg');">
              <div class="overlay">  
                 Urban Grow<br><span>Ianuarie 2024</span></div>
              </div>
            <div class="card-back">Spații verzi inteligente integrate urban pentru calitate de viață crescută.</div>
        </div>
      </div>
      <div class="card">
        <div class="card-inner">
          <div class="card-front" style="background-image: url('../assets/photos/projectsPoza3.jpg');">
            <div class="overlay">
            Green Loft<br><span>August 2023</span></div>
            </div>
          <div class="card-back">Locuințe modulare premium pentru familii urbane tinere.</div>
        </div>
      </div>
      <div class="card">
        <div class="card-inner">
          <div class="card-front" style="background-image: url('../assets/photos/projectsPoza4.jpg');">
            <div class="overlay">
            Eco Campus<br><span>Octombrie 2022</span></div>
            </div>
          <div class="card-back">Campus educațional cu impact energetic minim.</div>
        </div>
      </div>
    </div>
  </section>

  <section class="countup-section">
    <div class="countup-box">
      <span id="count1">1</span>
      <p>Persoane Ajutate</p>
    </div>
    <div class="countup-box">
      <span id="count2">0</span>
      <p>Case Realizate</p>
    </div>
    <div class="countup-box">
      <span id="count4">0</span>
      <p>Planuri de urbanism aprobate</p>
    </div>
    <div class="countup-box">
      <span id="count3">0</span>
      <p>Vise împlinite</p>
    </div>
    
  </section>
</body>
</html>