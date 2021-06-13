<?php
session_start();
include 'connect.php';
$uspjesnaPrijava = false;
$admin =false;
if(isset($_POST['login'])){
    
    $username=$_POST['username'];
    $password=$_POST['password'];
    $sql = "SELECT kor_ime,pass,razina FROM admin WHERE kor_ime = ?";
    $stmt=mysqli_stmt_init($dbc);
    if(mysqli_stmt_prepare($stmt,$sql)){
        mysqli_stmt_bind_param($stmt,'s',$username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
    }    
    mysqli_stmt_bind_result($stmt,$user,$hash,$lvl);
    mysqli_stmt_fetch($stmt);
    if(password_verify($password,$hash)){
        $_SESSION['username']=$user;
        $_SESSION['level']=$lvl;
        $uspjesnaPrijava=true;
        $admin=$lvl;
    }else{
        echo'Ne postoji navedeni korinik.<br> Registriraj te se!';
    }
};
if(isset($_POST['delete'])){
    $id = $_POST['id'];
    $query = "DELETE FROM vijesti WHERE id =$id";
    $rezultat = mysqli_query($dbc,$query);
}
if(isset($_POST['update'])){
    $naslov = $_POST['naslov'];
    $sadrzaj = $_POST['sadrzaj'];
    $sazetak = $_POST['sazetak'];
    $kategorija = $_POST['kategorija'];
    if(isset($_POST['arhiva'])){
        $arhiva=1;
    }
    else{
        $arhiva=0;
    }
    $id = $_POST['id'];
    if(!empty($_FILES['photo'])){
        $slike = $_FILES['photo']['name'];
        $target = 'img/'.$slike;
        move_uploaded_file($_FILES['photo']["tmp_name"],$target);
        $query = "UPDATE vijesti SET naslov='$naslov',sazetak='$sazetak',
                    tekst='$sadrzaj',slika='$slike',kategorija='$kategorija',arhiva='$arhiva' WHERE id=$id;";
    }
    else{
        $query = "UPDATE vijesti SET naslov='$naslov',sazetak='$sazetak',
                    tekst='$sadrzaj',kategorija='$kategorija',arhiva='$arhiva' WHERE id=$id;";
    }
    
    $rezultat = mysqli_query($dbc, $query);
}

?>
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
                            <a class="nav-item nav-link active" href="index.php">Home</a>
                           <a class="nav-item nav-link" href="wirt.php?id=wirtschaft">Business</a>
                            <a class="nav-item nav-link" href="wirt.php?id=kultur">Kultura</a>
                            <a class="nav-item nav-link" href="unos.html">Unos</a>
                        <a class="nav-item nav-link" href="administracija.php" id="active">Administracija</a>
					
						</div>
                    </div>
                </nav>
            </header>
    <main class="cont-main">
        <div class="container"> 

		
            <?php
            if(($uspjesnaPrijava == true && $admin ==true) || (isset($_SESSION['username'])) && $_SESSION['level'] == 1){
		echo "<br><br><a href='logout.php' tite='Logout' class='b' style='padding:5px;float:right;'>Logout</a>";
            echo '<div class="container">';
            echo '<div  class="form-search">
            <form action="" method="POST">
                <label for="kategorija">Kategorija: </label>
                <select id="kategorija" name="kategorija">
                    <option value="" disable selected>Odabir kategorije</option>
                    <option value="wirtschaft">Wirtschaft</option>    
                    <option value="kultur">Kultur</option>   
                </select>
				 <input type="submit" id="search" value="Search" class="b"/>
            </form>

            </div>';
                if(isset($_POST['kategorija'])){
                    $kat = $_POST['kategorija'];
                    $query = "SELECT * FROM vijesti WHERE kategorija = '".$kat."'";    
                }
                elseif(!isset($_POST['kategorija'])){
                    $query = "SELECT * FROM vijesti";    
                }

                $rezultat = mysqli_query($dbc, $query);
                while($row = mysqli_fetch_array($rezultat)){  
                echo '<div class="sub-container">
                <form enctype="multipart/form-data" action="" method="POST">
                <div class="form-item">
                <label for="naslov">Naslov vjesti:</label>
                <div class="form-field">
                <input type="text" style="width:498px;" name="naslov" class="form-field-textual" value="'.$row['naslov'].'">
                </div> </div>
                <div class="form-item">
                <label for="sazetak">Kratki sadržaj vijesti (do 50 znakova):</label>
                <div class="form-field">
                <textarea name="sazetak" id="" cols="60" rows="15" class="form-field-textual">'.$row['sazetak'].'</textarea>
                </div> </div>
                <div class="form-item">
                <label for="sadrzaj">Sadržaj vijesti:</label>
                <div class="form-field">
                <textarea name="sadrzaj" id="" cols="60" rows="15" class="form-field-textual">'.$row['tekst'].'</textarea>
                </div> </div>
                <div class="form-item">
                <label for="photo">Slika:</label>
                <div class="form-field">
                <input type="file" class="input-text" id="photo" name="photo"/> <br>
                <img src="img/'. $row['slika'] . '" width=200px>
                </div> </div>
                <div class="form-item">
                <label for="category">Kategorija vijesti:</label>
                <div class="form-field">
                <select name="kategorija" id="kategorija" class="form-field-textual" value="'.$row['kategorija'].'">
                    <option value="'.$row['kategorija'].'" >'.$row['kategorija'].'</option>
                  
                    <option value="wirtschaft">Wirtschaft</option>    
                    <option value="kultur">Kultur</option>
                </select> 
                
                <div class="form-item"> 
                <label>Spremiti u arhivu:
                <div class="form-field">'; 
                if($row['arhiva'] == 0) { 
                    echo '<input type="checkbox" name="arhiva" id="arhiva"/> Da'; } 
                else { echo '<input type="checkbox" name="archive" id="archive" checked/> Da'; } 
                echo '</div> </label> </div> </div> 
                <div class="form-item"> 
                <input type="hidden" name="id" class="form-field-textual" value="'.$row['id'].'"> 
                <button class="b" type="reset" value="Poništi">Reset</button> 
                <button class="b" type="submit" id="update" name="update" value="Prihvati"> Izmjeni</button> 
                <button class="b" type="submit" id="delete" name="delete" value="Izbriši"> Izbriši</button> 
                </div> 
                </form>
                </div></br></br></br></br>';
				echo '</div>';} 
            }else if($uspjesnaPrijava == true && $admin == false){
			echo "<br><br><a href='logout.php' tite='Logout' class='b' style='padding:5px;'>Logout</a>";
                echo '<p>Pozdrav '.$imeKorisnika.'! Uspješno ste prijavljeni, ali niste administrator.</p>';
          echo "<br><br><a href='logout.php' tite='Logout' class='b' style='padding:5px;'>Logout</a>";
			}else if(isset($_SESSION['username']) && $_SESSION['level'] == 0){
               echo "<br><br><a href='logout.php' tite='Logout' class='b' style='padding:5px;'>Logout</a>";
				echo '<p>Pozdrav '.$_SESSION['username'].'! Uspješno ste prijavljeni, ali niste administrator.</p>';
            }else if($uspjesnaPrijava == false){
                ?><div class="reg-container" style="margin-bottom:550px;">
                    <h1>Log in</h1>
                    <form method="POST" action="">
                        <label for="username">Korisničko ime </label><br>
                        <input type="text" id="username" name="username"><br>
                        <span id="porukaKor"></span>
                        <label for="password">Lozinka </label><br>
                        <input type="password" id="password" name="password"><br>
                        <span id="porukaPass"></span>
                        <button class="b" type="submit" id="login" name="login">Log in</button><br>
                    </form>
                    <button class="b"><a href="registracija.php">Registracija</a>
                </div>
                <script type="text/javascript">
                document.getElementById('login').onclick = function (event){
                var slanje_forme = true;
                var poljeUsername= document.getElementById("username");
                var username= document.getElementById("username").value;
                if(username.length== 0) {
                    slanje_forme= false;
                    poljeUsername.style.border="1px dashed red";
                    document.getElementById("porukaKor").innerHTML="<br>Unesite korisničko ime!<br><br>";
                } else{
                    poljeUsername.style.border="1px solid green";
                    document.getElementById("porukaKor").innerHTML="";
                };
                var poljePass= document.getElementById("password");
                var pass= document.getElementById("password").value;
                if(pass.length== 0) {
                    slanje_forme= false;
                    poljePass.style.border="1px dashed red";
                    document.getElementById("porukaPass").innerHTML="<br>Unesit lozinku!<br><br>";
                } else{
                    poljePass.style.border="1px solid green";
                    document.getElementById("porukaPass").innerHTML="";
                };
                if(slanje_forme!= true) {event.preventDefault();};
                };
            </script>
                <?php
                
            }

        ?>
        </div>
    </main>
      <footer>
                <h1>WELT</h1>
            </footer>

		
</body>
</html>
<?php
mysqli_close($dbc);
?>