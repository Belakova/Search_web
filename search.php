<?php
//http://socwebtech1.napier.ac.uk/~40122079/Trial/index.html

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
		";
		$result = $m->query($sql) or die($m->error);
 	//	$count = mysqli_num_rows($result);
		//echo "<p>" . "Total: " . $count .  "</p>";

		//echo "<h4>You search for " . $text . "</h4>";
		$test = [];
		while($row=mysqli_fetch_array($result)){
			$test[] = $row['title']; // array to for a search input
			$title=$row['title'];
			//$a = array($row['title']);
			$award=$row['award'];
			$id=$row['id'];
			$summary=$row['summary'];




		//	if(isset($_GET['courses'])){


			/*echo "


				<div class=\"container\"><\">
			 		<div class=\"row  bg-success\"><a href = 'details.php?about=$id'><h3>Course " . $title . "</h3></a></div>
			 		<div class=\"row  bg-success\">". $award ." </div>
			 		<div class=\"row  bg-success\">". $id ." </div>
			 		<div class=\"row  bg-success\">". $summary ." </div>
			 	<br>
			 	 </div>
			 	 ";		*/

		//	}



		}
		echo json_encode($test, JSON_PRETTY_PRINT);






   }


		else{
			//echo  "<p>Please enter a search query</p>";
		}



?>
