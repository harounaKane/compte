<?php ob_start(); ?> 

    <form action="" method="post">

        <input type="hidden" name="id" value="<?= $compteToUpdate->getId() ?>">
        <div class="fotm-group col-6">
            <label for="">Solde</label>
            <input type="text" value="<?= $compteToUpdate->getSolde() ?>" name="solde" class="form-control">
        </div>
        <div class="fotm-group col-6">
            <label for="">Gérant</label>
            <select name="gerant" id="" class="form-select">
                <?php foreach($listeGerant as $gerant): ?>
                    <option <?= $gerant->getId_personne() == $compteToUpdate->getGerant()->getId_personne() ? 'selected' : '' ?> value="<?= $gerant->getId_personne() ?>">
                        <?= $gerant->getPrenom() ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <input type="submit" class="btn btn-outline-success mt-2" name="Modifier" value="Modifier">
    </form>


<?php 
$contenu = ob_get_clean();
include "template.php";