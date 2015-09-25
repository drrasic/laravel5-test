<?php

return array(

    'tjMirageIOS'     => array(
        'environment' =>'development',
        'certificate' => app_path().'/apns-development-43bb8b46cd.pem',
        'service'     =>'apns'
    ),
    'tjMirageAndroid' => array(
        'environment' =>'development',
        'apiKey'      =>'AIzaSyC0_JuAanD5cp9PZaC3jRxshoZz17AW6rs',
        'service'     =>'gcm'
    )

);