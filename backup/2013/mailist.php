<?php
require_once('./mysqli_connect.php');
if(isset($_POST['pass'])){
$pass = $_POST['pass'];
}else{
$pass = $_GET['pass'];
}
$pass = strtolower($pass);
if ($pass=="potato" || $pass=="patatoide"){
//echo "Contrase&ntilde;a correcta";
if($result = $mysqli->query("SELECT id, mail, subscribed FROM subscribers ORDER BY id ASC")){
	$i=0;
    while($row = $result->fetch_assoc()) {
      /* printf("%s %s %s\n", $row['id'], $row['mail'], $row['subscribed']); */
	  if($i>=1){
	  echo ", ".$row['mail'];
	  }else{
	  echo $row['mail'];
	  $i++;
	  }
    }
    $result->close();
  }else
    printf("MySQLi Error: %s\n", $mysqli->error);
  $mysqli->close();
}
else{
echo "Contrase&ntilde;a err&oacute;nea";
}
?>
