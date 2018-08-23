<?php 
     try 
     {
         $db=new PDO('mysql:host=mysqldb;dbname=becode;charset=utf8', 'root', 'root');
     }
     catch(Exception $e)
     {
         die('Erreur:'.$e->getMessage());
	 }
	 $values=$db->query('SELECT * FROM hiking');
	 $valuesArray=$values->fetchAll();
	 $indexRaw=$_GET['index'];
	 $index=filter_var($indexRaw,FILTER_SANITIZE_NUMBER_INT);
	 
	 //validate index value: reroute to read if index doesn't exist in DB(assuming no break in id continuity due to deletions)
	 $lastIndex=end($valuesArray);
	 if($index<0 || $index>$lastIndex){
		 header('Location:read.php');
	 };
	 $filler=$valuesArray[$index-1]; //to be cleaned up 
	 $updateName=$filler['name'];
	 $updateDistance=$filler['distance'];
	 $updateDuration=$filler['duration'];
	 $updateHeight=$filler['height_difference'];
	 $updateDifficulty=$filler['difficulty'];

	 //variables to set options
	 $veryEasy;
	 $easy;
	 $medium;
	 $hard;
	 $veryHard;
	 
	 switch($updateDifficulty){
		case "très facile": $veryEasy='selected ="selected"';
			break;
		case "facile":$easy='selected ="selected"';
			break;
		case "moyen":$medium= 'selected ="selected"';
			break;
		case "difficile":$hard='selected ="selected"' ;
			break;
		case "très difficile": $veryHard='selected ="selected"';
			break;
	 }
	 print_r($filler);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Modifier une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<a href="read.php">Liste des données</a>
	<h1>Modifier</h1>
	<form action="randoUpdate.php" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value ="<?php echo $updateName?>">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<option value="très facile" <?php echo $veryEasy?>>Très facile</option>
				<option value="facile" <?php echo $easy?>>Facile</option>
				<option value="moyen" <?php echo $medium?>>Moyen</option>
				<option value="difficile" <?php echo $hard?>>Difficile</option>
				<option value="très difficile"<?php echo $veryHard?>>Très difficile</option>
			</select>
		</div>
		
		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="<?php echo $updateDistance?>">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="duration" name="duration" value="<?php echo $updateDuration?>">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="<?php echo $updateHeight?>">
		</div>
		<div>
			<input type="hidden" name="index" value="<?php echo $index?>">
		</div>
		<button type="submit" name="button">Envoyer</button>
	</form>
</body>
</html>