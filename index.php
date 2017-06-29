<?php
session_start();
require_once('config/security_config.php');

if (!$enable_security) {
    header("Location:http://".$_SERVER["HTTP_HOST"].$folder_path."select.php");
} else {
	if(isset($_SESSION["api_key"])){
	        header("Location:http://".$_SERVER["HTTP_HOST"].$folder_path."select.php");
	}
}


?>
<!doctype html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="">
  <![endif]-->
  <!--[if IE 7]>
  <html class="no-js lt-ie9 lt-ie8" lang="">
    <![endif]-->
    <!--[if IE 8]>
    <html class="no-js lt-ie9" lang="">
      <![endif]-->
      <!--[if gt IE 8]><!-->
      <html class="no-js" lang="">
        <!--<![endif]-->
        <head>
          <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
          <script src="js/modernizr-2.8.3.min.js"></script>
          <script src="https://apis.google.com/js/client:platform.js?onload=start" async defer></script>
          <!--Import Google Icon Font-->
          <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
          <!--Import materialize.css-->
          <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>
          <link type="text/css" rel="stylesheet" href="css/style.css">
          <!--Let browser know website is optimized for mobile-->
          <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
          <script src="js/login.js"></script>
        </head>
        <body>
          <div class="navbar-fixed">
            <nav class="blue darken-3">
              <div class="nav-wrapper">
                <a href="#!" class="brand-logo">
                <i class="microscope">
                <img src="svg/camic_vector.svg" id="svg1" width="100%" height="100%" viewBox="0 0 640 480" preserveAspectRatio="xMaxYMax"/>
                </i>caMicroscope</a>
                <a class="btn-floating btn-large halfway-fab waves-effect waves-light green darken-2" onclick="$('#___signin_0').children()[0].click();">
                <i class="material-icons">perm_identity</i>
                </a>
              </div>
            </nav>
          </div>
          <div class="container">
          <div class="row">
          <div class="col s12">
            <div class="card" id="view">
              <div class="card-image">
                <div class="darkimg">
                  <img src="img/view.jpg">
                </div>
                <span class="card-title">caMicroscope</span>
              </div>
              <div class="card-content">
                <p><b>caMicroscope</b>: A digital pathology data management, visualization and analysis platform. It consists of a set
                  of web services to manage pathology images, associated clinical and imaging metadata, and human/machine
                  generated annotations and markups.
                </p>
                <br/>
                <b>Log in:</b><br/>
                <span class="g-signin"
                  data-scope="email"
                  data-clientid=<?php echo $client_id ?>
                  data-redirecturi="postmessage"
                  data-cookiepolicy="single_host_origin"
                  data-callback="logInCallback"
                  data-approvalprompt="force">
                </span>
              </div>
            </div>
          </div>
          </div>
        </div>
          <div class="page-footer blue darken-4">
            <p style="color:white;">U24 CA18092401A1, <b>Tools to Analyze Morphology and Spatially Mapped Molecular Data</b>; <i>Joel Saltz
              PI</i> Stony Brook/Emory/Oak Ridge/Yale<br>NCIP/Leidos 14X138, <b>caMicroscope &ndash; A Digital Pathology
              Integrative Query System</b>; <i>Ashish Sharma PI</i> Emory/WUSTL/Stony Brook<br />
            </p>
          </div>

<script src="js/main.js"></script>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
    (function (b, o, i, l, e, r) {
        b.GoogleAnalyticsObject = l;
        b[l] || (b[l] =
            function () {
                (b[l].q = b[l].q || []).push(arguments)
            });
        b[l].l = +new Date;
        e = o.createElement(i);
        r = o.getElementsByTagName(i)[0];
        e.src = '//www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e, r)
    }(window, document, 'script', 'ga'));
    ga('create', 'UA-46271588-1', 'auto');
    ga('send', 'pageview');
</script>
</body>
</html>
