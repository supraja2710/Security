<?php
require_once('config/security_config.php');
// start sessions

/*
 * Disable authentication
 $_SESSION["api_key"] = "xxx"; //Get this information by creating a user using CreaterUser.py script
 $_SESSION["email"] = "viewer@quip"; //dummy user. 
 */

session_start();
if (!isset($_SESSION["api_key"])) {
    session_unset();
    header("Location:http://".$_SERVER["HTTP_HOST"].$folder_path."index.php");
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



