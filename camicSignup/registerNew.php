
<?php 
  require '../authenticate.php';

include_once("RestRequest.php");
require_once 'HTTP/Request2.php';

$config = require '../camicroscope/api/Configuration/config.php';

$postUrl   = $config['postUser'];

//echo $postUrl;


if (!empty($_SESSION['api_key'])) {
    $api_key = $_SESSION['api_key'];
}
echo $api_key;
echo "<br>";

echo "Inputer Data:";
echo "<br>";
echo "<br>";

$fname=$_POST['fname'];
echo "	First Name: $fname";
echo "<br>";

$lname=$_POST['lname'];
echo "	Last Name: $lname";
echo "<br>";

$email=$_POST['email'];

echo "	Email: $email";
echo "<br>";

$username=$fname . $lname;
echo "	username: $username";
echo "<br>";

$expirationDate='01/01/2020';
echo "	Expiration Date: $expirationDate";
echo "<br>";

$command='sh createAPIKey.sh' . ' ' . $username . ' ' . $email . ' ' .  $expirationDate ; 

echo "	Command: $command";
echo "<br>";
echo "<br>";
echo "Return Result:";
echo "<br>";

echo shell_exec($command);

echo "<br>";
//echo shell_exec('sh createAPIKey.sh someone3 somewhere3@gmail.com  01/01/2020');
        echo "<br>";
        echo " -- save user info to mongodb -- ";
        echo "<br>";

        //The JSON data.
       $u24_user = array(
         'fname' => $fname,
         'lname' => $lname,
	     'username' =>$username,
	     'email' => $email
        );

		$url = $postUrl . "?api_key=".$api_key;
		
        echo "posting data\n";
		echo "<br>";
        echo $url;
		echo "<br>";
		
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
        echo "<br>";
        echo $result;
		echo "<br>";
        echo "done";


?>
