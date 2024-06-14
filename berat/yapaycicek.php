

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yapay Çiçekler</title>
   <style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    margin: 0;
    padding: 0;
}

.container {
    width: 80%;
    max-width: 1200px;
    margin: auto;
    padding: 20px;
}

.flower-list {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
}

.flower {
    background-color: #fff;
    padding: 15px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.flower img {
    width: 100%;
    border-radius: 5px;
}

h1 {
    text-align: center;
    margin-bottom: 20px;
}

h2 {
    margin-top: 10px;
}

p {
    margin: 5px 0;
}

    </style>
</head>
<body>
    <div class="container">
        <h1>Yapay Çiçek Mağazası</h1>
      
    </div>
</body>
</html>
<?php
session_start();
$conn = mysqli_connect("localhost", "root", "abc123", "user_management");
// Çiçekleri veritabanından getir
$sql = "SELECT * FROM cicekler";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<div class="flower">';
        
        echo '<h2>' . $row["isim"] . '</h2>';
        echo '<p>Fiyat: ' . $row["fiyat"] . ' TL</p>';
        echo '<p>Renk: ' . $row["renk"] . '</p>';
        echo '</div>';
    }
} else {
    echo "Maalesef çiçek bulunamadı.";
}
$conn->close();
?>
