<?php
  require '../authenticate.php';
  require '../branding.php';
  ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Import Google Icon Font-->
    <script type='text/javascript' src='gen_validatorv4.js'  xml:space="preserve"></script>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css"  media="screen,projection"/>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="../materialize/js/materialize.min.js"></script>
    <script src="https://apis.google.com/js/client:platform.js?onload=start" async defer></script>
    <link rel="stylesheet" href="../css/style.css">
    <title>[*]<?php print $branding_title; ?> Lymphocyte Superusers</title>
    <script src="../js/config.js"></script>
    <script src="../js/jquery.form.js"></script>
    <style>
            #emailInput {
              background-image: url('../svg/searchicon_vector.svg');
              background-position: 10px 10px;
              background-repeat: no-repeat;
              width: 100%;
              font-size: 16px;
              padding: 12px 20px 12px 40px;
              border: 1px solid #ddd;
              margin-bottom: 12px;
            }
    </style>
  </head>
  <body>
    <div class="navbar-fixed">
      <nav class="blue darken-3">
        <div class="nav-wrapper">
          <a href="index.php" class="brand-logo">
          <i class="microscope">
          <img src="../svg/camic_vector.svg" id="svg1" class="camic_logo" width="100%" height="100%" viewBox="0 0 640 480" preserveAspectRatio="xMaxYMax"/>
          </i>
          [*]<?php print $branding_title; ?>
          </a>
        </div>
      </nav>
    </div>
    
    <div id="modalLymph" class="modal modal-fixed-footer">
      <div class="modal-content" >
        <div class="container">
          <h4> List Lymphocyte Superusers </h4>
          
         <!-- start list section -->
            
                            <!-- start form -->
                                <input type="text" id="emailInput" onkeyup="myFunction()" placeholder="Search for user's email.." title="Type in an email address">
                                <form id='lymphFormRemoveFromList' class="form-horizontal" name="lymphFormRemoveFromList" action='../camicSignup/lymphSuperuser.php'  method='post' accept-charset='UTF-8'>
                                     <div class="form-group row" id="divTable">
                                         <!--<table id="superusersTable" class="table table-hover" >
                                             <thead>
                                                <tr>
                                                    <th >User's Email</th>
                                                    <th>Action - Remove</th> 
                                                </tr>
                                            </thead>
                                             <tbody>
                                              <tr>
                                                <td width="80%">alina.jasniewski@stonybrook.edu</td>
                                                <td><input id='user1' type="submit"  value="Remove" class="btn btn-md btn-block btn-danger" data-toggle="tooltip" title="Remove this Lymphocyte App Superuser" ></td>
                                              </tr>
                                              <tr>
                                                <td width="80%">alina.jasniewski2@stonybrook.edu</td>
                                                <td><input id='user2' type="submit"  value="Remove" class="btn btn-md btn-block btn-danger" data-toggle="tooltip" title="Remove this Lymphocyte App Superuser" ></td>
                                              </tr>
                                              <tr>
                                                <td width="80%">alina.jasniewski3@stonybrook.edu</td>
                                                <td><input id='user3' type="submit"  value="Remove" class="btn btn-md btn-block btn-danger" data-toggle="tooltip" title="Remove this Lymphocyte App Superuser" ></td>
                                              </tr>
                                            </tbody>
                                         </table>-->
                                     </div>
                                </form>
                                <!--end form-->
                               
<!-- end list section -->
        </div>
      </div>
      <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat " onclick="window.location.reload(true);">Close</a>
      </div>
    </div>
      
      
    <main>
    <div class="container">
      <div class="spacerTop"></div>
      <div class="col-md-offset-1 col-md-10">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title" title="Lymphocyte App Superusers">Lymphocyte App Superusers</h3>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-md-12">
                <form id='lymphFormAssign' class="form-horizontal" name="lymphFormAssign" action='../camicSignup/lymphSuperuser.php' method='post' accept-charset='UTF-8'>
                  <div class="input-field col s12">
                    <input id="emailAssign" name="emailAssign" type="text" class="validate">
                    <label for="emailAssign">User's Gmail Address</label>
                  </div>
                  <button id="submitButtonAssign" type="submit" value="Add User" class="btn-large blue waves-effect waves-light btn" action="submit">
                  Add Superuser <i class="material-icons right">person_add</i>
                  </button>
                </form>
                
                <div class="col-sm-offset-3 col-sm-9">
                  <h5 id="msgAssign" class="msg"></h5>
                </div>
               </div>
            </div>
            
            <div class="panel-body">
               <div class="row"></div>
               <div class="row">
                <form id='lymphFormRemove' class="form-horizontal" name="lymphFormRemove" action='../camicSignup/lymphSuperuser.php' method='post' accept-charset='UTF-8'>
                  <div class="input-field col s12">
                    <input id="emailRemove" name="emailRemove" type="text" class="validate">
                    <label for="emailRemove">User's Gmail Address</label>
                  </div>
                  <button id="submitButtonRemove" type="submit" value="Remove User" class="btn-large blue waves-effect waves-light btn" action="submit">
                  Remove Superuser <i class="material-icons right">person_remove</i>
                  </button><span><a href="#modalLymph">&nbsp;&nbsp;List Lymphocyte Superusers</a></span>
                </form>
                <div class="col-sm-offset-3 col-sm-9">
                  <h5 id="msgRemove" class="msg"></h5>
                </div>
              </div>
            </div>
              
          </div>
        </div>
      </div>
    </div>
  </main>
  <script>
    $('.modal').modal();
    
    function myFunction() {
        var input, filter, table, tr, td, i;
        input = document.getElementById("emailInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("superusersTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
             }       
         }
    }
  </script>
  <script src="../js/lymph-superusers.js"></script>
  </body>
</html>
