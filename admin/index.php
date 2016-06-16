<?php
include('config.php');
include(PATH_INCLUDES . 'connect.php');
include(PATH_INCLUDES . 'functions.php');

session_start();

if (isset ($_GET['loginDB'])) {$loginDB = $_GET['loginDB'];unset($loginDB);}
if (isset ($_GET['passDB'])) {$passDB = $_GET['passDB'];unset($passDB);}

if (isset ($_POST['loginDB'])) {$loginDB = $_POST['loginDB'];}
if (isset ($_POST['passDB'])) {$passDB = $_POST['passDB'];}

if(isset($loginDB) AND isset($passDB))
{   
    if(preg_match("/^[a-zA-Z0-9_-]+$/s",$loginDB) AND preg_match("/^[a-zA-Z0-9]+$/s",$passDB))
    {
        $salt = "shiman";
        $passDB = md5($salt . md5($passDB));
        
        $resultlp = mysql_query("SELECT login,pass FROM admin WHERE login='$loginDB'");
        $log_and_pass = mysql_fetch_array($resultlp);
        
        if($log_and_pass != "")
        {
            if($loginDB == $log_and_pass[0] AND $passDB == $log_and_pass[1])
            {

                $_SESSION['$logSESS'] = $log_and_pass[0];
                header("location: /admin/admin.php");   
            }
        }
    }
}


if(isset($_SESSION['$logSESS'])){
    header('Location: /admin/admin.php');
}else{

    echo file_get_contents(PATH_TEMPLATE . 'auth.tpl');
}




?>