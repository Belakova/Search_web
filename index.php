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
 <meta charset="utf-8">
 <title> Search </title>
 </head>
 <body>
   <script src="SearchComplete.js"></script>

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

<img src="graduates.jpg"  id="p" class="img-responsive ">




<div class="container">
<form  role="search"  id="searchForm" method="post" action ="courses.php">
      <div class="form-group  " id="searchingGroup" >
    		<input  id="cname" type="text" name="searchInput" class="  form-control  input-lg"  size="21" maxlength="120" placeholder="Search for..." >
				<input id="btnSearch" name="submit" class="btn btn-info form-control" type="submit" value="search">
      </div>

        <p class=" btn-group pull-right" id="advanced" >advanced search </p>

      <div style="display: none" id ="myfilter"   >
    <label class="checkbox-inline"><input type="checkbox" value="">By name</label>
    <label class="checkbox-inline"><input type="checkbox" value="">By name</label>
      <label class="checkbox-inline"><input type="checkbox" value="">By name</label>
      </div>

</form>
</div>
 </body>
 </html>
