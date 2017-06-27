<?php

  require '../authenticate.php';

  include_once("../camicroscope/api/Data/RestRequest.php");
  require_once 'HTTP/Request2.php';

  $config = require '../camicroscope/api/Configuration/config.php';

  $postUrl   = $config['postUser'];

  if (!empty($_SESSION['api_key'])) {
    $api_key = $_SESSION['api_key'];
  }

  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $email=$_POST['email'];
  $username=$fname . $lname;
  $expirationDate='01/01/2020';
  $category="bindaas_user" ;

  $command='sh add_user.sh' . ' ' . $username . ' ' . $email . ' ' .  $expirationDate ;

  $output1 =shell_exec($command);
  $output1 = str_replace('"', "'", $output1);
  $errorPosition = strpos($output1, "error");

  if ($errorPosition > -1 ){
    $output = "error occured.";
  } else if ($errorPosition == false ) {
    $output = "done sucessfully.";
    $output1="Your input has been sucessfully added to Bindaas database!";
  } else
     $output = "done sucessfully.";

  //The JSON data.
  $u24_user = array(
     'fname' => $fname,
     'lname' => $lname,
	   'username' =>$username,
	   'email' => $email,
     'category' => $category
  );

	$url = $postUrl . "?api_key=".$api_key;
  echo "posting data\n";
  echo $url;
  print_r($url);

  $ch = curl_init();
  $headers= array('Accept: application/json','Content-Type: application/json');
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($u24_user, JSON_NUMERIC_CHECK));

  $result = curl_exec($ch);
  echo $result;

  if($result === false){
     $result =  curl_error($ch);
  }
  curl_close($ch);

  echo $result;
  echo "done";

  $rightposition = strpos($result, "{ 'count':'1'}");

  if ($rightposition > -1 ){
     $output2="Your input has been sucessfully added to MongoDB database!";
  } else if ($rightposition == false ) {
      $output2="Error occurs!";
  } else
     $output2 = $result;

?>



 <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
    <head>
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
        <title>caMicroscope User Signup</title>
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
                        <h3 class="panel-title" title="Web Interface for Signup New users to QuIP."><span class="glyphicon glyphicon-file"></span>caMicroscope User Signup</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">

                              <div class="form-group row">
                                        <label class="col-sm-3 control-label">Input Data:</label>
                              </div>

                             <div class="form-group row">
                                        <label  class="col-sm-8 control-label">User's First Name: "<?php echo $_POST["fname"] ?>"</label>
                             </div>

                              <div class="form-group row">
                                        <label  class="col-sm-8 control-label">User's Last Name: "<?php echo $_POST["lname"] ?>"</label>
                             </div>

                             <div class="form-group row">
                                        <label  class="col-sm-8 control-label">User's Gmail Address: "<?php echo $_POST["email"] ?>"</label>
                             </div>

                              <div class="form-group row">
                                        <label class="col-sm-8 control-label">User Name: "<?php echo $username ?>"</label>
                             </div>

                             <div class="form-group row">
                                        <label class="col-sm-8 control-label">Expiration Date: "<?php echo $expirationDate ?>"</label>
                             </div>

                             <div class="form-group row">
                                        <label class="col-sm-12 control-label"> -- Save user info to Bindaas --</label>
                              </div>

                               <div class="form-group row">
                                        <label class="col-sm-12 control-label"><?php echo $output ?></label>
                              </div>

                              <div class="form-group row">
                                        <label class="col-lg-12 control-label"><?php echo $output1 ?></label>
                              </div>


                             <div class="form-group row">
                                        <label class="col-sm-12 control-label"> -- Save user info to MongoDB --</label>
                              </div>

                             <div class="form-group row">
                                        <label class="col-sm-12 control-label">Result: "<?php echo $output2 ?>"</label>
                             </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   </body>
 </html>
