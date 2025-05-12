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
  <title>Despre Noi | A|D Studio</title>
  <link rel="stylesheet" href="../css/style-despre.css">
  <link rel="stylesheet" href="../css/style-header.css">
</head>
<body>
  <header class="site-header">
      <div class="header-inner">
        <div class="logo">
          <a href="index.php">A|D Studio</a>
        </div>
        <nav class="main-nav">
          <ul>
            <li><a href="../index.php">Acasa</a></li>
            <li><a href="servicii.php">Servicii</a></li>
            <li><a href="proiecte.php">Proiecte</a></li>
            
            <?php if ($autentificat): ?>
              <li><a href="comenzi.html">Comenzile Mele</a></li>
              <li><a href="../backend/routes/auth_logout.php">Logout</a></li>
            <?php else: ?>
              <li><a href="register.html">Login</a></li>
            <?php endif; ?>
          </ul>
        </nav>
      </div>
    </header>

  <main class="about-container">
    <section class="intro">
      <h1>Povestea noastră</h1>
      <h2>Transformăm visul în spații vii.</h2>
      <p>De la idei la realitate. De 10 ani, construim comunități sustenabile.</p>
    </section>

    <section class="origini">
      <img src="../assets/photos/echipa.jpg" alt="Echipa A|D Studio">
      <p>Am fondat A|D Studio în 2015 cu o viziune simplă: a redefini relația dintre oameni și spațiile pe care le locuiesc.</p>
    </section>

    <section class="valori">
      <h2>Valorile Noastre</h2>
      <ul>
        <li>✨ <strong>Detaliu:</strong> Credem că frumusețea stă în detalii.</li>
        <li>🌱 <strong>Sustenabilitate:</strong> Fiecare proiect e gândit să reziste timpului.</li>
        <li>🤝 <strong>Colaborare:</strong> Ascultăm pentru a înțelege nevoile tale.</li>
      </ul>
    </section>

    <section class="premii">
      <h2>Premii & Recunoaștere</h2>
      <p>Nominalizați la Premiul de Arhitectură Românească, 2023.</p>
    </section>
  </main>
</body>
</html>
