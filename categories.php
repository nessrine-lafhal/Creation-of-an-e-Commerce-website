<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet" type="text/css" >
    <title>Liste des categories</title>
</head>
<body>
<?php include 'include/nav.php' ?>


<div class="container py-2">
    



<!-- On tables -->
<h2>  Liste des categories</h2>

<a href="ajouter_categorie.php" class="btn btn-primary">Ajouter catégorie </a>


<table class="table table-striped">
<thead>
    <tr>
            <th>#ID</th>
            <th>Libelle</th>
            <th>Description</th>
            <th>Icone</th>
            <th>Date</th>
            <th>Operations</th>
    </tr>
</thead> 
<tbody>
<?php
require_once 'include/database.php';

$categories=$pdo->prepare(query:"SELECT * FROM categorie");
$categories->execute();
//print_r($categories->fetchAll(mode:PDO::FETCH_ASSOC));
foreach($categories as $categorie ){
    ?>
    <tr>
              <td><?php echo $categorie['id'] ?></td>
              <td><?php echo $categorie['libelle'] ?></td>
              <td><?php echo $categorie['description'] ?></td>
              <td>

                <i class="fa <?php echo $categorie['icone'] ?>"></i>
              
              </td>
              <td><?php echo $categorie['date_creation'] ?></td>
              <td>
               <a href="modifier_categorie.php?id=<?php echo $categorie['id']?>" class="btn btn-primary">modifier</a>
               <a href="supprimer_categorie.php?id=<?php echo $categorie['id']?>" onclick="return confirm('voulez vous vraiment supprimer la categorie <?php echo $categorie['libelle']?>');" class="btn btn-danger">supprimer</a>
             </tr>
  
    <?php
  
  }
  ?>

</tbody>
</table>

</div>
</body>
</html>