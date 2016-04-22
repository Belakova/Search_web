<?php
//http://socwebtech1.napier.ac.uk/~40122079/Trial/index.php

	  $input = "~([A-Za-z]+)~";
		if(preg_match($input,$_POST['term']))  {
    $text=$_POST['term'];
	  $m = new mysqli('localhost', 'scott', 'tiger','courses');
		if ($m->connect_errno) {
		die('Database connection failed');
		}
		$m->set_charset('utf8');


		$sql ="SELECT *
	  FROM course
		WHERE title LIKE '%" . $text . "%'
		Group by title
		";
		$result = $m->query($sql) or die($m->error);

		$test = [];
		while($row=mysqli_fetch_array($result)){
			$test[] = $row['title']; // array to for a search input
			$title=$row['title'];
			$award=$row['award'];
			$id=$row['id'];
			$summary=$row['summary'];
		}
		echo json_encode($test, JSON_PRETTY_PRINT);
   }


		else{

		 echo  "<p>Please enter a search query</p>";


		}



?>
