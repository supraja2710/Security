#!/bin/bash


if [ $# -eq 1 ] && [ $1 == "help" ]
then
   echo $0 "<user email address>"
   exit 0;
elif [ $# -eq 0 ] || [ $# -ne 1 ]
then
    echo "Usage: $0 <user email address>"
    exit;
fi

USERNAME="$1"

COMMAND="java -jar trusted-app-client-0.0.1-jar-with-dependencies.jar -action r -username $USERNAME  -id camicSignup -secret 9002eaf56-90a5-4257-8665-6341a5f77107 -url http://quip-data:9099/trustedApplication"
#echo $COMMAND
eval $COMMAND
