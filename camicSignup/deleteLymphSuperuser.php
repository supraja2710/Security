<?php

  require '../authenticate.php';

  include_once("../camicroscope/api/Data/RestRequest.php");
  require_once 'HTTP/Request2.php';

  $config = require '../camicroscope/api/Configuration/config.php';
  
  $deleteUrl = $config['deleteLymphocyteSuperuser'];

  if (!empty($_SESSION['api_key'])) {
    $api_key = $_SESSION['api_key'];
  }

  $email=$_POST['email'];
  $email = strtolower($email);

  $role = 'lymph_superuser';

  echo "PHP Deleting";
  //$d = file_get_contents("php://input");
  //print_r($d);
    
  //$data = [];
  //parse_str($d, $data); 
   
  //$data = json_decode($data);
  //print_r($data);
    
  //$email = $data['email'];
    
  $delUrl = $deleteUrl . "api_key=".$api_key . "&email=".$email . "&role=".$role;
  //echo $delUrl;
  $curl = curl_init($delUrl);
  //Delete request
  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
  curl_setopt($curl, CURLOPT_HEADER, false);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json',"OAuth-Token: $token"));
  // Make the REST call, returning the result
  $response = curl_exec($curl);
  print_r($response);

  //header('Location: lymphSuperuser.html');
  //exit; 

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
                      <img src="/camicroscope/images/camic_vector.svg" id="svg1" width="100%" height="100%" viewBox="0 0 640 480" preserveAspectRatio="xMaxYMax">
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
              
            <li class="nav-item">
              <a class="nav-link" href="/camicSignup/lymphSuperuser.php" title="Assign Lymphocyte App Superuser">
                <div class="icon">
                  <div class="microscope">
                      <img src="/camicroscope/images/Heatmap.svg" width="100%" height="100%" viewBox="0 0 640 480" preserveAspectRatio="xMaxYMax">
                  </div>
                  <span class="icolabel">Lymph</span>
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
                        <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Delete caMic Lymphocyte Superuser</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">

                             <div class="form-group row">
                                        <label  class="col-sm-8 control-label">User's Gmail Address: "<?php echo $_POST["email"] ?>"</label>
                             </div><hr>
                                
                             <div class="form-group row">
                                        <label class="col-sm-12 control-label">Result: "<?php echo $response ?>"</label>
                             </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   </body>
 </html>