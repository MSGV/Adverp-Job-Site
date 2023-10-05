<?php
// Povezivanje sa bazom podataka
    $content = $_POST['content'];
    

$conn = new mysqli('localhost', 'root', '' , 'linkedin');

// Provera da li je uspostavljena veza sa bazom podataka
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if ($conn->connect_error) {
    die("Greška pri povezivanju sa bazom podataka: " . $conn->connect_error);
}
else{
    $stmt = $conn->prepare("insert into posts (userid, content, image, date) values (4, ?, null, CURDATE())");
    $stmt ->bind_param("s",$content);
    $stmt ->execute();
echo "Uspešna objava posta.";
$stmt->close();
header("location:Index.html");
$conn->close();
    }
}
?>
