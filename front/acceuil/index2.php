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
<?php include 'include/nav.php' ?>


<div class="container py-2">
    <h4>ajouter utilisateur</h4>

<?php
  if(isset($_POST['ajouter'])){
    $login=$_POST['login'];
    $pwd=$_POST['password'];

    if(!empty($login) && !empty($pwd)) {
          require_once 'include/database.php';
          $date=date(format:'Y-m-d');
          $sqlState=$pdo->prepare( query:'INSERT INTO utilisateur VALUES(null,?,?,?)');
          $sqlState->execute([$login,$pwd,$date]);
          //redirection dans une page
          header(header:'location:connexion.php');

    }else{
        ?>
        <div class="alert alert-danger" role="alert">
            login,password sont obligatoire
        </div>
        <?php
        
    }
  }
 
?>
<form method="post">
    <label class="form-label">login</label>
    <input type="text" class="form-control" name="login" >

    <label class="form-label">Password</label>
    <input type="password" class="form-control" name="password"  >

    <input type ="submit" value="ajouter utilisateur" class="btn btn-primery my-2 border" name="ajouter">

</form>
</div>
</body>
</html>