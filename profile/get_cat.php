<?php
    //ini_set('display_errors', '1');
    //include('simple_dom_php/simple_html_dom.php');



    
    $url="laboratory.php";

    $html = file_get_contents($url);

    $doc = new DOMDocument();
    @$doc->loadHTML($html);

    $tags = $doc->getElementsByTagName('img');

    foreach ($tags as $tag) {
       echo $tag->getAttribute('src').'<br>';
    }
    
?>