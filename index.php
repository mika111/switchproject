<?php
session_start();
$_SESSION['a'] = 'a';
$_SESSION['b'] = 'b';
$_SESSION['freq'] = '30';
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
	$uname= htmlspecialchars($_POST['uname']);
	$passwor = "8234c0n573v0bv54vb8oicwyr93yi5vrboi5yv3qcony43v".htmlspecialchars($_POST['password'])."2168320704hrf0bf303ufb04ruy4y4084hrhf0847hr8943";
	$username = "dbu4094324";
	$password = "xp6bDDcu28BWmgM";
	$database="dbs11113527";

	$servername = "db5013249289.hosting-data.io";

	$conn = new mysqli($servername, $username ,$password);
  
	$sql="USE ".$database.";";
	$conn->query($sql);
  
	$sqlpasswordq= "SELECT password FROM userpass WHERE username='".$uname."';";
	$sqlpassword=$conn->query($sqlpasswordq);
	$sqlpasswor = mysqli_fetch_array($sqlpassword);
	$sqlpassw = $sqlpasswor['password'];
	$sqlpass=strval($sqlpassw);

	$hashedpass= hash('sha256',$passwor);
        
    if ($hashedpass === $sqlpass)
    { 
    $_SESSION['AUTH'] = "authed";
    $_SESSION['uname'] = $uname;
    

    session_write_close();
    echo "<script>window.location.href = 'information.php'</script>";
    exit;
    }
    if ($hashedpass != $sqlpass)
    {
    echo "<h3>Incorrect username or password. Please try again \n"."</h3>";
    echo "<script>
    
    
    //alert('');</script>";
    }
 	}

 ?>

<html> 
<head>

<script>

function forgotpassword(event)
{
event.preventDefault();
window.location.href = 'support.php';
}

</script>

<style>

        #imperialimage {
          position: fixed;
            top: 10;
            left: 10;
        }

        #logoimage {
          position: fixed;
          top: 10;
          right: 10;
        }
        
    </style>
</head>

<img id="imperialimage" src="imperiallogo.png" alt="imperialimage">
<img id="logoimage" src="switchlogo.png" alt="logoimage">

<h1> Ultimate Switch Login </h1>
<h2>Access your data anywhere, anytime</h2>

<form action = "<?php echo $_SERVER['PHP_SELF']?>" method="POST">

Username <br> <input type = "text" name = "uname" pattern = "[A-Za-z0-9]+" required><br>

Password <br> <input type="password" name= "password" pattern = "[A-Za-z0-9]+" required><br>

<button type="submit" class = "btn">Login</button><br>
<button onclick= "forgotpassword(event)" class= "changepass">Forgot Password</button>

</form>

<style>

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
margin-top:10px;
font-size: 18px;
text-align: center;
align-items: center;
font-family: Arial, sans-serif;
}

body {
      align-items: center;
      font-family: Arial, sans-serif;
}

form {
  font-size: 20px; 
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

  .changepass {
   text-align: center;
   align-items: center;
    margin-top: 8px;
    padding: 7px 150px;
    font-size: 16px;
    background-color: #FFFFFF;
    color: #000000;
    border: 3px solid black;
    border-radius: 5px;
    cursor: pointer;
  }
  
</style>
</body>
</html>