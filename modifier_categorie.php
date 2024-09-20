<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Modifier categorie</title>
</head>
<body>
<?php include 'include/nav.php' ?>

<div class="container py-2">
    <h4>Modifier categories</h4>

<?php

require_once 'include/database.php';
$sqlState=$pdo->prepare(query:'SELECT * FROM categorie  WHERE id=?');
$id=$_GET['id'];
$sqlState->execute([$id]);

$category=$sqlState->fetch(mode:PDO::FETCH_ASSOC);
if(isset($_POST['modifier'])){
    $libelle=$_POST['libelle'];
    $description=$_POST['description'];
    $icone=$_POST['icone'];

    if(!empty($libelle)&& !empty($description)){

        
        $sqlState=$pdo->prepare(query:'UPDATE categorie SET libelle =? ,description =? ,icone=?  WHERE id=?');
        $sqlState->execute([$libelle,$description,$icone,$id]);
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
    
    <input type="hidden" class="form-control" name="id" value="<?php echo $category['id']?> ">
    <label class="form-label">libelle</label>
    <input type="text" class="form-control" name="libelle"  value="<?php echo $category['libelle']?> " >

    <label class="form-label">Descrition</label>
    <textarea class="form-control" name="description">value="<?php echo $category['description']?> "</textarea>

    <label class="form-label">Icone</label>
    <input type="text" class="form-control" name="icone" value="<?php echo $category['icone']?>">

    <input type ="submit" value="modifier categorie" class="btn btn-primery my-2 border" name="modifier">

</form>
</div>
</body>
</html>