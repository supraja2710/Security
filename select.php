<?php
session_start();
require 'authenticate.php';
require 'branding.php';

require_once 'config/security_config.php';
$_SESSION["name"] = "quip";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script>
    <!--<link rel="stylesheet" href="css/style.css">-->
    <script src="https://apis.google.com/js/client:platform.js?onload=start" async defer></script>
    <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title><?php print $branding_title; ?></title>
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
            <?php print $branding_title; ?>
          </a>
        </div>
      </nav>
    </div>

    <div id="modal1" class="modal modal-fixed-footer">
      <div class="modal-content">
        <div class="container">
          <h4> Upload Images </h4>
          <p>Pick an unique Image ID (Letters, Numbers, Dash(-), and Underscore(_) only) and upload an image file.
          <form id="uploadme" role="form" action="/quip-loader/submitData" method="post" enctype="multipart/form-data">
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
    <main>
      <div class="container">
        <div class="row">
          <a href="#modal1">
            <div class="col s12 l4">
              <div class="card" id="upload">
                <div class="card-image">
                  <div class="darkimg">
                    <img src="img/upload.jpg">
                  </div>
                  <span class="card-title">Upload</span>
                </div>
                <div class="card-content">
                  <p class="card-text"><b>Image Uploader</b>: Upload images here for collaboration, annotation and analysis. </p>
                </div>
              </div>
            </div>
          </a>
          <a href="/FlexTables/index.php">
            <div class="col s12 l4">
              <div class="card" id="view">
                <div class="card-image">
                  <div class="darkimg">
                    <img src="img/view.png">
                  </div>
                  <span class="card-title">View</span>
                </div>
                <div class="card-content">
                  <p class="card-text"><b>caMicroscope</b>: View and annotate whole slide tissue images and nuclear segmentations.</p>
                </div>
              </div>
            </div>
          </a>
          <a href="/featurescapeapps/featurescape/u24Preview.php">
            <div class="col s12 l4">
              <div class="card" id="understand">
                <div class="card-image">
                  <div class="darkimg">
                    <img src="img/understand.jpg">
                  </div>
                  <span class="card-title">Understand</span>
                </div>
                <div class="card-content">
                  <p class="card-text"><b>FeatureScape</b>: A visual analytics platform for exploring slide-level imaging features generated by analysis of whole slide tissue images to QuIP.</p>
                </div>
              </div>
            </div>
          </a>
          <a href="https://github.com/SBU-BMI/quip_distro">
            <div class="col s12 l4">
              <div class="card" id="distribute">
                <div class="card-image">
                  <div class="darkimg">
                    <img src="img/dist.jpg">
                  </div>
                  <span class="card-title">Distribute</span>
                </div>
                <div class="card-content">
                  <p class="card-text"><b>QuIP distribution and installation</b>: Report issues on QuIP or Install/Distribute this software.</p>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
    </main>

    <div class="page-footer blue darken-4">
      <p style="color:white;">U24 CA18092401A1, <b>Tools to Analyze Morphology and Spatially Mapped Molecular Data</b>; <i>Joel Saltz
        PI</i> Stony Brook/Emory/Oak Ridge/Yale<br>NCIP/Leidos 14X138, <b>caMicroscope &ndash; A Digital Pathology
        Integrative Query System</b>; <i>Ashish Sharma PI</i> Emory/WUSTL/Stony Brook<br />
      </p>
    </div>
    <script src="js/uploader.js"></script>
  </body>
</html>
