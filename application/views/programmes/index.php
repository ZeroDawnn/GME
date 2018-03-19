<section class="container">

    <h2>Programmes</h2>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" href="<?= base_url('Programmes') ?>">Consulter les programmes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Programmes/ajouter') ?>">Ajouter un programme</a>
        </li>
    </ul>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID Programme</th>
                <th scope="col">Intitulé</th>
                <th scope="col">Explication</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($aProgrammes as $oProgrammes) {
                ?>
                <tr>
                    <td><?= $oProgrammes->IDP ?></td>
                    <td><?= $oProgrammes->INTITULEP ?></td>
                    <td><?= $oProgrammes->EXPLICATION ?></td>
                    <td>
                        <a href="<?= base_url('Programmes/editer/' . $oProgrammes->IDP) ?>">
                            <span class="oi oi-pencil"></span>
                        </a>
                        <a href="<?= base_url('Programmes/supprimer/' . $oProgrammes->IDP) ?>">
                            <span class="oi oi-trash"></span>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <?= $pagination ?>
</section>

