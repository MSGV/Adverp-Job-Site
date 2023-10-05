<?php

// Prikupljanje podataka iz forme
$email = $_POST['email'];
$sifra = $_POST['sifra'];

// Povezivanje sa bazom podataka
$conn = new mysqli("localhost", "root", "" , "linkedin");

// Provera da li je uspostavljena veza sa bazom podataka
if ($conn->connect_error) {
    die("Greška pri povezivanju sa bazom podataka: " . $conn->connect_error);
}

// Provera validnosti login podataka
$stmt = $conn->prepare (" select * from users where email= ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt_result = $stmt->get_result();


if ($stmt_result->num_rows > 0) {
    $data = $stmt_result->fetch_assoc();
    if($data['sifra']===$sifra){
        // Uspešna prijava
       header("location:Index.html");
    }
    else{
        // Neuspešna prijava
        echo"<h2>Neispravna email adresa ili lozinka.</h2>";
    }
    
}

// Zatvaranje veze sa bazom podataka
$conn->close();
?>