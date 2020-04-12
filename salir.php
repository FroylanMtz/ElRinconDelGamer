<?php
session_start();
session_destroy();
session_unset();
session_abort();
echo '<script> window.location.href = "index.php"; </script>';
?>
