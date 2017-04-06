<?php
//Google client info
$client_id = 'xxxxxxxxxxxxxxxxxxxxxxxxxx.apps.googleusercontent.com';
$client_secret = 'xxxxxxxxxxxxxxx';
$redirect_uri = 'postmessage';

//Bindaas info
$bindaas_trusted_id = 'xxxxx';
$bindaas_trusted_secret = 'xxxxxx';
$bindaas_trusted_url = 'http://quip-data:9099/trustedApplication';

$folder_path = '/';
$mongo_client_url = 'mongodb://quip-data';

$admins = array( "admin@camicroscope.org" );
function isAdmin($email) {
global $admins;
        if (in_array($email, $admins)) {
                return TRUE;
        } else {
                return FALSE;
        }
}

function getAdminList() {
global $admins;
return $admins;
}

