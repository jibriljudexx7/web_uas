<?php
$host = getenv('DATABASE_HOST') ?: 'db';
$user = getenv('DATABASE_USER') ?: 'root';
$pass = getenv('DATABASE_PASSWORD') ?: 'rootpassword';
$dbname = getenv('DATABASE_NAME') ?: 'uas_db';

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name']) && isset($_POST['message'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $message = $conn->real_escape_string($_POST['message']);
    $sql = "INSERT INTO guestbook (name, message) VALUES ('$name', '$message')";
    $conn->query($sql);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Dinamis - Buku Tamu UAS</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f4f9; color: #333; margin: 0; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        h1 { color: #0056b3; text-align: center; }
        form { display: flex; flex-direction: column; gap: 10px; margin-bottom: 20px; }
        input, textarea, button { padding: 10px; font-size: 16px; border: 1px solid #ccc; border-radius: 4px; }
        button { background-color: #0056b3; color: white; border: none; cursor: pointer; transition: background 0.3s; }
        button:hover { background-color: #004494; }
        .message-board { display: flex; flex-direction: column; gap: 15px; }
        .message-card { background: #e9ecef; padding: 15px; border-radius: 6px; border-left: 4px solid #0056b3; }
        .message-card strong { color: #0056b3; }
        .date { font-size: 12px; color: #6c757d; display: block; margin-top: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Buku Tamu (Web Dinamis)</h1>
        
        <form method="POST">
            <input type="text" name="name" placeholder="Nama Anda" required>
            <textarea name="message" placeholder="Pesan Anda" rows="4" required></textarea>
            <button type="submit">Kirim Pesan</button>
        </form>

        <div class="message-board">
            <?php
            $result = $conn->query("SELECT * FROM guestbook ORDER BY created_at DESC");
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='message-card'>";
                    echo "<strong>" . htmlspecialchars($row['name']) . "</strong>";
                    echo "<p>" . nl2br(htmlspecialchars($row['message'])) . "</p>";
                    echo "<span class='date'>" . $row['created_at'] . "</span>";
                    echo "</div>";
                }
            } else {
                echo "<p style='text-align:center; color:#6c757d;'>Belum ada pesan. Jadilah yang pertama!</p>";
            }
            $conn->close();
            ?>
        </div>
    </div>
</body>
</html>
