<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Novi članak</title>
	<link rel="icon" href="icont.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">    
<link rel="stylesheet" href="stylesheet.css" />
</head>
<body>
    <div class="container">
        <div class="bod">

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
            <header>
                <nav class="navbar" id="nav1">
                    <span class="navbar-brand mb-0 h1" id="navh1"><a href="index.php">Welt</a></span>
                </nav>
                <nav class="navbar navbar-expand-lg" id="nav2">
                    <button style="margin-bottom:5px;" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon" >
  <img src="icon1.svg"/>
</span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-item nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                            <a class="nav-item nav-link" href="wirt.php?id=wirtschaft">Wirtschaft</a>
                            <a class="nav-item nav-link" href="wirt.php?id=kultur">Kultur</a>
                            <a class="nav-item nav-link" id="active" href="unos.html" >Unos</a>
							<a class="nav-item nav-link" href="administracija.php">Administracija</a>
					   </div>
                    </div>
                </nav>
            </header>

            <div class="container">


<?php 

include 'connect.php'; 

  if(isset($_POST['title']) && isset($_POST['about']) && isset($_POST['content']) && isset($_POST['category'])){

       $picture = $_FILES['pphoto']['name'];
                    $target_dir = 'img/'.$picture;
                    
					
					

    $title=$_POST['title'];

    $about=$_POST['about'];

    $content=$_POST['content'];

    $category=$_POST['category'];

    $date=date('d.m.Y.');

    if(isset($_POST['archive']))

    { $archive=1; }

    else{ $archive=0; }

   

    $query = "INSERT INTO Vijesti (datum, naslov, sazetak, tekst, slika, kategorija, arhiva ) VALUES ('$date', '$title', '$about', '$content', '$picture', '$category', '$archive')";

move_uploaded_file($_FILES['pphoto']['tmp_name'], $target_dir);
     if (mysqli_query($dbc, $query)) {
                        echo "<br/>Novi članak je spremljen";
                      } else {
                        echo "<br/>Error: " . mysqli_error($dbc);
                      }
    }

?>

                    </div>

                    <footer>
                        <h1>WELT</h1>
                    </footer>

</div>
</div>
</body>
</html>