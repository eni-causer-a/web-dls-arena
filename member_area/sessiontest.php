<?php
session_start();
$_SESSION['connect']="true";
header('Location: index.php');
exit();
?>
