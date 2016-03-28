<?php

require_once __DIR__ . "/vendor/autoload.php";

use UnificationEngine\Models\UEApp;
use UnificationEngine\Models\UEUser;


//Initialize a UE Application
$app = new UEApp("APP_KEY","APP_SECRET");

//Initialize the user using existing user key and secret
$user = new UEUser("USER_KEY","USER_SECRET");


//Creating new user
$user = $app->create_user();


//Adding connection with facebook access token
$connection = $user->add_connection( "CONNECTION_NAME", "CONNECTOR_SCHEME (eg: facebook)", "SERVICE_ACCESS_TOKEN" );


//Specifying message options
$options = array(
    "receivers" => array(
        array(
            "name" => "me"
        ),
        array(
            "name" => "Page",
            "id" => "PAGE_ID_HERE"
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
