<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Ajouter produit</title>
</head>
<body>
<?php
include_once 'include/database.php';
 include 'include/nav.php'
  ?>


<div class="container py-2">
    <h4>ajouter produit</h4>
    <?php
    if(isset($_POST['ajouter'])){
        $libelle=$_POST['libelle'];
        $prix=$_POST['prix'];
        $discount=$_POST['discount'];
        $categorie=$_POST['categorie'];
        $description=$_POST['description'];
        $date=date(format:'Y-m-d');
        //extract(&array:$_POST);


        echo"<pre>";
        print_r($_FILES);


        $filename="imgggg.webp";
        if(!empty($_FILES['image'])){
            $image=$_FILES['image']['name'];
            $filename=uniqid().$image;
            move_uploaded_file($_FILES['image']['tmp_name'],'upload/produit/'.$filename);

                
            }
        

        if(!empty($libelle)&& !empty($prix) &&  !empty($categorie) ){
            include_once 'include/database.php';
            $sqlState=$pdo->prepare(query:'INSERT INTO produit VALUES (null,?,?,?,?,?,?,?)');
            $sqlState->execute([$libelle,$prix,$discount,$categorie,$date,$description,$filename]);
           

            header(header:'location:produits.php');
        }else{
            ?>
            <div class="alert alert-danger" role="alert">
               attention : libelle ,prix et categorie sont obligatoire
            </div>
            <?php
        }

        

        

    
    }
    ?>


<form method="post" enctype="multipart/form-data">
    <label class="form-label">libelle</label>
    <input type="text" class="form-control" name="libelle" >
    <br>
    <br>

    <label class="form-label">Prix</label>
    <input  type="number" step="0.1" class="form-control" name="prix"  min="0" >
    <br>
    <br>
    <label class="form-label">Descount</label>
    <input  type="range" class="form-control" name="discount"  min="0" max="100" >

    <br>
    <br>
    <label class="form-label">Description</label>
    <textarea  class="form-control" name="description" ></textarea>
    <br>
    <br>
    <label class="form-label">Image</label>
    <input  type="file"  class="form-control" name="image"  min="0" max="100" >

    <br>
    <br>
    <?php

      
        $categories=$pdo->prepare(query:"SELECT * FROM categorie");
        $categories->execute();
        //print_r($categories->fetchAll(mode:PDO::FETCH_ASSOC));


    ?>
     <label class="form-label">categorie</label>
    <select name="categorie" class="form-control my-2" >
        <option value="">choisissez une categorie</option>
        <?php
        foreach($categories as $categorie){
            echo"<option value='".$categorie['id']."'>".$categorie['libelle']."</option>";
        }
        ?>
    </select>
    

    <input type ="submit" value="Ajouter produit" class="btn btn-primery my-2 border" name="ajouter">

</form>
</div>
</body>
</html>