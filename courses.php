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
         <a class="navbar-brand" href="http://socwebtech1.napier.ac.uk/~40122079/course.php">University</a>
            </div>
        <ul class="nav navbar-nav navbar-right">
      <li><a href="http://socwebtech1.napier.ac.uk/~40122079/course.php">Home</a></li>
      <li><a href="#about">About</a></li>
      <li><a href="#contact">Contact</a></li>
        </ul>
   </div>
  </nav>

<div class="container" >
  <div class="row">
  <form  class="col-lg-12 col-centered" role="search"  id="searchForm" method="post" action ="courses.php">
    <?php
      $m = new mysqli('localhost', 'scott', 'tiger','courses');
      $select="select DISTINCT subject from course where  subject IS NOT NULL Order by subject ";
    $q=$m->query($select) or die($select);
    ?>
    <div class="form-group  " id="searchingGroup" >
      <input  id="cname" type="text" name="searchInput" value="<?php $text=$_POST['searchInput']; echo $text; ?>"  class=" input-lg"  size="21" maxlength="120" placeholder="Search for..." >
      <input target="elementToTop" id="btnSearch" name="submit" class="btn btn-info btn-lg  " type="submit" value="search">
    </div>
    <div  id ="myfilter" >
      <select id="f1" class="form-control filter" name ="level" form="searchForm"  >
        <option selected value ="">All levels</option>
        <option value ="Undergraduate">Bachelor</option>
        <option value ="Postgraduate">Master</option>
      </select>

      <select id ="f2" class="form-control filter"   name ="subject" form="searchForm" >
        <option selected value ="">All Subjects</option>
        <?php //populating selection with existing subjects
          while($rw=mysqli_fetch_array($q)){
                 echo "<option value='" . $rw['subject']."' >" . $rw['subject'] ."</option>";
        } ?>
      </select>
      <script type="text/javascript">
         $("#f1").val("<?php echo $_POST['level'];?>");
         $("#f2").val("<?php echo $_POST['subject'];?>");
      </script>
    </div>

    </form>
  </div>
</div>


<?php
 $text=$_POST['searchInput'];
 $level=$_POST['level'];
 $subject=$_POST['subject'];
 $m = new mysqli('localhost', 'scott', 'tiger','courses');
 if ($m->connect_errno) {
 die('Database connection failed');
 }
 $m->set_charset('utf8');
//union in queries
// if(isset($_POST['level']))
 $sql ="SELECT title,award,id,summary from course
     WHERE  title LIKE '%" . $text . "%'  AND subject LIKE '%" . $subject . "%' AND level LIKE '%" . $level . "%'
     LIMIT 10
    ";
      $result = $m->query($sql) or die($m->error);
      $count = mysqli_num_rows($result);
//displaying all courses
while($row=mysqli_fetch_array($result)){
  $title=$row['title'];
  $award=$row['award'];
  $id=$row['id'];
  $summary=$row['summary'];
			echo "
				<div class=\"container-fluid\">
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
?>


</body>
</html>
