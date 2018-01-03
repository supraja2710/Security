<?php
// defaults

$cnf=[]


try{
  $cnf = parse_ini_file('config.ini')
}
catch(Exception $e){
}

// security default to on
