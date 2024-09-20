
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Admin</title>
</head>
<body>


<?php include 'include/nav.php' ?>


<div class="container py-2">

<?php

 if(!isset($_SESSION['utilisateur'])){
    header(header:'location:connexion.php');
 }
 
 
?>
<h3> bienvenues <?php
echo$_SESSION['utilisateur']['login'] ?> dans votre site web</h3>

</div>
</body>
</html>