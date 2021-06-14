<?php

include('vendor/autoload.php');

use GuzzleHttp\Client;

$client = new Client();

// URL de l'API et authentification
// CF: https://cds.climate.copernicus.eu/api-how-to#install-the-cds-api-key
$url = 'https://cds.climate.copernicus.eu/api/v2';
$key = 'KEY';

$auth = explode(':', $key);

// Un exemple: https://cds.climate.copernicus.eu/cdsapp#!/dataset/reanalysis-era5-pressure-levels?tab=form
$res = $client->request('POST', $url . '/resources/reanalysis-era5-pressure-levels', [
    'body' => json_encode([
        'product_type' => 'reanalysis',
        'variable' => 'divergence',
        'pressure_level' => '1',
        'year' => '1979',
        'month' => '01',
        'day' => '01',
        'time' => '00:00',
        'format' => 'netcdf'
    ]),
    'auth' => $auth
]);

$result = json_decode($res->getBody(), true);
var_dump($result);
