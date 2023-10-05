<?php
$targetDirectory = 'images/';
$targetFile = $targetDirectory . 'picture.jpeg'; /*Slika mora biti JPEG formata!*/ 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploadedFile = $_FILES['photo'];

    // Check if the uploaded file has no errors
    if ($uploadedFile['error'] === UPLOAD_ERR_OK) {
        // Move the uploaded file to replace the existing "picture.png" file
        if (move_uploaded_file($uploadedFile['tmp_name'], $targetFile)) {
            echo "Photo has been uploaded and replaced successfully.";
        } else {
            echo "Error occurred while uploading the photo.";
        }
    } else {
        echo "Error occurred during photo upload: " . $uploadedFile['error'];
    }
}
?>