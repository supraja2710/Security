<?php

// null coalesce replacement function
function get(&$value, $default = null)
{
    return isset($value) ? $value : $default;
}


try{
  $config_file = parse_ini_file('config.ini')
}
catch(Exception $e){
}

// fail if any of following missing from file
$api_key;
$trusted_secret;

//for others, null coalesce to defaults
// add a header to warn if security Disabled

$cnf=[
  'config' => [
    'api_key' => $config_file['api_key'],
    'trusted_secret' => $config_file['trusted_secret'],
    'disable_security' => get($config_file['disable_security'],False),
    'mongo_client_url' => get($config_file['mongo_client_url'],"mongodb://quip-data"),
    'trusted_id' => get($config_file['trusted_id'] ,"camicSignup"),
    'client_id' => get($config_file['client_id'] ,"xxxxxxxxxxxxxxxxxxxxxxxxxx.apps.googleusercontent.com"),
    'client_secret' => get($config_file['client_secret'],"xxxxxxxxxxxxxxx"),
    'title' => get($config_file['title'],"caMicroscope"),
    'suffix' => get($config_file['suffix'],"<div></div>"),
    'description' => get($config_file['description'],"Look at slides."),
    'footer' => get($config_file['footer'],"caMicroscope – A Digital Pathology Integrative Query System; Ashish Sharma PI Emory"),
    'download_link' => get($config_file['download_link'],"https://github.com/camicroscope"),
  ],
];

// get with require()
return $cnf;
