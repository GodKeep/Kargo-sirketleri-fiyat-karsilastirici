<?php
require_once("ayarlar.php");
  session_start();
            if (isset($_SESSION['username'])) {
                header("Location: index.php");
                exit();
            }

    // POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Kullanıcı doğrulama
        $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            // Giriş başarılı
            $_SESSION['username']=$username;
            echo "Giriş başarılı.";
            header("location:index.php");
        } else {
            // Giriş başarısız
            echo "Geçersiz kullanıcı adı veya parola.";
        }
    }

    $conn->close();
    ?>


<!DOCTYPE html>
<html>
<head>
    <title>Giriş</title>
    <style>
        body {
            font-family: Anton, sans-serif;
            background-image: url("https://images.unsplash.com/photo-1585713181935-d5f622cc2415?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2071&q=80");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            max-width: 400px;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #666;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2> Giriş </h2>
        <form method="POST" action="giris.php">
            <label for="username">Kullanıcı Adı:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Parola:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Giriş Yap">
        </form>
    </div>
</body>
</html>
