#!/bin/bash


if [ $# -eq 1 ] && [ $1 == "help" ]
then
   echo $0 "<IMS Name/username/name> <email address> <key expiration data mm/dd/yyyy>"
   exit 0;
elif [ $# -eq 0 ] || [ $# -ne 3 ]
then
    echo "Usage: $0 <IMS Name/username/name> <email address> <key expiration data mm/dd/yyyy>"
    exit;
fi
USERNAME="$2"
COMMENT="'Account for $1 created by Ashish'"
EXP_DATE="$3"
COMMAND="java -jar trusted-app-client-0.0.1-jar-with-dependencies.jar -action a -username $USERNAME  -id camicSignup -secret 9002eaf56-90a5-4257-8665-6341a5f77107 -comments $COMMENT -expires $EXP_DATE  -url http://quip-data:9099/trustedApplication"
#echo $COMMAND
eval $COMMAND
