<?php ob_start(); ?>
    <h3 class="text-center">Gestion compte</h3>

    <table class="table table-strepid">
        <tr>
            <th>Solde</th>
            <th>Titulaire</th>
            <th>Gérant</th>
            <th>Action</th>
        </tr>

        <?php foreach($comptes as $compte): ?>
            <tr>
                <td> <?= $compte->getSolde() ?> </td>
                <td> <?= htmlentities($compte->getClient()->getPrenom()) ?> </td>
                <td> <?= htmlentities($compte->getGerant()->getPrenom()) ?> </td>
                <td>
                    <a href="?action=update&id=<?= $compte->getId() ?>">U</a>
                    <a href="?action=delete&id=<?= $compte->getId() ?>">X</a>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>
    
<?php 
$contenu = ob_get_clean();
include "template.php";