<?php
session_start();
session_destroy();
header('Location: http://localhost/cpainel/Index.php');
exit();
?>
