<?php
session_start();
    unset($_SESSION['$logSESS']);
    if( isset($_SESSION['access']) ) unset($_SESSION['access']);

session_destroy();
header('location: http://shimanskiy.by');

exit();

?>