<?php ob_start(); ?> 
<h2 class="text-center">Mon Compte</h2>

    <h3>
        votre solde est <?= $compte->getSolde(); ?> €
    </h3>

    <form action="" method="post">
        <div class="form-group">
            <label for="">montant</label>
            <input type="number" name="montant" class="form-control">
        </div>
        <div class="form-check">
            <label for="" class="d-block">Type opération</label>
            <input type="radio" name="type" value="depot" id="depot">
            <label for="depot">Dépôt</label>
        </div>
        <div class="form-check">
            <input type="radio" name="type" value="retrait" id="retrait">
            <label for="retrait">Retrait</label>
        </div>
        <div class="form-check">
            <input type="radio" name="type" value="virer" id="virer">
            <label for="virer">Virement</label>
        </div>

        <div>Compte destinataire</div>
        <select name="compteDest" id="">
            <?php foreach($comptes as $compte): ?>
                <?php if($compte->getClient()->getId_personne() != unserialize($_SESSION["user"])->getId_personne()): ?>
                <option value="<?= $compte->getId(); ?>"> 
                    <?= $compte->getClient()->getPrenom(); ?>
                </option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>

        <input type="submit" class="btn btn-success mt-2 d-block">
        
    </form>
    
<?php 
$contenu = ob_get_clean();
include "template.php";