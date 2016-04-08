
<!doctype html> 
<html>
 <head>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
 <link rel="stylesheet" type="text/css" href="index.css">
 <meta charset="utf-8">
 <title> Search </title>
 </head>
 <body>
<p>Search for the course</p>
  
<form role="search" class="navbar-form navbar-left" id="search" method="post" action ="search.php?go">		        
			 

				<input value="" name="searchInput" class="form-control" type="text" size="21" maxlength="120" placeholder="Search" >
				 
				<input name="submit" class="btn btn-default" type="submit" value="search">
</form>
 </body>
 </html>
<?php
 
$m = new mysqli('localhost', 'scott', 'tiger','courses');
if ($m->connect_errno) {
 die('Database connection failed');
}
$m->set_charset('utf8');

$sql ="SELECT title
		FROM course 
		"; 
		
		$result = $m->query($sql) or die($m->error);		
		while($row=mysqli_fetch_array($result)){ 
		 		 
		 $title=$row['title'];   
		  
		    echo  "<ul>\n";  
			echo  "<li>" . $title . "</li>\n";  
			echo  "</ul>";
			

		}
		
?>
