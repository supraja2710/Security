
<?php

include_once('htpasswd.php');

$htpasswd = new htpasswd('/etc/apache2/.htpasswd'); // path to your .htpasswd file

$user=$_POST['username'];
$youpassword=$_POST['youpassword']; 
  
// Trying to remove user 'admin'
$htpasswd->user_delete('admin'); 

// add new user 
$newpassword = $htpasswd->crypt_apr1_md5($youpassword);

$htpasswd->user_add($user,$newpassword)


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
            <a title="caMicroscope" href="/camicSignup/index.html" class="toolLink">caMicroscope User Signup</a>
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
                                        <label  class="col-sm-8 control-label">Your user Name: "<?php echo $_POST['username'] ?>"</label>                                   
                             </div>  
                             
                              <div class="form-group row">
                                        <label  class="col-sm-8 control-label">Your password: "<?php echo $_POST['youpassword'] ?>"</label>                                   
                             </div> 
                             
                             <div class="form-group row">
                                        <label  class="col-sm-8 control-label">Your crypted password: "<?php echo $newpassword ?>"</label>                                   
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
 
