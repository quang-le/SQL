<?php
 try 
 {
     $db=new PDO('mysql:host=mysqldb;dbname=becode;charset=utf8', 'root', 'root');
 }
 catch(Exception $e)
 {
     die('Erreur:'.$e->getMessage());
 }

 if (!empty($_POST)){
     $nameRaw=$_POST['name'];
     $distanceRaw=$_POST['distance'];
     $heightRaw=$_POST['height_difference'];
     $difficulty=$_POST['difficulty'];
     $duration=$_POST['duration'];

    //Sanitize
    $nameSan=filter_var($nameRaw, FILTER_SANITIZE_STRING);
    $distanceSan=filter_var($distanceRaw, FILTER_SANITIZE_NUMBER_INT);
    $heightSan=filter_var($heightRaw,FILTER_SANITIZE_NUMBER_INT);

    //Skipping validation for this exercise. Could put a condition on name length.

    // Update through PDO
    if (!empty($nameRaw) && !empty($distanceRaw) && !empty($heightRaw) && !empty($difficulty) && !empty($duration)){
    $updater=$db->prepare('INSERT INTO hiking (name, difficulty,distance,duration,height_difference)VALUES(:name,:difficulty,:distance,:duration,:height)');
    $updater->bindParam(':name', $nameSan);
    $updater->bindParam(':difficulty', $difficulty);
    $updater->bindParam(':distance', $distanceSan);
    $updater->bindParam(':duration', $duration);
    $updater->bindParam(':height', $heightSan);
    $updater->execute();
    header('Location: read.php');
    }
 }

?>