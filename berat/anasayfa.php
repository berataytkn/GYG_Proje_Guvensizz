<!-- anasayfa.php -->
<?php
session_start();
require __DIR__ . '/session_functions.php';

$conn = mysqli_connect("localhost", "root", "abc123", "user_management");
include 'auth.php';
requireAuth();

$username = $_SESSION['user_role'];
if (!isset($_SESSION['username'])) {
    header("Location: giris.php");
    exit();
}

$username = $_SESSION['username'];
$yas = $_SESSION["yas"];
$meslek = $_SESSION["meslek"];
$hobiler = $_SESSION["hobiler"];
$email = $_SESSION["email"];

if (!checkSessionTimeout()) {
    header('Location: giris.php');
    exit();
}

// Oturum süresini hesaplayalım
$login_time = $_SESSION['login_time'];
$current_time = time();
$session_duration = $current_time - $login_time;

$hours = floor($session_duration / 3600);
$minutes = floor(($session_duration % 3600) / 60);
$seconds = $session_duration % 60;
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Ana Sayfa</title>
    <style>
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: #e0e7ea; /* Light grey-blue background */
    margin: 0;
    color: #333;
    position: relative;
}

header {
    background-color: #007acc; /* Deep blue */
    color: white;
    padding: 20px;
    text-align: center;
    position: relative;
}

header .session-duration {
    position: absolute;
    top: 20px;
    right: 20px;
    background-color: #005f99;
    padding: 5px 10px;
    border-radius: 5px;
}

nav ul {
    background-color: #005f99; /* Darker blue */
    list-style-type: none;
    padding: 10px;
    text-align: center;
    margin: 0;
}

nav ul li {
    display: inline;
    margin: 0 15px;
}

nav ul li a {
    text-decoration: none;
    color: white;
    font-weight: bold;
    transition: color 0.3s, border-bottom 0.3s;
    border-bottom: 2px solid transparent;
}

nav ul li a:hover {
    color: #66a3ff; /* Lighter blue */
    border-bottom: 2px solid #66a3ff;
}

main {
    padding: 20px;
    display: flex;
    justify-content: center;
}

main section {
    margin-bottom: 20px;
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    width: 80%;
    max-width: 600px;
}

footer {
    background-color: #007acc;
    color: white;
    text-align: center;
    padding: 10px;
    position: fixed;
    width: 100%;
    bottom: 0;
}

.profile-image {
    border-radius: 50%;
    width: 150px;
    height: 150px;
    object-fit: cover;
    margin-bottom: 20px;
}

.profile-info, .contact-info {
    text-align: left;
}

.content-wrapper {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.profile-info p, .contact-info p {
    margin: 5px 0;
}
    </style>
</head>
<body>
    <header>
        <h1>Hoşgeldiniz, <?php echo isset($_GET['username']) ? $_GET['username'] : $username; ?></h1>
        <div class="session-duration">
            <p>Oturum Süresi: <?php echo sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds); ?></p>
        </div>
    </header>
    <nav>
        <ul>
            <li><a href="anasayfa.php">Ana Sayfa</a></li>
            <!--<li><a href="yöneticisayfasi.php">Yönetici sayfası</a></li> -->
            <li><a href="editor.php">Editor</a></li> 
            <li><a href="admin.php">Admin</a></li> 
            <li><a href="urunler.php">Çiçek Ekle</a></li>
            <li><a href="yapaycicek.php">Yapay Çiçek</a></li>
            <li><a href="saldırı.php">Canlı Çiçekler</a></li>
            <li><a href="ajax_search.php">Ürün Ara</a></li>
            <li><a href="contact.php">İletişim</a></li>
            <li><a href="şikayet.php">Şikayet</a></li>                                
            <li><a href="cikis.php">Çıkış Yap</a></li>
        </ul>
    </nav>
    <main>
        <div class="content-wrapper">
            <section>
                <h2>Profilim</h2>
                <img src="profil_resmi.jpg" alt="Profil Resmi" class="profile-image">
                <div class="profile-info">
                    <p><strong>Ad:</strong> <?php echo $username; ?></p>
                    <p><strong>Yaş:</strong> <?php echo $yas; ?></p>
                    <p><strong>Meslek:</strong> <?php echo $meslek; ?></p>
                    <p><strong>Hobiler:</strong> <?php echo $hobiler; ?></p>
                </div>
            </section>
            <section>
                <h2>Hakkımda</h2>
                <p>Merhaba Ben <?php echo $username; ?>. Bilişim güvenliği öğrencisiyim. 
                Yazılım alanında öğrenmeye meraklıyım. Boş zamanlarımda yeni diller öğrenmeye çalışıyorum.</p>
            </section>

            
        </div>
    </main>
    <footer>
        <p>2024 Berat Türkiye</p>
    </footer>
</body>
</html>
