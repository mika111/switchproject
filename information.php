<?php session_start();

if(isset($_SESSION['uname']))                                                                                                    
{
  if($_SESSION['AUTH'] == 'authed')
  {
  
  }else{
  echo "<script>window.location.href = 'index.php';</script>";
  }
  }else{
  echo "<script>window.location.href = 'index.php';</script>";
  }

?>
<html>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
 #imperialimage {
 position: fixed;
 top: 10;
 left: 10;
}

#logoimage {
 position: fixed;
 top: 10;
 left: 110;
}
   
body {
  background-color: white
  text-align: center;
}
		
h1 {
  text-align: center;
  margin-top: 50px;
  font-size: 26px;
  font-weight: bold;
  font-family: Arial, sans-serif;
}
		
h2 {
  text-align: center;
  font-size: 18px;
  font-weight: bold;
  font-family: Arial, sans-serif;
}

h3 { 
  text-align: center;
  font-size: 10px;
  font-family: Arial, sans-serif;            
}

.displaychart {
  display: flex;
  justify-content: center;
}

.chartcontainer {
  height: 375px;
  width: 500px;
}

.chartcontainer2 {
  display: flex;
  flex-direction: column;
  height: 375px;
  width: 500px;
}

.barchartcontainer {
  height: 250px;
  width: 500px;
}

.selectdatesbox {
  position: relative;
  height: 250px;
  width: 500px;
}
          
.space {
  position: absolute;
}
          
.centre {
  margin-top: 50px;
  right: 30%;
}

.left {
  margin-top: 50px;
  right: 60%;
}

.right {
  margin-top: 71px;
  right:10%;
}

form {
  font-size: 18px;
  font-family: Arial, sans-serif;
}

input[type="date"] {
  padding: 10px;
  font-family: Arial, sans-serif;
} 

button {
  padding: 12px;
  background-color: #0000FF;
  color: #fff;
  border: none;
}

</style>
  
<?php
  $uname= $_SESSION['uname'];
  echo "<h1>User Data for ".$uname."</h1>";
?>
  
<head>
  
<img id="imperialimage" src="imperiallogo.png" alt="imperialImage">                                                       
<img id="logoimage" src="switchlogo.png" alt="logoimage">

<?php include 'menu.php';

$username = "dbu4094324";
$password = "xp6bDDcu28BWmgM";
$database="dbs11113527";

$servername = "db5013249289.hosting-data.io";

$conn = new mysqli($servername, $username ,$password);

$sql="USE ".$database.";";
  
$conn->query($sql);

$sqlselect= "SELECT username, password FROM userpass WHERE username='".$uname."'AND password='".$passwor."';";
$selectdata= "SELECT * FROM userdata WHERE username='".$uname."';";
$selectk1= "SELECT * FROM userdata WHERE username='".$uname."' AND keypressed ='1';";
$selectk2= "SELECT * FROM userdata WHERE username='".$uname."' AND keypressed ='2';";
$selectk3= "SELECT * FROM userdata WHERE username='".$uname."' AND keypressed ='3';";
$selectk4= "SELECT * FROM userdata WHERE username='".$uname."' AND keypressed ='4';";
$userpassdata=$conn->query($selectdata);

$k1=$conn->query($selectk1);
$k2=$conn->query($selectk2);
$k3=$conn->query($selectk3);
$k4=$conn->query($selectk4);

$entries=mysqli_num_rows($userpassdata);
$k1entries=mysqli_num_rows($k1);
$k2entries=mysqli_num_rows($k2);
$k3entries=mysqli_num_rows($k3);
$k4entries=mysqli_num_rows($k4);

echo "<h2>".$entries." Button Activations found"."</h2><br>";

if($_SERVER['REQUEST_METHOD'] == 'POST')

