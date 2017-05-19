<?php 

  require '../authenticate.php';
  include_once("RestRequest.php");
  require_once 'HTTP/Request2.php';

  $config = require '../camicroscope/api/Configuration/config.php';

  $postUrl   = $config['postUser']; 

  if (!empty($_SESSION['api_key'])) {
    $api_key = $_SESSION['api_key'];
  }

  $email=$_POST['email'];

  $command='sh delete_user.sh'. ' ' . $email; 

  $output =shell_exec($command);
  
  //print_r($output);
  
  header('Location: user_list.php');
  exit;

  //$matches = array();
  //preg_match_all("/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/", $output1, $matches,PREG_PATTERN_ORDER); 
  //print_r($matches);
  
  //print_r($matches[0][0]);
  //print_r($matches[0][1]);
  
  //$user_count= sizeof($matches[0]);  
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