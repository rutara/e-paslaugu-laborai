
<!DOCTYPE HTML>
<html lang="lt">
	<head>
		<title></title>
		<meta charset="utf-8">
	</head>
	<body>
<p>Tekstą: </p>
<form action="" method="get">
<input type="textarea" name = 'tekstas'>
<p>Įrašyti į failą:</p>
<input type="text" name = 'failas'>
<span>.txt</span> <br />
<input type="radio" value = 1 name = 'kartai'>1
<input type="radio" value = 2 name = 'kartai'>2
<input type="radio" value = 3 name = 'kartai'>3
<p>kartus</p>
<input type="submit" value = 'Įrašyti' name ='submit'>
</form>
<?php
 if(isset($_GET['submit'])){
   $kartai = $_GET['kartai'];
   $tekstas = $_GET['tekstas'];
   $fpav=  $_GET['failas']; 
 
   $failas = fopen("$fpav.txt", "w");
   for($i = 0; $i<$kartai;$i++){
   fwrite($failas, $tekstas." ");
   }
   fclose($failas);
   echo'<br />';
   echo "Failas <b>$fpav.txt</b> papildytas tekstu <b>[$tekstas] $kartai</b> kart.";

 }else{
     return 0;
 }
?>
</body>
</html>