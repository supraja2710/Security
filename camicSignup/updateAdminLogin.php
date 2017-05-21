<?php

  require '../authenticate.php';
 
  include_once('htpasswd.php');  

  //echo shell_exec('htpasswd -bc /etc/apache2/.htpasswd admin quip2017');

  $htpasswd = new htpasswd('/etc/apache2/.htpasswd'); // path to your .htpasswd file

  $oldpasswd=$_POST['oldpasswd'];
  $newpasswd=$_POST['newpasswd'];
  $newpasswd2=$_POST['newpasswd2'];
  $returnvalue =  strcmp($newpasswd,$newpasswd2); 

  if ($returnvalue != 0) 
  { $message = "Your new password is NOT the same! Please enter same new password twice.";
    header('Location: error.php?message=' . $message);
    exit;
  } 

  $htpasswd->user_delete('admin'); 

  $user="admin";
  //add new user 
  //echo "add new user \n";
  $newpassword = $htpasswd->crypt_apr1_md5($newpasswd);
  //echo $newpassword ;

  $htpasswd->user_add($user,$newpassword)
 
  // A list of random user names
  //$users = array('$username');

  // Checking to see which users exist
  //foreach($users as $user)
	//echo "The username $user does ".($htpasswd->user_exists($user) ? 'exist' : 'not exist')."\n";
 
  // Trying to add all usernames with password 'apples'
	//foreach($users as $user)
  //echo "The username $user ".($htpasswd->user_add($user,'$youpassword') ? 'has been added' : 'already exists')."\n";
 
  // Trying to remove user 'santa'
  //echo "Removing user 'santa' if present\n";
  //$htpasswd->user_delete('santa');

  // Trying to update user innvo with new password 'oranges', will add user if they do not exist
  //if($htpasswd->user_update('innvo','oranges'))
  //echo "Updated password for 'innvo'\n";

?>


 <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
    <head>
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
        <title>caMicroscope Admin Credential Update</title> 
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
            
            <p class="titleButton">caMicroscope Admin Credential Update</p>
        </div>
        <div class="container">
            <div class="spacerTop"></div>            
           
            <div class="col-md-offset-1 col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title" title="Web Interface for Signup New users to QuIP."><span class="glyphicon glyphicon-file"></span>caMicroscope Admin Credential Update</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                          
                             <div class="form-group row">
                                        <label  class="col-sm-8 control-label">Your user Name: "<?php echo $user ?>"</label>                                   
                             </div>  
                             
                              <div class="form-group row">
                                        <label  class="col-sm-8 control-label">Your new password: "<?php echo $_POST['newpasswd'] ?>"</label>                                   
                             </div> 
                             
                             <div class="form-group row">
                                        <label  class="col-sm-8 control-label">Your crypted new password: "<?php echo $newpassword ?>"</label>                                   
                             </div>
                             
                             
                              <div class="form-group row">
                                        <label  class="col-sm-8 control-label">Your login credential has been updated!</label>                                   
                             </div> 
                             
                        </div>
                    </div>
                </div>            
            </div>
        </div>
    </div>
    
 </body>
 </html>
