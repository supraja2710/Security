<?php
    require ('../authenticate.php');
?>
<!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
    <head>
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
        <title>Manage caMic Lymphocyte Superuser</title>
        <script type='text/javascript' src='gen_validatorv4.js'  xml:space="preserve"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <link rel="stylesheet" href="/css/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="/camicroscope/css/annotools.css">
        <link rel="stylesheet" href="/css/quipApps.css">
        <link rel="stylesheet" href="/css/header.css">
        <!--Import materialize.css-->
        <!--<link type="text/css" rel="stylesheet" href="/materialize/css/materialize.min.css"  media="screen,projection"/>
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="/materialize/js/materialize.min.js"></script>-->
        <script src="http://malsup.github.com/jquery.form.js"></script>
        <script src="/js/vendor/bootstrap/bootstrap.min.js"></script>
        <script src="/js/vendor/bootstrap-filestyle.min.js"></script>
        <script src="/js/config.js"></script>
        
    </head>

    <body>

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
                      <img src="/camicroscope/images/camic_vector.svg" id="svg1" width="100%" height="100%" viewBox="0 0 640 480" preserveAspectRatio="xMaxYMax">
                  </div>
                  <span class="icolabel">CAMIC</span>
                </div>
              </a>
            </li>
        
            <li class="nav-item">
              <a class="nav-link" href="/camicSignup/index.html">
                <div class="icon">
                  <span class="ico glyphicon glyphicon-user"></span>
                  <span class="icolabel">Add</span>
                </div>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="/camicSignup/user_list.php">
                <div class="icon">
                  <span class="ico glyphicon glyphicon-th-list"></span>
                  <span class="icolabel">Users</span>
                </div>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="/camicSignup/adminUpdate.html">
                <div class="icon">
                  <span class="ico glyphicon glyphicon-lock"></span>
                  <span class="icolabel">Password</span>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </nav>
       
       <div class="container">
            <div class="spacerTop"></div>

            <div class="col-md-offset-1 col-md-10">
              <h2>Manage Superusers For Lymphocyte App</h2>
              <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title" title="Assign superuser rights to the user for a Lymphocyte App"><a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><span class="glyphicon glyphicon-user"></span> Assign caMic Lymphocyte App Superuser</a></h3>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <div class="spacerTop"></div>
                        <div class="row">
                            <div class="col-md-12">
                           <!-- start form -->
                            <form id='lymphFormAssign' class="form-horizontal" name="lymphFormAssign" action='../camicroscope/api/Data/lymphocyteSuperusers.php' method='post' accept-charset='UTF-8' onsubmit="return confirm('Are you sure you want to assign superuser rights to this user for a Lymphocyte App?')">
                                
                                 <div class="form-group row">
                                        <label for="email" class="col-sm-3 control-label">User's Gmail Address:</label>
                                        <div class="col-sm-7">
                                            <div class="input-group">
                                               <input id="emailAssign" type="email" name="emailAssign" label="User's Gmail Address: " class="form-control input"  placeholder="Enter User's Gmail Address" title="Enter a valid email address" required>
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-envelope" alt="Required Control" style="color:black;font-size:14px;"></span> 
                                                </div>
                                            </div>
                                           <span class="help-block"><span class="glyphicon glyphicon-star red" alt="Required Control" title="Required"></span>Enter a valid gmail address</span>
                                        </div>
                              </div>
                                
                            <div class="form-group row">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <h5 id="msgAssign" class="msg"></h5>
                                </div>
                            </div>
                                
                            <div class="form-group row">
                                   <div class="col-sm-offset-3 col-sm-7">
                                            <input id="submitButtonAssign" type="submit" class="btn btn-md btn-block btn-success" title="Assign superuser rights to this user for a Lymphocyte App">
                                   </div>
                             </div>
                       </form>
                       
                       <!--end form-->
                        <br>
                        </div>
                       </div>
                    </div>
                </div>
            </div>
            <!-- start delete section -->
            <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h3 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapse2"><span class="glyphicon glyphicon-user"></span> Remove caMic Lymphocyte Superuser</a></h3>
                    </div>
                   <div id="collapse2" class="panel-collapse collapse" >
                    <div class="panel-body">
                        <div class="spacerTop"></div>
                        <div class="row">
                            <div class="col-md-12">
                           <!-- start form -->
                            <form id='lymphFormDelete' class="form-horizontal" name="lymphSuperuserFormDelete" action='deleteLymphSuperuser.php' method='post' accept-charset='UTF-8' onsubmit="return confirm('Are you sure you want to remove this user from superusers for Lymphocyte App?')">
                                
                                 <div class="form-group row">
                                        <label for="email" class="col-sm-3 control-label">User's Gmail Address:</label>
                                        <div class="col-sm-7">
                                            <div class="input-group">
                                               <input id="email" type="email" name="email" label="User's Gmail Address: " class="form-control input"  placeholder="Enter User's Gmail Address" title="Enter a valid email address" required>
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-envelope" alt="Required Control" style="color:black;font-size:14px;"></span> 
                                                </div>
                                            </div>
                                           <span class="help-block"><span class="glyphicon glyphicon-star red" alt="Required Control" title="Required"></span>Enter a valid gmail address</span>
                                        </div>
                              </div>
                                
                            <div class="form-group row">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <h5 id="estatusDelete" class="msg"></h5>
                                </div>
                            </div>
                                
                             <div class="form-group row">
                                   <div class="col-sm-offset-3 col-sm-7">
                                            <input id="deleteButton" type="submit"  value="Remove Lymphocyte Superuser" class="btn btn-md btn-block btn-danger" title="Delete Lymphocyte App Superuser" >
                                   </div>
                             </div>
                       </form>
                       <!--end form-->
                        <br>
                        </div>
                    </div>
                   </div>
                </div>
            </div>
            <!-- end delete section -->
           </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
          
        //var frmvalidator  = new Validator("lymphFormAssign");

        //frmvalidator.addValidation("emailAssign","req","Please enter the gmail address");
        //frmvalidator.addValidation("emailAssign","maxlen=50", "Max length for Email is 50");
        //frmvalidator.addValidation("emailAssign","email");
            var msgEnterEmail = 'Please enter the gmail address.';
            var msgNotValidEmail = 'The value is not a valid email address.';
            var msgSuperuserExists = 'This lymphocyte superuser already exists.';
            var msgSessionNotEstablished = 'Error on post.  Your session could not be established.  Please login to QuIP to meet access policy requirements. ';
            var msgFormError = 'Form Error';
            var msgResponseNoData = 'No lymphocyte superuser data';
            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        
            $('#submitButtonAssign').click(function() {
            
                var email = document.getElementById("emailAssign").value;
                email = email.trim().toLowerCase();
            
                var superuserData = {
                    'email': email,
                    'role': lymphUser.superuserRole
                };
            
                if (email === "") {
                    document.getElementById("msgAssign").innerHTML = msgEnterEmail;
                    return false;
                }
        
                if(!(email).match(emailPattern)) {
                    document.getElementById("msgAssign").innerHTML = msgNotValidEmail;
                    return false;
                 } 
            
                 $.ajax({
                     'type': 'GET',
                     url: "../camicroscope/api/Data/lymphocyteSuperusers.php?email=" + email,
                     success: function(response) {
                         var msgConfirmAssign = 'Are you sure you want to assign ' + email + ' as a Lymphocyte App superuser?';
                         var msgUserAssigned  = 'User ' + email + ' was assigned rights as a Lymphocyte App superuser';
                         
                         if (response.trim().toLowerCase() !== msgResponseNoData.toLowerCase()) {
                             var data = JSON.parse(response);
                             console.log("Fetched data users length: " + data.length);
                             if (data.length == 0 && (confirm(msgConfirmAssign))) {
                                     //console.log('superuserData: ' + superuserData.email)
                                     $.ajax({
                                         'type': 'POST',
                                         url: '../camicroscope/api/Data/lymphocyteSuperusers.php',
                                         data: superuserData,
                                         success: function (res, err) {
                                         //console.log("response: ");
                                         console.log(res);
                                         console.log(err);
                                         console.log('successfully posted');
                                         document.getElementById('msgAssign').innerHTML = msgUserAssigned;
                                         }
                                    });

                             } else {
                                 for ( var j = 0; j < data.length; j++ ) {
                                     console.log(data);
                                     console.log("email: " + data[0].email);
                                     console.log("role: " + data[0].role);

                                     if (data[j].email.toLowerCase() === email.toLowerCase() && data[j].role.toLowerCase() === lymphUser.superuserRole.toLowerCase()){
                                         document.getElementById("msgAssign").innerHTML = msgSuperuserExists;
                                         break;
                                     }
                                 }
                              }
                          } else {
                              document.getElementById("msgAssign").innerHTML = msgSessionNotEstablished;
                          }
                     },  //end success
                     error: function(response) {
                         console.log("error on post: " + response);
                         document.getElementById("msgAssign").innerHTML = msgFormError;
                         //Materialize.toast('Form Error!', 4000);
                      }
                  });
          
                 return false;
              });  // end 'submitButtonAssign' click
           });  //end ready
    </script>

 </body>
 </html>
