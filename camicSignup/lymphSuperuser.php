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
              <h2>Manage caMic Lymphocyte Superuser</h2>
              <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><span class="glyphicon glyphicon-user"></span> Assign caMic Lymphocyte Superuser</a></h3>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <div class="spacerTop"></div>
                        <div class="row">
                            <div class="col-md-12">
                           <!-- start form -->
                            <form id='lymphForm' class="form-horizontal" name="lymphSuperuserForm" action='assignLymphSuperuser.php' method='post' accept-charset='UTF-8'>
                                
                                 <div class="form-group row">
                                        <label for="email" class="col-sm-3 control-label">User's Gmail Address:</label>
                                        <div class="col-sm-7">
                                            <div class="input-group">
                                               <input id="email" type="text" name="email" label="User's Gmail Address: " class="form-control input"  placeholder="Enter User's Gmail Address" title="Enter a valid email address" required>
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-envelope" alt="Required Control" style="color:black;font-size:14px;"></span> 
                                                </div>
                                            </div>
                                           <span class="help-block"><span class="glyphicon glyphicon-star red" alt="Required Control" title="Required"></span>Enter a valid gmail address</span>
                                        </div>
                              </div>
                                
                            <div class="form-group row">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <h5 id="estatus" class="msg"></h5>
                                </div>
                            </div>
                                
                            <div class="form-group row">
                                   <div class="col-sm-offset-3 col-sm-7">
                                            <input id="submitButton" type="submit" class="btn btn-md btn-block btn-success" title="Assign Lymphocyte App Superuser">
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
            <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapse2"><span class="glyphicon glyphicon-user"></span> Delete caMic Lymphocyte Superuser</a></h3>
                    </div>
                   <div id="collapse2" class="panel-collapse collapse" >
                    <div class="panel-body">
                        <div class="spacerTop"></div>
                        <div class="row">
                            <div class="col-md-12">
                           <!-- start form -->
                            <form id='lymphFormDelete' class="form-horizontal" name="lymphSuperuserFormDelete" action='deleteLymphSuperuser.php' method='post' accept-charset='UTF-8' onsubmit="return confirm('Are you sure you want to delete?')">
                                
                                 <div class="form-group row">
                                        <label for="email" class="col-sm-3 control-label">User's Gmail Address:</label>
                                        <div class="col-sm-7">
                                            <div class="input-group">
                                               <input id="email" type="text" name="email" label="User's Gmail Address: " class="form-control input"  placeholder="Enter User's Gmail Address" title="Enter a valid email address" required>
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
                                            <input id="deleteButton" type="submit"  value="Delete Lymphocyte Superuser" class="btn btn-md btn-block btn-danger" title="Delete Lymphocyte App Superuser" onsubmit="return confirm('Are you sure you want to delete?')">
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
          
        var frmvalidator  = new Validator("lymphForm");

         frmvalidator.addValidation("email","req","Please enter the gmail address");
         frmvalidator.addValidation("email","maxlen=50", "Max length for Email is 50");
         frmvalidator.addValidation("email","email");
        
        $('#submitButton').click(function() {
            
          var email = document.getElementById("email").value;
          email = email.trim().toLowerCase();
            
          var superuserData = {
              'email': email,
              'role': lymphUser.superuserRole
          };
            
          if (email == "") {
            document.getElementById("estatus").innerHTML = "Please enter the gmail address";
               return false;
          }
        
          var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
          if(!(email).match(emailPattern)) {
              document.getElementById("estatus").innerHTML = "The value is not a valid email address";
              return false;
          } 
          
          
          $.ajax({
            dataType: "JSON",
            url: "/quip-findapi/?limit=1&find={'email':'" + email + "'}&db=quip&collection=lymphusers",
            success: function(response) {
              if (response.length == 0) {
                  
                console.log('superuserData: ' + superuserData.email)
                  
                 $.ajax({
                'type': 'POST',
                 url: '../camicroscope/api/Data/lymphocyteSuperusers.php',
                 data: superuserData,
                 success: function (res, err) {
                    //console.log("response: ")
                    console.log(res)
                    console.log(err)

                    console.log('successfully posted')
                    document.getElementById('estatus').innerHTML = 'User ' + email + ' was assigned rights as a lymphocyte project superuser';
                    }
                 }) 
                  
              } else {
                document.getElementById("estatus").innerHTML =
                  "This lymphocyte superuser already exists!";
              }
            },
            error: function(response) {
              console.log("error on post");
              document.getElementById("estatus").innerHTML = "Error on post.  Your session could not be established.  Please login to QuIP to meet access policy requirements.";
              //Materialize.toast('Form Error!', 4000);
            }
          });
          return false;
        });
      });
    </script>

 </body>
 </html>
