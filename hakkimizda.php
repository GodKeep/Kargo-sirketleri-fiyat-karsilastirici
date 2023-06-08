<!DOCTYPE html>
<html lang="en">
 <link rel="stylesheet" href="admin/css/style1.css" />
  <script type="admin/js/js1.js"></script>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <title>Hakkımızda</title>
</head>
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
<body>
  <div class="container mt-5">
    <h1>Hakkımızda</h1>
    <p>Günümüzde  yoğun iş tempolarından dolayı işlerimizi en kolay şekilde tamamlamaya 
                çalışıyoruz. o yüzden kargo firmalarına gitmeden , zamandan tasarruf ederek elimizdeki 
                ürünün bilgilerine göre en uygun kargo firmasını seçebilirsiniz.
               </p>
  </div>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

<footer class="bg-dark text-light">
  <div class="bg-dark text-light text-center py-3">
    &copy; <?php $yil = date('Y'); echo $yil; ?> Site Adı. Tüm hakları saklıdır.
  </div>
</footer>
</html>
