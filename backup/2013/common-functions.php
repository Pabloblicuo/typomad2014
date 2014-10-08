<?php
require_once('db/db-functions.php');
//Unix timestamp defined one time
$unix_timestamp = time();

//Ubicación de la aplicación
/* $dc_host="http://doncasting/"; */
$myv_host = URLBASE;

//Error reporting function
function error($var1){
header ('Content-type: text/html; charset=utf-8');
global $dc_host;
switch ($var1) {
    case 0:
		//Cookie id alterada
        die ('Cookie id alterada');
        break;
	case 1:
		//No estás logeado
        /* echo "No estás logeado"; */
        break;
    case 2:
		//Alguien ha iniciado sesión en tu cuenta desde otra parte o la cookie SexyHash ha sido alterada
        echo "Se ha iniciado sesión en tu cuenta desde otra parte, haga click <a style=\"color:blue;\" href=\"{$dc_host}logout.php?multidevice=maybe\">aquí</a> para volver a iniciar sesión";
		die;
        break;
}}

//Check if the user is logged in and get some useful data for the interface
function isloggedin(){
if(isset($_COOKIE["id"])){
global $id_raw;$id_raw = $_COOKIE["id"];}else{$id_raw = null;};

if(isset($_COOKIE["sexyhash"])){
$sexyhash_raw = $_COOKIE["sexyhash"];}else{$sexyhash_raw = null;};

if (isset($id_raw)){
  if (preg_match("/^[\\d]{1,15}$/", $id_raw)){
global $mysqli;
$get_auth = "SELECT auth, pass, authlevel, user FROM users WHERE id = '$id_raw'";
if ($result2 = $mysqli->query($get_auth)) { 
$row = $result2->fetch_row();
global $auth, $hash_pass, $user_type, $authlevel, $username, $state;
$auth = $row[0];
$hash_pass = $row[1];
$authlevel = $row[2];
$username  = $row[3];
$result2->close();}
}else{
  return 0;}
  }else{
  //header('Location: ./login_form.php') - esto no es un walled garden, esto es DonCasting, Open Castings, easy and free
  return 1;}
 
  $key = $hash_pass;
  $decrypted_sexyhash = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($sexyhash_raw), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
  
if(md5($decrypted_sexyhash)==$auth){
return 8;}else{return 2;}
}

?>