<?php

$conn = new mysqli('localhost', 'root', '', 'linkedin');

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch articles from the database
$sql = "SELECT * FROM posts JOIN users on posts.userid = users.id ORDER BY Date DESC LIMIT 10;";
$result = $conn->query($sql);

$articles = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $article = array(
            'ime' => $row['ime'],
            'prezime' => $row['prezime'],
            'content' => $row['content'],
            'date' => $row['date']
        );
        $articles[] = $article;
    }
}

// Close the connection
$conn->close();

// Send the JSON response
header('Content-Type: application/json');
echo json_encode($articles);
?>