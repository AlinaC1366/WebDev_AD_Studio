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
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>A|D Studio</title>

  <!-- CSS -->
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/style-header.css" />
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">

</head>

<body>
  <div class="page-container">

    <!-- HEADER -->
    <header class="site-header">
      <div class="header-inner">
        <div class="logo">
          <a href="index.php">A|D Studio</a>
        </div>
        <nav class="main-nav">
          <ul>
            <li><a href="admin\servicii.php">Servicii</a></li>
            <li><a href="admin/proiecte.php">Proiecte</a></li>
            <li><a href="admin/despre.php">Despre Noi</a></li>
            <?php if ($autentificat): ?>
              <li><a href="admin/comenzi.html">Comenzile Mele</a></li>
              <li><a href="backend/routes/auth_logout.php">Logout</a></li>
            <?php else: ?>
              <li><a href="admin/register.html">Login</a></li>
            <?php endif; ?>
          </ul>
        </nav>
      </div>
    </header>

    <!-- TOAST MESAJE -->
    <?php if ($mesaj_succes): ?>
      <div class="toast"><?php echo htmlspecialchars($mesaj_succes); ?></div>
    <?php endif; ?>
    <?php if ($mesaj_logout): ?>
      <div class="toast"><?php echo htmlspecialchars($mesaj_logout); ?></div>
    <?php endif; ?>

    <!-- SECTIUNI SCROLL -->
    <main>
      <section class="full hero" id="sectiune1">
      <div class="hero-content" data-aos="fade-up">
        <h2>Bine ai venit!</h2>
        <p>Explorați serviciile noastre de arhitectură, design interior și urbanism. Oferim soluții complete și personalizate pentru proiectele tale.</p>
      </div>
     </section>

      <section class="full" id="sectiune2">
        <div class="section-boxed">
        <div class="section-content" data-aos="fade-left">
          <div class="section-image" style="background-image: url('assets/photos/pozaSectiune2.jpg');">
            <div class="image-overlay">
              <h3>Proiect Modernizarea Romaniei</h3>
              <p>Martie 2024</p>
            </div>
          </div>
          <div class="section-text">
            <h2>Proiectare Personalizată</h2>
            <p>Fiecare spațiu are o poveste. Îți oferim soluții de design adaptate nevoilor tale, pornind de la funcționalitate până la estetică.</p>
          </div>
        </div>
        </div>
      </section>


      <section class="full" id="sectiune3">
      <div class="section-boxed">
      <div class="section-content reverse" data-aos="fade-right">
        <div class="section-text">
          <h2>Urbanism & Viziune</h2>
          <p>Abordăm fiecare proiect urbanistic cu o viziune clară, durabilă și integrată în contextul local. Creăm conexiuni între oameni, spații și viitor.</p>
        </div>
        <div class="section-image" style="background-image: url('assets/photos/pozaSectiune3.jpg');">
          <div class="image-overlay">
            <h3>Proiect Urban Grow</h3>
            <p>Ianuarie 2025</p>
          </div>
       </div>
        </div>
      </div>
    </div>
    </section>

    </main>

    <!-- FOOTER -->
    <footer class="site-footer">
      <p>Contact: alinastudio@arhitectura.ro | +40 123 456 789</p>
    </footer>
  </div>

  <!-- SCRIPTURI -->
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
    const toasts = document.querySelectorAll('.toast');
    toasts.forEach(toast => {
      setTimeout(() => toast.style.opacity = '0', 4000);
      setTimeout(() => toast.remove(), 5000);
    });
  </script>
</body>
</html>