{
$date1 =new DateTime($_POST['date1']);
$date2 = new Datetime($_POST['date2']);
$numberperday = array();
$dates = array();
while($date1 != $date2)

{

$date1start = $date1->format('Y-m-d');
$dates[]=$date1->format('d-m-y');
$date1 = $date1->modify('+1 day');
$date1end =$date1->format('Y-m-d');
  

$startofday = strtotime($date1start);
$endofday = strtotime($date1end);

$sqldaycounter = "SELECT * FROM userdata WHERE username = '".$uname."' AND datetime>".$startofday." AND datetime<".$endofday.";";
$colums =$conn->query($sqldaycounter);
$noofcols = mysqli_num_rows($colums);

$numberperday[] = $noofcols;
}

}  


else{

$date1 =new DateTime('now');
$date1=$date1->modify('-7 day');
$numberperday = array();
$dates = array();

for ($x = 0; $x<=6 ; $x++)
{

$date1start = $date1->format('Y-m-d');
$dates[]=$date1->format('d-m-y');
$date1 = $date1->modify('+1 day');
$date1end =$date1->format('Y-m-d');
  

$startofday = strtotime($date1start);
$endofday = strtotime($date1end);

$sqldaycounter = "SELECT * FROM userdata WHERE username = '".$uname."' AND datetime>".$startofday." AND datetime<".$endofday.";";
$colums =$conn->query($sqldaycounter);
$noofcols = mysqli_num_rows($colums);

$numberperday[] = $noofcols;  
  
  
}
  
}
?>
  
</head>
  
<div class="displaychart">                 
  <div class="chartcontainer" >
      <canvas id="myChart"></canvas>
  </div>
  <div class =chartcontainer2>
    <div class="barchartcontainer">
      <canvas id="mybarChart"></canvas>    
    </div>
    <div class = "selectdatesbox" >
      <form action = "<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        <div class = "space left">                                                                                                        
          <label for = "d1"> Select Start Date</label>
          <br>
          <input type="date" id = "d1" name="date1" >
        </div>
        <div class = "space centre"> 
	  <label for = "d2"> Select End Date</label>
	  <br>
	  <input type="date" id = "d2" name="date2" >
	</div>
	<div class = "space right">
	  <button type="submit">Enter</button>
        </div>
      </div>
    </div>
  </div>
</form>

<script>
var k1entries = '<?php echo $k1entries; ?>';
var k2entries = '<?php echo $k2entries; ?>';
var k3entries = '<?php echo $k3entries; ?>';
var k4entries = '<?php echo $k4entries; ?>';

var piecanvas = document.getElementById('myChart').getContext('2d');

var datapie = {
    
    labels: ['Button 1(Push Activation)', 'Button 1 (Proximity Activation)', 'Button 2 (Push Activation)', 'Button 2 (Proximity Activation)'],
    
    datasets: [{
      data: [k1entries, k2entries, k3entries, k4entries],
      backgroundColor: ['#0000FF', '#FF0000', '#FFFF00', '#FFA500']
    }]
    
  };
 
  var options = {
    responsive: true ,
	maintainAspectRatio: true
	
  };
  
  var myChart = new Chart(piecanvas, {
    type: 'pie',
    data: datapie,
    options: options
  });
	
</script>

<script>

var barcanvas = document.getElementById('mybarChart').getContext('2d');
var numberperday = <?php echo json_encode($numberperday); ?>;
var dates = <?php echo json_encode($dates); ?>;
var colours = Array('<?php count($dates);?>').fill('#0000ff');
var databar = {
    labels: dates,
    
    datasets: [{
		label: 'Total Keypresses',
		data: numberperday,
		backgroundColor: colours,
		borderColor: colours,
		borderWidth: 1
    }]
    
  };
  
var mybarChart = new Chart(barcanvas, {
    type: 'bar',
    data: databar,
    options: {
    legend: {display: false},
    
    scales: {
      y: {
        beginAtZero: true
	  }

	}}
    
  });
	
</script>
  
<?php
 
echo "<h2>Keypresses:</h2>";

foreach($userpassdata as $row) 
{
echo "<h3>Key ". $row['keypressed']." ".$row['datetime']. "</h3>";
}

?>
