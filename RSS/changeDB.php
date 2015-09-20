<?php
/**
 * Created by PhpStorm.
 * User: MsB
 * Date: 1/2/14
 * Time: 3:50 AM
 */
//function insert(){
//alert("heeeeeeeeeeere");
$db = mysql_connect("127.0.0.1", "root", "12345") or die(mysql_error());
mysql_select_db("register", $db) or die(mysql_error());
$tableName = $_COOKIE["tableName"];
$key = array_keys($_REQUEST);
if  (strcmp($key[1],"add")==0){

        $result = mysql_query("INSERT INTO $tableName(url)
        VALUES('".$_REQUEST['text']."');", $db) or
        die(mysql_error());

        mysql_query("INSERT INTO articles(url,adr)
        VALUES('".$_REQUEST['text']."','address');", $db) or
        die(mysql_error());

        $loc = $_REQUEST['text'];
        $file= file_get_contents($loc);
        $matches=substr($loc, -9);
        $r= file_put_contents("$matches", $file);


}
else if (strcmp($key[1],"remove")==0){
    $result = mysql_query("DELETE FROM $tableName
    WHERE URL = '".$_REQUEST['text']."';", $db) or
    die(mysql_error());

}
else if (strcmp($key[1],"refresh")==0){
    $loc = $_REQUEST['text'];
    $file= file_get_contents($loc);
    $matches=substr($loc, -9);
    $r= file_put_contents("$matches", $file);
}

header('Location: /RSS/main.php');

mysql_close($db);

?>