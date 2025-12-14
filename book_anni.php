<?php
$id = isset($_GET['id']) ? $_GET['id'] : '';
header("HTTP/1.1 301 Moved Permanently");
header("Location: book_Google.php" . ($id ? "?id=" . urlencode($id) : ""));
exit();
?>


