<?php
session_start();
require 'authenticate.php';

require_once 'config/security_config.php';
$_SESSION["name"] = "quip";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://apis.google.com/js/client:platform.js?onload=start" async defer></script>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script>
    <!--<link rel="stylesheet" href="css/style.css">-->
    <link rel="stylesheet" href="css/style.css">
  </head>

  <body>
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="materialize/js/materialize.min.js"></script>


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
    <script>
      $(document).ready(function() {
        $('.modal').modal();
        var bar = $('#progressbar');
        var status = $('#status');
        var options = {
          url: '/quip-loader/submitData',
          dataType: 'json',
          beforeSend: function() {
            document.getElementById("submitButton").disabled = true;
            document.getElementById("status").innerHTML = "Uploading...";
            document.getElementById("progressbar").classList.remove("red");
            document.getElementById("progressbar").classList.remove("green");
            status.empty();
            var percentVal = '0%';
            bar.width(percentVal);
          },
          uploadProgress: function(event, position, total, percentComplete) {
            var percentVal = percentComplete + '%';
            bar.width(percentVal);
          },
          complete: function(xhr) {
            document.getElementById("progressbar").classList.remove("red");
            document.getElementById("progressbar").classList.add("green");
          },
          error: function(response) {
            document.getElementById("submitButton").disabled = false;
            //console.log(document.getElementById("imageid").innerHTML);
            console.log(response.status);
            console.log("Call Tahsin...");
            document.getElementById("status").innerHTML =
              "Problem with uploading.";
            Materialize.toast('Problem with uploading.', 4000);
            document.getElementById("progressbar").classList.add("red");
          },
          success: function(response) {
            document.getElementById("submitButton").disabled = false;
            console.log(response.status);
            document.getElementById("uploadme").reset();
            document.getElementById("status").innerHTML =
              "Image file is uploaded.";
            Materialize.toast('Upload Complete', 4000);
          }
        };
        $('#uploadme').submit(function() {
          var imageid = document.getElementById("imageid").value;
          imageid = imageid.trim()
          if (imageid == "") {
            document.getElementById("status").innerHTML =
              "Please enter an image ID!";
            return false;
          }
          var regexp = /^[a-zA-Z0-9-_]+$/;
          if (imageid.search(regexp) == -1) {
            document.getElementById("status").innerHTML =
              "Image ID can only contain characters (A-Z,a-z,0-9,-,_)!";
            return false;
          }
          if ($("#upload_image").val() == "") {
            document.getElementById("status").innerHTML =
              "Please select an image file!";
            return false;
          }
          // remove space
          imageid = imageid.split(' ').join('_');
          document.getElementById("imageid").value = imageid;
          $.ajax({
            dataType: "JSON",
            url: "/quip-findapi/?limit=100&find={'subject_id':'" +
              imageid + "'}&db=quip&collection=images",
            success: function(response) {
              if (response.length == 0) {
                $('#uploadme').ajaxSubmit(options);
              } else {
                document.getElementById("status").innerHTML =
                  "Image ID already exists!";
              }
            },
            error: function(response) {
              console.log("error on post");
              Materialize.toast('Form Error!', 4000);
            }
          });
          return false;
        });
      });
    </script>
  </body>
</html>
