<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Reader</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Upload and View PDF</h1>
        
       
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="pdfFile" accept="application/pdf" required>
            <button type="submit" name="upload">Upload PDF</button>
        </form>

     
        <?php if (isset($_GET['file'])): ?>
            <h2>Uploaded PDF:</h2>
            <iframe src="pdf-viewer.php?file=<?php echo $_GET['file']; ?>" width="100%" height="600px"></iframe>
        <?php endif; ?>
    </div>
</body>
</html>
