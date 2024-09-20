<?php
session_start();
require_once '../include/database.php';
$id=$_GET['id'];
$sqlState=$pdo->prepare(query:"SELECT * FROM produit WHERE id=?");
 $sqlState->execute([$id]);
 $produit=$sqlState->fetch(mode: PDO::FETCH_ASSOC);
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
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
    <link href="../assets/css/produit.css" rel="stylesheet" type="text/css" >
    <title>produit | <?php echo $produit['libelle']?></title>
</head>
<body>

<?php include '../include/nav_front.php' ?>

<div class="container py-2">

    <h4><?php echo $produit['libelle'] ?></h4>
    <div class="container">
        <div class="row">
            <div class="col-md-6 ">
                <img class="img img fluid w-75 "src="../upload/produit/<?php echo $produit['image'] ?>" alt="<?php echo $produit['libelle'] ?>">
        </div>
            <div class="col-md-6">
             
                <?php  
                $discount=$produit['discount'];
                $prix=$produit['prix'];
                ?>
                <div class="d-flex align-items-center" >
                
                <h1 class="w-100"><?php echo $produit['libelle'] ?></h1>
                <?php if(!empty($discount)){
                ?>

                 
                    <span class="badge text-bg-success ">- <?php echo $discount ?>% </span>
                    
                
                <?php
            } ?>
            </div>
           <hr>
            <p>
                <?php echo $produit['description'] ?> 
        </p>
            <hr>
            <div class="d-flex">
            <?php
            if(!empty($discount)){
                $total=$prix-(($prix*$discount)/100);
                ?>
                <h3 class="mx-1">
                 <span class="badge text-bg-danger "><strike><?php echo $prix  ?>  MAD</strike></span>
                </h3>
                <h3 class="mx-1">
                 <span class="badge text-bg-success"><?php echo $total  ?>  MAD</span>
                </h3>
                <?php
            }else{
                $total=$prix;
                ?>
                <h5>
                    <span class="badge text-bg-success"><?php echo $total ?> MAD </span>
                 </h5>
             <?php
            }


            
            ?>
            </div>
           
            <hr>
            <?php
                $idProduit=$produit['id'];
              include '../include/front/counter.php'
              ?> 
           <hr>
            <a class="btn btn-primary" href="#">Acheter</a>
            </div>
                    
       </div>
    </div>
</div>
<script src="../assets/js/produit/counter.js"></script>
</body>
</html>