
<?php


$fname=$_POST['fname'];
echo "$fname \r\n";


$lname=$_POST['lname'];
echo $lname;
echo "\r\n";

$email=$_POST['email'];

echo $email;
echo "\r\n";

$username=$fname . $lname;
echo $username;
echo "\r\n";

$expirationDate='01/01/2020';
echo $expirationDate;
echo "\r\n";

$command='sh createAPIKey.sh' . ' ' . $username . ' ' . $email . ' ' .  $expirationDate ; 

echo $command;
echo "\r\n";


echo shell_exec($command);

//echo shell_exec('sh createAPIKey.sh someone3 somewhere3@gmail.com  01/01/2020');

?>

