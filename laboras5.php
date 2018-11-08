
<!DOCTYPE HTML>
<html lang="lt">
	<head>
		<title>Tuščias puslapis</title>
		<meta charset="utf-8">
        <style>
.error{
border:3px solid red;
background-color:#FFB5B5 ;
border-radius:5px;
}
*{
margin:auto;
padding:5px;
}
#turinys{
    width:50%;
    text-align:center;
    padding:5px;
    border:3px solid grey;
    background-color: lightgrey ;
    border-radius:5px;
}
#turinys input {
    margin:5px;
}
        </style>
	</head>
	<body>
<div id='turinys'>
<h2>Vandens per parą normos skaičiuoklė</h2>
<form action='' method='post'>
<table>
  <tr>
    <td>Vardas</td>
    <td><input type="text" name='vardas'><br /></td> 
  </tr>
  <tr>
    <td>Svoris</td>
    <td><input type="text" name = 'svoris'><br /></td>
  </tr>
    <tr>
    <td>Vandens stiklinių skaičius per dieną</td>
    <td><input type="text" name = 'stiklines'><br /></td>
  </tr>
</table>
<input type="submit" name='pateikti' value='pateikti'>
<br />
</form>
<?php
if(isset($_POST['pateikti'])){
   $vardas = $_POST['vardas'];
   $svoris = $_POST['svoris'];
   $stiklines = $_POST['stiklines']; 
    if(empty($vardas) OR empty($svoris) OR empty($stiklines)){
        $error = 'Visi laukai turi būti užpildyti!';
    }
    else if(!is_numeric($svoris) OR !is_numeric($stiklines) OR !ctype_alpha($vardas)){
        $error = 'Neteisingai įvesta informacija!';
    }
    else if($svoris<40 OR $svoris>150){
       $error = 'Pateiktas svoris yra neteisingas!';
    }
    else if($stiklines<0 OR $stiklines>20){
      $error = 'Pateiktas stiklinių kiekis yra neteisingas!';
    }
    else{
    $normaml = $svoris *0.03*1000;
    $normast = round($normaml/250);
    echo "Vardas: $vardas , svoris: $svoris , išgeriamų vandens stiklinių skaičius per dieną:
     $stiklines.<br /> Jūsų paros norma $normaml ml , arba $normast stiklinės vandens per dieną. <br />";

    $file = fopen("vandens_norma.txt", "a");
   fwrite($file, "
    Vardas: $vardas;
    Svoris: $svoris;
    Išgeriamų vandens stiklinių skaičius per dieną: $stiklines;
    Paros norma: $normaml ml;
    Stiklinėmis: $normast; 
    ********************************");
   fclose($file);

   echo'<br />';
  
     if($stiklines < $normast){
         $like = $normast-$stiklines;
         for($i=0;$i<$stiklines;$i++){
             echo "<img src='stikline_green.jpg'></img>";
         }
         for($i=0;$i<$like;$i++){
              echo "<img src='stikline_red.jpg'></img>";
         }
    }
    else{
        for($i=0;$i<$normast;$i++){
              echo "<img src='stikline_green.jpg'></img>";
        }
    }
}
}
else
{
      return 0;
}
if(isset($error)){
    echo "<div class='error'>$error</div>";
}
?>
</div>
	</body>
</html>