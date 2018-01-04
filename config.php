<?php
// defaults

$cnf=[]


try{
  $cnf = parse_ini_file('config.ini')
}
catch(Exception $e){
}

// fail if any of following missing
$api_key;
$trusted_secret;

// security default to on
// if security off, add a warning band
$disable_security;
$mongo_client_url;
$trusted_id;
$trusted_url;
$title;
$suffix;
$description;
$footer;
$download_link;

return [
  'config' => [
    'api_key' => $api_key,
    'trusted_secret' => $trusted_secret,
    'disable_security' => $disable_security,
    'mongo_client_url' => $mongo_client_url,
    'trusted_id' => $trusted_id,
    'title' => $title,
    'suffix' => $suffix,
    'description' => $description,
    'footer' => $footer,
    'download_link' => $download_link
  ],
];
