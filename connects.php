<?php
$mail_id = $_POST['mail_id'];
$password = $_POST['password'];
$text = $_POST['text'];
if (!empty($mail_id) || !empty($password)) {
	$host = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbname = "project_login";

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    if (mysqli_connect_error()){
    	die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
    	$SELECT = "SELECT mail_id From login Where mail_id = ? Limit 1";
    	$INSERT	= "INSERT Into login (mail_id, password, text) values(?, ?, ?)";

    	$stmt = $conn->prepare($SELECT);
    	$stmt->bind_param("s", $mail_id);
    	$stmt->execute();
    	$stmt->bind_result($mail_id);
    	$stmt->store_result();
    	$rnum = $stmt->num_rows;

    	if ($rnum==0) {
    		$stmt->close();

    		$stmt = $conn->prepare($INSERT);
    		$stmt->bind_param("sss", $mail_id, $password, $text);
    		$stmt->execute();
    		
    	} 
    	$stmt->close();
    	$conn->close();
    }

} else {
	echo "All fields are required";
	die();
}


?>