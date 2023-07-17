<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{  

$rawdata = file_get_contents('php://input');
$message = json_decode($rawdata, false);

$usern =$message->username;
$key = $message->key;
$date = $message->date;







$servername = "db5013249289.hosting-data.io";

$username = "dbu4094324";
$password = "xp6bDDcu28BWmgM";
$database="dbs11113527";

$conn = new mysqli($servername, $username ,$password);
  
$sql="USE ".$database.";";

$insertquery = "INSERT INTO userdata(username,keypressed,datetime) values('".$usern."',".$key.",'".$date."');";

$conn->query($sql);
$conn->query($insertquery);
$key1= "SELECT key1 FROM usersettings WHERE username='".$usern."';";
$key2= "SELECT key2 FROM usersettings WHERE username='".$usern."';";
$freq= "SELECT freq FROM usersettings WHERE username='".$usern."';";
$key1value=$conn->query($key1);
$key2value=$conn->query($key2);
$freqvalue=$conn->query($freq);

$key1v = mysqli_fetch_array($key1value);
$key2v = mysqli_fetch_array($key2value);
$freqv = mysqli_fetch_array($freqvalue);





$k1 = $key1v['key1'];
$k2 = $key2v['key2'];
$frequency = $freqv['freq'];

$k1string=strval($k1);
$k2string=strval($k2);
$freqstring=strval($frequency);

http_response_code(200);
header('Content-Type: text/plain');
$response=$k1string.$k2string.$freqstring;
echo $response;

}

?> 