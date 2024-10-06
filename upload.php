<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['upload'])) {
    
    $target_dir = __DIR__ . "/uploads/";

    
    if (!is_dir($target_dir)) {
        if (!mkdir($target_dir, 0777, true)) {
            die("Failed to create uploads directory.");
        }
    }

    
    $file_name = basename($_FILES["pdfFile"]["name"]);
    $file_name = preg_replace("/[^a-zA-Z0-9_\-\.]/", "_", $file_name);

    $target_file = $target_dir . $file_name;

    // Check if the file is a PDF
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if ($fileType != "pdf") {
        echo "Only PDF files are allowed.";
    } else {
       
        if (move_uploaded_file($_FILES["pdfFile"]["tmp_name"], $target_file)) {
            header("Location: index.php?file=" . urlencode($file_name));
            exit();
        } else {
            echo "Error uploading file. Check permissions for uploads/ directory.";
            var_dump($_FILES['pdfFile']['error']);  // Display the upload error code
        }
    }
}
?>
