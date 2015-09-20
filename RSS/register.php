<?php

    $name = $_REQUEST["userName"]; $pass = $_REQUEST["password"];

    if((strlen($name) > 0) && (strlen($pass) > 0)){

        $db = mysql_connect("127.0.0.1", "root", "12345") or die(mysql_error());
        mysql_select_db("register", $db) or die(mysql_error());
        $result = mysql_query("INSERT INTO users(name,password)
                               VALUES('$name', '$pass');", $db) or
        die(mysql_error());

        mysql_query("create table ".$name." (url varchar(100),primary key (url));", $db);
        mysql_close($db);
    }
    else{
        echo "Wrong Input";
    }

?>