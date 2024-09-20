<?php
session_start();
require_once '../include/database.php';
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet" type="text/css" >
    
    
    <title>Document</title>
</head>
<body>
<?php include '../include/nav_front.php'?>

<div class="container py-2">
    <h4> <i class ="fa fa-light fa-list"></i>   Liste des categories</h4>
    <?php



     require_once '../include/database.php';
     $categories=$pdo->prepare(query:"SELECT * FROM categorie");
    $categories->execute();
   // var_dump($categories->fetchAll(mode:PDO::FETCH_OBJ));

   

    ?>

<ul class="list-group list-group-flush w-25">
<?php
        foreach($categories as $categorie){
            ?>
            <li class="list-group-item"> <a class="btn btn-secondary" href="categorie.php?id=<?php echo $categorie['id']?>">
                <i class="fa <?php echo $categorie['icone'] ?>"></i><?php echo $categorie['libelle']?>
             </a>
            </li>
            <?php
            
        }
    ?>
 </ul>
  

</div>
</body>
</html>