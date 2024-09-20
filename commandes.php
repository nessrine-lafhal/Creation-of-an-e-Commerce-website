<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet" type="text/css" >
    <title>Liste des commandes</title>
</head>
<body>
<?php include 'include/nav.php' ?>
<div class="container py-2">
    



<!-- On tables -->
<h2>  Liste des commandes</h2>


<table class="table table-striped table-hover ">
<thead>
    <tr>
            <th>#ID</th>
            <th>client</th>
            <th>Total</th>
            <th>Date</th>
            <th>operation</th>
            
    </tr>
</thead> 
<tbody>
<?php
require_once 'include/database.php';

$commandes=$pdo->prepare(query:'SELECT commande.*,utilisateur.login as "login" FROM commande INNER JOIN utilisateur ON commande.id_client=utilisateur.id ORDER BY commande.date_creation DESC');
$commandes ->execute();
//print_r($categories->fetchAll(mode:PDO::FETCH_ASSOC));
foreach($commandes as $commande ){
    ?>
    <tr>
              <td><?php echo $commande['id'] ?></td>
              <td><?php echo $commande['login'] ?></td>
              <td><?php echo $commande['total'] ?> MAD</td>
              <td><?php echo $commande['date_creation'] ?></td>
              <td><a class="btn btn-primary btn-sm" href="commande.php?id=<?php echo $commande['id'] ?>"> Afficher details</a></td>
  
    <?php
  
  }
  ?>

</tbody>
</table>

</div>
</body>
</html>