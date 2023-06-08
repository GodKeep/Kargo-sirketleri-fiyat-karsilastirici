<?php
require_once("ayarlar.php");

class Kargo {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // İletişim mesajını silme
    public function mesajSil($mesajID) {
        $sql = "DELETE FROM iletisim_formu WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $mesajID);

        // Sorguyu çalıştır
        $stmt->execute();

        return true;
    }

    // Kargo firmalarını getirme
    public function kargoFirmalariGetir() {
        // Verileri çekme
        $sql = "SELECT * FROM kargo_firmalari";
        $result = $this->conn->query($sql);

        $kargoFirmalari = array();

        // Verileri diziye ekleme
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $kargoFirmalari[] = $row;
            }
        }


        return $kargoFirmalari;
    }

       // Kargo fiyatlarını güncelle
        public function kargoFiyatlariGuncelle($fiyatlar) {
            $stmt = $this->conn->prepare("UPDATE kargo_firmalari SET UPS = ?, PTT = ?, Sürat = ?, MNG = ?, Yurtiçi = ?, Aras = ? WHERE desi = ?");
            
            foreach ($fiyatlar as $desi => $fiyat) {
                $stmt->bind_param("iiiiiii", $fiyat['UPS'], $fiyat['PTT'], $fiyat['Sürat'], $fiyat['MNG'], $fiyat['Yurtiçi'], $fiyat['Aras'], $desi);
                $stmt->execute();
    }
}

    // İletişim formlarını çekme
    public static function iletisimCek($conn) {
        $query = "SELECT * FROM iletisim_formu ORDER BY id DESC";
        $result = $conn->query($query);

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Diğer hesaplamaların fonksiyonlarını buraya ekleyebilirsiniz
}
?>
