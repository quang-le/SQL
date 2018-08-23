<?php
/**** Supprimer une randonnée ****/
try 
{
    $db=new PDO('mysql:host=mysqldb;dbname=becode;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
    die('Erreur:'.$e->getMessage());
}


if(!empty($_POST)){
    $idRaw=$_POST['id'];
    $id=filter_var($idRaw,FILTER_SANITIZE_NUMBER_INT);
    $deleter=$db->prepare('DELETE FROM hiking WHERE id=:id');
    $deleter->bindParam(':id', $id);
    $deleter->execute();
    header('Location:read.php');

}

?>