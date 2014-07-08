<?php
$idevices = "<link rel=\"apple-touch-icon-precomposed\" href=\"touch-icon-iphone.png\" />
<link rel=\"apple-touch-icon-precomposed\" sizes=\"72x72\" href=\"touch-icon-ipad.png\" />
<link rel=\"apple-touch-icon-precomposed\" sizes=\"114x114\" href=\"touch-icon-iphone-retina.png\" />
<link rel=\"apple-touch-icon-precomposed\" sizes=\"144x144\" href=\"touch-icon-ipad-retina.png\" />";

function header_index(){
global $myv_host, $idevices;
require_once('./headers/header_index.php');
}

function header_expo(){
global $myv_host, $idevices;
require_once('./headers/header_expo.php');
}

function header_login(){
global $myv_host, $idevices;
require_once('./headers/header_login.php');
}

function header_admin(){
global $myv_host, $idevices;
require_once('./headers/header_admin.php');
}

function header_nosotros(){
global $myv_host, $idevices;
require_once('./headers/header_nosotros.php');
}

function header_promesas(){
global $myv_host, $idevices;
echo <<< EOT
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
		{$idevices}
		<link href='{$myv_host}css/font.css' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="{$myv_host}css/bootstrap.min.css">
        <style>
            body {
                padding-top: 5px;
                padding-bottom: 40px;
            }
        </style>
        <link rel="stylesheet" href="{$myv_host}css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="{$myv_host}css/main.css">

        <script src="{$myv_host}js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
EOT;
}

function header_about(){
header_nosotros();
}

function header_conversor(){
	require_once("headers/header_conversor.php");
}
?>