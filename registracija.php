<?php
    $unique = true;
    $registriranKorisnik = "";
    if(isset($_POST['reg'])){
            if(!empty($_POST['korime']) && !empty($_POST['ime']) && !empty($_POST['prezime']) && !empty($_POST['lozinka1']) && !empty($_POST['lozinka2']) 
            && ($_POST['lozinka1'] == $_POST['lozinka1'])){
                
            include 'connect.php';

            $korime = $_POST['korime'];
            $ime = $_POST['ime'];
            $prezime = $_POST['prezime'];
            $lozinka = $_POST['lozinka1'];
            $hash_lozinka = password_hash($lozinka,CRYPT_BLOWFISH);
            $razina=0;
            

            $query = "SELECT kor_ime FROM admin WHERE kor_ime = ?";
            $stmti = mysqli_stmt_init($dbc);
            if(mysqli_stmt_prepare($stmti, $query)){
                mysqli_stmt_bind_param($stmti,'s',$korime);
                mysqli_stmt_execute($stmti);
                mysqli_stmt_store_result($stmti);
            }

            if(mysqli_stmt_num_rows($stmti) > 0){
                $unique = false;
            }else{
                session_start();
                $_SESSION['username'] = $korime;
                $_SESSION['level'] = $razina;
                $query = "INSERT INTO admin (ime,prezime,kor_ime,pass,razina) VALUES (?,?,?,?,?)";
                $stmt=mysqli_stmt_init($dbc);
                if(mysqli_stmt_prepare($stmt,$query)){
                    mysqli_stmt_bind_param($stmt,'ssssd',$ime,$prezime,$korime,$hash_lozinka,$razina);
                    mysqli_stmt_execute($stmt);
                    $registriranKorisnik = true;
                }
                
            };
            mysqli_close($dbc);
        };
    };
?>
<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="icont.png">
    <meta htpp-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title style="text-transform: uppercase;">Registracija</title>
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
                    <button style="margin-bottom:5px;" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon" >
  <img src="icon1.svg"/>
</span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-item nav-link active" href="index.php">Home</a>
                            <a class="nav-item nav-link" href="wirt.php?id=wirtschaft" id="wirt">Business</a>
                            <a class="nav-item nav-link" href="wirt.php?id=kultur" id="food">Kultura</a>
                            <a class="nav-item nav-link" href="unos.html">Unos</a>
                        <a class="nav-item nav-link" href="administracija.php">Administracija</a>
						</div>
                    </div>
                </nav>
            </header>
    <main class="cont-main">
        <div class="reg-container" style="margin-bottom:210px;"> 
		<div class="container">
            <h1>Registracija</h1><br>
            <form enctype="multipart/form-data" method="POST" action="">
                <label for="korime">Korisničko ime: </label><br>
                <input type="text" id="korime" name="korime" ><br>
                <span id='PorukaUser' class='BojaPoruke'></span>
                <?php if(isset($_POST['reg'])){
                    if(!$unique){
                        echo"<br><span id='PorukaUser' class='BojaPoruke'>Korisničko ime se već koristi!</span>";
                    };
                };?><br>
                <label for="ime">Ime: </label><br>
                <input type="text" id="ime" name="ime" ><br>
                <span id="porukaIme" class="BojaPoruke"></span><br>
                <label for="prezime">Prezime: </label><br>
                <input type="text" id="prezime" name="prezime" ><br>
                <span id="porukaPrezime" class="BojaPoruke"></span><br>
                <label for="lozinka1">Lozinka: </label><br>
                <input type="password" id="lozinka1" name="lozinka1" ><br>
                <span id="Porukaloz" class="BojaPoruke"></span><br>
                <label for="lozinka2">Ponovite lozinku: </label><br>
                <input type="password" id="lozinka2" name="lozinka2" ><br>
                <span id="Porukaloz2" class="BojaPoruke"></span><br>
                <button class="b" type="submit" class="reg_form" id="reg" name="reg">Registriraj</button>
            </form>
            <a href="administracija.php">Login</a>
            <?php if(isset($_POST['reg'])){
                if($registriranKorisnik == true){
                echo'<p>Korisnik je uspješno registriran!</p>';
            };
            };?>

            <script type="text/javascript">
document.getElementById('reg').onclick = function(event){
                var slanjeForme= true;
                var poljeIme= document.getElementById("ime");
                var ime= document.getElementById("ime").value;
                if(ime.length == 0) {
                    slanjeForme= false;
                    poljeIme.style.border="1px dashed red";
                    document.getElementById("porukaIme").innerHTML="<br>Unesite ime!<br>";
                } else{
                    poljeIme.style.border="1px solid green";
                    document.getElementById("porukaIme").innerHTML="";
                }
                var poljePrezime= document.getElementById("prezime");
                var prezime= document.getElementById("prezime").value;
                if(prezime.length== 0) {
                    slanjeForme= false;
                    poljePrezime.style.border="1px dashed red";
                    document.getElementById("porukaPrezime").innerHTML="<br>Unesite Prezime!<br>";
                } else{
                    poljePrezime.style.border="1px solid green";
                    document.getElementById("porukaPrezime").innerHTML="";
                };
                var poljeUsername= document.getElementById("korime");
                var username= document.getElementById("korime").value;
                if(username.length== 0) {
                    slanjeForme= false;
                    poljeUsername.style.border="1px dashed red";
                    document.getElementById("PorukaUser").innerHTML="<br>Unesite korisničko ime!<br>";
                } else{
                    poljeUsername.style.border="1px solid green";
                    document.getElementById("PorukaUser").innerHTML="";
                };
                var poljePass= document.getElementById("lozinka1");
                var pass= document.getElementById("lozinka1").value;
                var poljePassRep= document.getElementById("lozinka2");
                var passRep= document.getElementById("lozinka2").value;
                if(pass.length== 0|| passRep.length== 0|| pass!= passRep) {
                    slanjeForme= false;
                    poljePass.style.border="1px dashed red";
                    poljePassRep.style.border="1px dashed red";
                    document.getElementById("Porukaloz").innerHTML="<br>Lozinke nisu iste!<br>";
                    document.getElementById("Porukaloz2").innerHTML="<br>Lozinke nisu iste!<br>";
                } else{
                    poljePass.style.border="1px solid green";
                    poljePassRep.style.border="1px solid green";
                    document.getElementById("Porukaloz").innerHTML="";
                    document.getElementById("Porukaloz2").innerHTML="";
                };
                if(slanjeForme!= true) {event.preventDefault();}
            };
        </script>            
        </div></div>
    </main>
    
            <footer>
                <h1>WELT</h1>
            </footer>
</html>