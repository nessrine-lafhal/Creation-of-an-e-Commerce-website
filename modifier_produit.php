<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>modifier produit</title>
</head>
<body>
<?php
include_once 'include/database.php';
?>
<?php include 'include/nav.php' ?>


<div class="container py-2">
    <h4>modification des produits</h4>
    <?php
    $id=$_GET["id"];
    require_once 'include/database.php';
    $sqlState=$pdo->prepare(query:'SELECT * FROM produit WHERE id=?');
    $sqlState->execute([$id]);
    $produit=$sqlState->fetch(mode:PDO::FETCH_OBJ);
    if(isset($_POST['modifier'])){
        $libelle=$_POST['libelle'];
        $prix=$_POST['prix'];
        $discount=$_POST['discount'];
        $categorie=$_POST['categorie'];
        $description=$_POST['description'];
        
        $date=date(format:'Y-m-d');



        $filename="";
        if(!empty($_FILES['image']['name'])){
            $image=$_FILES['image']['name'];
            $filename=uniqid().$image;
            move_uploaded_file($_FILES['image']['tmp_name'],'upload/produit/'.$filename);

                
            }

        //extract(&array:$_POST);

        if(!empty($libelle)&& !empty($prix) &&  !empty($categorie) ){
            
            if(!empty($filename)){
                        $query='UPDATE produit SET 
                    libelle=?,
                    prix=?,
                    discount=?, 
                    id_categorie=?,
                    description=?,
                    image=?
                    WHERE id=?';
                    $sqlState=$pdo->prepare($query);
                    $updated=$sqlState->execute([$libelle,$prix,$discount,$categorie,$description,$filename,$id]);

            }else{
                $query='UPDATE produit SET 
                                            libelle=?,
                                            prix=?,
                                            discount=?, 
                                            id_categorie=?,
                                            description=?
                                            WHERE id=?';
                $sqlState=$pdo->prepare($query);
                $updated=$sqlState->execute([$libelle,$prix,$discount,$categorie,$description,$id]);

            }
            
            if($updated){
                header(header:'location:produits.php');
            }else{
                ?>
                <div class="alert alert-danger" role ="alert">
                    Database error (40023).
                </div>
                <?php
            }
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
    <input type="hidden" name="id" value="<?= $produit ->id ?>">
    <label class="form-label">libelle</label>
    <input type="text" class="form-control" name="libelle" value="<?= $produit ->libelle ?>">
    <br>
    <br>
    <label class="form-label">Prix</label>
    <input  type="number" step="0.1" class="form-control" name="prix"  min="0"   value="<?= $produit ->prix ?>">
    <br>
    <br>
    <label class="form-label">Discount</label>
    <input  type="range" class="form-control" name="discount"  min="0" max="100"  value="<?= $produit ->discount ?>">
    <br>
    <br>
    <label class="form-label">Description</label>
    <textarea  class="form-control" name="description" value="<?= $produit ->description ?>" ></textarea>
    <br>
    <br>
    <label class="form-label">Image</label>
    <input  type="file"  class="form-control" name="image"  >
    <img  width="400"class="img img-fluid" src="upload/produit/<?=$produit->image ?>">
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
            $selected=$produit ->id_categorie==$categorie['id']?' selected':'';
            
            echo"<option $selected value='".$categorie['id']."'>".$categorie['libelle']."</option>";
        }
        ?>
    </select>
    

    <input type ="submit" value="Modifier  produit" class="btn btn-primery my-2 border" name="modifier">

</form>
</div>
</body>
</html>