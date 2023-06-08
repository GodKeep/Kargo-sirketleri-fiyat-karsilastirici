<!DOCTYPE html>
<html lang="en">
 <link rel="stylesheet" href="admin/css/style1.css" />
 <script type="admin/js/js1.js"></script>
<head>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="index.php">
      <!-- <img src="logo.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top me-2">-->
      Kargo Kıyasla
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Anasayfa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="hakkimizda.php">Hakkımızda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="firmalar.php">Kargo Firmaları</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="iletisim.php">İletişim</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <title>İletişim Formu</title>
</head>
<body>
  <div class="container mt-5">
    <h1>İletişim Formu</h1>
    <form name="iletisimformu" action="iletisim.php" method="post">
      <div class="form-group">
        <label for="adSoyad">Ad Soyad</label>
        <input type="text" class="form-control" id="adSoyad" name="adSoyad" placeholder="Adınız ve soyadınız">
      </div>
      <div class="form-group">
        <label for="email">E-posta Adresi</label>
        <input type="email" class="form-control" id="email"name="email" placeholder="E-posta adresiniz">
      </div>
      <div class="form-group">
        <label for="telefon">Telefon Numarası</label>
        <input type="tel" class="form-control" id="telefon" name="telefon"placeholder="Telefon numaranız">
      </div>
      <div class="form-group">
        <label for="mesaj">Mesajınız</label>
        <textarea class="form-control" id="mesaj" rows="5" name="mesaj"placeholder="Mesajınızı yazın"></textarea>
      </div>
      <button type="submit" name="gonder" class="btn btn-primary">Gönder</button>
    </form>
  </div>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<footer class="bg-dark text-light">
  <div class="bg-dark text-light text-center py-3">
    &copy; <?php $yil = date('Y'); echo $yil; ?> Site Adı. Tüm hakları saklıdır.
  </div>
</footer>
</body>
</html>


<?php 
 require_once("admin/ayarlar.php");

// POST verilerini almak ve SQL sorgusu oluşturmak
if (isset($_POST['gonder'])) {
    $ad = $_POST['adSoyad'];
    $email = $_POST['email'];
    $telefon = $_POST['telefon'];
    $mesaj = $_POST['mesaj'];

        // Verileri SQL'e ekleme
    $sql = "INSERT INTO iletisim_formu (ad, email, telefon, mesaj) VALUES ('$ad', '$email', '$telefon', '$mesaj')";

    if ($conn->query($sql) === TRUE) {
        echo "Veriler başarıyla kaydedildi.";
    } else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }
}

// Veritabanı bağlantısını kapatma
$conn->close();







 ?>
