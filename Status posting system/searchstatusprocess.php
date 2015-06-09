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
		<a href="about.php">About this assignment</a>
</h2>
<?php
	//details of DB
	$host;
	$user;
	$pswd;
	$dbnm;
	$searchCriteria = $_GET['search'];
	$fieldNotEmpty = true;
	//Checking if the input is empty
	if(empty($searchCriteria)) {
		echo "Please provide the input. <br>";
		echo "<a href=\"searchstatusform.php\">Back</a>";
		$fieldNotEmpty = false;
	}
	//Field not empty, connecting to db
	if($fieldNotEmpty) {
	    $allowLike = false;
	    $allowComment = false;
	    $allowShare = false;
            $connection = mysqli_connect($host, $user, $pswd, $dbnm);
            $query = "SELECT status_code, status,date,share,allowLike, allowComment, allowShare FROM postingsystem WHERE status LIKE '%$searchCriteria%'";
            $results = mysqli_query($connection,$query);
			//Getting assocaited values from db and dsiaplaying it as a table
            if($results != false and mysqli_num_rows($results) > 0){

	
				while($row = mysqli_fetch_array($results))
				{
					echo "<table>";
					echo "<tr>";
					echo "<td> Status Code: </td>";
					echo "<td>" . $row['status_code'] . "</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td> Status code: </td>";
					echo "<td>" . $row['status'] . "</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<tr>";
					echo "<td> Date: </td>";
					echo "<td>" . $row['date'] . "</td>";
					echo "</tr>";
					echo "<td> Share: </td>";
					echo "<td>" . $row['share'] . "</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td> Permission: </td>";
					if($row['allowLike'] == 'true'){
						$allowLike = true;
						echo "<td> Allow like </td>";}
					if($row['allowComment'] == 'true'){
						$allowComment = true;
						echo "<td> Allow comment </td>";}
					if($row['allowShare'] == 'true'){
						$allowShare = true;
						echo "<td> Allow share </td>";}
					if($allowLike == false and $allowComment == false and $allowShare == false){
					echo "<td> None </td>";					
}
					echo "</tr>";
					echo "<hr>";
					
					
				}
				echo "</table>";
				echo "<a href=\"searchstatusform.php\">Another search</a>";
			} else {
				echo "No records found";
			}
            mysqli_close($connection);
	}
?>
</body>
</html>