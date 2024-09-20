<?php
session_start();
require_once '../include/database.php';
$id=$_GET['id'];
$sqlState=$pdo->prepare(query:"SELECT * FROM categorie WHERE id=?");
$sqlState->execute([$id]);
$categorie=$sqlState->fetch(mode:PDO::FETCH_ASSOC);
// var_dump($categorie);

 $sqlState=$pdo->prepare(query:"SELECT * FROM produit WHERE id_categorie=?");
 $sqlState->execute([$id]);
 $produits=$sqlState->fetchAll(mode: PDO::FETCH_OBJ);
 //var_dump($produits);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet" type="text/css" >
    <link href="../assets/css/produit.css" rel="stylesheet" type="text/css" >
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
    <title>categorie | <?php echo $categorie['libelle']?></title>
</head>
<body>
<?php include '../include/nav_front.php' ?>
<div class="container py-2">

    <h4><?php echo $categorie['libelle'] ?>  <i class="fa <?php echo $categorie['icone'] ?>"></i></h4>
    <div class="container">
        <div class="row">
        <?php
                 foreach ($produits as $produit){
                    $idProduit=$produit->id;
                    ?>
                    <div class="card mb-3 col-md-4 ">
                        <img src="../upload/produit/<?= $produit->image ?>" class="card-img-top w-100 mx-auto" width="200"  height="300" alt="img">
                       
                        <div class="card-body">
                            <a href="produit.php?id=<?php echo $idProduit ?>" class="btn stretched-link">afficher details</a>
                            <h5 class="card-title"><?= $produit->libelle ?></h5>
                            <p class="card-text"><?= $produit->description?></p>
                            <p class="card-text"><?= $produit->prix?> MAD</p>
                            <p class="card-text"><small class="text-muted">Ajouté le :<?= date_format(date_create($produit->date_creation),format:'Y/m/d')?></small></p>
                         </div>
                         <div class="card-footer" style="z-index: 10">
                          <?php  include '../include/front/counter.php'?> 
                        </div>
                    </div>
                    
                    <?php
                 }
                 if(empty($produits)){
                    ?>
                        <div class="alert alert-info" role="alert">
                        Pas de produits pour l instant
                        </div>
                    <?php
                 
                 }
                 
            ?>
         
       </div>
    </div>
</div>

<script src="../assets/js/produit/counter.js"></script>
</body>
</html>