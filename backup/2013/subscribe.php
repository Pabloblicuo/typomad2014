<?php
require_once('./mysqli_connect.php');

function user_or_mail ($raw_mail){
global $mail_raw;
if(!filter_var($raw_mail, FILTER_VALIDATE_EMAIL)) {
    //not valid mail
	die ('No has introducido un email válido');
} else {
    //valid mail
	$mail_raw = strtolower($raw_mail);
}}

if(isset($_POST['email'])){
user_or_mail($_POST['email']);}else{$mail_raw = null;die ('El email no ha sido escrito');};

$check_mail = $mysqli->prepare("SELECT mail FROM subscribers WHERE LOWER(`mail`) = ?");
$check_mail->bind_param('s', $mail_raw);

$check_mail->execute();
$check_mail->store_result();


$number_of_rows = $check_mail->num_rows;
$check_mail->close();
if ($number_of_rows > 0)
{
//Already subscribed mail
  die("Este Email ya ha sido suscrito, no puedes suscribirte 2 veces");

}else{
//Proceed with subscription
$at = "typomad";

$subscribe = $mysqli->prepare("INSERT INTO subscribers (mail, at) VALUES (?, ?)");

if ( false===$subscribe ) {
  die('prepare() failed: ' . htmlspecialchars($mysqli->error));
}

$subscribe->bind_param('ss', $mail_raw, $at) or die("Error binding params de suscripción");

$subscribe->execute() or die("Error ejecutando query suscripción");

$subscribe->close();

$mysqli->close();

};

?>
<html>
Te has suscrito con éxito con tu email <?php echo $mail_raw; ?>
</html>