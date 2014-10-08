<?php
/* if(isloggedin()==8){
postvars
process
redirect to admin with successfull message
etc;
else
Fuck you, redirect to home */
?>
<?php
require_once('./mysqli_connect.php');
require_once('./class-phpass.php');
require_once('./common-functions.php');

if(isloggedin()!==8){
		header ("Location: /login");
		exit;}
		
if(isset($_POST['projectname'])){
$projectname = $_POST['projectname'];
}else{
$projectname = null;
echo 'No has especificado nombre de proyecto';
}

if(isset($_POST['author'])){
$author = $_POST['author'];
/* $author = urlencode($author); */
}else{
$author = null;
echo 'No has especificado nombre de autor';
}

if(isset($_POST['authorlink'])){
$authorlink = $_POST['authorlink'];
/* $authorlink = urlencode($authorlink); */
}else{
$authorlink = null;
echo 'No has especificado enlace de autor, pero bueno, puede pasar...';
}

if(isset($_POST['description'])){
$description = $_POST['description'];
/* $description = urlencode($description); */
// Not encode, I don't want plus (+) signs as spaces
}else{
$description = null;
echo 'No has especificado descripción, nigga';
/* echo urldecode('I+%E2%99%A5+Pussieeeeeeeeeeeeeeeeeeeeees'); */
}

if(isset($_POST['website'])){
$namelink = $_POST['website'];
/* $namelink = urlencode($namelink); */
}else{
$namelink = null;
echo 'No has especificado página web, nigga';
}

if(isset($_POST['filter1a'])){
$filter1a = $_POST['filter1a'].' ';
}else{
$filter1a = null;
}

if(isset($_POST['filter1b'])){
$filter1b = $_POST['filter1b'].' ';
}else{
$filter1b = null;
}

if(isset($_POST['filter1c'])){
$filter1c = $_POST['filter1c'].' ';
}else{
$filter1c = null;
}

if(isset($_POST['filter1d'])){
$filter1d = $_POST['filter1d'].' ';
}else{
$filter1d = null;
}

if(isset($_POST['filter2a'])){
$filter2a = $_POST['filter2a'].' ';
}else{
$filter2a = null;
}

if(isset($_POST['filter2b'])){
$filter2b = $_POST['filter2b'].' ';
}else{
$filter2b = null;
}

if(isset($_POST['filter2c'])){
$filter2c = $_POST['filter2c'].' ';
}else{
$filter2c = null;
}

if(isset($_POST['filter2d'])){
$filter2d = $_POST['filter2d'].' ';
}else{
$filter2d = null;
}

if(isset($_POST['filter3a'])){
$filter3a = $_POST['filter3a'].' ';
}else{
$filter3a = null;
}

if(isset($_POST['filter3b'])){
$filter3b = $_POST['filter3b'].' ';
}else{
$filter3b = null;
}

if(isset($_POST['filter3c'])){
$filter3c = $_POST['filter3c'].' ';
}else{
$filter3c = null;
}

if(isset($_POST['filter3d'])){
$filter3d = $_POST['filter3d'].' ';
}else{
$filter3d = null;
}

if(isset($_POST['filter4a'])){
$filter4a = $_POST['filter4a'];
}else{
$filter4a = null;
}

if(isset($_POST['filter4b'])){
$filter4b = $_POST['filter4b'];
}else{
$filter4b = null;
}

$tags = $filter1a.$filter1b.$filter1c.$filter1d.$filter2a.$filter2b.$filter2c.$filter2d.$filter3a.$filter3b.$filter3c.$filter3d.$filter4a.$filter4b;


/* $file=$_FILES["file"]; */

