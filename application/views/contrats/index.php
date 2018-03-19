<section class="container">

    <h2>Contrats</h2>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" href="<?= base_url('Contrats') ?>">Consulter les contrats</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Contrats/ajouter') ?>">Ajouter un contrat</a>
        </li>
    </ul>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id contrat</th>
                <th scope="col">Diplôme</th>
                <th scope="col">Référence de mobilites</th>
                <th scope="col">Programme</th>
                <th scope="col">Durée</th>
                <th scope="col">État</th>
                <th scope="col">Ordre</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($aContrats as $oContrat) {
                ?>
                <tr>
                    <td><?= $oContrat->IDCONTRAT ?></td>
                    <td><?= $aDiplomes[$oContrat->CODEDIP] ?></td>
                    <td><?= $aDemandesMobilites[$oContrat->REFDEMMOB] ?></td>
                    <td><?= $aProgrammes[$oContrat->IDP] ?></td>
                    <td><?= $oContrat->DUREE ?></td>
                    <td><?= $oContrat->ETATCONTRAT ?></td>
                    <td><?= $oContrat->ORDRE ?></td>
                    <td>
                        <a href="<?= base_url('Contrats/editer/' . $oContrat->IDCONTRAT) ?>">
                            <span class="oi oi-pencil"></span>
                        </a>
                        <a href="<?= base_url('Contrats/supprimer/' . $oContrat->IDCONTRAT) ?>">
                            <span class="oi oi-trash"></span>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <?= $pagination ?>
</section>

