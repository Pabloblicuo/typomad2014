<?php
$mysqli = new mysqli("localhost"/* <- server */, "typomad"/* <- user */, "fc5WFzLtwZfAARqt"/* <- pass */, "typomad"/* <- DB */);
/* verificar la conexi�n */
if (mysqli_connect_errno()) {
    printf("Fall� la conexi�n: %s\n", mysqli_connect_error());
    exit();
}

?>