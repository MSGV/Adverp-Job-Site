<?php
// Povezivanje sa bazom podataka

$ime = $_POST['ime'];
$prezime = $_POST['prezime'];
$email = $_POST['email'];
$sifra = $_POST['sifra'];


$conn = new mysqli('localhost', 'root', '' , 'linkedin');

// Provera da li je uspostavljena veza sa bazom podataka
if ($conn->connect_error) {
    die("Greška pri povezivanju sa bazom podataka: " . $conn->connect_error);
}
else{
$stmt = $conn->prepare("insert into users (ime, prezime, email, sifra) values (?, ?, ?, ?)");
$stmt ->bind_param("ssss",$ime, $prezime, $email, $sifra);
$stmt ->execute();
echo "Uspešna registracija.";
$stmt->close();
header("location:Login.html");
$conn->close();
}
?>