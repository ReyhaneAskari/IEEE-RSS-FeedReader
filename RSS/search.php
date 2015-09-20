<?php
$search = $_REQUEST['search'];
$field = $_REQUEST["field"];
$url = $_REQUEST['url'];
$names = $_REQUEST['names'];


//$url = "http://ieeexplore.ieee.org/rss/TOC49.XML";

$matches=substr($url, -9);

$file1 = file_get_contents($matches);
libxml_use_internal_errors(true);
$file = simplexml_load_file($file1);
$data = simplexml_load_string($file1);




if ($data){
    foreach($data->channel->item as $article){
        $title = $article->title;
        $description = $article->description;
//        echo ">>>>".$title."<<<<\n";
        if (strpos($field,"title") !== false)
        {
            if (strpos($title,$search) !== false) {
                echo "In:" . $title . "\n";
            }
           /* else{
                echo "not Found";

            }*/
        }
        if (strpos($field,"abs") !== false)
        {
            if (strpos($description,$search) !== false) {
                echo "In:" . $title . "\n";
            }
           /* else{
                echo "not Found";

            }*/
        }
    }




}




/*if($search=""){
//    echo("alert('reyhanejooooon');");
}
else{

    if(strcmp($field,"abs")==0){

      /*  foreach($maghale as  $magh){

            $des = $magh -> description;

            if (strpos($des,$search) !== false) {
//                echo("alert('haaaaaaaaaaaaaaaa');");
//                echo("alert('$index=strpos($file,$field)');");
            }
            else{}
//                echo("alert('naaaaaaaaaaaaaaaa');");


//

        }*/



  /*  }
    if (strcmp($field,"title")==0){


    }
}*/





?>