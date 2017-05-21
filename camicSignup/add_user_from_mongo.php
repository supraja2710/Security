<?php 

  require '../authenticate.php';
  
  include_once("../camicroscope/api/Data/RestRequest.php");
  
  require_once 'HTTP/Request2.php';

  $config = require '../camicroscope/api/Configuration/config.php';

  $getUrl   = $config['findAllBindaasUsers']; 

  if (!empty($_SESSION['api_key'])) {
    $api_key = $_SESSION['api_key'];
  }

  $getUrl  = $getUrl . "api_key=" . $api_key;
  $url=$getUrl;
  echo $url;
  
  $getRequest = new RestRequest($url,'GET');
  
  $response=$getRequest->execute();
  echo $response;
  print_r($response);
  
  //Figure out how to parse reponse
  $emailList = json_decode($getRequest->responseBody);
  echo $emailList;
  print_r($emailList[0]);
   
  $findUser=true;

  if($emailList) 
     $findUser=true; 
  else  
     $findUser=false;    
  
 
  if($findUser){
    // Convert JSON string to Array
   // $someArray = json_decode($emailList, true);
    //print_r($someArray);        // Dump all data of the Array
    echo $emailList[0]["email"]; // Access Array data

    foreach ($emailList as $key => $value) {
      echo $value["email"] ;
    
      $email = $value["email"] ;
      $fname=$value["fname"];
      $lname=$value['lname'];
      $username=$value['username']; 
      $expirationDate='01/01/2020';

      $command='sh add_user.sh' . ' ' . $username . ' ' . $email . ' ' .  $expirationDate ; 

      $output1 =shell_exec($command);
      $output1 = str_replace('"', "'", $output1);
      $errorPosition = strpos($output1, "error");

      if ($errorPosition > -1 ){
        $output = "error occured.";    
      } else if ($errorPosition == false ) {
         $output = "done sucessfully.";         
      } else {
        $output = "done sucessfully.";    
      }
      
    echo $output ;
   }
   
  }
 
 
 header('Location: user_list.php');
 exit; 
  
 ?> 
