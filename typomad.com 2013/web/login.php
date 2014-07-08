<?php
//importar objeto mysqli con credenciales de acceso a base de datos
require_once('./mysqli_connect.php');
//importar clase "phpass" sistema de encriptación y comparación de hashes
require_once('./class-phpass.php');
//importar funciones y variables comunes de uso repetido a lo largo de la aplicación
require_once('./common-functions.php');
//Crear hasher y salt en 8 iteraciones/rondas de encriptación
$hasher = new PasswordHash(8, TRUE);

//Comprobar si el usuario está autentificado a través de la función "isloggedin()" llamada desde "common-functions.php"
switch (isloggedin()) {
    case 8:
		//Usuario logeado
		header("Location: ./");
        break;
	case 0:
		//Cookie id alterada
        error(0);
        break;
	case 1:
		//No estás logeado
        error(1);
        break;
    case 2:
		//Alguien ha iniciado sesión en tu cuenta desde otra parte o la cookie SexyHash ha sido alterada
        error(2);
        break;
	default:
       echo "algo raro y extraño ha ocurrido...";
		}

//Función específicamente creada para mostrar errores antes de autentificarse en la aplicación pero manteniendo la interfaz
function error_handler($a){
global $dc_host;
echo <<<EOT
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="{$dc_host}css/bootstrap.min.css">
        <style>
            body {
                padding-top: 60px;
                padding-bottom: 40px;
            }
        </style>
        
        <link rel="stylesheet" href="{$dc_host}css/main.css">
		<?php get_header();?>
        <script src="{$dc_host}js/vendor/modernizr-2.6.1-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->
		 <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="{$dc_host}">DonCasting</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav">
					<li><a>Error... :(</a></li>
		
		 </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>
		
<div class="container-fluid">
<!--Body content-->		
		{$a}		
</div>

		
		<script src="{$dc_host}js/vendor/jquery-1.8.1.min.js"></script>

        <script src="{$dc_host}js/vendor/bootstrap.min.js"></script>

        <script src="{$dc_host}js/main.js"></script>
 
    </body>
</html>

EOT;
}

//Función que determina si la entrada en el formulario login "user" es un email, o por el contrario, un nombre de usuario
function user_or_mail ($raw_login){
global $var_to_select, $login_raw;
if(!filter_var($raw_login, FILTER_VALIDATE_EMAIL)) {
    //not valid mail
	$var_to_select="user";
	$login_raw = $raw_login;
} else {
    //valid mail
	$var_to_select="mail";
	$login_raw = $raw_login;
}}

//Verifica si el input "user" del formulario ha sido rellenado
if(isset($_POST['user'])){
user_or_mail($_POST['user']);}else{$login_raw = null;$var_to_select=null;die ('El usuario o email no ha sido escrito');};

//Prepara la query mysqli para seleccionar el usuario/mail con el fin de verificar si existe o no
$check_user = $mysqli->prepare("SELECT $var_to_select FROM users WHERE LOWER(`$var_to_select`) = ?");
$check_user->bind_param('s', $user);
	
/* $check_pass = $mysqli->prepare("SELECT pass FROM users WHERE id = ?");
$check_pass->bind_param('i', $user_id); */

/* $user = $_POST['user']; */


if(isset($_POST['pass'])){
$raw_pass = $_POST['pass'];}else{$raw_pass = null;};

if (strlen($raw_pass) > 64) { die("La contraseña es errónea y tiene mas de 64 caractéres"); }
$pass = $hasher->HashPassword($raw_pass);
/* $name = $_POST['name']; */
//Normal User=1/Moderator=2/Admin=3
//$authlevel = 3;
/* $authlevel = 1; */


//Artista=1/Empleador=2/Todo a la vez=3 <-Última opción solo disponible para Admins y gente chachi
//$usertype = 3;
/* if (isset($_POST['usertype'])) {
$usertype = $_POST['usertype'];
} else {
$usertype = "";
} */
//$usertype = $_POST['usertype'];
/* if (!($usertype > 0 && $usertype < 3)){
die ('fuck it babe');} */
/* $usertype = 3; */

if ($var_to_select=="user"){
 if (isset($login_raw) && preg_match("/^[\\da-zA-Z_]{1,15}$/", $login_raw)){
	$login_escaped = $mysqli->real_escape_string($login_raw);
	$user = strtolower($login_escaped);
	echo "<!--Nombre de usuario válido-->";
	}else{
  die ('El nombre de usuario contiene caractéres inválidos o no se ha llegado a escribir');}
	}else{
	$login_escaped = $mysqli->real_escape_string($login_raw);
	$user = strtolower($login_escaped);
	}
  
 
$check_user->execute();
$check_user->store_result();

$number_of_rows = $check_user->num_rows;
$check_user->close();
if ($number_of_rows > 0)
{
    echo"<!-- El nombre de usuario existe!-->";

/*  	$update_lastlogin = "INSERT INTO users WHERE user = '$user' (lastlogin) VALUES ('$login_unix_timestamp')";
if ($result = $mysqli->query($update_lastlogin)) { */
/* 	$row = $result->fetch_row();
	$user_db_somethin = $row[0]; */
	/* $user_id = mysqli_insert_id($mysqli); */
	/* $result->close();}; */
	
	/* global $user_id; */
	$get_user_hash = "SELECT pass, id FROM users WHERE LOWER(`$var_to_select`) = '$user'";
if ($result = $mysqli->query($get_user_hash)) {
	$row = $result->fetch_row();
	$user_db_hash = $row[0];
	$user_db_id = $row[1]; 
    $result->close();}

//Check if hashes match (input 'pass' and db 'auth')
	$check_hash = $hasher->CheckPassword($raw_pass, $user_db_hash);
if ($check_hash == TRUE) {
	echo"<!-- Contraseña correcta-->";

//Check if user confirmed mail
//Twitter says: "Confirma tu correo electrónico para tener acceso a todas las funciones de Twitter. Un mensaje de confirmación fue enviado a mail@provider.com."

	$lastlogin = "UPDATE users SET lastlogin='$unix_timestamp' WHERE LOWER(`$var_to_select`) = '$user'";
	if (!$mysqli->query($lastlogin)) {
    echo "INSERT failed: (" . $mysqli->errno . ") " . $mysqli->error;
}
//La contraseña es correcta y coincide con el usuario
	
	$pass_unindex = substr($pass, 4);
	$cookie_auth_hash = $unix_timestamp.$pass_unindex.$unix_timestamp;
	$auth_db_prepared = md5($cookie_auth_hash);
	
	$auth = "UPDATE users SET auth='$auth_db_prepared' WHERE id = '$user_db_id'";
	if (!$mysqli->query($auth)) {
    echo "INSERT failed: (" . $mysqli->errno . ") " . $mysqli->error;}
	
	$key_crypt = $user_db_hash;
	//$key_crypt = 'D0nC4st1ng/!-_12345AaHh@';
	$crypted_cookie_auth_hash = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key_crypt), $cookie_auth_hash, MCRYPT_MODE_CBC, md5(md5($key_crypt))));
	$cookie_expire=$unix_timestamp+15*5*50;
	//$P$B
	/* $pass_baking = substr($pass, 4); */
	setcookie("id", $user_db_id, $cookie_expire);
	setcookie("sexyhash", $crypted_cookie_auth_hash, $cookie_expire);
	header('Location: ./');

}else{echo "<br />" . "no " . $user . " and " . $user_db_hash . " and " . $pass;};

}else{
 die("El nombre de usuario no existe");
};

/* $get_lastlogin = "SELECT lastlogin FROM users WHERE user = '$user'";
if ($result = $mysqli->query($get_lastlogin)) {
	$row = $result->fetch_row();
	$last_logged = $row[0];
    $result->close();}
	
	// Convert the timestamp
$date = date("D, d M Y", $last_logged);
$time = date("H:i:s", $last_logged);

// Echo out the timestamp
echo "<strong>Date: </strong>".$date."<br/ >";
echo "<strong>Time: </strong>".$time; */
	
$mysqli->close();
//echo "<br />" . $_POST['epoch'];
//echo "<br />" . $unix_timestamp;
?>