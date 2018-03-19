<?php
$html = file_get_contents('http://www.device42.com/');

$pokemon_doc = new DOMDocument();

libxml_use_internal_errors(TRUE);

if(!empty($html)){ 

    $pokemon_doc->loadHTML($html);
    libxml_clear_errors();

    $pokemon_xpath = new DOMXPath($pokemon_doc);

    $pokemon_row = $pokemon_xpath->query('//div[@id="nav"]');

    $htmlString = $pokemon_doc->saveHTML($pokemon_row->item(0));
    
    echo $htmlString;

    // if($pokemon_row->length > 0){
    //     foreach($pokemon_row as $row){
    //         echo $row->nodeValue . "<br/>";
    //     }
    // }
}
?>
