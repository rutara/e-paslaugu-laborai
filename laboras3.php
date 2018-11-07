
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
#content{
    width:30%;
    text-align:center;
    padding:5px;
}
#content input {
    margin:5px;
}

</style>
	</head>
	<body>
    <div id="content">
    <h2>Asmens duomenys</h2>
    <form action="" method="post">
    vardas
    <input type="text" name ="vardas"><br />
    pavarde
    <input type="text" name="pavarde"><br />
    asmens kodas
    <input type="text" name="akodas"><br />
    <input type="submit" name="pateikti">
    </form>
    <?php
    $moteru = array(2,4,6);
    $vyru = array(1,3,5);
    if(isset($_POST['pateikti'])){
        if(!empty($_POST['vardas']) AND !empty($_POST['pavarde']) AND !empty($_POST['akodas'])){
            $vardas = $_POST['vardas'];
            $pavarde = $_POST['pavarde'];
            $akodas = $_POST['akodas'];
            $pirmas = substr($akodas,0,1);
            if(!is_numeric($akodas)){
                $error =  "asmens kodas turi susideti tik is skaiciu";
            }
            else if(strlen($akodas)!==11){
                $error = "Asmens kodas turi susideti is 11 skaitmenu!";
            }
            else if((!ctype_alpha($vardas)) OR (!ctype_alpha($pavarde))){
                $error = "Vardas ir pavarde turi susideti tik is raidziu";
            }
            
            else{
              
                if (in_array($pirmas, $moteru)){
                    $lytis='moteris';
                }
                else if (in_array($pirmas, $vyru)){
                    $lytis='vyras';
                }
                else{
                    $error = 'Toks asmens kodas neegzistuoja';
                    return 0;
                }
                if($pirmas==1 OR $pirmas==2){
                $YY=18;
                }
                else if($pirmas==3 OR $pirmas==4){
                $YY=19;
                }
                else{
                $YY=20;
                }       
                
             $data = $YY.substr($akodas,1,6);
             echo"Vardas $vardas<br /> Pavarde $pavarde <br /> Asmens kodas $akodas <br/>Lytis: $lytis <br />Gimimo data:".substr($data,0,4)."-".substr($data,4,2)."-".substr($data,6,2);
            }
        }
        else {
            $error =  "visi laukai turi buti uzpildyti";
        }
    }
    if(isset($error)){
        echo "<div class='error'>$error</div>";
    }
?>
</div>
</body>
</html>