<?php

if (isset($_GET['file'])) {
    $file = 'uploads/' . basename($_GET['file']);
    if (file_exists($file)) {
        // Output the PDF.js viewer
        echo '<html><head><title>PDF Viewer</title></head><body>';
        echo '<div class="pdf-viewer">';
        echo '<iframe src="js/web/viewer.html?file=../' . $file . '" width="100%" height="600px"></iframe>';
        echo '</div></body></html>';
    } else {
        echo "File not found.";
    }
} else {
    echo "No file specified.";
}
?>
