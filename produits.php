<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>la listes des produits</title>
</head>
<body>
<?php include 'include/nav.php' ?>


<div class="container py-2">
    



<!-- On tables -->
<h2>  la liste des produits</h2>

<a href="ajouter_produit.php" class="btn btn-primary">Ajouter produits</a>


<table class="table table-striped">
<thead>
    <tr>
            <th>#ID</th>
            <th>Libelle</th>
            <th>Prix</th>
            <th>Discount</th>
            <th>categorie</th>
            <th>Image</th>
            <th>Date de creation</th>
            <th>Operations</th>

    </tr>
</thead> 
<tbody>
<?php
require_once 'include/database.php';

$categories=$pdo->prepare(query:"SELECT produit.*,categorie.libelle as 'categorie_libelle' FROM produit INNER JOIN categorie ON produit.id_categorie=categorie.id");
$categories->execute();
//print_r($categories->fetchAll(mode:PDO::FETCH_ASSOC));
foreach($categories as $produit){
    $prix=$produit['prix'];
    $discount=$produit['discount'];
    $prixFinal=$prix -(($prix*$discount)/100);
    
    ?>
    <tr>
              <td><?= $produit['id'] ?></td>
              <td><?= $produit['libelle'] ?></td>
              <td><?=$prix ?> MAD </td>
              <td><?=$discount?> % </td>
              <td><?= $produit['categorie_libelle'] ?></td>
              <td><img class="img-fluid" width="90"src="upload/produit/<?=$produit['image'] ?>" alt="<?= $produit['libelle'] ?>"></td>

              <td><?=$produit['date_creation'] ?></td>
              <td>
               <a href="modifier_produit.php?id=<?php echo $produit['id']?>" class="btn btn-primary">modifier</a>
               <a href="supprimer_produit.php?id=<?php echo $produit['id']?>" onclick="return confirm('voulez vous vraiment supprimer le produits <?php echo $produit['libelle']?>');" class="btn btn-danger">supprimer</a>
             </tr>
    </tr>
  
    <?php
  
  }
  ?>

</tbody>
</table>

</div>
</body>
</html>