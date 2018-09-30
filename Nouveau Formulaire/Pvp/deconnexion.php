<?php
session_start();
$_SESSION = array();
session_destroy();
sleep(3);
header("Location: ../../index.php");
?>
