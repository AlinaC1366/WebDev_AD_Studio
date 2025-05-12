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
  <title>Serviciile Noastre</title>
  <link rel="stylesheet" href="../css/style-servicii.css">
  <link rel="stylesheet" href="../css/style-header.css" />
  <script defer src="../js/servicii.js"></script>
</head>
<body>
  <header class="site-header">
    <div class="header-inner">
      <div class="logo">
        <a href="../index.php">A|D Studio</a>
      </div>
      <nav class="main-nav">
        <ul>
          <li><a href="../index.php">Acasa</a></li>
          <li><a href="proiecte.php">Proiecte</a></li>
          <li><a href="despre.html">Despre Noi</a></li>
          <?php if ($autentificat): ?>
              <li><a href="comenzi.html">Cosul meu<span id="cart-count">(0)</span></a></li>
              <li><a href="../backend/routes/auth_logout.php">Logout</a></li>
            <?php else: ?>
              <li><a href="register.html">Login</a></li>
            <?php endif; ?>
        </ul>
      </nav>
    </div>
  </header>

  <main class="servicii-container">
    <section class="serviciu">
      <h2>Proiectare Personalizată ✏️</h2>
      <p>De la schițe la planuri executive, creăm soluții adaptate nevoilor tale.</p>
      <select class="optiuni">
        <option value="2000">Proiectare bazică | 2000 lei</option>
        <option value="3500">Proiectare premium (cu vizualizări) | 3500 lei</option>
      </select>
      <input type="number" min="1" value="1" class="cantitate">
      <?php if ($autentificat): ?>
        <button class="adauga" data-nume="Proiectare" data-id="proiectare">Adaugă în coș</button>
      <?php else: ?>
        <button disabled title="Autentifică-te pentru a comanda">Autentificare necesară</button>
      <?php endif; ?>
    </section>

    <section class="serviciu">
      <h2>Soluții pentru Comunități 🌳</h2>
      <p>Analiză teren, planuri master și strategii de dezvoltare durabilă.</p>
      <select class="optiuni">
        <option value="1500">Consultanță de bază | 1500 lei</option>
        <option value="3000">Consultanță extinsă | 3000 lei</option>
      </select>
      <input type="number" min="1" value="1" class="cantitate">
      <?php if ($autentificat): ?>
        <button class="adauga" data-nume="Consultanță Urbană" data-id="urbanism">Alege Pachetul</button>
      <?php else: ?>
        <button disabled title="Autentifică-te pentru a comanda">Autentificare necesară</button>
      <?php endif; ?>
    </section>

    <section class="serviciu">
      <h2>Schite Realiste 🖥️</h2>
      <p>Transformăm proiectele în schite pentru prezentări.</p>
      <select class="optiuni">
        <option value="300">1 Schita | 300 lei</option>
        <option value="550">2 Schite | 550 lei</option>
        <option value="800">3 Schite | 800 lei</option>
      </select>
      <input type="number" min="1" value="1" class="cantitate">
      <?php if ($autentificat): ?>
        <button class="adauga" data-nume="Schite" data-id="render">Comandă Acum</button>
      <?php else: ?>
        <button disabled title="Autentifică-te pentru a comanda">Autentificare necesară</button>
      <?php endif; ?>
    </section>
  </main>

  <div id="toast" class="toast hidden">Serviciu adăugat! Vezi coșul pentru finalizare.</div>

  <section class="recomandari">
    <h3>Recomandări pentru tine</h3>
    <p>Clienții care au ales consultanță urbană au adăugat și Schite pentru prezentări impresionante.</p>
  </section>
</body>
</html>
