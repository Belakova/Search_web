<!doctype html>
 <html>
<head>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<link rel='stylesheet' type='text/css' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
</head>
<body>
<?php
//http://socwebtech1.napier.ac.uk/~40122079/Trial/index.php

	 $input = "~([0-9]{5}[A-Za-z]{2})~";
		if(preg_match($input,$_GET['about'])){
		$id = $_GET['about'];
	    $m = new mysqli('localhost', 'scott', 'tiger','courses');
		if ($m->connect_errno) {
		die('Database connection failed');
		}
		$m->set_charset('utf8');
		$sql ="SELECT *
		FROM course
		WHERE id = '{$id}'
		";
		$result = $m->query($sql) or die($m->error);
		$row = mysqli_fetch_assoc($result);
		echo "<h4>{$row['title']}</h4>";
		echo "<h4>{$row['id']}</h4>";
		echo "<h4>{$row['id']}</h4>";
 
   }



?>
 </body>
</html>
