<html>
<head>
  <title>Kargo Fiyat Hesaplama</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 <link rel="stylesheet" href="admin/css/style1.css" />
  <script type="admin/js/js1.js"></script>
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
  <div class="container">
    <div class="row centered">
      <div class="col-md-6">
        <h1>Kargo Fiyat Hesaplama</h1>
        <form action="index.php" name="hesapla" method="POST">
          <div class="form-group">
            <label for="length">En(cm):</label>
            <input type="number" class="form-control" name="length" id="length" required>
          </div>
          <div class="form-group">
            <label for="width">Boy(cm):</label>
            <input type="number" class="form-control" name="width" id="width" required>
          </div>
          <div class="form-group">
            <label for="height">Yükseklik(cm):</label>
            <input type="number" class="form-control" name="height" id="height" required>
          </div>
          <div class="form-group">
            <label for="weight">Ağırlık(kg):</label>
            <input type="number" class="form-control" name="weight" id="weight" required>
          </div>
          <button type="submit" name="hesapla" value="hesapla1" class="btn btn-primary">Hesapla</button>
        </form>
      </div>
      <div class="col-md-6">
        <div id="result" class="text-center">
          <h2 class="mb-4">Kargo Fiyatları</h2> <!-- Updated heading -->
          <div id="prices">
            <?php
            require_once("admin/ayarlar.php");

            // Forumdan gelen verileri alın
            //burda görsellik açısından eğer veri girilmemişse 0 desi olacak şekilde değişkenler atadık eğer hesaplaya basılırsa if çalışıcak ve değişkenlerimiz formun içindeki değerleri alıcak

            if (isset($_POST['hesapla'])){
                $length = $_POST["length"];
                $width = $_POST["width"];
                $height = $_POST["height"];
              }
              else {
                $length=10;
                $width=10;
                $height=10;
              }

            // Desi değerini hesapla
            $desidegeri = intval(($length * $width * $height) / 3000);
            
          

            /// Forumdan gelen desi değeri ile eşleşen kargo firmalarını al
            $sql = "SELECT * FROM kargo_firmalari WHERE desi = " . $desidegeri;
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Sonuçları ekrana yazdır
                while ($row = $result->fetch_assoc()) {
                    $desi = $row["desi"];
                    $UPS = $row["UPS"];
                    $PTT = $row["PTT"];
                    $Surat = $row["Sürat"];
                    $MNG = $row["MNG"];
                    $Yurtici = $row["Yurtiçi"];
                    $Aras = $row["Aras"];
                    echo ("$desidegeri"." "."Desi için fiyatlar liselenmiştir");
                    
                    // Display the cargo company logos and prices
              echo '<div class="logo-container">';
              echo '<div>';
              echo '<img src="img/ups.jpg" class="company-logo" alt="Company 1">';
              echo '<div class="price-box">' . $UPS .'₺ +KDV'. '</div>';
              echo '</div>';

              echo '<div>';
              echo '<img src="img/ptt.jpg" class="company-logo" alt="Company 2">';
              echo '<div class="price-box">' . $PTT .'₺ +KDV'.'</div>';
              echo '</div>';
              echo '</div>';

              echo '<div class="logo-container">';
              echo '<div>';
              echo '<img src="img/sürat.jpg" class="company-logo" alt="Company 3">';
              echo '<div class="price-box">' . $Surat .'₺ +KDV'.'</div>';
              echo '</div>';

              echo '<div>';
              echo '<img src="img/mng.jpg" class="company-logo" alt="Company 4">';
              echo '<div class="price-box">' . $MNG .'₺ +KDV'.'</div>';
              echo '</div>';
              echo '</div>';

              echo '<div class="logo-container">';
              echo '<div>';
              echo '<img src="img/yurtici.jpg" class="company-logo" alt="Company 5">';
              echo '<div class="price-box">' . $Yurtici .'₺ +KDV'.'</div>';
              echo '</div>';

              echo '<div>';
              echo '<img src="img/aras.jpg" class="company-logo" alt="Company 6">';
              echo '<div class="price-box">' . $Aras .'₺ +KDV'.'</div>';
              echo '</div>';
              echo '</div>';
                }
            } else {
                echo " "."HATA!"."Veritabanında ilgili desi değerine sahip fiyat bulunamadı(0-25 Desi arası desteklenmektedir)";
            }

            // Veritabanı bağlantısını kapat
            $conn->close();
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

<footer class="bg-dark text-light">
  <div class="bg-dark text-light text-center py-3">
    &copy; <?php $yil = date('Y'); echo $yil; ?> Site Adı. Tüm hakları saklıdır.
  </div>
</footer>

</html>
