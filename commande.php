<?php
require_once 'include/database.php';
$idCommande=$_GET['id'];
$sqlState=$pdo->prepare(query:'SELECT commande.*,utilisateur.login as "login" FROM commande INNER JOIN utilisateur ON commande.id_client=utilisateur.id 
where commande.id=?
ORDER BY commande.date_creation DESC');
$sqlState->execute([$idCommande]);
$commande=$sqlState->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet" type="text/css" >
    <title>Commande| Numero <?php $commande['id']?></title>
</head>
<body>
<?php include 'include/nav.php' ?>
<div class="container py-2">
    



<!-- On tables -->
<h2>  Liste des commandes</h2>

<a href="ajouter_categorie.php" class="btn btn-primary">Ajouter catégorie </a>


<table class="table table-striped">
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
$sqlStateLigneCommendes=$pdo->prepare(query:"SELECT ligne_commande.*,produit.libelle,produit.image FROM ligne_commande INNER JOIN produit ON ligne_commande.id_produit=produit.id WHERE id_commande=?");
$sqlStateLigneCommendes->execute([$idCommande]);
$lignesCommandes = $sqlStateLigneCommendes->fetchAll(PDO::FETCH_OBJ);
?>
    <tr>
              <td><?php echo $commande['id'] ?></td>
              <td><?php echo $commande['login'] ?></td>
              <td><?php echo $commande['total'] ?> MAD</td>
              <td><?php echo $commande['date_creation'] ?></td>
              <td>
                <?php if ($commande['valide'] == 0) : ?>
                    <a class="btn btn-success btn-sm" href="valider_commande.php?id=<?= $commande['id']?>&etat=1">Valider la commande</a >
                <?php else: ?>
                    <a class="btn btn-danger btn-sm" href="valider_commande.php?id=<?= $commande['id']?>&etat=0">Annuler la commande</a >
                <?php endif; ?>
            </Td>
    </tr>
    <?php
  
  
  ?>

</tbody>
</table>

<rh>
    <h2>Produits : </h2>
    <table class="table table-striped table-hover ">
        <Thead>
        <Tr>
            <th>#ID</th>
            <th>Produit</th>
            <th>Prix unitaire</th>
            <th>Quantité</th>
            <th>Total</th>
        </Tr>
        </Thead>

        <tbody>
        <?php foreach ($lignesCommandes as $lignesCommande) : ?>
            <Tr>
                <td><?php echo $lignesCommande->id ?></td>
                <td><?php echo $lignesCommande->libelle ?></td>
                <td><?php echo $lignesCommande->prix ?> <i class="fa fa-solid fa-dollar"></i></td >
                <td>x <?php echo $lignesCommande->quantite ?></td>
                <td><?php echo $lignesCommande->total ?> <i class="fa fa-solid fa-dollar"></i></td >
            </Tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</Div>

</corps>
</html>

</div>
</body>
</html>