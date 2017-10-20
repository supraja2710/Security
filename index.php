<?php
require_once('config/security_config.php');
?>
<!doctype html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php print $branding_title; ?> Login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/frontPage.css">

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="https://apis.google.com/js/client:platform.js?onload=start" async defer></script>
    <script src="js/vendor/bootstrap/bootstrap.min.js"></script>
    <script src="js/login.js"></script>
    <style type="text/css">
        body {
            padding-top: 50px;
            padding-bottom: 20px;
        }
    </style>
</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->

   <div class="container">
   <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
         <div>
            <div class="header">
               <ul class="nav nav-pills pull-right">
                  <li class="active">
                     <a href="#">Home</a>
                  </li>
                  <li>
                     <a href="https://sbu-bmi.github.io/quip_distro/">Downloads</a>
                  </li>
               </ul>
               <h3 class="text-muted"><br></h3>
            </div>
         </div>
      </div>
   </div>

    <div class="jumbotron">
        <h1><?php print $branding_title; ?></h1>

        <p class="lead"<?php print $branding_description; ?></p>

        <h4>Login/Signup with:</h4>
            <span class="g-signin"
                  data-scope="email"
                  data-clientid=<?php echo $client_id ?>
                  data-redirecturi="postmessage"
                  data-cookiepolicy="single_host_origin"
                  data-callback="logInCallback"
                  data-approvalprompt="force">
            </span>

    </div>
    <div class="footer">
        <p><?php print $branding_footer; ?></p>
    </div>
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
    ga('create', 'UA-XXXXX-X', 'auto');
    ga('send', 'pageview');
</script>
</body>
</html>
