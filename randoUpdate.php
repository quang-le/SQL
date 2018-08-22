<?php
 try 
 {
     $db=new PDO('mysql:host=mysqldb;dbname=becode;charset=utf8', 'root', 'root');
 }
 catch(Exception $e)
 {
     die('Erreur:'.$e->getMessage());
 }
?>