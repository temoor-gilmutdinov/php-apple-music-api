<?php


require_once '../vendor/autoload.php';

$token = 'eyJhbGciOiJFUzI1NiIsImtpZCI6IjU0N0FSNVA4TFUifQ.eyJpc3MiOiI0SEZOU1gyNDJIIiwiYWl0IjoxNTAyMDQwNjg3LCJleHAiOjE1MDQ2MzI2ODd9.IfNPzEy6FOyNVroGW37Pby-Lm62WbVasNkdKLqbPiKv0xaheNdwdICb1jkIQ465udyZKkMUELnJHs8w4Nz-VOQ';

$client = new \AppleMusic\Client2($token);

//$response = $client->album(1000202020000); // not found
//$response = $client->album('error'); //internal error
$response = $client->album(1211405950); //success
//$response = $client->storefronts(); //success storefronts

foreach ($response as $album) {
    print_r($album->attributes->artwork->getUrl());
}