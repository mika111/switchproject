<?php session_start();

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
?>
<html>
<head>
    <title>User Information</title>
    <style>
        body {
            margin: 0;
            padding: 20px;
        }

        .menu {
            position: absolute;
            top: 0;
            right: 0;
            background-color: #0000FF;
            padding: 5px;
        }

        .menu button {
            background-color: #0000FF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            margin-right: 10px;
            border-radius: 4px;
            cursor: pointer;
        }

        .menu button:hover {
            background-color: #333;
      }
    </style>
</head>
<body>
    <div id="menu" class="menu">
        <button onclick="window.location.href='profile.php'">View Profile</button>
        <button onclick="window.location.href='sync.php'">Manually Sync</button>
        <a><button>Download Data</button></a>
        <button onclick="window.location.href='support.php'">Support</button>
    </div>
    
    
    <?php 

    $uname = $_SESSION['uname'];
	$unamecsv = $uname."userdata.csv";
    $username = "dbu4094324";
    $password = "xp6bDDcu28BWmgM";
    $database="dbs11113527";

    $servername = "db5013249289.hosting-data.io";

    $conn = new mysqli($servername, $username ,$password);

    $sql="USE ".$database.";";
  
    $username1 = "mikayelsuvaryan"; 

    $conn->query($sql);

   
    $selectdata= "SELECT * FROM userdata WHERE username='".$uname."';";

    $userpassdata=$conn->query($selectdata);

   $csvdata = "Keypressed, Time,"."\\n";
   foreach($userpassdata as $row)
    
{

$array0 = $row['keypressed'];
$array1 = $row['datetime'];
$array2 = date('d-m-y,h:i:s',$array1);
$csvdata = $csvdata.$array0.",".$array1.",".$array2.","."\\n";
 
}

?>

</body>
  
<script>

const a = document.querySelector('a');
var user = '<?php echo $csvdata;?>';
const csvblob = new Blob([user],{type: 'text/csv'});
const url = URL.createObjectURL(csvblob);
var nameoffile = '<?php echo $unamecsv;?>';
a.href = url;
a.download = nameoffile;
 
</script>
</html>