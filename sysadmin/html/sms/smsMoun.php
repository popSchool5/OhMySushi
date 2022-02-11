<?php

$base_url = "https://www.oclasoft.com/api/sms/?";

$params = [
    "username" => "ozipek.mu@gmail.com",
    "password"=>"azerty",
    "sender"=>"Oh My Sushi",
    "mobile"=> '33665190433',
    "text"=>urlencode("Patron vient on galère stp, on sait que t'es le meilleur ! ")
];


$url = $base_url.http_build_query($params);

echo file_get_contents($url); 

header('location: ../index.php?aideDemander');