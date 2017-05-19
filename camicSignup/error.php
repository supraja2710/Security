<!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
    <head>
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
        <title>caMicroscope Admin Page</title> 
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
                        
                        <div class="form-group row">
                            <label  class="col-sm-10 control-label"><font color="red">Error Message:</font><?php echo $_GET["message"] ?></label>                                   
                       </div>
                           
                    </div>
                </div>            
            </div>
        </div>
    </div>
       
 </body>
 </html>	
 
