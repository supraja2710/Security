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
    </head>

    <body>
    
     <div class="annotools">
            <a href="/select.php" title="Home">
                <img src="/camicroscope/images/ic_home_white_24px.svg" class="toolButton firstToolButtonSpace" alt="home">
            </a>
            <img src="/camicroscope/images/spacer.svg" class="spacerButton">
            <a title="caMicroscope" href="/FlexTables/index.php" class="toolLink">caMicroscope</a>            
            <img src="/camicroscope/images/spacer.svg" class="spacerButton">
            
            <a title="caMicroscope" href="/camicSignup/adminUpdate.html" class="toolLink">Admin Credential Update</a>
            <img src="/camicroscope/images/spacer.svg" class="spacerButton">
            
             <a title="caMicroscope" href="/camicSignup/user_list.php" class="toolLink">User List</a>
             <img src="/camicroscope/images/spacer.svg" class="spacerButton">
            
            <a title="caMicroscope" href="/camicSignup/index.html" class="toolLink">camicSignup</a>
            <img src="/camicroscope/images/spacer.svg" class="spacerButton">
            
            <p class="titleButton">caMicroscope User List</p>
    </div>
        
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
	
