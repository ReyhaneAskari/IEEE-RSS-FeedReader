<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php /* session_start();
*/?>

<html xmlns="http://www.w3.org/1999/xhtml">
<?php
session_start();
if (!isset($_SESSION["login"])){
//    setcookie("userName", "", -1);
    header('Location: /RSS/');
}
?>

<?php
$db = mysql_connect("127.0.0.1", "root", "12345") or die(mysql_error());
mysql_select_db("register", $db) or die(mysql_error());
$tableName = $_COOKIE["tableName"];
$result = mysql_query("SELECT url FROM $tableName ;",$db ) or die(mysql_error());
$array = array();
$in = 0;

while($row = mysql_fetch_array($result))
{
    $array[] = $row["url"];
    $in = $in+1;
}
mysql_close($db);

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
    <script type="text/javascript">
        var names;
        function show(){
         names =
            <?php
            echo json_encode($array);
           ?>

            var grandParent = document.getElementsByName("IEEEform")[0];
            var parent =  document.getElementById("jlist");
            parent.innerHTML = "";
            for(var i in names){
                var newdiv = document.createElement("li");
                newdiv.setAttribute("id","journal");
                var newhref = document.createElement("a");
                newhref.setAttribute("href","#");
                newhref.setAttribute("onclick" , "showArticles('"+names[i]+"')");
                //            newhref.setAttribute("onclick" , "showArticles()");

                newhref.innerHTML = names[i];
                newdiv.appendChild(newhref);
                parent.appendChild(newdiv);
                grandParent.appendChild(parent);
                }
        }
        function showArticles(urlAdd){
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.open("POST","getPhp.php",false);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("url=" + urlAdd);
            response = xmlhttp.responseXML;
            var channel = response.documentElement;
            var title = channel.getElementsByTagName("title")[0].firstChild.nodeValue;
            var parent =  document.getElementById("journalTitle");
            parent.innerHTML = title;
            var articleList = document.getElementById("articleList");
            item = channel.getElementsByTagName("item");
            var list = new Array();
            var itemSize = (item.length);
            innerDiv=document.getElementById("innerDiv");
            innerDiv.innerHTML = "";
            for(var i=0;i<itemSize;i++){

                 auth  = item[i].getElementsByTagName("authors")[0].firstChild.nodeValue;
                 if (auth!= ""){

                 newdiv1 = document.createElement("div");
                 newdiv1.setAttribute("class","article");

                 item1 = document.createElement("a");
                 item1.setAttribute("class","ttl");
                 item1.setAttribute("href","#");
                 item1.setAttribute("style","text-align: left");
                 item1.innerHTML = item[i].getElementsByTagName("title")[0].firstChild.nodeValue;
                 newdiv1.appendChild(item1);


                 des   = item[i].getElementsByTagName("description")[0].firstChild.nodeValue;
                 date  = item[i].getElementsByTagName("pubDate")[0].firstChild.nodeValue;
                 vol   = item[i].getElementsByTagName("volume")[0].firstChild.nodeValue;
                 iss   = item[i].getElementsByTagName("issue")[0].firstChild.nodeValue;
                 start = item[i].getElementsByTagName("startPage")[0].firstChild.nodeValue;
                 end   = item[i].getElementsByTagName("endPage")[0].firstChild.nodeValue;
                 link  = item[i].getElementsByTagName("link")[0].firstChild.nodeValue;

                 content = document.createElement("div");
                 content.setAttribute("class","content");

                 div1 = document.createElement("div");
                 div1.innerHTML ="Publication Date: " +  date;

                 abs = document.createElement("div");
                 abs.innerHTML ="Abstract: " +  des;

                 volm = document.createElement("div");
                 volm.innerHTML ="volume: " +  vol;

                 issue = document.createElement("div");
                 issue.innerHTML ="issue: " +  iss;

                 sPage = document.createElement("div");
                 sPage.innerHTML ="start page: " + start;

                 ePage = document.createElement("div");
                 ePage.innerHTML ="end page: " + end;

                 authr = document.createElement("div");
                 authr.innerHTML ="authors: " + auth;

                 lnk = document.createElement("div");
                 lnk.innerHTML ="link: " ;
                 href = document.createElement("a");
                 href.setAttribute("href" , link);
                 href.innerHTML = link;
                 lnk.appendChild(href);


                 innerDiv.appendChild(newdiv1);

                 content.appendChild(div1);
                 content.appendChild(abs);
                 content.appendChild(volm);
                 content.appendChild(issue);
                 content.appendChild(sPage);
                 content.appendChild(ePage);
                 content.appendChild(authr);
                 content.appendChild(lnk);

                 newdiv1.appendChild(content);
                }
            }
            toggleAll();
            setEventHandlers();
        }
        function slide(des,auth,date,vol,iss,start,link){
            content = document.createElement("div");

            div1 = document.createElement("div");
            div1.innerHTML = des;
            content.appendChild(div1);

            abs=document.createElement("div");
            vol=document.createElement("div");
            issue=document.createElement("div");
            sPage=document.createElement("div");
            ePage=document.createElement("div");
            link=document.createElement("div");

            newdiv1.appendChild(content);
            alert(auth);
        }
        function setEventHandlers(){
            $("#articleList").children("#innerDiv").children(".article").children(".ttl").click( function(){
                    $(this).parent(this).children(".content").slideToggle(1500);
                }
            )
        }

        function toggleAll(){
            $("#articleList").children("#innerDiv").children(".article").children(".content").slideToggle(1);
        }
        function search(){

            var xmlhttp2=new XMLHttpRequest();

            xmlhttp2.open("POST","search.php",false);
            text  = document.getElementById("searchText").value;
            sel = document.getElementsByName("select");
            url2 = document.getElementById("addressValue").value;


            if (sel[0].checked)
                req = "abs";
            else if (sel[1].checked)
                req = "title";
            xmlhttp2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp2.send("search=" + text + "&field=" + req+"&url= "+url2 + "&names=" + names);


            response = xmlhttp2.responseText;
            alert(response);
        }
    </script>
