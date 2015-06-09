<html>
<head
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Status Posting Form</title>
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
	<a href="searchstatusform.php">Search status</a>
	<a href="about.php">About this assignment</a>
</h2>
 <form action="poststatusprocess.php" method="POST">
            <h2>Please enter status details</h2>
            <table>
                <tr>
                    <td><p>Status code (required):</p></td>
                    <td><input type="text" name="code" MaxLength="5" /></td>
                </tr>
                <tr>
                    <td><p>Status (required):</p></td>
                    <td><input type="text"  name="status"   ></td>
                </tr>
                <tr>
                    <td><p>Share:</p></td>
                    <td>
                    <input type="radio" value="public"  name="share"/>Public
                    <input type="radio" value="friends" name="share"/>Friends
					<input type="radio" value="onlyme" name="share"/>Only me
                    </td>
                </tr>
                <tr>
                    <td><p>Permission type:</p></td>
                    <td><input type="checkbox" name="allowLike" value="true">Allow like </td>
					<td><input type="checkbox" name="allowComment" value="true">Allow comment </td>
					<td><input type="checkbox" name="allowShare" value="true">Allow share </td>
                </tr>
                <tr>				
                    <td><p>Date:</p></td>					
                    <td><input type="text" name="date" value="<?php echo date('d/m/y');?>"/></td>
                </tr>
                <tr>
                    <td></td>
                    <td align="right">
                        <button type="reset" style="width: 100px"><p>Reset</p></button>
                        <button type="submit" style="width: 100px"><p>Submit Post </p></button>
                    </td>
                </tr>
            </table>
        </form>
</body>
</html>