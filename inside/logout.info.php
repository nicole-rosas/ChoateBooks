<?php 
session_start();
session_unset(); #deletes the sessions with the info
session_destroy();
header("Location: ../login.php") #sent back home
?>