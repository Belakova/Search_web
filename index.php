<!doctype html>
<html lang="en">
 <head>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel='stylesheet' type='text/css' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
    <link rel="shortcut icon" href="http://icons.iconarchive.com/icons/mazenl77/I-like-buttons-3a/512/Cute-Ball-Go-icon.png">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
   <link rel="stylesheet" type="text/css"  href="style.css">
<script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
   <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>

    <script src="SearchComplete.js"></script>
 <meta charset="utf-8">
 <title> Search </title>
 </head>
 <body>


<nav class="navbar">
  <div class="container-fluid">
    <div class="navbar-header">
       <a class="navbar-brand" href="#">University</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="index.php">Home</a></li>
      <li><a href="#about">About</a></li>
      <li><a href="#contact">Contact</a></li>
    </ul>
  </div>
</nav>
<div id="pic">
<img src="graduates.jpg" class="img-responsive ">
</div>


<div class="container">
<form  role="search"  id="searchForm" method="post" action ="courses.php">
      <div class="form-group " id="searchingGroup" >
    		<input  id="cname" type="text" name="searchInput" class=" input-lg"  size="21" maxlength="120" placeholder="Search for..." >
				<input target="elementToTop" id="btnSearch" name="submit" class="btn responsive-width btn-info btn-md  " type="submit" value="search">
      </div>
      <p class=" btn-group pull-right" id="advanced" >advanced search </p>
      <div  id ="myfilter" style="display:none">
        <select id="f1" class="form-control filter" name ="level" form="searchForm"  >
           <option selected value ="graduate">All levels</option>
          <option value ="Undergraduate">Bachelor</option>
          <option value ="Postgraduate">Master</option>
        </select>

        <select id ="f2" class="form-control filter"   name ="subject" form="searchForm" >
          <option value ="Accounting">  Accounting  </option>
          <option value ="Architectural technology"> Architectural technology </option>
          <option value ="Biology">  Biology  </option>
          <option value ="Building"> Building </option>
           <option value ="Business">Business  </option>
          <option value ="Careers guidance">   Careers guidance </option>
          <option value ="Civil engineering"> Civil engineering </option>
          <option value =" Communication and media"> Communication and media </option>
            <option value ="Computing"> Computing </option>
          <option value ="Creative Writing">Creative Writing   </option>
          <option value ="Design">Design   </option>
         <option value ="Drama">Drama   </option>

           <option value ="Management">Management</option>
          <option value ="Finance">Finance</option>
//Drug Design
Economics
Electronic and Electrical English
English
Environmental biology
Environmental engineering
Exercise
Facilities Management
Film and Television
Finance
General engineering
Health
Human Resource Management HRM
International
Law
Leisure
Management
Marketing
Music
NURSING
Photography
Psychology
Publicity studies
Publishing
Quantity surveying
Sociology
Structural engineering
Transport engineering
Veterinary nursing
//
          <option value ="    ">   </option>
          <option value ="  ">   </option>
          <option value ="    ">   </option>
          <option value ="  ">   </option>
          <option value ="    ">   </option>
          <option value ="  ">   </option>
          <option value ="    ">   </option>
          <option value ="  ">   </option>
          <option value ="    ">   </option>
        </select>
        <script type="text/javascript">
           $("#f1").val("<?php echo $_POST['level'];?>");
           $("#f2").val("<?php echo $_POST['subject'];?>");
        </script>
      </div>


</form>
</div>




 </body>
 </html>
