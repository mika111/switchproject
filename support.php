<html>

<img id="imperialimage" src="imperiallogo.png" alt="imperialImage">
<img id="logoimage" src="switchlogo.png" alt="logoimage">
<head>
<h1>Get in touch with us at support@ultimateswitch.co.uk or using the form below:<h1>

<form action = 'feedbackreceived.php' method = 'POST'>

Title of Query<br><input type="text" id = 'title' name = 'title' required><br>
Email<br><input type = "email" id = "email" name = "email" required><br>
Query<br><textarea name = "query" id = "query" rows="4" cols="30"></textarea><br><br>
<button type = "submit" class ="btn" >Submit Query</button>

</form>

</head>

<style>

h1 {
  text-align: center;
  margin-top: 120px;
  font-size: 30px; 
  font-family: Arial, sans-serif;
}

body {
      align-items: center;
      font-family: Arial, sans-serif;
}

form {
  margin-top:-80px;
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

input[type=email]{
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

#imperialimage {
    position: absolute;
    top: 10;
    left: 10;
    }

    #logoimage {
          position: absolute;         
          top: 10;
          right: 10;
        }
 
</style>
</html>