function upload_img($file, $type, $number, $item_id){
if($type==1){
$dir = "./img/expo/";
}else if($type==2){
$dir = "./img/expo/big/";
}
$allowedExts = array("gif", "jpeg", "jpg", "png", "GIF", "JPEG", "JPG", "PNG");
$temp = explode(".", $file["name"]);
$extension = end($temp);
if ((($file["type"] == "image/gif")
|| ($file["type"] == "image/jpeg")
|| ($file["type"] == "image/jpg")
|| ($file["type"] == "image/pjpeg")
|| ($file["type"] == "image/x-png")
|| ($file["type"] == "image/png"))
&& ($file["size"] < /* 20Mb en bytes -> */20971520)
&& in_array($extension, $allowedExts))
  {
  if ($file["error"] > 0)
    {
    echo "Return Code: " . $file["error"] . "<br>";
    }
  else
    {
    echo "Upload: " . $file["name"] . "<br>";
    echo "Type: " . $file["type"] . "<br>";
    echo "Size: " . ($file["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $file["tmp_name"] . "<br>";

    if (file_exists("$dir" . $file["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($file["tmp_name"],
      "$dir" . $item_id.'_'.$type.'_'.$number.'.'.$extension);
      echo "Stored in: " . "$dir" . $file["name"];
      }
    }
  }
else
  {
  echo "Invalid file or not image uploaded";
  }
}

$get_last = "SELECT id FROM expo ORDER BY id DESC";
if ($result2 = $mysqli->query($get_last)) { 
$row = $result2->fetch_row();
$last_id = $row[0];
//if (!($last_id > 1)){
if ($last_id < 1){
$item_id = 1;
}else{
$item_id = ++$last_id;
}
/* if ($last_id < 1){
$last_id = 1;
}else{
$item_id = $last_id+2;
} */
$result2->close();
}/* else{
$item_id = 1;
} */

if(isset($_FILES["imgpre1"]) && $_FILES["imgpre1"]["error"] == 0){
$file = $_FILES["imgpre1"];
$temp = explode(".", $file["name"]);
$extension = end($temp);
$type=1;
$number = 1;
upload_img($file, $type, $number, $item_id);
$filename = $item_id.'_'.$type.'_'.$number.'.'.$extension;
}else{echo ('No se ha añadido una imagen para el elemento minimizado, lo cual puede pasar');}

if(isset($_FILES["imgpre2"]) && $_FILES["imgpre2"]["error"] == 0){
$file = $_FILES["imgpre2"];
$temp = explode(".", $file["name"]);
$extension = end($temp);
$type=1;
$number = 2;
upload_img($file, $type, $number, $item_id);
$filename = $item_id.'_'.$type.'_'.$number.'.'.$extension;
}else{echo 'No se ha añadido una imagen para cuando se pase el ratón por encima del elemento minimizado';}

// Preview $type = 1
// Content $type = 2

if(isset($_FILES["img1"]) && $_FILES["img1"]["error"] == 0){
$file = $_FILES["img1"];
$temp = explode(".", $file["name"]);
$extension = end($temp);
$type=2;
$number = 1;
upload_img($file, $type, $number, $item_id);
$filename = $item_id.'_'.$type.'_'.$number.'.'.$extension;
}else{die ('No se ha añadido una imagen para el elemento maximizado');}

if(isset($_FILES["img2"]) && $_FILES["img2"]["error"] == 0){
$file = $_FILES["img2"];
$temp = explode(".", $file["name"]);
$extension = end($temp);
$type=2;
$number = 2;
upload_img($file, $type, $number, $item_id);
$filename = $item_id.'_'.$type.'_'.$number.'.'.$extension;
}else{echo 'No se ha añadido una segunda imagen para el elemento maximizado';}

/* $_FILES["file"]["error"] != 0 */

if(isset($_FILES["img3"]) && $_FILES["img3"]["error"] == 0){
$file = $_FILES["img3"];
$temp = explode(".", $file["name"]);
$extension = end($temp);
$type=2;
$number = 3;
upload_img($file, $type, $number, $item_id);
$filename = $item_id.'_'.$type.'_'.$number.'.'.$extension;
}else{echo 'No se ha añadido una tercera imagen para el elemento maximizado';}

if(isset($_FILES["img4"]) && $_FILES["img4"]["error"] == 0){
$file = $_FILES["img4"];
$temp = explode(".", $file["name"]);
$extension = end($temp);
$type=2;
$number = 4;
upload_img($file, $type, $number, $item_id);
$filename = $item_id.'_'.$type.'_'.$number.'.'.$extension;
}else{echo 'No se ha añadido una cuarta imagen para el elemento maximizado';}

if(isset($_FILES["img5"]) && $_FILES["img5"]["error"] == 0){
$file = $_FILES["img5"];
$temp = explode(".", $file["name"]);
$extension = end($temp);
$type=2;
$number = 5;
upload_img($file, $type, $number, $item_id);
$filename = $item_id.'_'.$type.'_'.$number.'.'.$extension;
}else{echo 'No se ha añadido una quinta imagen para el elemento maximizado';}

/* $img_number = $mysqli->prepare("INSERT INTO expo (img_number) VALUES (?)") or die("Error preparando sql de img_number");
$img_number->bind_param('i', $number) or die("Error binding params de img_number");
$img_number->execute() or die("Error ejecutando query de img_number");
$img_number->close(); */

$add_content = $mysqli->prepare("INSERT INTO expo (name, namelink, author, authorlink, description, tags, img_number) VALUES (?, ?, ?, ?, ?, ?, ?)");

if ( false===$add_content ) {
  // and since all the following operations need a valid/ready statement object
  // it doesn't make sense to go on
  die('prepare() failed: ' . htmlspecialchars($mysqli->error));
}

$add_content->bind_param('ssssssi', $projectname, $namelink, $author, $authorlink, $description, $tags, $number) or die("Error binding params de add_content");

$add_content->execute() or die("Error ejecutando query de add_content");

$add_content->close();

$mysqli->close();


?>