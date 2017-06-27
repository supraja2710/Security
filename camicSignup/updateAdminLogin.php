<?php

  require '../authenticate.php';

  include_once('htpasswd.php');

  require_once 'HTTP/Request2.php';
  include_once("../camicroscope/api/Data/RestRequest.php");
  $config = require '../camicroscope/api/Configuration/config.php';


  if(!function_exists('hash_equals')) {
    function hash_equals($str1, $str2) {
    if(strlen($str1) != strlen($str2)) {
      return false;
    } else {
      $res = $str1 ^ $str2;
      $ret = 0;
      for($i = strlen($res) - 1; $i >= 0; $i--) $ret |= ord($res[$i]);
      return !$ret;
      }
    }
  }

  $getUrl   = $config['findAdmin'];

  if (!empty($_SESSION['api_key'])) {
    $api_key = $_SESSION['api_key'];
  }

  $getUrl  = $getUrl . "api_key=" . $api_key;
  $url=$getUrl;
  //echo $url;

  $getRequest = new RestRequest($url,'GET');
  $response=$getRequest->execute();
  $admin = $getRequest->responseBody ;
  $admin2 = json_decode($admin,true);
  //print_r($admin2);

  $oldPasswordStored = $admin2[0]['password'];
  //echo $oldPasswordStored;

  //$hashed_password = crypt('quip2017'); // let the salt be automatically generated
  //echo $hashed_password;
  //$encrpt_passwd='$1$JvoSPkuO$koIXFbLOxXkS4qjfPkChc1';

  $oldpasswd=$_POST['oldpasswd'];
  //$user_input='quip2016';
  //echo phpversion();

  /* You should pass the entire results of crypt() as the salt for comparing a
   password, to avoid problems when different hashing algorithms are used. (As
   it says above, standard DES-based password hashing uses a 2-character salt,
   but MD5-based hashing uses 12.) */

 $returnvalue0='';
 if (hash_equals($oldPasswordStored, crypt($oldpasswd, $oldPasswordStored)))
     $returnvalue0=0;
 else  $returnvalue0 = -1;

  // path to your .htpasswd file
  $htpasswd = new htpasswd('/etc/apache2/.htpasswd');

  $newpasswd=$_POST['newpasswd'];
  $newpasswd2=$_POST['newpasswd2'];

  $returnvalue =  strcmp($newpasswd,$newpasswd2);
  //$returnvalue0 =  strcmp($oldpasswd,$oldPasswordStored);

  if ($returnvalue0 != 0)
  { $message = "Your old password does NOT match the password in the database.";
    header('Location: error.php?message=' . $message);
    exit;
  }


  if ($returnvalue != 0)
  { $message = "Your new password is NOT the same! Please enter the same new password twice.";
    header('Location: error.php?message=' . $message);
    exit;
  }

  $htpasswd->user_delete('admin');
  $user="admin";
  //add new user
  //echo "add new user \n";
  $newpassword = $htpasswd->crypt_apr1_md5($newpasswd);
  //echo $newpassword ;

  $htpasswd->user_add($user,$newpassword)

  // A list of random user names
  //$users = array('$username');

  // Checking to see which users exist
  //foreach($users as $user)
	//echo "The username $user does ".($htpasswd->user_exists($user) ? 'exist' : 'not exist')."\n";

  // Trying to add all usernames with password 'apples'
	//foreach($users as $user)
  //echo "The username $user ".($htpasswd->user_add($user,'$youpassword') ? 'has been added' : 'already exists')."\n";

  // Trying to remove user 'santa'
  //echo "Removing user 'santa' if present\n";
  //$htpasswd->user_delete('santa');

  // Trying to update user innvo with new password 'oranges', will add user if they do not exist
  //if($htpasswd->user_update('innvo','oranges'))
  //echo "Updated password for 'innvo'\n";

?>


 <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
    <head>
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
        <title>caMicroscope Admin Credential Update</title>
        <script type='text/javascript' src='gen_validatorv4.js'  xml:space="preserve"></script>
        <link rel="stylesheet" href="/css/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="/camicroscope/css/annotools.css">
        <link rel="stylesheet" href="/css/quipApps.css">
        <link rel="stylesheet" href="/css/header.css">
    </head>

    <body>

      <nav class="navbar navbar-default">
        <div class="navbar_conent">
          <ul class="nav navbar-nav">

            <li class="nav-item">
              <a class="nav-link" href="/select.php">
                <div class="icon">
                  <span class="ico glyphicon glyphicon-home"></span>
                  <span class="icolabel">Home</span>
                </div>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="/FlexTables/index.php">
                <div class="icon">
                  <div class="microscope">
                      <img src="svg/camic_vector.svg" id="svg1" width="100%" height="100%" viewBox="0 0 640 480" preserveAspectRatio="xMaxYMax"></svg>
                  </div>
                  <span class="icolabel">CAMIC</span>
                </div>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="/camicSignup/index.html">
                <div class="icon">
                  <span class="ico glyphicon glyphicon-user"></span>
                  <span class="icolabel">Add</span>
                </div>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="/camicSignup/user_list.php">
                <div class="icon">
                  <span class="ico glyphicon glyphicon-th-list"></span>
                  <span class="icolabel">Users</span>
                </div>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="/camicSignup/adminUpdate.html">
                <div class="icon">
                  <span class="ico glyphicon glyphicon-lock"></span>
                  <span class="icolabel">Password</span>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </nav>

        <div class="container">
            <div class="spacerTop"></div>

            <div class="col-md-offset-1 col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title" title="Web Interface for Signup New users to QuIP."><span class="glyphicon glyphicon-file"></span>caMicroscope Admin Credential Update</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">

                             <div class="form-group row">
                                        <label  class="col-sm-8 control-label">Your user Name: "<?php echo $user ?>"</label>
                             </div>

                              <div class="form-group row">
                                        <label  class="col-sm-8 control-label">Your new password: "<?php echo $_POST['newpasswd'] ?>"</label>
                             </div>

                             <div class="form-group row">
                                        <label  class="col-sm-8 control-label">Your crypted new password: "<?php echo $newpassword ?>"</label>
                             </div>


                              <div class="form-group row">
                                        <label  class="col-sm-8 control-label">Your login credential has been updated!</label>
                             </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

 </body>
 </html>
