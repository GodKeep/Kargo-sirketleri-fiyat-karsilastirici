<?php
// Veritabanı bağlantısı için gerekli bilgiler
$servername = "localhost";
$username = "root";
$password = "";
$database = "kargo";

// Veritabanı bağlantısı oluşturma
$conn = new mysqli($servername, $username, $password, $database);

// Bağlantıyı kontrol etme
if ($conn->connect_error) {
    die("Veritabanına bağlanılamadı: " . $conn->connect_error);
}


// Veritabanı bağlantısını kapatma
//$conn->close();
?>