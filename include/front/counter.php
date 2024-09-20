
<div>
    <?php
        $idUtilisateur = $_SESSION['utilisateur']['id'] ?? 0;
        $qty = $_SESSION['panier'][$idUtilisateur][$idProduit] ?? 0; //php 8
        if ($qty == 0) {
            $color = "btn-primary";
            $button = '<i class="fa fa-light fa-cart-plus"></i>';
        } else {
            $button = '<i class="fa fa-solid fa-pencil"></i>';
        }
    ?>
    <?php if ($idUtilisateur !== 0): ?>
        <form method="post" class="counter d-flex w-50 mx-auto" action="ajouter_panier.php">

            <button onclick="return false" class="btn btn-primary mx-1 counter-moins">-</button>
            <input type="hidden" name="id" value="<?php echo $idProduit ?>">
            <input class="form-control" type="number" value="<?php echo $qty ?>" name="qty" id="qty" max="99">
           
            <button onclick="return false" class="btn btn-primary mx-1 counter-plus">+</button>

            <button class="btn btn-success btn-sm" type="submit" name="ajouter"><?= $button ?></button>
            
            <?php if ($qty != 0): ?>
                <button formaction="supprimer_panier.php" class="btn btn-sm btn-danger mx-1" type="submit" value="supprimer" name="supprimer">
                    <i class="fa fa-solid fa-trash"></i>
                </button>
            <?php endif; ?>
        </form>
    <?php else: ?>
        <div class="alert-avertissement" role="alert">
            Vous devez être connecté pour acheter ce produit <strong><a href="../connexion.php">Connexion</a></strong>
        </div>
    <?php endif; ?>
</div>