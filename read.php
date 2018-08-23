

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Randonnées</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
    <h1>Liste des randonnées</h1>
    <table>
        <thead>
            <th>Nom</th>
            <th>Difficulté</th>
            <th>Distance</th>
            <th>Durée</th>
            <th>Dénivelé</th>
        </thead>
      <!-- Afficher la liste des randonnées -->
        <?php
        try 
        {
            $db=new PDO('mysql:host=mysqldb;dbname=becode;charset=utf8', 'root', 'root');
        }
        catch(Exception $e)
        {
            die('Erreur:'.$e->getMessage());
        }
        $randoList=$db->query('SELECT * FROM hiking');
        $randoFetch=$randoList->fetchAll();
        foreach ($randoFetch as $r){
            echo '<tr><td><a href=update.php?index='.$r[0].'/>'.$r[1].'</a></td>';  
            echo '<td>'.$r[2].'</td>';
            echo '<td>'.$r[3].'</td>';
            echo '<td>'.$r[4].'</td>';
            echo '<td>'.$r[5].'</td>';
            echo '<td><form action="delete.php" method="post"><input type= hidden name="id" value='.$r[0].'><input type="submit" value="effacer"></form></td></tr>';
        }
        //print_r($randoFetch);
        ?>
    </table>
  </body>
</html>