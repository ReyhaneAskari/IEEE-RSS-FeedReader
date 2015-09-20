<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php
//    echo"HEOLOOOOO";
session_start();
setcookie("userName", "", -1);
setcookie("tableName", "", -1);


//setcookie("name", "", time()-3600);
unset($_SESSION["login"]);
//$_SESSION["login"] = false;
//session_destroy();
//setcookie("PHPSESSID", "11", 11);
    header('Location: /RSS');


?>


<head>
</head>
<body>

</body>