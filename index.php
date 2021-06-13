<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="icont.png">
<meta htpp-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="stylesheet.css" />
</head>
<style>
a{
color:black;
}

a:hover{
text-decoration:none;
color:black;
}


</style>
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
                    
                         <button style="margin-bottom:5px;border:0px;" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation" id="b1">
                                        <span class="navbar-toggler-icon" >
  <img src="icon1.svg"/>
</span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-item nav-link active" id="active" href="index.php">Home</a>
                          <a class="nav-item nav-link" href="wirt.php?id=wirtschaft"  >Business</a>
                            <a class="nav-item nav-link" href="wirt.php?id=kultur">Kultura</a>
                            <a class="nav-item nav-link" href="unos.html">Unos</a>
							<a class="nav-item nav-link" href="administracija.php">Administracija</a>
                        </div>
                    </div>
                </nav>
            </header>
			
			<?php include 'connect.php'; 
			$target_dir = 'img/';
			?>

            <div class="container">
                <section class="sec1">
                    <h2>WIRTSCHAFT</h2>
                    <div class="row">
					 <?php
                $query = "SELECT * FROM vijesti 
                            WHERE arhiva = 0 AND kategorija = 'wirtschaft'
                            ORDER BY id DESC
                            LIMIT 3";
                $result = mysqli_query($dbc,$query);
                while ($row = mysqli_fetch_array($result)){
					echo '<div class="col">';
                    echo "<article>";
                    echo'<div class="container">'; 
                    echo '<a href="clanak.php?id='.$row['id'].'">';
                   echo '<img src="' . $target_dir . $row['slika'] . '"" class="img-fluid" />';
                    echo '<h3 >';
					echo $row['naslov']; 
                    echo '</a></h3>';
				    echo '<p>';
					echo $row['sazetak'];
					echo '</p>';
                    echo '<p id="date">'.$row['datum'].'</p>';
                    echo '</div>'; 
                    echo '</article>';
					echo '</div>'; 

                }
                ?>
                    
                    </div>
                </section>

                <section class="sec2">
                    <h2>KULTUR</h2>
                    <div class="row">
                     		 <?php
                $query = "SELECT * FROM vijesti 
                            WHERE arhiva = 0 AND kategorija = 'kultur'
                            ORDER BY id DESC
                            LIMIT 3";
                $result = mysqli_query($dbc,$query);
                while ($row = mysqli_fetch_array($result)){
					echo ' <div class="col">';
                    echo "<article>";
                    echo'<div class="container">'; 
                    echo '<a href="clanak.php?id='.$row['id'].'">';
                   
 echo '<img src="' . $target_dir . $row['slika'] . '"" class="img-fluid" />';
                    echo '<h3 >';
					echo $row['naslov']; 
                    echo '</a></h3>';
				    echo '<p>';
					echo $row['sazetak'];
					echo '</p>';
                    echo '<p id="date">'.$row['datum'].'</p>';
                    echo '</div>'; 
                    echo '</article>';
					echo '</div>'; 

                }
                ?>
                    </div>
                </section>
            </div>

            <footer>
                <h1>WELT</h1>
            </footer>

        </div>
    </div>
</body>
</html>