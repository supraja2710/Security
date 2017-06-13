<?php
    require ('authenticate.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Image uploader</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
        .progress { position:relative; border: 1px solid #ddd; padding: 1px; border-radius: 3px; }
        .bar { background-color: #B4F5B4; width:0%; height:20px; border-radius: 3px; }
        .errorbar{ background-color: #e03535; width:0%; height:20px; border-radius: 3px; }
        .percent { position:absolute; display:inline-block; top:3px; left:48%; }
        </style>
        <!--<link rel="stylesheet" href="css/style.css">-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="/camicroscope/css/annotools.css">
        <link rel="stylesheet" href="css/quipApps.css">
        <script src="http://malsup.github.com/jquery.form.js"></script>
        <script src="js/vendor/bootstrap/bootstrap.min.js"></script>
        <script src="js/vendor/bootstrap-filestyle.min.js"></script>
        <link rel="stylesheet" href="/css/header.css">
        <link rel="stylesheet" href="/css/style.css">
    </head>
    <body>
        <!--<a id="back" href="/">Back to Home</a>-->
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

              <li>
                <li class="nav-item">
                    <div class="pagetitle">Image Loader</div>
                </li>
              </li>
            </ul>
          </div>
        </nav>


        <div class="container">
          <h1>caMicroscope Image Loader</h1>
            <div class="spacerTop"></div>
            <!--<h3>caMicroscope Image Loader</h3>-->
            <!--<form id="uploadme" action="/quip-loader/submitData" method="post" enctype="multipart/form-data">
                <span class="label">Image Id:</span>
                <input id="imageid" type="text" name="case_id" label="Image ID: "><br><span class="label">Upload File:</span>
                <input type="file" name="upload_image" id="upload_image"><br>
                <input id="submitButton" type="submit" value="Upload Image">
            </form><br>-->
            <!--start form-->
            <div class="col-md-offset-1 col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title" title="caMicroscope Image Loader"><span class="glyphicon glyphicon-file"></span>Load whole slide tissue images</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- start form -->
                                <form id="uploadme" class="form-horizontal" role="form" action="/quip-loader/submitData" method="post" enctype="multipart/form-data" data-toggle="validator">
                                    <div class="form-group row">
                                        <label for="imageid" class="col-sm-3 control-label">Image ID:</label>
                                        <div class="col-sm-8">
                                           <input id="imageid" type="text" name="case_id" label="Image ID: " class="form-control"  placeholder="Enter an image ID" pattern="^[a-zA-Z0-9-_]+$" title="An image ID can only contain the following characters (A-Z, a-z, 0-9, -, _)" required>
                                           <span class="help-block"><span class="glyphicon glyphicon-star red" alt="Required Control" title="Required"></span>An image ID can only contain the following characters (A-Z, a-z, 0-9, -, _)</span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                      <label for="upload_image" class="col-sm-3 control-label">Select a file to upload:</label>
                                      <div class="col-sm-8">
                                        <label class="btn btn-default btn-file">
                                            <b>Choose a File</b><input name="upload_image" id="upload_image" type="file">
                                        </label>
                                        <span class="help-block"><span class="glyphicon glyphicon-star red" alt="Required Control" title="Required"></span>Image Loader uploads whole slide tissue images</span>
                                      </div>
                                    </div>

                                    <div class="row"><br /></div>
                                    <div class="form-group row">
                                        <div class="col-sm-offset-3 col-sm-9">
                                            <h2 id="estatus" class="msg"></h2>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-offset-3 col-sm-8">
                                            <input id="submitButton" type="submit" value="Upload Image" class="btn btn-lg btn-block btn-success" title="Upload image file to QuIP">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="progressBar" class="col-sm-3 control-label">&nbsp;</label>
                                        <div class="col-sm-8" id="progressBar">
                                            <div class="progress" >
                                                <div id ="progressbar" class="bar"></div >
                                                <div class="percent">0%</div >
                                            </div>
                                            <div id="status"></div><br>
                                        </div>
                                    </div>
                                </div>
                            </form><br>
                            <!--end form-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End container-->
    <script>
        $(document).ready(function(){
            var bar = $('.bar');
            var percent = $('.percent');
            var status = $('#status');
            var options = {
                url: '/quip-loader/submitData',
                dataType : 'json',
                beforeSend: function() {
                        document.getElementById("submitButton").disabled = true;
                        document.getElementById("estatus").innerHTML = "Uploading...";
                        document.getElementById("progressbar").classList.add("bar");
                        document.getElementById("progressbar").classList.remove("errorbar");
                        status.empty();
                        var percentVal = '0%';
                        bar.width(percentVal);
                        percent.html(percentVal);
                },
                uploadProgress: function(event, position, total, percentComplete) {
                        var percentVal = percentComplete + '%';
                        bar.width(percentVal);
                        percent.html(percentVal);
                },
                complete: function(xhr) {
                        //status.html(xhr.responseText);
                },
                error: function(response) {
                                document.getElementById("submitButton").disabled = false;
                                //console.log(document.getElementById("imageid").innerHTML);
                                console.log(response.status);
                                console.log("Call Tahsin...");
                                document.getElementById("estatus").innerHTML = "Problem with uploading.";
                                document.getElementById("progressbar").classList.remove("bar");
                                document.getElementById("progressbar").classList.add("errorbar");
                                      },
                success: function(response) {
                                document.getElementById("submitButton").disabled = false;
                                console.log(response.status);
                                document.getElementById("uploadme").reset();
                                document.getElementById("estatus").innerHTML = "Image file is uploaded.";
                                        }
        };
        $('#uploadme').submit(function() {
                var imageid = document.getElementById("imageid").value;
                imageid = imageid.trim()
                if(imageid==""){
                   document.getElementById("estatus").innerHTML = "Please enter an image ID!";
                   return false;
                 }
                var regexp = /^[a-zA-Z0-9-_]+$/;
                 if(imageid.search(regexp) == -1){
                   document.getElementById("estatus").innerHTML = "Image ID can only contain characters (A-Z,a-z,0-9,-,_)!";
                   return false;
                 }
                 if($("#upload_image").val()==""){
                   document.getElementById("estatus").innerHTML = "Please select an image file!";
                   return false;
                 }
                // remove space
                imageid = imageid.split(' ').join('_');
                document.getElementById("imageid").value = imageid;
                $.ajax({
                        dataType: "JSON",
                        url: "/quip-findapi/?limit=100&find={'subject_id':'"+imageid+"'}&db=quip&collection=images",
                        success: function(response) {
                                        if (response.length==0) {
                                                $('#uploadme').ajaxSubmit(options);
                                        } else {
                                                document.getElementById("estatus").innerHTML = "Image ID already exists!";
                                        }
                                },
                        error: function(response) {
                                console.log("error on post");
                        }
                });
                return false;
        });
    });
</script>
</body></html>
