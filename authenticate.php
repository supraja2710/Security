<?php
require_once('config/security_config.php');
//$enable_security = true;
// start sessions

session_start();
if(!$enable_security){
	 /* Disable authentication*/
	 $_SESSION["api_key"] = "APIKEY312"; //Don't change this string, we do a find and replace to populate the actual api key here.
	 $_SESSION["email"] = "viewer@quip"; //dummy user. 
} else {
	if (!isset($_SESSION["api_key"])) {
	    session_unset();
	    header("Location:http://".$_SERVER["HTTP_HOST"].$folder_path."index.php");
	    //echo "try to redirect";
	}
}

/*
You can use this file to control access to any .php file
All you need to do is:
<?php
require('authenticate.php');
?>
<html>
  <head>
  </head>
  <body>
    hello
  </body>
</html>

*/
