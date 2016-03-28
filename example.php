<?php

require_once __DIR__ . "/vendor/autoload.php";

use UnificationEngine\Models\UEApp;
use UnificationEngine\Models\UEUser;


//Initialize the user using existing user key and secret
$user = new UEUser("5577fb51-c324-48df-8ff5-9aa3d57302e5","20d3d529-9ee5-4209-a74c-62f9d541a084");


//Creating new user
$user = $app->create_user();


//Adding connection with facebook access token
$connection = $user->add_connection( "fbclient", "facebook", "CAAFWfTMoGxoBACZAylom0biZAiDe8L5T2scWWxItQwObFCP4jWcEGH1yPVJNJZCSarVzQyudwZBZAZC1qoZC5k2TXRuQw4jwHRZAX7MjIp4h3zcv1HaC46vOnUd2REzXzLs8hGiX27zjMQGq0ZCOk7zKu86W0ePz4OXzLbQF7uSF9uFQyv3RBl16FiIRdelDePFoZD" );


//Specifying message options
$options = array(
    "receivers" => array(
        array(
            "name" => "Me"
        ),
        array(
            "name" => "Page",
            "id" => "1408579442748982"
        )
    ),
    "message" => array(
        "subject" => "test",
        "body" => "ABC",
        "image" => "http://politibits.blogs.tuscaloosanews.com/files/2010/07/sanford_big_dummy_navy_shirt.jpg",
        "link" => array(
            "uri" => "http://google.com",
            "description" => "link desc",
            "title" => "link title"
        )
    )
);

//Send the message and get their uris
$uris = $connection->send_message($options);


print_r($uris); 
