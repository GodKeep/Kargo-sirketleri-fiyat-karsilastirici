<?php
session_start();

// Oturumu kapat
session_destroy();

// Ana sayfaya yönlendir
header("Location: giris.php");
exit();
?>
