<?php
session_start();
session_unset();
session_destroy();
header('Location: /PPE2/frontend/login.php');
exit();
?>