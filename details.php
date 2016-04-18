<!doctype html>
 <html>
<head>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<link rel='stylesheet' type='text/css' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
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


  </nav> <button id ="goBack" class="btn btn-info  pull-right " onclick="history.go(-1);"> << Go back </button>

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

//to be modified  -> wyl, careers, overview course info!
    echo " <div class=\"container\">
             <div class=\"row\">
               <p class=\"col-md-8\">{$row['title']}</p>
               <p class=\"col-md-8\">{$row['id']}</p>
               <p class=\"col-md-8\">{$row['level']}</p>
               <p class=\"col-md-8\">{$row['overview']}</p>
               <p class=\"col-md-8\">{$row['wyl']}</p>
               <p class=\"col-md-8\">{$row['careers']}</p>
             </div>
           </div>
           ";




           //shows the name of the modules
                  $modulesInfo ="SELECT *
                  FROM module,cm
                  WHERE cm.course='{$id}' AND cm.module=module.id
                     ";
                   $result = $m->query($modulesInfo) or die($m->error);
                  while($row=mysqli_fetch_array($result)){
                   echo " <div class=\"container\">
                            <div class=\"row\">
                              <p class=\"col-md-8\">{$row['id']}  {$row['title']}  {$row['credits']} {$row['level']} </p>
                              </div>
                              </div>
                              ";
                         }
                       }


?>
 </body>
</html>
