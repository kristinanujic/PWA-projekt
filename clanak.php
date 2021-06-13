<!DOCTYPE html>
<html>
<head>
    <meta htpp-equiv="Content-Type" content="text/html; charset=ISO-8859-1"/>
      <title style="text-transform: uppercase;">Article</title>
	<link rel="icon" href="icont.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">   
 <link rel="stylesheet" href="stylesheet.css" />
</head>
<body>
 
			
	 <?php
        include "connect.php";
        $target_dir = 'img/';
        $id = $_GET['id'];
        $query = "SELECT * from vijesti
                    WHERE id = $id";
        $result = mysqli_query($dbc, $query);
	
        $row = mysqli_fetch_array($result);
        ?>
		
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
                            <a class="nav-item nav-link active" href="index.php">Home</a>
                           <a class="nav-item nav-link" href="wirt.php?id=wirtschaft">Business</a>
                            <a class="nav-item nav-link" href="wirt.php?id=kultur">Kultura</a>
                            <a class="nav-item nav-link" href="unos.html">Unos</a>
                        <a class="nav-item nav-link" href="administracija.php">Administracija</a>
						</div>
                    </div>
                </nav>
            </header>
        

        <main>
		  <h2 style="text-transform: uppercase;margin-bottom:20px;
    margin-left:20px;margin-top:20px;"> <?php echo $row['kategorija'];?></h2>
        <div class="container">
		
          <hr>
            <div class="p1" style=";padding-top:10px;padding-bottom:10px;width:70%;margin:0 auto;">
			<h2>
                <?php 
                echo $row['naslov'];?></h2>
				<p style="color:#c6c6c6">Stand: <?php echo $row['datum'];?></p>
                </div>
          

        <section class="slika">
            <?php 
            echo '<img src="' . $target_dir . $row['slika'] . '"class="img-fluid" style="padding-left:50px;padding-right:50px;margin-bottom:10px;">';
            ?>
        </section>   
		<div style="padding-bottom:10px;width:85%;margin:0 auto;"
<section class="about">
            <p id="kratkiSadrzaj"><?php echo $row['sazetak']; ?></p>
        </section>		
      
        
        <section class="sadrzaj">
            <p id="tekst"> <?php echo nl2br($row['tekst']); ?> </p> 
        </section>
                
        </main>
            <footer>
                <h1>WELT</h1>
            </footer>

        </div>
    </div>
</body>
					
</html>