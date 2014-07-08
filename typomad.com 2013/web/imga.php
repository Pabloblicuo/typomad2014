<?php

/* $im = imagecreatefrompng('philip.png'); */
$im = imagecreatefromjpeg('areso_c.jpg');

/* R, G, B, so 0, 255, 0 is green */
if($im && imagefilter($im, IMG_FILTER_GRAYSCALE) && imagefilter($im, IMG_FILTER_COLORIZE, 80, 140, 20))
{
    echo 'Image successfully shaded green.';

    imagejpeg($im, 'areso.jpg');
    imagedestroy($im);
}
else
{
    echo 'Green shading failed.';
}

?>