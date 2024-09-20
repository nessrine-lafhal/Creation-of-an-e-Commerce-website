<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Ajouter categorie</title>
</head>
<body>
<?php include 'include/nav.php' ?>


<div class="container py-2">
    <h4>ajouter categorie</h4>

<?php
 if(isset($_POST['ajouter'])){
    $libelle=$_POST['libelle'];
    $description=$_POST['description'];
    $icone=$_POST['icone'];

    if(!empty($libelle)&& !empty($description)){

        require_once 'include/database.php';
        $sqlState=$pdo->prepare(query:'INSERT INTO categorie(libelle,description,icone) VALUES(?,?,?)');
        $sqlState->execute([$libelle,$description,$icone]);
       header(header:'location:categories.php');
    }else{
        ?>
        <div class="alert alert-danger" role="alert">
           attention : libelle et description sont obligatoire
        </div>
        <?php
    }
 }
  
 
?>
<form method="post">
    <label class="form-label">libelle</label>
    <input type="text" class="form-control" name="libelle" >

    <label class="form-label">Descrition</label>
    <textarea class="form-control" name="description"></textarea>

    <label class="form-label">Icone</label>
    <input type="text" class="form-control" name="icone" >

    <input type ="submit" value="Ajouter categorie" class="btn btn-primery my-2 border" name="ajouter">

</form>
</div>
</body>
</html>