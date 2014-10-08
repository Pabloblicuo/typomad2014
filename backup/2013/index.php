<?php
require_once('db/db-functions.php');

require_once('./headers.php');
require_once('./navs.php');
require_once('./contents.php');
require_once('./footers.php');
require_once('./common-functions.php');
require_once('./mysqli_connect.php');

header('Content-Type: text/html; charset=UTF-8');

$myv_host = URLBASE;
$static_host = STATIC_HOST;

switch (isloggedin()) {
    case 8:
		//Usuario logeado
		/* get_usertype_and_authlevel(); */
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

//Permalinks
function redirections(){
global $myv_host, $state;
if(isset($_GET['a'])){
$dir = strtolower($_GET['a']);
switch ($dir) {
	case "expo":
		// Do nothing
        break;
    case "login":
		//Login page
		if(isloggedin()==8){
		header ("Location: ./");
		exit;}
        break;
	case "lover":
		//Login page
		header ("Location: http://facebook.com/AdrianVerdeDeAlmeida");
		exit;
        break;
	case "registro":
		//registry page
		if(isloggedin()==8){
		header ("Location: $dc_host");
		exit;}
        break;
	case "admin":
		//Complete registration
		if(isloggedin()!==8){
		header ("Location: /login");
		exit;}
        break;
	case "logout":
		//Log Out
		if(isloggedin()==8){
		header ("Location: {$myv_host}logout.php");
		exit;}else{
		header ("Location: {$myv_host}");exit;}
        break;
	default:
       echo "algo raro y extraño ha ocurrido en el selector de redirecciones...";
		}}else{
		if($state==1){
		header ("Location: /details");
		exit;}
		}
	}

redirections();

function get_header(){
if(isset($_GET['a'])){
$dir = strtolower($_GET['a']);
switch ($dir) {
	case "expo":
		//Lista de nosotros ordenada por número de votos de forma predeterminada
		header_expo();
        break;
	case "login":
		//Lista de nosotros ordenada por número de votos de forma predeterminada
		header_login();
        break;
	case "admin":
		//Lista de nosotros ordenada por número de votos de forma predeterminada
		header_admin();
        break;
    case "beta":
		//Lista de nosotros ordenada por número de votos de forma predeterminada
		header_index();
        break;
	case "promesas":
		//Lista de promesas (topics)
		header_promesas();
        break;
	case "programas":
		//Lista de programas electorales
		header_programas();
        break;
	case "graficas":
		//Gráficas comparativas, herramienta inspirada en Google Trends
		header_graficas();
        break;
	case "about":
		//Información sobre los algoritmos que utilizamos para determinar los valores de las variables
		header_about();
        break;
	case "buscar":
		//Herramienta de búsqueda
		if(isset($_GET['b'])){echo "Query de búsqueda";}else{$_GET['b'] = null;};
        break;
	case "logout":
		//Log Out
		//Just if someday we plan to let users log in
        break;
	case "admin":
		//Admin
        echo "Admin Panel";
        break;
	case "conversor":
		//Conversor de imágenes
        header_conversor();
        break;
	default:
       echo "404... lol";
		}}else{
		header_index();}
}

function nav(){
if(isset($_GET['a'])){
$dir = strtolower($_GET['a']);
switch ($dir) {
	case "expo":
		//Lista de nosotros ordenada por número de votos de forma predeterminada
		nav_expo();
		break;
	case "login":
		//Lista de nosotros ordenada por número de votos de forma predeterminada
		nav_login();
        break;
	case "admin":
		//Lista de nosotros ordenada por número de votos de forma predeterminada
		nav_admin();
        break;
    case "beta":
		//Lista de nosotros ordenada por número de votos de forma predeterminada
		nav_index();
        break;
	case "promesas":
		//Lista de promesas (topics)
		nav_promesas();
        break;
	case "programas":
		//Lista de programas electorales
		nav_programas();
        break;
	case "graficas":
		//Gráficas comparativas, herramienta inspirada en Google Trends
		nav_graficas();
        break;
	case "about":
		//Información sobre los algoritmos que utilizamos para determinar los valores de las variables
		nav_about();
        break;
	case "buscar":
		//Herramienta de búsqueda
		if(isset($_GET['b'])){echo "Query de búsqueda";}else{$_GET['b'] = null;};
        break;
	case "logout":
		//Log Out
		//Just if someday we plan to let users log in
        break;
	case "admin":
		//Admin
        echo "Admin Panel";
        break;
	case "conversor":
		//Conversor de imágenes
        nav_conversor();
		break;
	default:
       echo "algo raro y extraño ha ocurrido en el selector de nav...";
		}}else{
		nav_index();}
		}

//El contenido se muestra con la función content() que llama contenidos ubicados en "contents.php"
function content(){
global $banana;
if(isset($_GET['a'])){
$dir = strtolower($_GET['a']);
switch ($dir) {
	case "expo":
		//Lista de nosotros ordenada por número de votos de forma predeterminada
		content_expo();
		break;
	case "login":
		//Lista de nosotros ordenada por número de votos de forma predeterminada
		content_login();
        break;
	case "admin":
		//Lista de nosotros ordenada por número de votos de forma predeterminada
		content_admin();
        break;
    case "beta":
		//Lista de nosotros ordenada por número de votos de forma predeterminada
		content_beta();
        break;
	case "promesas":
		//Lista de promesas (topics)
		content_promesas();
        break;
	case "programas":
		//Lista de programas electorales
		content_programas();
        break;
	case "graficas":
		//Gráficas comparativas, herramienta inspirada en Google Trends
		content_graficas();
        break;
	case "about":
		//Información sobre los algoritmos que utilizamos para determinar los valores de las variables
		content_about();
        break;
	case "buscar":
		//Herramienta de búsqueda
		if(isset($_GET['b'])){echo "Query de búsqueda";}else{$_GET['b'] = null;};
        break;
	case "logout":
		//Log Out
		//Just if someday we plan to let users log in
        break;
	case "admin":
		//Admin
        echo "Admin Panel";
        break;
	case "conversor":
		//Conversor de imágenes
        content_conversor();
		break;
	default:
       echo "algo raro y extraño ha ocurrido en el selector de content...";
		}}else{
		content_index();
		}
}

function footer(){
global $adrian_is_sexy;
if(isset($_GET['a'])){
$dir = strtolower($_GET['a']);
switch ($dir) {
	case "expo":
		footer_expo();
		break;
	case "login":
		//Lista de nosotros ordenada por número de votos de forma predeterminada
		footer_login();
        break;
	case "admin":
		//Lista de nosotros ordenada por número de votos de forma predeterminada
		footer_admin();
        break;
    case "beta":
		footer_index();
        break;
	case "promesas":
		//Lista de promesas (topics)
		footer_promesas();
        break;
	case "programas":
		//Lista de programas electorales
		footer_programas();
        break;
	case "graficas":
		//Gráficas comparativas, herramienta inspirada en Google Trends
		footer_graficas();
        break;
	case "about":
		//Información sobre los algoritmos que utilizamos para determinar los valores de las variables
		footer_about();
        break;
	case "buscar":
		//Herramienta de búsqueda
		if(isset($_GET['b'])){echo "Query de búsqueda";}else{$_GET['b'] = null;};
        break;
	case "logout":
		//Log Out
		//Just if someday we plan to let users log in
        break;
	case "admin":
		//Admin
        echo "Admin Panel";
        break;
	case "conversor":
		//Conversor de imágenes
        footer_conversor();
		break;
	default:
       echo "algo raro y extraño ha ocurrido en el selector de footer...";
		}}else{
		footer_index();
		}
}
function bodytag(){
//Open body tag
if(isset($_GET['a'])){
$dir = strtolower($_GET['a']);
switch ($dir) {
	case "conversor":
		//Conversor de imágenes
        echo "<body onload=\"new uploader('drop', 'status', '/uploader.php', 'list');\">";
		break;
	case "beta":
		//Beta
		echo "<body onload=\"mapload()\">";
		break;
	default:
		//Any not listed section
       echo "<body>";
	   break;
		}}else{
		//index, no section
		echo "<body onload=\"mapload()\">";
		}
}

?>
<!DOCTYPE html>
<html class="no-js">

    <head>
	<?php get_header();?>
    </head>
	<?php bodytag(); //<-- I hate this function! ?>
	
<?php nav(); ?>
<?php content(); ?>
<?php footer(); ?>

    </body>
</html>
