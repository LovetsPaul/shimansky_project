<?php

session_start();
session_destroy();
header('location: http://www.shimansky.by');
exit();

?>