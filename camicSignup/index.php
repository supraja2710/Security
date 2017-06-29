<?php
session_start();
require '../authenticate.php';
require '../branding.php';

require_once '../config/security_config.php';
$_SESSION["name"] = "quip";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css"  media="screen,projection"/>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="../materialize/js/materialize.min.js"></script>
    <script src="https://apis.google.com/js/client:platform.js?onload=start" async defer></script>
    <script type="text/javascript" src="../materialize/js/materialize.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <title>[*]<?php print $branding_title; ?></title>
  </head>

  <body>
    <!--Import jQuery before materialize.js-->


    <div class="navbar-fixed">
      <nav class="blue darken-3">
        <div class="nav-wrapper">
          <a href="#!" class="brand-logo">
            <i class="microscope">
              <img src="../svg/camic_vector.svg" id="svg1" class="camic_logo" width="100%" height="100%" viewBox="0 0 640 480" preserveAspectRatio="xMaxYMax"/>
            </i>
            [*]<?php print $branding_title; ?>
          </a>
        </div>
      </nav>
    </div>

    <div id="modal1" class="modal modal-fixed-footer">
      <div class="modal-content">
        <div class="container">
          <h4> Add a User </h4>
          <form id='registerForm' class="form-horizontal" name="registerForm" action='registerNew.php' method='post' accept-charset='UTF-8'>
                <div class="input-field col s12">
                  <input id="fname" name="fname" type="text" class="validate">
                  <label for="fname">User's First Name</label>
                </div>
                <div class="input-field col s12">
                  <input id="lname" name="lname" type="text" class="validate">
                  <label for="lname">User's Last Name</label>
                </div>
                <div class="input-field col s12">
                  <input id="email" name="email" type="text" class="validate">
                  <label for="email">User's Gmail Address</label>
                </div>
                <button id="submitButton" type="submit" value="Upload Image" class="btn-large blue waves-effect waves-light btn" action="submit">
                Sign Up User <i class="material-icons right">person_add</i>
                </button>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
      </div>
    </div>

    <div id="modal2" class="modal modal-fixed-footer">
      <div class="modal-content">
        <div class="container">
          <h4> Change Admin Password </h4>
          <form id='registerForm2' class="form-horizontal" name="registerForm" action='updateAdminLogin.php' method='post' accept-charset='UTF-8'>
                <div class="input-field col s12">
                  <input id="oldpasswd" name="newpasswd" type="password">
                  <label for="oldpasswd">Current Password</label>
                </div>
                <div class="input-field col s12">
                  <input id="newpasswd" name="newpasswd" type="password">
                  <label for="newpasswd">New Password</label>
                </div>
                <div class="input-field col s12">
                  <input id="newpasswd2" name="newpasswd2" type="password">
                  <label for="newpasswd2">Confirm New Password</label>
                </div>
                <button id="submitButton" type="submit" value="Upload Image" class="btn-large blue waves-effect waves-light btn" action="submit">
                Change Password <i class="material-icons right">person_add</i>
                </button>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
      </div>
    </div>


    <main>
      <div class="container">
        <div class="row">
          <a href="#modal1">
            <div class="col s12 m6 l4 xl3">
              <div class="card" id="upload">
                <div class="card-image">
                  <div class="darkimg">
                    <img src="../img/upload.jpg">
                  </div>
                  <span class="card-title">Sign up a User</span>
                </div>
                <div class="card-content">
                  <p class="card-text"><b>Add User</b>: Sign up a New User for <?php print $branding_title; ?> </p>
                </div>
              </div>
            </div>
          </a>
          <a href="#modal2">
            <div class="col s12 m6 l4 xl3">
              <div class="card" id="upload">
                <div class="card-image">
                  <div class="darkimg">
                    <img src="../img/upload.jpg">
                  </div>
                  <span class="card-title">Change Admin Credential</span>
                </div>
                <div class="card-content">
                  <p class="card-text"><b>Update Admin Password:</b> required to access this section. </p>
                </div>
              </div>
            </div>
          </a>
          <a href="/camicSignup/user_list.php">
            <div class="col s12 m6 l4 xl3">
              <div class="card" id="upload">
                <div class="card-image">
                  <div class="darkimg">
                    <img src="../img/upload.jpg">
                  </div>
                  <span class="card-title">List Users</span>
                </div>
                <div class="card-content">
                  <p class="card-text"><b>User List</b>: A list of users who can access <?php print $branding_title; ?> </p>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
    </main>
    <script>
    $('.modal').modal();
    </script>

    <div class="page-footer blue darken-4">
      <p style="color:white;">U24 CA18092401A1, <b>Tools to Analyze Morphology and Spatially Mapped Molecular Data</b>; <i>Joel Saltz
        PI</i> Stony Brook/Emory/Oak Ridge/Yale<br>NCIP/Leidos 14X138, <b>caMicroscope &ndash; A Digital Pathology
        Integrative Query System</b>; <i>Ashish Sharma PI</i> Emory/WUSTL/Stony Brook<br />
      </p>
    </div>
  </body>
</html>
