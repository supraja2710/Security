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
        <script src="http://bootboxjs.com/bootbox.js"></script>
        <script src="/js/config.js"></script>
        
        <style>
            #emailInput {
              background-image: url('/svg/searchicon_vector.svg');
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
              <h2>Manage Superusers For caMic Lymphocyte App</h2>
              <a href="#" class="btn btn-default openall" data-toggle="tooltip" title="Open all panels">Open All</a> <a href="#" class="btn btn-default closeall" data-toggle="tooltip" title="Close all panels">Close All</a>
              <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title" data-toggle="tooltip" title="Assign superuser rights for a Lymphocyte App"><a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><span class="glyphicon glyphicon-user"></span> Assign Superuser for caMic Lymphocyte App</a></h3>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse">
                    <div class="panel-body">
                        <div class="spacerTop"></div>
                        <div class="row">
                            <div class="col-md-12">
                           <!-- start form -->
                            <form id='lymphFormAssign' class="form-horizontal" name="lymphFormAssign" action='../camicroscope/api/Data/lymphocyteSuperusers.php' method='post' accept-charset='UTF-8'>

                                 <div class="form-group row">
                                     <label for="emailAssign" class="col-sm-3 control-label">User's Gmail Address:</label>
                                     <div class="col-sm-7">
                                         <div class="input-group">
                                               <input id="emailAssign" type="email" name="emailAssign" label="User's Gmail Address: " class="form-control input"  placeholder="Enter User's Gmail Address" data-toggle="tooltip" title="Enter a valid email address" required>
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
                                        <input id="submitButtonAssign" type="submit" value="Assign Lymphocyte App Superuser" class="btn btn-md btn-block btn-success" data-toggle="tooltip" title="Assign superuser rights for a Lymphocyte App to this user">
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
            <!-- start remove section -->
            <div class="panel panel-danger">
                   <div class="panel-heading">
                        <h3 class="panel-title" data-toggle="tooltip" title="Remove superuser for caMic Lymphocyte App"><a data-toggle="collapse" data-parent="#accordion" href="#collapse2"><span class="glyphicon glyphicon-user"></span> Remove Superuser for caMic Lymphocyte App</a></h3>
                   </div>
                   <div id="collapse2" class="panel-collapse collapse" >
                    <div class="panel-body">
                        <div class="spacerTop"></div>
                        <div class="row">
                            <div class="col-md-12">
                           <!-- start form -->
                            <form id='lymphFormRemove' class="form-horizontal" name="lymphFormRemove" action='../camicroscope/api/Data/lymphocyteSuperusers.php'  method='post' accept-charset='UTF-8'>

                                 <div class="form-group row">
                                        <label for="emailRemove" class="col-sm-3 control-label">User's Gmail Address:</label>
                                        <div class="col-sm-7">
                                            <div class="input-group">
                                               <input id="emailRemove" type="email" name="emailRemove" label="User's Gmail Address: " class="form-control input"  placeholder="Enter User's Gmail Address" data-toggle="tooltip" title="Enter a valid email address" required>
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-envelope" alt="Required Control" style="color:black;font-size:14px;"></span> 
                                                </div>
                                            </div>
                                           <span class="help-block"><span class="glyphicon glyphicon-star red" alt="Required Control" title="Required"></span>Enter a valid gmail address</span>
                                        </div>
                                  </div>

                                  <div class="form-group row">
                                      <div class="col-sm-offset-3 col-sm-9">
                                          <h5 id="msgRemove" class="msg"></h5>
                                      </div>
                                  </div>

                                  <div class="form-group row">
                                     <div class="col-sm-offset-3 col-sm-7">
                                            <input id="submitButtonRemove" type="submit"  value="Remove Lymphocyte App Superuser" class="btn btn-md btn-block btn-danger" data-toggle="tooltip" title="Remove this Lymphocyte App Superuser" >
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
            
            <!-- start list section -->
            <div class="panel panel-default">
                   <div class="panel-heading">
                        <h3 class="panel-title" data-toggle="tooltip" title="View a List of Superusers for caMic Lymphocyte App"><a data-toggle="collapse" data-parent="#accordion" href="#collapse3"><span class="glyphicon glyphicon-user"></span> View a List of Superusers for caMic Lymphocyte App</a></h3>
                   </div>
                   <div id="collapse3" class="panel-collapse collapse in" >
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                            <!-- start form -->
                                <input type="text" id="emailInput" onkeyup="myFunction()" placeholder="Search for user's email.." title="Type in an email address">
                                <form id='lymphFormRemoveFromList' class="form-horizontal" name="lymphFormRemoveFromList" action='/camicSignup/lymphSuperuser.php'  method='post' accept-charset='UTF-8'>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end list section -->
           </div>
         </div>
       </div>
       <script>
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
        <script src="/js/lymph-superusers.js"></script>
  </body>
</html>
