<?php

require_once '../vendor/autoload.php';

$token = 'eyJhbGciOiJFUzI1NiIsImtpZCI6IjU0N0FSNVA4TFUifQ.eyJpc3MiOiI0SEZOU1gyNDJIIiwiYWl0IjoxNTAyMDQwNjg3LCJleHAiOjE1MDQ2MzI2ODd9.IfNPzEy6FOyNVroGW37Pby-Lm62WbVasNkdKLqbPiKv0xaheNdwdICb1jkIQ465udyZKkMUELnJHs8w4Nz-VOQ';

$client = new \Seriy\AppleMusicApi\Client($token);

$response = $client->album(1211405950);

$mapper = new JsonMapper();


foreach ($response->data as $album) {
    $albumObject = $mapper->map($album->attributes, new \Seriy\AppleMusicApi\ResourceObjects\Album);

    print_r($albumObject);
}
