
<!DOCTYPE HTML>
<html lang="lt">
	<head>
		<title></title>
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
    .turinys{
    width:50%;
    text-align:center;
    padding:5px;
    border:3px solid grey;
    background-color: lightgrey ;
    border-radius:5px;
        }
    .turinys input {
    margin:5px;
    }
 
    </style>
	</head>
	<body>
<div class="turinys">
<h2>Valiutos konvertavimas</h2>
<hr>
<form action="" method="post">
<input class="skaicius"type="text" name="ivest">
    <select name="is">
	  <option value="Eurai">Eurai</option>
	  <option value="Doleriai">Doleriai</option>
	  <option value="Svarai">Svarai sterlingai</option>
	</select><br />
<p>Konvertuoti į: </p>
 <select name="i">
	  <option value="Eurai">Eurus</option>
	  <option value="Doleriai">Dolerius</option>
	  <option value="Svarai">Svarus sterlingus</option>
	</select><br />
    <input type="submit" value="Skaičiuoti">
</form>
<hr>
<?php
$valiutos = array(
"Eurai" => array('Eur',1),
"Doleriai" => array('Dol',0.88),
"Svarai" => array('Svar',1.15)
);

if(isset($_POST['ivest'])){
  
   $ivestas = $_POST['ivest'];
   $valiuta1 = $_POST['is'];
   $valiuta2 = $_POST['i']; 
   if(
	   is_numeric($ivestas)
   ){
      
       //Pasirinktos valiutos pavertimas i eura:
       $eurais = $ivestas * $valiutos["$valiuta1"][1];
       $trump = $valiutos["$valiuta2"][0];
       //Euro pavertimas i pasirinkta valiuta:
       $gautas = $eurais * 1/$valiutos["$valiuta2"][1];
       $gautas = round($gautas,2);
       echo "<h2>  $gautas $trump </h2>";
   }
}
?>
</div>
	</body>
</html>