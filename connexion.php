<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>connexion</title>
</head>
<body>
<?php include 'include/nav.php' ?>


<div class="container py-2">

<?php
  if(isset($_POST['connexion'])){
    $login=$_POST['login'];
    $pwd=$_POST['password'];

    if(!empty($login) && !empty($pwd)) {
        require_once 'include/database.php';
        $sqlState=$pdo->prepare(query:'SELECT * FROM utilisateur WHERE login =? AND password=?');

        $sqlState->execute([$login,$pwd]);
        if($sqlState->rowCount()>=1){
            
            $_SESSION['utilisateur']=$sqlState->fetch();
            header(header:'location: admin.php');
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