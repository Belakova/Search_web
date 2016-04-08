 <html>
<head> 
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<link rel='stylesheet' type='text/css' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
</head>
<body>
 </body>
</html>

<?php
//http://socwebtech1.napier.ac.uk/~40122079/Trial/index.php
 if(isset($_POST['submit'])){ 
 if(isset($_GET['go'])){
	 
	 $input = "~([A-Za-z]+)~";
   if(preg_match($input,$_POST['searchInput'])){
		$text=$_POST['searchInput']; 		 
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
 		$count = mysqli_num_rows($result);		
		echo "<p>" . "Total: " . $count .  "</p>";
		 
		 while($row=mysqli_fetch_array($result)){
			 $title=$row['title'];   
			$award=$row['award'];
			$id=$row['id'];
			$summary=$row['summary'];
			$about = "about";
			//$overview[]=$row;			
			 //echo	"<input name value='" . $title ."'>" .$title ."</option>";
		    		
		 
	  
			
			echo " 
			 	<div class=\"container\" onclick=\"location.href='$title'\">  
			 		<div class=\"row  bg-success\"><h3>". $title ." </h3></div> 
			 		<div class=\"row  bg-success\">". $award ." </div> 
			 		<div class=\"row  bg-success\">". $id ." </div> 	
			 		<div class=\"row  bg-success\">". $summary ." </div> 	 				
			 	<br>
			 	 </div> 
			 	 ";			 				
	 
		 }
		
		
				 
		
   }
		
		
		else{ 
			echo  "<p>Please enter a search query</p>"; 
		}
		}
 }
		
?>