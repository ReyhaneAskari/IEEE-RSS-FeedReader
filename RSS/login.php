<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php
/*function login($username,$password)*/
{
$name = $_REQUEST["userName"]; $pass = $_REQUEST["password"];

 /*   $name = $username;
    $pass = $password;*/
    $remmeber = $_REQUEST["rememberME"];


    if((strlen($name) > 0) && (strlen($pass) > 0)){


    $db = mysql_connect("127.0.0.1", "root", "12345") or die(mysql_error());
    mysql_select_db("register", $db) or die(mysql_error());
    $result = mysql_query("SELECT password FROM users
                           WHERE name = '$name' ;", $db) or
    die(mysql_error());
    $row = mysql_fetch_array($result);
    if($row["password"] == $pass){
        session_start();
        $_SESSION["login"] = true;
        header('Location: /RSS/main.php');
        if ($remmeber){
            $expire = time()+30*24*60*60;
            setcookie("userName", $name, $expire);
        }
        $expire = time()+30*24*60*60;
        setcookie("tableName", $name, $expire);


        $request = mysql_query("SELECT url FROM ".$name.";", $db) or
        die(mysql_error());
        while($rows = mysql_fetch_array($request)){
            $loc = $rows["url"];
            $file= file_get_contents($loc);
            $matches=substr($loc, -9);
            $r= file_put_contents("$matches", $file);
        }

    }
    else echo "wrong username or password";

    mysql_close($db);
}

else{
    echo "Wrong Input";
}


}
?>

<head>
</head>
<body>

</body>