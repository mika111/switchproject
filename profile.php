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

	$passwordcurrent = "8234c0n573v0bv54vb8oicwyr93yi5vrboi5yv3qcony43v".htmlspecialchars($_POST['passwordcurrent'])."2168320704hrf0bf303ufb04ruy4y4084hrhf0847hr8943";
    $passwordnew = "8234c0n573v0bv54vb8oicwyr93yi5vrboi5yv3qcony43v".htmlspecialchars($_POST['passwordnew'])."2168320704hrf0bf303ufb04ruy4y4084hrhf0847hr8943";
    $passwordnewrepeat = "8234c0n573v0bv54vb8oicwyr93yi5vrboi5yv3qcony43v".htmlspecialchars($_POST['passwordnewrepeat'])."2168320704hrf0bf303ufb04ruy4y4084hrhf0847hr8943";
	
	$username = "dbu4094324";
	$password = "xp6bDDcu28BWmgM";
	$database ="dbs11113527";

	$servername = "db5013249289.hosting-data.io";

	$conn = new mysqli($servername, $username ,$password);
  
	$sql="USE ".$database.";";
	$conn->query($sql);

	$sqlpasswordq= "SELECT password FROM userpass WHERE username='".$uname."';";
	$sqlpassword=$conn->query($sqlpasswordq);
	$sqlpasswor = mysqli_fetch_array($sqlpassword);
	$sqlpassw = $sqlpasswor['password'];
	$sqlpass=strval($sqlpassw);

	$hashnewpass= hash('sha256',$passwordnew);
	$hashedcurrentpass= hash('sha256',$passwordcurrent);
	//echo "<br><br><br><br><br><br>";
	//echo $hashedcurrentpass."<br>";
	//echo $sqlpass."<br>";
	//echo $passwordnew."<br>";
	//echo $passwordnewrepeat."<br>";

	if ($sqlpass == $hashedcurrentpass)

	{
	if ($passwordnew == $passwordnewrepeat)
	{
      
	$changepassquerysql = "UPDATE userpass SET password ='".$hashnewpass."' WHERE username='".$uname."';";
	$conn->query($changepassquerysql);
	echo '<h3>password changed<h3>';
    sleep(3);
    echo "<script>window.location.href= 'information.php';</script>";

	}else{
		echo"<h3>New passwords do not match</h3>";
	}
	}else{
	echo '<h3>Incorrect password entered</h3>';
	}
}

?>
<html>
<img id="imperialimage" src="imperiallogo.png" alt="imperialimage">
<img id="logoimage" src="switchlogo.png" alt="logoimage">
<form action = '<?php echo $_SERVER['PHP_SELF']; ?>' method ='POST'>

Change Password<br>

Enter Current Password<br>
<input type = 'password' name = 'passwordcurrent' id = 'passwordcurrent' required><br>

New Password<br>
<input type = 'password' name = 'passwordnew' id = 'passwordrepeat' required><br>

Repeat New Password<br>
<input type = 'password' name = 'passwordnewrepeat' id = 'passwordnewrepeat' required><br>
<br>
<button type = 'submit' class = 'btn'>Change Password</button>

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