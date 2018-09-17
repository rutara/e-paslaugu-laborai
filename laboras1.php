
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>
<form>
    <input type="text" name="n" placeholder="eiles">
    <input type="text" name="k" placeholder="kedes pirmoje eileje">
    <button name="submit" value="submit" type="submit">Submit</button>
</form>
<?php 
if(isset ($_GET["submit"])){
$n = $_GET['n'];
$k = $_GET['k'];
}
else{
$n = 3;
$k = 5; 
}

$s= 0;

    for($i=1;$i<=$n;$i++){
          $s = $s+$k;
          echo $i." eilė:";

           for ($j=0;$j<$k;$j++){
              echo "&#9281";
           }
          echo "( ".$k." kedes) <br>";
            $k=$k+2; 
     }

echo " Is viso reikia kedziu: ".$s;
?>
</body>
</html>