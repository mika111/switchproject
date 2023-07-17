<?php

	$title=$_POST['title'];
	$email= $_POST['email'];
	$query=$_POST['query'];
	$newtitle = ("regarding ".$title." from ".$email);
	mail('support@ultimateswitch.co.uk', $newtitle, $query);
	mail($email,"Notification confirming form submission","This is a message confirming receipt of your query regarding".$title.".We will be in touch as soon as we can regarding your query");
    echo "<script>window.location.href= 'information.php';</script>";
?>
<script>
function redirect() {

window.location.href= 'information.php'
}
</script>
<head>thanks for your feedback</head>
<button onclick = "redirect()">
</html>

