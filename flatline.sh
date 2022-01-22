#!/bin/bash
URLApiData='http://puebadominio.royalwebhosting.net'
APIPage='api'
URLData=''
URLGet=''

###################################################################################################
#Fecha del Servidor
#ServerDate=`date "+%d-%m-%y_%H-%M-%S"`
ServerDate=$(date +%s)
Data[0]=' --data-urlencode "flatline='$ServerDate'" '
###################################################################################################

URLBase=$URLApiData'/'$APIPage'/'
arraylength=${#Data[@]}

for (( i=1; i<${arraylength}+1; i++ ));
do
  URLData="${Data[$i-1]}${URLData}"
done

URLGet='curl -G '$URLData$URLBase' --get' 


################################################################################################

Command="$URLGet";
eval $Command #ejecuta un comando almacenado en una variable
#################################################################################################