</head>
<body onload="show()">
<nav class="navbar navbar-inverse" role="navigation">
    <div class="navbar-header">
        <a class="navbar-brand" href="#">RSS Feed Reader</a>
    </div>
    <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li>
               <form class="navbar-form navbar-right" role="search">
                   <div class="form-group">
                       <input type="text" class="form-control" placeholder="Search">
                   </div>
                   <button type="Find" class="btn btn-default" onclick="search()">Submit</button>
                   <input type="radio"  name="select" value="abs"/><span style="color:white">abstract<span/>
                   <input type="radio" name="select" value="title"/><span style="color:white">title<span/>
               </form> 
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="logout.php">logout</a>
            </li>
        </ul>        
    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col-md-5">
        <br/>
        <br/>
        <br/>
         <div class="jumbotron">
            <form class="form-inline" role="form" action="changeDB.php" method="get"  id="set">
                <div class="form-group">
                    <fieldset name="IEEEform" >
                    Address:
                        <input type="text" name="text" value="http://ieeexplore.ieee.org/rss/" size="35px" id="addressValue"/>
                        <br/>
                        <br/>
                        <input align = "center" type="submit" value="Add"  name="add" class="btn btn-default filter-col"/>
                        <input type="submit" align = "center" value="Remove"  name="remove" class="btn btn-default filter-col" />
                        <input type="submit" value="Refresh"  align = "center" name="refresh" class="btn btn-default filter-col"/>
                        <br/>
                        <br/>                    
                        <ul id="jlist"></ul>
                    </fieldset>
                </div>
            </form>
        </div>    
        </div>
        <div class="col-md-offset-1 col-md-6">
            <div id="articleList">
                <h2 id="journalTitle"></h2>
                <div id="innerDiv"></div>
            </div>
        </div>
    </div>    
</div>     
</body>
</html>