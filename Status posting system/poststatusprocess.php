<html>
	<head
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Status information</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<STYLE>
	<!--
	A{text-decoration:none}
	-->
	</STYLE>
<body>
<h1>Status Posting System</h1>
<h2>
		<a href="index.php">Main page</a>
		<a href="poststatusform.php">Post status</a>
		<a href="searchstatusform.php">Search status</a>
		<a href="about.php">About this assignment</a>	
</h2>
<?php
//details of DB
	$host;
	$user;
	$pswd;
	$dbnm;
	$statusCode = $_POST['code'];
    $status = $_POST['status'];
	$share = $_POST['share'];
	$allowShare = $_POST['allowShare'];
	$allowLike = $_POST['allowLike'];
	$allowComment = $_POST['allowComment'];
	$date = $_POST['date'];
	$detailsCorrect = true;
	$numericCheck = substr($statusCode, 1);
	//Checking if the input is acceptable
	if($statusCode == '') {
		echo "Status code cannot be empty. Please fill it in. <br>";
		echo "<a href=\"poststatusform.php\">Back</a><br>";
		$detailsCorrect = false;
	}
	
	if($numericCheck == false || $statusCode[0] != 'S') {
		echo "Status code should start with 'S' and contain numericals after that. <br>";
		echo "<a href=\"poststatusform.php\">Back</a><br>";
		$detailsCorrect = false;
	}


	if($status == '') {
		echo "Status cannot be empty. Please fill it in. <br>";
		echo "<a href=\"poststatusform.php\">Back</a>";
		$detailsCorrect = false;
	}
	
	if(empty($date)) {
		echo "<br>Date cannot be empty.Please fill it in. <br>";
		echo "<a href=\"poststatusform.php\">Back</a>";
		$detailsCorrect = false;
	}
	
	if(!isset($allowShare)) {
		$allowShare = false;
	}
	
	if(!isset($allowLike)) {
		$allowLike = false;
	}
	
	if(!isset($allowComment)) {
		$allowComment = false;
	}
	
	if($share == 'public') {
		$share = 'Public';
	}
	
	if($share == 'friends') {
		$share = 'Friends';
	}
	
	if($share == 'onlyme') {
		$share = 'Only me';
	}
	
	//Details are correct, may continue with the database insertion
	if($detailsCorrect == true) {
		//Connecting to the database.
		$connection = mysqli_connect($host, $user, $pswd, $dbnm) or die('Failed to connect.');
		//Checking if the table exists else creating a new table
		if(mysql_query("DESCRIBE `postingsystem`")) {
			echo "Table exists";
		}
		
		else { 
			$createTable = "Create table postingsystem (status_code varchar (5) PRIMARY KEY, status varchar(100) NOT NULL, date VARCHAR(40),share VARCHAR(40), allowLike VARCHAR(40), allowComment VARCHAR(40), allowShare VARCHAR(20))";
			mysqli_query($connection, $createTable);		
		}
		
		$insertionQuery = "Insert into postingsystem (status_code, status, date, share, allowLike, allowComment, allowShare) values ('$statusCode', '$status', '$date', '$share', '$allowLike', '$allowComment', '$allowShare')";	
		//Inserting values into db
		if(mysqli_query($connection, $insertionQuery)) {
				echo "Post added!";			
		}
		//Status code already exists
		else {
						mysqli_query($connection, $insertionQuery) or die("The same status code already exists, please change the status code. " . mysqli_errno($connection) . " - error: " . mysqli_error($connection));
                        echo "<h1>Post added</h1>";
		}		
	}

?>
</body>
</html>