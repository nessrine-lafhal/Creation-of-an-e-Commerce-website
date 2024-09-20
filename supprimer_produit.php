<?php

require_once 'include/database.php';
$id=$_GET['id'];
$sqlState=$pdo->prepare(query:'DELETE FROM produit WHERE id=?');
$supprime=$sqlState->execute([$id]);
header(header:'location:produits.php');

/*if($supprime){
    header(header:'location:categorie.php');
}else{
    echo "Database error"
}*/

?>