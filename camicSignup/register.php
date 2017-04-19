
<?php

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
echo "<br>";

echo shell_exec($command);

echo "<br>";
//echo shell_exec('sh createAPIKey.sh someone3 somewhere3@gmail.com  01/01/2020');

?>
