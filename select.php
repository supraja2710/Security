<?php
session_start();
require 'authenticate.php';
//require 'branding.php';
//require_once 'config/security_config.php';
$config = require('config.php');

$_SESSION["name"] = "quip";

//try to fix bug
$dataUrl="http://quip-data:9099/services/Camicroscope_DataLoader/DataLoader/query/getAll" ;
$apiKey = $_SESSION["api_key"];
$dataUrl = $dataUrl . "?api_key=".$apiKey;
$cSession = curl_init();
 try {
          $ch = curl_init();

          if (FALSE === $ch)
              throw new Exception('failed to initialize');

          curl_setopt($ch,CURLOPT_URL, $dataUrl);
          curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
          curl_setopt($ch,CURLOPT_HEADER, false);

          $content = curl_exec($ch);

          if (FALSE === $content)
              throw new Exception(curl_error($ch), curl_errno($ch));

          // ...process $content now
     } catch(Exception $e) {
          $content = "Error";
         }

    if (empty($content)) {
             // list is empty.
             //session_unset();
             //die();
      header('Location: forceLogout.php');
      exit;
     }
  //end of bug fix

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Import Google Icon Font-->
    <link href="css/icons.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>
    <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="https://apis.google.com/js/client:platform.js?onload=start" async defer></script>
    <link rel="stylesheet" href="css/style.css">
    <title><?php print $config['title']; ?></title>
    <script>
        function logOut() {
            $.post("security/server.php?logOut", {},
                    function () {
                        window.location = "index.php";
                    });
            gapi.auth.signOut();
        }
    </script>
  </head>

  <body>
    <!--Import jQuery before materialize.js-->



    <div class="navbar-fixed">
      <nav class="blue darken-3">
        <div class="nav-wrapper">
          <a href="#!" class="brand-logo">
            <i class="microscope">
              <img src="svg/camic_vector.svg" id="svg1" class="camic_logo" width="100%" height="100%" viewBox="0 0 640 480" preserveAspectRatio="xMaxYMax"/>
            </i>
            <?php print $config['title']; ?>
          </a>
        </div>
      </nav>
    </div>

    <div id="modal1" class="modal modal-fixed-footer">
      <div class="modal-content">
        <div class="container">
          <h4> Upload Images </h4>
          <p>Pick an unique Image ID (Letters, Numbers, Dash(-), and Underscore(_) only) and upload an image file.
          <form id="uploadme" role="form" action="quip-loader/submitData" method="post" enctype="multipart/form-data">
            <div class="input-field col s12">
              <input id="imageid" name="case_id" type="text" pattern="^[a-zA-Z0-9-_]+$" class="validate">
              <label for="imageid">Image ID</label>
            </div>
            <div class="file-field input-field">
              <div class="btn">
                <span>File</span>
                <input id="upload_image" name="upload_image" type="file">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
              </div>
            </div>
            <button id="submitButton" type="submit" value="Upload Image" class="btn-large blue waves-effect waves-light btn" action="submit">
            Upload <i class="material-icons right">send</i>
            </button>
          </form>
          <div class="progress">
            <div id="progressbar" class="determinate" style="width: 0%"></div>
          </div>
          <div id="status"></div>
          <br>
        </div>
      </div>
      <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
      </div>
    </div>

    <div id="modal_about" class="modal modal-fixed-footer">
      <div class="modal-content">
        <div class="container">
          <h4> About </h4>
          <a class="waves-effect waves-light btn" href="http://imaging.cci.emory.edu/wiki/display/CAMIC/Home">User Guide</a>
          <a class="waves-effect waves-light btn" href="https://github.com/SBU-BMI/quip_distro">Distribute</a><br>
          <p>This site hosts web accessible applications and tools designed to support analysis, management, and exploration of whole slide tissue images for cancer research. The goals of the parent project are to develop, deploy, and disseminate a suite of open source tools and integrated informatics platform that will facilitate multi-scale, correlative analyses of high resolution whole slide tissue image data, spatially mapped genetics and molecular data. The software and methods will enable cancer researchers to assemble and visualize detailed, multi-scale descriptions of tissue morphologic changes and to identify and analyze features across individuals and cohorts.</p>
          <p>The current set of applications has been developed and supported by several frameworks and middleware systems including:
          <ul>
            <li><b>caMicroscope</b>: Digital pathology data management, visualization and analysis platform. It also includes FeatureDB, a database based on NoSQL technologies for management and query of segmentation results and features from whole slide tissue image analysis.</li>
          </ul></p>
          <p>This work is supported in part by NCI U24 CA18092401A1 (Tools to Analyze Morphology and Spatially Mapped Molecular Data, PI: Joel Saltz), NCIP/Leidos 14X138 (caMicroscope – A Digital Pathology Integrative Query System; PI: Ashish Sharma), R01LM011119-01 (PI: Joel Saltz), and 2R01LM009239-05A1 (PIs: David Foran and Joel Saltz). The U24 project is a collaboration between Stony Brook University, Emory University, Oak Ridge National Laboratory and Yale University. The caMicroscope project is a collaboration between Emory University, Washington University in St. Louis and Stony Brook University.</p>
        </div>
      </div>
      <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
      </div>
    </div>

    <main>
      <div class="container">
        <div class="row">
          <a href="#modal_about">
            <div class="col s12 l6">
              <div class="card" id="upload">
                <div class="top_bar">About</div>
                <div class="card-image">
                  <div class="darkimg">
                    <img src="img/about.jpg">
                  </div>
                </div>
                <div class="card-content">
                  <p class="card-text flow-text">Learn about the tools at your disposal. </p>
                </div>
              </div>
            </div>
          </a>
          <a href="#modal1">
            <div class="col s12 l6">
              <div class="card" id="upload">
                <div class="top_bar">Upload</div>
                <div class="card-image">
                  <div class="darkimg">
                    <img src="img/upload.jpg">
                  </div>
                </div>
                <div class="card-content">
                  <p class="card-text flow-text">Upload images here for collaboration, annotation and analysis. </p>
                </div>
              </div>
            </div>
          </a>
          <a href="FlexTables/index.php">
            <div class="col s12 l6">
              <div class="card" id="view">
                <div class="top_bar">caMicroscope</div>
                <div class="card-image">
                  <div class="darkimg">
                    <img src="img/view.png">
                  </div>
                </div>
                <div class="card-content">
                  <p class="card-text flow-text">View and annotate whole slide tissue images and nuclear segmentations.</p>
                </div>
              </div>
              </a>
            </div>
          </a>
          <a href="featurescapeapps/featurescape/u24Preview.php">
            <div class="col s12 l6">
              <div class="card" id="understand">
                <div class="top_bar">FeatureScape</div>
                <div class="card-image">
                  <div class="darkimg">
                    <img src="img/understand.jpg">
                  </div>
                </div>
                <div class="card-content">
                  <p class="card-text flow-text">A visual analytics platform for exploring slide-level imaging features generated by analysis of whole slide tissue images to QuIP.</p>
                </div>
              </div>
            </div>
          </a>

        </div>
        <div id="grantinfo">
          <p>U24 CA18092401A1, <b>Tools to Analyze Morphology and Spatially Mapped Molecular Data</b>; <i>Joel Saltz
            PI</i> Stony Brook/Emory/Oak Ridge/Yale<br>NCIP/Leidos 14X138, <b>caMicroscope &ndash; A Digital Pathology
            Integrative Query System</b>; <i>Ashish Sharma PI</i> Emory/WUSTL/Stony Brook<br />
          </p>
          <a class="waves-effect waves-light btn" onclick="logOut()">Log Out</a>
        </div>
      </div>
    </main>
    </div>
    <script src="js/uploader.js"></script>
  </body>
</html>
