<?php
// Povezivanje sa bazom podataka

$conn = new mysqli('localhost', 'root', '', 'linkedin');

// Provera da li je uspostavljena veza sa bazom podataka
if ($conn->connect_error) {
    die("Greška pri povezivanju sa bazom podataka: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_POST['ID'];
    $newime = $_POST['ime'];
    $newprezime = $_POST['prezime'];
    $newemail = $_POST['email'];
    $newsifra = $_POST['sifra'];

    // Izvršite validaciju novog email-a koji je korisnik poslao
    // Izvršite dodatne provere i validaciju email adrese

    // Ažurirajte informacije o korisniku u bazi podataka
    $updateQuery = "UPDATE users SET ime = '$newime', prezime = '$newprezime', email = '$newemail', sifra ='$newsifra' WHERE ID = $userId";
    if ($conn->query($updateQuery) === TRUE) {
        echo "Email adresa i šifra su uspešno izmenjeni.";
    } else {
        echo "Greška prilikom izmene email adrese i šifre: " . $conn->error;
    }
}

$conn->close();
?>