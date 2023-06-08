<?php
require_once('functions.php');

session_start();

// Oturum kontrolü
if (!isset($_SESSION['username'])) {
    header("Location: giris.php");
    exit();
}

$kargo = New Kargo($conn);

// İletişim formunu çekin
$iletisimFormlari = $kargo->iletisimCek($conn);

// yukarıdaki gibi komutları fonksiyonlarımızı çağırmak için kullandık örnek: -satır 116- $kargoFirmalari = $kargo->kargoFirmalariGetir();

//mesaj sil
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["mesajID"])) {
        $mesajID = $_POST["mesajID"];
        $kargo->mesajSil($mesajID);
        header("location:index.php");
         }
       }  
    // desi fiyat güncelle
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Guncelle'])) {
        $fiyatlar = $_POST['fiyatlar'];
        $kargo->kargoFiyatlariGuncelle($fiyatlar);
        header("Location: index.php");
        exit();
}


?>

<!DOCTYPE html>
<html>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/style.css">
<script src="js/script.js"></script
<head>
    <title>Admin Paneli</title>
</head>
<body>
    <div class="navbar">
        <a href="#" onclick="showSection('iletisim-mesajlari')">İletişim Formları</a>
        <a href="#" onclick="showSection('kargo-firmalari')">Fiyatlar</a>
        <a href="cikis.php" class="logout-button">Oturumu Kapat</a>
    </div>

   <div class="yetkili-panel">
  <div align="center"><h1>Yetkili Panelı</h1></div>
  </div>

    <div id="iletisim-mesajlari"  class="section">
          <div align="center"><h2>Mesaj Kutusu</h2></div> 
        <table>
            <tr>
                <th>ID</th>
                <th>Ad</th>
                <th>Email</th>
                <th>Telefon</th>
                <th>Mesaj</th>
                <th>Tarih</th>
                <th></th>
                <th></th>
            </tr>
            <?php if (!empty($iletisimFormlari)): ?>
                <?php foreach ($iletisimFormlari as $message): ?>
                    <tr>
                        <td><?php echo $message['id']; ?></td>
                        <td><?php echo $message['ad']; ?></td>
                        <td><?php echo $message['email']; ?></td>
                        <td><?php echo $message['telefon']; ?></td>
                        <td><?php echo $message['mesaj']; ?></td>
                        <td><?php echo $message['tarih']; ?></td>
                        <td>
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                <input type="hidden" name="mesajID" value="<?php echo $message['id']; ?>">
                                <button class="delete-button" type="submit">Sil</button>
                            </form>
                        </td>
                        <td>
                            <button class="whatsapp-button" onclick="openWhatsApp('<?php echo $message['telefon']; ?>')">WhatsApp</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="9">Mesaj bulunamadı.</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>

    <div id="kargo-firmalari" class="section">
        <h2>Kargo Firmaları ve Desi Başına Fiyatları</h2>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <table>
                <tr>
                    <th>Desi</th>
                    <th>UPS</th>
                    <th>PTT</th>
                    <th>Sürat</th>
                    <th>MNG</th>
                    <th>Yurtiçi</th>
                    <th>Aras</th>
                </tr>
                <?php
                // Kargo firmalarını ve fiyatlarını veritabanından al
                    $kargoFirmalari = $kargo->kargoFirmalariGetir();
                    if (!empty($kargoFirmalari)) {
                        foreach ($kargoFirmalari as $kargoFirma) {
                            $desi = $kargoFirma['desi'];
                            $UPS = $kargoFirma['UPS'];
                            $PTT = $kargoFirma['PTT'];
                            $Sürat = $kargoFirma['Sürat'];
                            $MNG = $kargoFirma['MNG'];
                            $Yurtiçi = $kargoFirma['Yurtiçi'];
                            $Aras = $kargoFirma['Aras'];
                            ?>
                            <tr>
                            <td><?php echo $desi; ?></td>
                            <td><input type="text" name="fiyatlar[<?php echo $desi; ?>][UPS]" value="<?php echo $UPS; ?>"></td>
                            <td><input type="text" name="fiyatlar[<?php echo $desi; ?>][PTT]" value="<?php echo $PTT; ?>"></td>
                            <td><input type="text" name="fiyatlar[<?php echo $desi; ?>][Sürat]" value="<?php echo $Sürat; ?>"></td>
                            <td><input type="text" name="fiyatlar[<?php echo $desi; ?>][MNG]" value="<?php echo $MNG; ?>"></td>
                            <td><input type="text" name="fiyatlar[<?php echo $desi; ?>][Yurtiçi]" value="<?php echo $Yurtiçi; ?>"></td>
                            <td><input type="text" name="fiyatlar[<?php echo $desi; ?>][Aras]" value="<?php echo $Aras; ?>"></td>
                        </tr>

                            <?php
                        }
                    }
                ?>
            </table>
            <br>
            <input class="update-button" type="submit" name="Guncelle" value="Güncelle">
        </form>
    </div>
</body>
</html>
