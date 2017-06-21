<?php
session_start();
//require 'authenticate.php';
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
  </head>

  <body>
    <!--Import jQuery before materialize.js-->


    <div class="navbar-fixed">
      <nav class="blue darken-3">
        <div class="nav-wrapper">
          <a href="#!" class="brand-logo">
            <i class="microscope">
              <img src="svg/camic_vector.svg" id="svg1" width="100%" height="100%" viewBox="0 0 640 480" preserveAspectRatio="xMaxYMax"/>
            </i>
            caMicroscope

          </a>
          <a class="btn-floating btn-large halfway-fab waves-effect waves-light green darken-2" href="#modal1">
            <i class="material-icons">file_upload</i>
          </a>
          <ul class="right hide-on-med-and-down">
            <li><a href="#upload">Upload</a></li>
            <li><a href="#view">View</a></li>
            <li><a href="#understand">Understand</a></li>
            <li><a href="#distribute">Distribute</a></li>
          </ul>
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

    <div class="row">
      <div class="col s12 l4">
        <div class="card" id="upload">
          <div class="card-image">
            <div class="darkimg">
              <img src="img/upload.jpg">
            </div>
            <span class="card-title">Upload</span>
            <a href="#modal1" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">file_upload</i></a>
          </div>
          <div class="card-content">
            <p><b>Image Uploader</b>: Upload images here for collaboration, annotation and analysis. </p>
          </div>
        </div>
      </div>
      <div class="col s12 l4">
        <div class="card" id="view">
          <div class="card-image">
            <div class="darkimg">
              <img src="img/view.jpg">
            </div>
            <span class="card-title">View</span>
            <a href="/FlexTables/index.php" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">pageview</i></a>
          </div>
          <div class="card-content">
            <p><b>caMicroscope</b>: View and annotate whole slide tissue images and nuclear segmentations.</p>
          </div>
        </div>
      </div>
      <div class="col s12 l4">
        <div class="card" id="understand">
          <div class="card-image">
            <div class="darkimg">
              <img src="img/understand.jpg">
            </div>
            <span class="card-title">Understand</span>
            <a href="/featurescapeapps/featurescape/u24Preview.php" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">open_in_browser</i></a>
          </div>
          <div class="card-content">
            <p><b>FeatureScape</b>: A visual analytics platform for exploring slide-level imaging features generated by analysis of whole slide tissue images to QuIP.</p>
          </div>
        </div>
      </div>
      <div class="col s12 l4">
        <div class="card" id="distribute">
          <div class="card-image">
            <div class="darkimg">
              <img src="img/dist.jpg">
            </div>
            <span class="card-title">Distribute</span>
            <a href="https://github.com/SBU-BMI/quip_distro" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">code</i></a>
          </div>
          <div class="card-content">
            <p><b>QuIP distribution and installation</b>: Report issues on QuIP or Install/Distribute this software.</p>
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
    <script src="js/uploader.js"></script>
  </body>
</html>
