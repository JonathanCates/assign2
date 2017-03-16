{"filter":false,"title":"browse-paintings_original.php","tooltip":"/browse-paintings_original.php","undoManager":{"mark":0,"position":0,"stack":[[{"start":{"row":0,"column":0},"end":{"row":251,"column":7},"action":"remove","lines":["<!DOCTYPE html>","<html lang=en>","<head>","<meta charset=utf-8>","    <link href='http://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'>","    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>","    ","    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js\"></script>","    <script src=\"css/semantic.js\"></script>","    <script src=\"js/misc.js\"></script>","    ","    <link href=\"css/semantic.css\" rel=\"stylesheet\" >","    <link href=\"css/icon.css\" rel=\"stylesheet\" >","    <link href=\"css/styles.css\" rel=\"stylesheet\">","","</head>","<?php","\tinclude \"includes/db.php\";","\tinclude \"includes/sql-statements.php\";","","\tfunction printFilters($pdo)","\t{","\t\t$allArtists = fetchAllArtistsByLastName();","\t\t$artists = getPDO($pdo, $allArtists);","\t\t","\t\t$allMuseums = fetchAllMuseumsByName();","\t\t$galleries = getPDO($pdo, $allMuseums);","\t\t","\t\t$allShapes = fetchAllShapesByName();","\t\t$shapes = getPDO($pdo, $allShapes);","\t\t","\t\techo'","\t\t<div class=\"field\">","\t\t\t<label>Artist</label>","\t\t\t<select class=\"ui search dropdown\" id=\"artists\" name =\"artist\">","\t\t\t<option name=\"artist\" value=\"0\">Select Artist</option>","\t\t';","\t\twhile($row = $artists->fetch())","\t\t{","\t\t\techo'<option name=\"artist\" value=\"'.$row[\"ArtistID\"].'\">'.$row[\"FirstName\"].' '.$row[\"LastName\"].'</option>';","\t\t}","\t\techo'","\t\t\t</select>","\t\t</div>","\t\t<div class=\"field\">","\t\t\t<label>Museum</label>","\t\t\t<select class=\"ui search dropdown\" id=\"museums\" name=\"museum\">","\t\t\t\t<option name=\"museum\" value=\"0\">Select Museum</option>","\t\t';","\t\twhile($row = $galleries->fetch())","\t\t{","\t\t\techo'<option name=\"museum\" value=\"'.$row[\"GalleryID\"].'\">'.$row[\"GalleryName\"].'</option>';","\t\t}","\t\techo'\t\t\t\t\t","\t\t\t</select>","\t\t</div>","\t\t<div class=\"field\">","\t\t\t<label>Shape</label>","\t\t\t<select class=\"ui search dropdown\" id=\"shape\" name=\"shape\">","\t\t\t\t<option name=\"shape\" value=\"0\">Select Shape</option>","\t\t';","\t\twhile($row = $shapes->fetch())","\t\t{","\t\t\techo'<option name=\"shape\" value=\"'.$row[\"ShapeID\"].'\">'.$row[\"ShapeName\"].'</option>';","\t\t}","\t\techo'","\t\t\t</select>","\t\t</div>","\t\t';","\t}","\t","\tfunction printPaintings($pdo)","\t{\t","\t\tsession_start();","\t\t$paintingsObject = unserialize($_SESSION['favPaintings']);","\t\t$favArray = $paintingsObject->getList();","\t\techo'<h2 class=\"ui sub header\">';\t","\t\tif(isset($_GET['searchBy']))","\t\t{","\t\t\t$searchBy = $_GET['searchBy'];","\t\t\t$sql = filterBySearch($searchBy);","\t\t\t$paintingPdo = getPDO($pdo, $sql);","\t\t\t$row = getNext($paintingPdo);","\t\t\techo'Searched for titles and descriptions containing: '.$searchBy;\t\t","\t\t}","\t\telse if(isset($_GET['artist']))","\t\t{","\t\t\t$artistID = $_GET['artist'];","\t\t\t$museumID = $_GET['museum'];","\t\t\t$shapeID = $_GET['shape'];","","\t\t\t//Didn't read the spec close enough, all combinations of filters are here AND ARE STAYING","\t\t\tif($artistID != 0 && $museumID == 0 && $shapeID == 0) //filter by artist only","\t\t\t{","\t\t\t\t$sql=filterByArtist($artistID);","\t\t\t\t$paintingPdo = getPDO($pdo, $sql);","\t\t\t\t$row = getNext($paintingPdo);","\t\t\t\techo'Artist = '.$row['FirstName'].' '.$row['LastName'];\t\t\t\t","\t\t\t}","\t\t\telse if($artistID == 0 && $museumID != 0 && $shapeID == 0) //museum only","\t\t\t{","\t\t\t\t$sql=filterByMuseum($museumID);","\t\t\t\t$paintingPdo = getPDO($pdo, $sql);","\t\t\t\t$row = getNext($paintingPdo);","\t\t\t\techo'Museum = '.$row['GalleryName'];","\t\t\t}","\t\t\telse if($artistID == 0 && $museumID == 0 && $shapeID != 0) //shape only","\t\t\t{","\t\t\t\t$sql=filterByShape($shapeID);","\t\t\t\t$paintingPdo = getPDO($pdo, $sql);","\t\t\t\t$row = getNext($paintingPdo);","\t\t\t\techo'Shape = '.$row['ShapeName'];","\t\t\t}","\t\t\telse if($artistID == 0 && $museumID != 0 && $shapeID != 0) //museum and shape","\t\t\t{","\t\t\t\t$sql=filterByMuseumShape($museumID,$shapeID);","\t\t\t\t$paintingPdo = getPDO($pdo, $sql);","\t\t\t\t$row = getNext($paintingPdo);","\t\t\t\techo'Museum = '.$row['GalleryName'].' | ';","\t\t\t\techo'Shape = '.$row['ShapeName'];","\t\t\t}","\t\t\telse if($artistID != 0 && $museumID == 0 && $shapeID != 0) //artist and shape","\t\t\t{","\t\t\t\t$sql=filterByArtistShape($artistID, $shapeID);","\t\t\t\t$paintingPdo = getPDO($pdo, $sql);","\t\t\t\t$row = getNext($paintingPdo);","\t\t\t\techo'Artist = '.$row['FirstName'].' '.$row['LastName'].' | ';\t","\t\t\t\techo'Shape = '.$row['ShapeName'];","\t\t\t}","\t\t\telse if($artistID != 0 && $museumID != 0 && $shapeID == 0) //artist and museum","\t\t\t{","\t\t\t\t$sql=filterByArtistMuseum($artistID, $museumID);","\t\t\t\t$paintingPdo = getPDO($pdo, $sql);","\t\t\t\t$row = getNext($paintingPdo);","\t\t\t\techo'Artist = '.$row['FirstName'].' '.$row['LastName'].' | ';\t","\t\t\t\techo'Museum = '.$row['GalleryName'];","\t\t\t}","\t\t\telse if($artistID == 0 && $museumID == 0 && $shapeID == 0) //if user pressed filter with no values set","\t\t\t{","\t\t\t\t$sql=filterByNothing();","\t\t\t\t$paintingPdo = getPDO($pdo, $sql);","\t\t\t\t$row = getNext($paintingPdo);","\t\t\t\techo'ALL PAINTINGS [TOP 20]';","\t\t\t}","\t\t\telse","\t\t\t{","\t\t\t\t$sql=filterByArtistMuseumShape($aritstID,$museumID,$shapeID); //filter by all\t\t","\t\t\t\t$paintingPdo = getPDO($pdo, $sql);","\t\t\t\t$row = getNext($paintingPdo);","\t\t\t\techo'Artist = '.$row['FirstName'].' '.$row['LastName'].' | ';\t","\t\t\t\techo'Museum = '.$row['GalleryName'].' | ';","\t\t\t\techo'Shape = '.$row['ShapeName'];","\t\t\t}","\t\t}","\t\telse","\t\t{","\t\t\t$sql=filterByNothing(); //<- what that says","\t\t\t$paintingPdo = getPDO($pdo, $sql);","\t\t\t$row = getNext($paintingPdo);","\t\t\techo'ALL PAINTINGS [TOP 20]';","\t\t}\t","\t\techo '</h2>';","\t\t","\t\t$dataCount = $paintingPdo->rowCount();","\t\t$maxPaintings = 19;","\t\t$loopCount = 0;","\t\techo'","\t\t\t<table class=\"ui very basic table\">","\t\t\t<tbody>","\t\t';","\t\twhile($loopCount <= $maxPaintings && $loopCount < $dataCount)","\t\t{","\t\t\techo'","\t\t\t<tr>","\t\t\t\t<td>","\t\t\t\t\t<a href=\"single-painting.php?id='.$row['PaintingID'].'\">","\t\t\t\t\t\t<img src=\"images/art/works/square-medium/'.$row['ImageFileName'].'.jpg\" alt=\"...\" id=\"artwork\">","\t\t\t\t\t</a>\t\t\t\t\t\t\t","\t\t\t\t</td>","\t\t\t\t<td>","\t\t\t\t\t<h3 class=\"ui large header\"><a href=\"single-painting.php?id='.$row['PaintingID'].'\">'.$row['Title'].'</a></h3>","\t\t\t\t\t<h2 class=\"ui sub header\"><a href=\"single-artist.php?id='.$row['ArtistID'].'\">","\t\t\t\t\t\t'.$row['FirstName'].' '.$row['LastName'].'","\t\t\t\t\t</a></h2>","\t\t\t\t\t<p>'.$row['Description'].'</p>","\t\t\t\t\t<p>$'.floor($row['MSRP']).'</p>","\t\t\t\t\t<a href=\"cart.php?id='.$row['PaintingID'].'&from=browse\">","\t\t\t\t\t\t<button class=\"ui orange button\">","\t\t\t\t\t\t\t<i class=\"shop icon\"></i>","\t\t\t\t\t\t</button>","\t\t\t\t\t</a>","\t\t\t';","\t\t\tif(!in_array($row['PaintingID'],$favArray))","\t\t\t{","\t\t\techo'\t","\t\t\t\t\t<a href=\"favorites.php?type=painting&id='.$row['PaintingID'].'\">","\t\t\t\t\t\t<button class=\"ui button\">","\t\t\t\t\t\t\t<i class=\"heart icon\"></i>","\t\t\t\t\t\t</button>","\t\t\t\t\t</a>","\t\t\t';","\t\t\t}","\t\t\telse","\t\t\t{","\t\t\t\techo'\t","\t\t\t\t\t<a href=\"favorites.php\">","\t\t\t\t\t\t<button class=\"ui button\">","\t\t\t\t\t\t\tView <i class=\"heart icon\"></i>","\t\t\t\t\t\t</button>","\t\t\t\t\t</a>","\t\t\t';","\t\t\t}","\t\t\t","\t\t\t","\t\t\techo'\t","\t\t\t\t</td>","\t\t\t</tr>';//COPYTILLHERE","\t\t\t$loopCount++;","\t\t\t$row = getNext($paintingPdo);","\t\t}","\t\t$_SESSION['favPaintings'] = serialize($paintingsObject);","\t}","?>","<body >    ","<?php ","\t$pdo = startConnection();","\twebserver($pdo);","\tinclude \"includes/header.php\"; ","?>","<main>","<div class = \"ui container segment\">","\t<div class=\"ui grid\">","\t\t<div class=\"left floated four wide column\">","\t\t\t<h3 class=\"ui dividing header\">Filters</h1>","\t\t\t<form class =\"ui form\" action=\"browse-paintings.php\" method=\"GET\">","\t\t\t<?php printFilters($pdo);?>","\t\t\t\t<button class=\"ui orange button\" type=\"submit\"><i class=\"filter icon\"></i>Filter</button>","\t\t\t</form>","\t\t</div>","\t\t<div class=\"left floated ten wide column\">","\t\t\t<div class=\"ui huge header\">Paintings</div>","\t\t\t<?php ","\t\t\t\tprintPaintings($pdo); ","\t\t\t\tkillDBConnection($pdo);","\t\t\t?>","\t\t\t</div>","\t\t</div>\t\t","\t</div>","</div>","</main>","</body>","</html>"],"id":8}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":0,"column":0},"end":{"row":0,"column":0},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1481437540293,"hash":"da39a3ee5e6b4b0d3255bfef95601890afd80709"}