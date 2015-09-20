<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php

/*if (!isset($_SESSION["login"])){
    setcookie("userName", "", -1);
}*/
//ini_set();
session_start();
if (isset($_SESSION["login"])){
    header('Location: /RSS/main.php');
}
if(isset($_COOKIE["userName"])){
    session_start();
//
    $_SESSION["login"] = true;
    header('Location: /RSS/main.php');
}
//

?>

<head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <title> RSS </title>
    <link rel="stylesheet" href="style.css" />
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="script.js"></script>
</head>
<body onload="readCookie()">
<div class="container">
<!-- <form action="register.php" method="post">
    User Name: <input type="text" name="userName"/> <br />
    Password : <input type="password" name="password"><br />
    <input type="submit" value="register"/> <br/>
</form>

 -->

 <div class="row">
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <div class="col-md-offset-1 col-md-4">
            <div class="jumbotron">
                <form class="form-signin" action="register.php" method="post">
                     <h2 class="form-signin-heading">Register</h2>
                     <br/>                 
                     <label for="inputEmail" class="sr-only">User Name</label>
                     <input type="Text" id="inputEmail" name="userName" class="form-control" placeholder="UserName" required autofocus>
                     <label for="inputPassword" class="sr-only">Password</label>
                     <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                     <br/>                                                 
                     <button class="btn btn-lg btn-primary btn-block" type="submit" >Register</button>
                 </form>
            </div>     
        </div>
        <div class="col-md-offset-1 col-md-4">
            <div class="jumbotron">
                <form class="form-signin" action="login.php" method="post">
                <h2 class="form-signin-heading">Sign in</h2>
                <label for="inputEmail" class="sr-only">User Name</label>
                <input type="Text" id="inputEmail" name="userName" class="form-control" placeholder="UserName" required autofocus>
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value="rememberME"> Remember me
                  </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
              </form>
            </div>
        </div>
    </div>

</div>

</body>
</html>