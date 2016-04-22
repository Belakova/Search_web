<!doctype html>
 <html>
<head>
 <link rel="stylesheet" type="text/css"  href="style.css">

<script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<link rel='stylesheet' type='text/css' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
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

<?php
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
    $a=  $row['dept'] ; //department name for related query
    $wyl=$row['wyl'];

    //general info about the course
    echo " <div class=\"container\">
             <div class=\"row\">
               <h3 id=\"detailsTitle\" class=\"col-md-8\">{$row['title']}</h3>
                <div id=\"detailsLeft\">  Level: <span class=\"start\"> {$row['level']}  </span> Code:  <span class=\"start\"> {$row['id']}  </span>  </div>
                <div id=\"overview\">
               <div class=\"col-md-12\">{$row['overview']}</div>
               <div id=\"careers\" class=\"col-md-8\">{$row['careers']}</div>
               <div id =\"modules\"  >{$row['wyl']}</div>
             </div>
           </div>
           ";

           //shows the name of the modules
                  $modulesInfo ="SELECT *
                  FROM module,cm
                  WHERE cm.course='{$id}' and cm.module=module.id
                  Order By module.level ASC
                     ";
                   $result = $m->query($modulesInfo) or die($m->error);
                  echo"    <div id=\"allModules\"> About modules </div>";
                  while($row=mysqli_fetch_array($result)){

                   echo " <div class=\"container\">
                            <div class=\"row\">
                             <div class=\"bigger\">{$row['title']} </div>
                              <div id=\"moreModule\">  {$row['id']}   {$row['credits']} ECTs   </div>
                              </div>
                              </div>
                              ";
                         }

                          //related courses
                         $related="SELECT one.*,two.*
                          FROM course one, cm two
                          WHERE  one.id= two.course AND one.dept LIKE '%" . $a . "%' AND one.id != '{$id}'
                          GRoup by id
                          LIMIT 0,3
                         ";
                         $fin=$m->query($related)or die($m->error);

                         echo "   <h4 class=\"col-md-8\"> Related courses  </h4>";
                          while($row1=mysqli_fetch_array($fin)){
                             $id=$row1['id'];
                             echo " <div class=\"container\">
                                      <div class=\"row\">
                                        <a href = 'details.php?about=$id'>
                                        <p class=\"col-md-8\">{$row1['title']} {$row1['id']}  </p>
                                        </a>

                                        </div>
                                        </div>
                                        ";}


                       }





?>
 </body>
</html>
