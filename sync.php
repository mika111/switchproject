<?php
session_start();                                                                                                                                            

if(isset($_SESSION['uname']))
{
  if($_SESSION['AUTH'] == 'authed')
  {
  echo "logged in";
  }else{
  echo "<script>window.location.href = 'index.php';</script>";
  }
  }else{
  echo "<script>window.location.href = 'index.php';</script>";
  }
if ($_SERVER['REQUEST_METHOD'] == 'POST')

{
  $uname = $_SESSION['uname'];
  $key1new = $_POST['key1'];
  $key2new= $_POST['key2'];
  $freqnew= $_POST['freq'];
	
  $username = "dbu4094324";
  $password = "xp6bDDcu28BWmgM";
  $database ="dbs11113527";

  $servername = "db5013249289.hosting-data.io";
  $conn = new mysqli($servername, $username ,$password);
  $sql="USE ".$database.";";
  $conn->query($sql);

  
$changekey1querysql = "UPDATE usersettings SET key1='".$key1new."' WHERE username='".$uname."';";
$changekey2querysql = "UPDATE usersettings SET key2='".$key2new."' WHERE username='".$uname."';";
$changefreqquerysql = "UPDATE usersettings SET freq='".$freqnew."' WHERE username='".$uname."';";
$conn->query($changekey1querysql);
$conn->query($changekey2querysql);
$conn->query($changefreqquerysql);	
}

?>

<html>
<img id="imperialimage" src="imperiallogo.png" alt="imperialimage">
<img id="logoimage" src="switchlogo.png" alt="logoimage">

<form action = '<?php echo $_SERVER['PHP_SELF']; ?>' method ='POST'>

Change Key Settings and Upload Times<br>

Enter Key for Switch Button 1<br>
<input type = 'text' name = 'key1' id = 'key1' required><br>

Enter Key for Switch Button 2<br>
<input type = 'text' name = 'key2' id = 'key2' required><br>
Enter Frequency of Data Upload<br>
<input type = 'text' name = 'freq' id = 'freq' required><br>
<br>
<button type = 'submit' class = 'btn'>Make Changes</button>

</form>

<style>
#imperialimage {
	position: fixed;
	top: 10px;
	right: 10px;
}

#logoimage {
	position: fixed;
	top: 10px;
	left: 10px;
}

h1 {
  text-align: center;
  margin-top: 50px;
  font-size: 40px;
  text-align: center;
  font-family: Arial, sans-serif;
}

h2 {
  text-align: center;
  margin-top: 10px;
  font-size: 20px;
  font-family: Arial, sans-serif;
}

h3 {
  text-align: center;
  margin-top: 10px;
  font-size: 20px;
  font-family: Arial, sans-serif;
  align-items: center;
  font-weight: normal;
}

body {
      align-items: center;
      font-family: Arial, sans-serif;
}
  
form {
  font-size: 20px;
  font-weight: normal;
  text-align: center;
} 

input[type=text]{
  width: 33%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
 background-color:#FFFFF
}

input[type=password]{
  width: 33%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  background-color:#FFFFF
}

.btn {
	  padding: 10px 187px;
      font-size: 16px;
      background-color: #0000FF;
      color: #ffffff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-weight: bold;
    }
  
.btn:hover {
      background-color: #45a049;
    }

</style>
</html>