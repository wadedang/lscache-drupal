<?php

function read_sitemap($base_url){
    # read simapxml
    $url_list = array();
    $doc = new DOMDocument();
    libxml_use_internal_errors(true);
    $html = file_get_contents($base_url . "/sitemap.xml");
    $doc->loadHTML($html);
    $items = $doc->getElementsByTagName('loc');
    if(count($items) > 0)
    {
        foreach ($items as $tag1)
        {
            array_push($url_list, $tag1->nodeValue);
        }
    }
    else
    {
        array_push($url_list, $doc->saveHTML());
    }
    return $url_list;
}


function curl($url){
    $ci = curl_init();
    curl_setopt($ci , CURLOPT_URL , $url);
    #curl_setopt($ch, CURLOPT_USERAGENT, "Google Bot");
    $result = curl_exec($ci);
    curl_close($ci);
}

#print_r(read_sitemap());
?>
