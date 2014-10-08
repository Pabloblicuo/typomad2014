<?php
$mysqli = new mysqli("localhost"/* <- server */, "typomad"/* <- user */, "fc5WFzLtwZfAARqt"/* <- pass */, "typomad"/* <- DB */);
/* verificar la conexión */
if (mysqli_connect_errno()) {
    printf("Falló la conexión: %s\n", mysqli_connect_error());
    exit();
}

?>