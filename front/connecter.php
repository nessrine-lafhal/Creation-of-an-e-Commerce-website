
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


<header>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">connexion</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="\ecommerce\front\inscription.php">inscription</a>
        </li>
      </ul>

    
    </div>

</header>

<div class="container py-2">
<?php
  if(isset($_POST['connexion'])){
    $login=$_POST['login'];
    $pwd=$_POST['password'];

    if(!empty($login) && !empty($pwd)) {
        
    session_start();
    require_once '../include/database.php';
    
        $sqlState=$pdo->prepare(query:'SELECT * FROM utilisateur WHERE login =? AND password=?');

        $sqlState->execute([$login,$pwd]);
        if($sqlState->rowCount()>=1){
            
            $_SESSION['utilisateur']=$sqlState->fetch();
            header(header:'location: index.php');
        }else{
            ?>
        <div class="alert alert-danger" role="alert">
            attention ! login ou mot de passe incorrectes.
        </div>
        <?php

        }
        
    }else{
        ?>
    <div class="alert alert-danger" role="alert">
        attention ! login and password sont obligatoire .
    </div> 
    <?php   
    
  }
}
 
?>
<h4>Connexion</h4>
<form method="post">
    <label class="form-label">login</label>
    <input type="text" class="form-control" name="login" >

    <label class="form-label">Password</label>
    <input type="password" class="form-control" name="password"  >

    <input type ="submit" value="Connexion" class="btn btn-primery my-2 border" name="connexion">

</form>
</div>
</body>
</html>