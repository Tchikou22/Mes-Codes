<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<script type="text/javascript" src="js/script.js"></script>
<link rel="stylesheet" type="text/css" href="style/style.css" />
<title>test</title>
<style>
    .elem {
        width:20px;
    }
</style>
</head>
<body>

<h1>BIENVENUE FAITE VOS CALCULS !</h1>


<button onclick="btn1()">LES EQUATIONS DU SECOND DEGRE</button>

<button onclick="btn2()">LES NOMBRES PREMIERS</button>
<hr>
<div id="one">

<form method="POST">
<!--
    <input type="text" name="a" placeholder="Entrez la valeur a :"><br><br>
    <input type="text" name="b" placeholder="Entrez la valeur b :"><br><br>
    <input type="text" name="c" placeholder="Entrez la valeur c :"><br><br>

-->
<input required class="elem" type="text" name="a">x²+<input required type="text" name="b" class="elem">x+<input required type="text" name="c" class="elem">=0;


    <input type="submit" value="Submit" ><br><br>

</form>

<hr>

<script>
<?php

$a = filter_input(INPUT_POST, 'a', FILTER_SANITIZE_SPECIAL_CHARS) ;
$b = filter_input(INPUT_POST, 'b', FILTER_SANITIZE_SPECIAL_CHARS) ;
$c = filter_input(INPUT_POST, 'c', FILTER_SANITIZE_SPECIAL_CHARS) ;

if($a) {
    echo "document.getElementById('one').style.display='block';";
}
?>
</script>
<?php





if (isset($a))
{ 
    

    $D= $b * $b - 4 * $a * $c ;

    $uneSolutions = -$b *$b / (2 * $a) ; 

    $deuxSolution = (-$b -sqrt($D)) / (2 * $a)  ;

    $deuxSolution2 =(-$b + sqrt($D)) / (2 * $a) ;


    echo "Vous avez entré les valeurs suivantes : <br><br>  <strong>" . $a . " Pour valeur de 'a', <br>" . $b . " Pour valeur de 'b' <br>" .$c . " Pour valeur de 'c' <br></strong>  <br>" ; 
    echo "<hr>" ;


    if ($D < 0)
    {
        echo "<br> Il n'y a pas de solution." ; 
    }

    else if ($D == 0)
    {
        echo "<br> Il y a une solution, { x = -b / (2a) } <br> x =" . $uneSolutions ;
        
        
        
    }

    else 
    {
        echo "<br> <strong> Le DELTA est supérieur à 0 ! </strong> <br> Il y a donc deux solutions, voici la formule : 
            <br> <br> { x1 = (-b -racine carre de delta )/(2a) } <br> {x2= (-b + carre de delta)/(2a) } <br> <br> x1 = : <strong> " 
        .$deuxSolution . " </strong> <br><br> x2= : <strong>" . $deuxSolution2 . "</strong>";

    /*
        $res=$a*$deuxSolution*$deuxSolution+$b*$deuxSolution+$c;
        echo "<br> x1=" . $res . "<br>";

        $res2=$a*$deuxSolution2*$deuxSolution2+$b*$deuxSolution2+$c;
        echo "x2=" . $res2 ;
    */

    }

}
else 
{
    //if ($a == "" || $b == "" || $c == "")
    
            echo "<strong><h3>Entrez des valeurs dans les cases respectives.</strong></h3>" ;
        
}
echo "<hr>" ;


?>

</div>    

<!--****************************fORMULAIRE POUR LES NOMBRES PREMIERS***************************************-->

<div id="two">

<form name="inscription" method="post" action="#">
<!--
			Entrez votre NOM : <input type="text" name="nom"/> <br/>
            Entrez votre PRENOM : <input type="text" name="prenom"/> <br/>
            Entrez votre AGE : <input type="text" name="age" /><br/> 
-->
			Entrez une valeur : <input type="text" name="valeur" /><br/>

			<input type="submit" name="valider" value="Tester le nombre"/>
			
</form>

<script>

<?php

$valeur = filter_input(INPUT_POST, 'valeur', FILTER_SANITIZE_SPECIAL_CHARS) ;
$valider = filter_input(INPUT_POST, 'valider', FILTER_SANITIZE_SPECIAL_CHARS) ;

if($valeur) {
    echo "document.getElementById('two').style.display='block';";
}
?>
</script>


<!--*******************************************CODE PHP**********************************************-->

<?php
echo "<hr>" ;
echo "<strong> Vous voulez tester le nombre " . $valeur . " : </strong><br><br>" ;

function premiers($nombre)
{
    
    $nbr=0;
 
	for($i = 2 ; $i < $nombre ; $i ++)
	{

		if($nombre %$i == 0)
		{
         
			$verdict= $nombre . "<strong> N'est pas un nombre premier.</strong>";
			
			$nbr=1;
			
            break;
        }
    }
 
 
 
	if ($nbr==0)
	{
        $verdict= $nombre . "<strong> Est un nombre premier </strong>";
    }
 
  
 
	if($nombre==0)
	{
        $verdict= "<strong> 0 n'est pas premier </strong>" ;
    }
 
	return $verdict;

}


if ($valider)
	{
		$nombre = $valeur ;
		$fin = premiers($nombre) ;

		echo $fin ;
	}

?>

</div>





</html>
</body>