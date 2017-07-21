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
    <title>caMicroscope Login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/frontPage.css">

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="https://apis.google.com/js/client:platform.js?onload=start" async defer></script>
    <script src="js/vendor/bootstrap/bootstrap.min.js"></script>
    <script>
        function logInCallback(authResult) {
            console.log("calling log in");
            if (authResult['code']) {
                // Send the code to the server
                $.post("security/server.php?logIn", {code: authResult['code']},
                        function (response) {
                            console.log(response);
                            if ('logIn' == response) {
                                window.location = 'select.php';
                            } else if ('signUp' == response) {
                                window.location = 'security/request.php?doAction=signUp';
                            }
                        }
                );
            } else if (authResult['error']) {
                // There was an error.
                // Possible error codes:
                //   "access_denied" - User denied access to your app
                //   "immediate_failed" - Could not automatially log in the user
                console.log('There was an error: ' + authResult['error']);
            }
        }
    </script>
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
                     <a data-toggle="modal" data-target="#modal_about">About</a>
                  </li>
               </ul>
               <h3 class="text-muted"><br></h3>
            </div>
         </div>
      </div>
   </div>

   <div id="modal_about" class="modal fade" role="dialog">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal">&times;</button>
           <h4 class="modal-title">About</h4>
         </div>
         <div class="modal-body">
           <p>This site hosts web accessible applications and tools designed to support analysis, management, and exploration of whole slide tissue images for cancer research. The goals of the parent project are to develop, deploy, and disseminate a suite of open source tools and integrated informatics platform that will facilitate multi-scale, correlative analyses of high resolution whole slide tissue image data, spatially mapped genetics and molecular data. The software and methods will enable cancer researchers to assemble and visualize detailed, multi-scale descriptions of tissue morphologic changes and to identify and analyze features across individuals and cohorts.</p>
           <p>The current set of applications has been developed and supported by several frameworks and middleware systems including:
           <ul>
             <li><b>caMicroscope</b>: Digital pathology data management, visualization and analysis platform. It also includes FeatureDB, a database based on NoSQL technologies for management and query of segmentation results and features from whole slide tissue image analysis.</li>
           </ul></p>
           <p>This work is supported in part by NCI U24 CA18092401A1 (Tools to Analyze Morphology and Spatially Mapped Molecular Data, PI: Joel Saltz), NCIP/Leidos 14X138 (caMicroscope – A Digital Pathology Integrative Query System; PI: Ashish Sharma), R01LM011119-01 (PI: Joel Saltz), and 2R01LM009239-05A1 (PIs: David Foran and Joel Saltz). The U24 project is a collaboration between Stony Brook University, Emory University, Oak Ridge National Laboratory and Yale University. The caMicroscope project is a collaboration between Emory University, Washington University in St. Louis and Stony Brook University.</p>
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
       </div>
     </div>
   </div>

    <div class="jumbotron" onclick="$('#___signin_0').children()[0].click();">
        <h1>caMicroscope</h1>

        <p class="lead">A digital pathology data management, visualization and analysis platform. It consists of a set
            of web services to manage pathology images, associated clinical and imaging metadata, and human/machine
            generated annotations and markups.</p>

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
        <p>NCIP/Leidos 14X138, caMicroscope — A Digital Pathology Integrative Query System<br>Ashish Sharma (ashish.sharma@emory.edu) PI, Emory/WUSTL/StonyBrook</p>
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
