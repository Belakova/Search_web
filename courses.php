<!doctype html>
<html>
<head>
<link rel="shortcut icon" href="http://icons.iconarchive.com/icons/mazenl77/I-like-buttons-3a/512/Cute-Ball-Go-icon.png">
<link rel='stylesheet' type='text/css' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
<link rel="stylesheet" type="text/css"  href="style.css">
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script src="SearchComplete.js"></script>
</head>
<body>

  <nav class="navbar">
    <div class="container-fluid">
      <div class="navbar-header">
         <a class="navbar-brand" href="#">University</a>
            </div>
        <ul class="nav navbar-nav navbar-right">
      <li><a href="#about">About</a></li>
      <li><a href="#contact">Contact</a></li>
        </ul>
   </div>
  </nav>

<div class="container" >
  <div class="row">

  <form  class="col-lg-1 col-centered" role="search"  id="searchForm" method="post" action ="courses.php">
        <div class="form-group  " id="searchingGroup" >
      		<input  id="cname" type="text" name="searchInput" class="  form-control  input-lg"  size="21" maxlength="120" placeholder="Search for..." >
  				<input id="btnSearch" name="submit" class="btn btn-info form-control" type="submit" value="search">
        </div>
      <div  id ="myfilter">
      <label class="checkbox-inline"><input type="checkbox" value="">By name</label>
      <label class="checkbox-inline"><input type="checkbox" value="">By name</label>
      <label class="checkbox-inline"><input type="checkbox" value="">By name</label>
      </div>

      <button id ="goBack" class="btn btn-info  pull-right " onclick="history.go(-1);"> << Go back </button>
   </form>
  </div>
</div>


<?php

$input = "~([A-Za-z]+)~";
if(preg_match($input,$_POST['searchInput']))  {
  $text=$_POST['searchInput'];



$m = new mysqli('localhost', 'scott', 'tiger','courses');
if ($m->connect_errno) {
die('Database connection failed');
}
$m->set_charset('utf8');

//limit for 10 pages
$num=10;
if(!isset($_GET['page'])){
$page = 1;} else { $page = $_GET['page'];
}
$start_from = ($page-1) * $num;
$sql ="SELECT *
FROM course
WHERE title LIKE '%" . $text . "%'
LIMIT $start_from, $num
";
$result = $m->query($sql) or die($m->error);
$count = mysqli_num_rows($result);



 echo " <div class=\"container\">
          <div class=\"row\">
            <h4 class=\"col-md-8\">" . $count .  " results for  " . $text .   "</h4>
          </div>
        </div>
        ";



while($row=mysqli_fetch_array($result)){
  $title=$row['title'];
  $award=$row['award'];
  $id=$row['id'];
  $summary=$row['summary'];

			echo "
				<div class=\"container\">
        <div id=\"rounded\"  class=\"row  bg-info\">
          <a href = 'details.php?about=$id'>
			 		<div >  <h3>". $award . " " .  $title . "</h3> </div>
			 		<div><p>" .  "Code: "   . $id ." </p></div>
			 		<div><p>". $summary ." </p></div>
        </a>
        </div>
			  </div>
			 	 ";
}

$sql = "SELECT * FROM course WHERE title LIKE '%" . $text . "%'";
$rs_result =  $m->query($sql); //run the query
$total_records = mysqli_num_rows($rs_result);  //count number of records
$total_pages = ceil($total_records / $num);

// should modify from post to get to make pagination work
  }echo "<a href='courses.php?page=1'>".'|<'."</a> "; // Goto 1st page

  for ($i=1; $i<=$total_pages; $i++) {
              echo "<a href='courses.php?page=".$i."'>".$i."</a> ";
  };
  echo "<a href='courses.php?page=$total_pages'>".'>|'."</a> "; // Goto last page





?>

</body>
</html>
