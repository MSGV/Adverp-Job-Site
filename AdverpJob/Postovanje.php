<?php
// Povezivanje sa bazom podataka
$conn = new mysqli('localhost', 'root', '', 'linkedin');

// Provera da li je uspostavljena veza sa bazom podataka
if ($conn->connect_error) {
    die("Greška pri povezivanju sa bazom podataka: " . $conn->connect_error);
}

// Provera da li je zahtev poslat metodom POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $postContent = $_POST['postContent'];
    $image = $_POST['image'];

    // Validacija polja
    if (empty($postContent)) {
        echo "Polje za post ne sme biti prazno.";
        exit;
    }

    // Unos posta u bazu podataka
    $stmt = $conn->prepare("INSERT INTO posts (post, image) VALUES (?, ?)");
    $stmt->bind_param("ss", $postContent, $image);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Post je uspešno ubačen u bazu podataka.";
    } else {
        echo "Došlo je do greške prilikom ubacivanja posta u bazu podataka.";
    }

    $stmt->close();
}

$conn->close();
?>

<?php

class Post
{
    private $error = "";
    public function create_post($data)
    {
        if(!empty($data['post']))
        {

        }
        else{
            $this->error .= "Post can't be empty!";

        }
        return $this->error;
    }

}
?>
