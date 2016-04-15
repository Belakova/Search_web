<!doctype html>
<html>
 <head>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <link rel="shortcut icon" href="http://icons.iconarchive.com/icons/mazenl77/I-like-buttons-3a/512/Cute-Ball-Go-icon.png">
   <link rel="icon" href="http://icons.iconarchive.com/icons/mazenl77/I-like-buttons-3a/512/Cute-Ball-Go-icon.png">
   <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
   <link rel="stylesheet" type="text/css" media="all" href="style.css">
<script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
   <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
 <meta charset="utf-8">
 <title> Search </title>
 </head>
 <body>
<p>Search for the course</p>
   <script src="SearchComplete.js"></script>

<form role="search" class="navbar-form navbar-left" id="searchForm" method="post" action ="courses.php">
				<input  id="cname" type="text" name="searchInput" class="form-control"  size="21" maxlength="120" placeholder="Search" >
				<input name="submit" class="btn btn-default" type="submit" value="search">
			<div id="getDetails"></div>
</form>






 </body>
 </html>
