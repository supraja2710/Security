<?php 

  require '../authenticate.php';
  include_once("RestRequest.php");
  require_once 'HTTP/Request2.php';

  $config = require '../camicroscope/api/Configuration/config.php';

  $postUrl   = $config['postUser']; 

  if (!empty($_SESSION['api_key'])) {
    $api_key = $_SESSION['api_key'];
  }

  $command='sh list_user.sh'; 

  $output1 =shell_exec($command);
  
  //$matches = array();
  preg_match_all("/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/", $output1, $matches,PREG_PATTERN_ORDER); 
  //print_r($matches);
  
  //print_r($matches[0][0]);
  //print_r($matches[0][1]);
  
  $user_count= sizeof($matches[0]);  

  
  //echo $user_count + "user\n";
  
  //$keywords = preg_split('/\"username\"(.*)\"\}/', $output1, -1, PREG_SPLIT_OFFSET_CAPTURE);
  //print_r($keywords);  
  
  /*
  $output1 = str_replace('"', "'", $output1);
  
  $errorPosition = strpos($output1, "error");

  if ($errorPosition > -1 ){
    $output = "error occured.";    
  } else if ($errorPosition == false ) {
    $output = "done sucessfully.";
    $output1="Your input has been sucessfully added to Bindaas database!";
  } else 
     $output = "done sucessfully.";

  //The JSON data.
  $u24_user = array(
     'fname' => $fname,
     'lname' => $lname,
	   'username' =>$username,
	   'email' => $email
  );

	$url = $postUrl . "?api_key=".$api_key;    
		
  $ch = curl_init();
  $headers= array('Accept: application/json','Content-Type: application/json'); 
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($u24_user, JSON_NUMERIC_CHECK));

  $result = curl_exec($ch);

  if($result === false){
     $result =  curl_error($ch);
  }
  curl_close($ch);
      
  $rightposition = strpos($result, "{ 'count':'1'}");

  if ($rightposition > -1 ){
     $output2="Your input has been sucessfully added to MongoDB database!";  
  } else if ($rightposition == false ) {
      $output2="Error occurs!";
  } else 
     $output2 = $result;   
     
 */ 

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
            </div>
        </div>
    </div>
    
   </body>
 </html>	
	
