<?php
session_start();
require_once '../include/database.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet" type="text/css" >
    <link href="../assets/css/produit.css" rel="stylesheet" type="text/css" >
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
    <title>Panier</title>
</head>
<body>
    <?php include '../include/nav_front.php' ?>
    <div class="container py-2">
        <?php
       
        if (isset($_POST['vider'])) {
            $_SESSION['panier'][$idUtilisateur] = [];
            header('Location: panier.php');
            
        }
        $idUtilisateur = $_SESSION['utilisateur']['id'] ;
        $panier = $_SESSION['panier'][$idUtilisateur] ;



        if (!empty($panier)) {
            $idProduits = array_keys($panier);
            $idProduits = implode(',', $idProduits);
            $idProduits = '('.$idProduits.')';
            $sqlState = $pdo->prepare("SELECT * FROM produit WHERE id IN $idProduits");
            $sqlState->execute();
            $produits = $sqlState->fetchAll(PDO::FETCH_ASSOC);
        }
        if (isset($_POST['valider'])) {
            $sql= 'INSERT INTO ligne_commande(id_produit,id_commande,prix,quantite,total) VALUES';
            $total = 0;
            $prixProduits = [];
            foreach ($produits as $produit) {
                $idProduit = $produit['id'];
                $qty = $panier[$idProduit];
                
                $prix = $produit['prix'];
                $total += $qty * $prix;
                $prixProduits[$idProduit] = [
                    'id' => $idProduit,
                    'prix' => $prix,
                    'total' => $qty * $prix,
                    'qty'=> $qty
                ];
            }
        
        
        $sqlStateCommande = $pdo->prepare('INSERT INTO commande(id_client,total) VALUES(?,?)');
        $sqlStateCommande->execute([$idUtilisateur, $total]);
        $idCommande = $pdo->lastInsertId();
            $args = [];
            foreach ($prixProduits as $produit) {
                $id=$produit['id'];
                $sql .= "(:id$id,'$idCommande',:prix$id,:qte$id,:total$id),";
              
            
                
    
}
$sql = substr($sql, 0, -1);
$sqlState=$pdo->prepare($sql);
foreach ($prixProduits as $produit) {
    $id = $produit['id'];
    $sqlState->bindParam(':id' . $id, $produit['id']);
    $sqlState->bindParam(':prix' . $id, $produit['prix']);
    $sqlState->bindParam(':qty' . $id, $produit['qty']);
    $sqlState->bindParam(':total' . $id, $produit['total']);
}
$inserted=$sqlState->execute();

        }

if(empty($panier)){
    ?>
<div class="alert alert-warning" role="alert">
    Votre panier est vide 
<?php
}else{}
}