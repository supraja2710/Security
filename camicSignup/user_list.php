<?php

  require '../authenticate.php';

  $command='sh list_user.sh';

  $output1 =shell_exec($command);

  preg_match_all("/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/", $output1, $matches,PREG_PATTERN_ORDER);

  $user_count= sizeof($matches[0]);

?>



 <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
    <head>
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
        <title>caMicroscope User Signup</title>
        <script type='text/javascript' src='gen_validatorv4.js'  xml:space="preserve"></script>

        <link rel="stylesheet" href="/css/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="/camicroscope/css/annotools.css">
        <link rel="stylesheet" href="/css/quipApps.css">
        <link rel="stylesheet" href="/css/header.css">
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
                      <img src="/svg/camic_vector.svg" id="svg1" width="100%" height="100%" viewBox="0 0 640 480" preserveAspectRatio="xMaxYMax"></svg>
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
          
            <li class="nav-item">
              <a class="nav-link" href="/camicSignup/lymphSuperuser.php" title="Assign Lymphocyte App Superuser">
                <div class="icon">
                  <div class="microscope">
                      <img src="/camicroscope/images/Heatmap.svg" width="100%" height="100%" viewBox="0 0 640 480" preserveAspectRatio="xMaxYMax">
                  </div>
                  <span class="icolabel">Lymph</span>
                </div>
              </a>
            </li> 
          </ul>
        </div>
      </nav>

        <div class="container">
            <div class="spacerTop"></div>
            <div class="col-md-offset-1 col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title" title="Web Interface for Signup New users to QuIP."><span class="glyphicon glyphicon-file"></span>caMicroscope User List</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">

                              <div class="form-group row">
                                        <label class="col-sm-3 control-label">Current User List:</label>
                              </div>

                             <?php   for( $i = 0; $i<$user_count; $i++ ) { ?>

                               <form id='deleteUserForm' class="form-horizontal" name="deleteUserForm" action='deleteUser.php' method='post' accept-charset='UTF-8'>
                                  <input id="email" type="hidden" name="email" value="<?php echo $matches[0][$i] ?>" >

                                 <div class="form-group row">
                                        <label  class="col-sm-8 control-label"><?php echo $matches[0][$i] ?></label>
                                 </div>

                                <div class="form-group row">
                                   <div class="col-sm-offset-3 col-sm-8">
                                            <input id="submitButton" type="submit" value="Delete Above User" class="btn btn-sm btn-block btn-success" title="Delete Above User">
                                   </div>
                                </div>

                              </form>
                             <?php } ?>
                        </div>
                    </div>
                </div>

			<div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">

                              <div class="form-group row">
                                        <label class="col-sm-3 control-label">Add User From Mongodb:</label>
                              </div>

                               <form id='addUserForm' class="form-horizontal" name="addUserForm" action='add_user_from_mongo.php' method='post' accept-charset='UTF-8'>
                                <div class="form-group row">
                                   <div class="col-sm-offset-3 col-sm-8">
                                            <input id="submitButton" type="submit" value="Add User From MongoDB" class="btn btn-sm btn-block btn-success" title="Add User From MongoDB">
                                   </div>
                                </div>

                              </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

   </body>
 </html>
