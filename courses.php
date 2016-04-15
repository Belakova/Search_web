<!doctype html>
<html>
<head>
<link rel='stylesheet' type='text/css' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
   <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
   <script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
      <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
   <script src="SearchComplete.js"></script>
</head>
<body>


<form role="search" class="navbar-form navbar-left" id="searchForm" method="post" action ="courses.php">
  				<input  id="cname" type="text" name="searchInput" class="form-control"  size="21" maxlength="120" placeholder="Search" >
  				<input name="submit" class="btn btn-default" type="submit" value="search">
  			<div id="getDetails"></div>
</form>

<?php

$input = "~([A-Za-z]+)~";
if(preg_match($input,$_POST['searchInput']))  {
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

 echo "<h4>You search for " . $text . "</h4>";

while($row=mysqli_fetch_array($result)){
  $title=$row['title'];
  //$a = array($row['title']);
  $award=$row['award'];
  $id=$row['id'];
  $summary=$row['summary'];


		//	if(isset($_GET['courses'])){
			echo "

				<div class=\"container\"><\">
			 		<div class=\"row  bg-success\"><a href = 'details.php?about=$id'><h3>Course " . $title . "</h3></a></div>
			 		<div class=\"row  bg-success\">". $award ." </div>
			 		<div class=\"row  bg-success\">". $id ." </div>
			 		<div class=\"row  bg-success\">". $summary ." </div>
			 	<br>
			 	 </div>
			 	 ";


}
    }

?>

</body>
</html>
