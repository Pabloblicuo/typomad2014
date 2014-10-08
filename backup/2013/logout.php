<?php
if (isset($_GET['multidevice'])){
$multidevice=true;
}else{
$multidevice=false;
}
if($multidevice){
require_once('./common-functions.php');
setcookie("id", "x", 1);
setcookie("sexyhash", "x", 1);
header ("Location: {$myv_host}login");
exit;
}else{
require_once('./common-functions.php');
setcookie("id", "x", 1);
setcookie("sexyhash", "x", 1);
header ("Location: {$myv_host}");
exit;
}
?>