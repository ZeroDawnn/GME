<section class="container">

    <h2>Diplômes</h2>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" href="<?= base_url('Diplomes') ?>">Consulter les diplômes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Diplomes/ajouter') ?>">Ajouter un diplôme</a>
        </li>
    </ul>
    <?= form_open('Diplomes/index'); ?>
    <div class="form-group">
        <?php $aUniversites[''] = "Choisissez une université" ?>
        <?= form_label('Trier par université', 'universite'); ?>
        <?= form_error('universite'); ?>
        <?= form_dropdown('universite', $aUniversites, $codeU, array('id' => 'universite', 'class' => 'form-control')) ?>
    </div>
    <div class = "form-group">
        <?= form_submit('valider', 'Trier', array('class' => 'btn btn-primary',)) ?>
    </div>
    <?= form_close() ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Code diplôme</th>
                <th scope="col">Université</th>
                <th scope="col">Intitulé</th>
                <th scope="col">Adresse Web</th>
                <th scope="col">Niveau</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($aDiplomes as $oDiplome) {
                ?>
                <tr>
                    <td><?= $oDiplome->CODEDIP ?></td>
                    <td><?= $aUniversites[$oDiplome->CODEU] ?></td>
                    <td><?= $oDiplome->INTITULEDIP ?></td>
                    <td><?= $oDiplome->ADRESSEWEBD ?></td>
                    <td><?= $oDiplome->NIVEAU ?></td>
                    <td>
                        <a href="<?= base_url('Diplomes/editer/' . $oDiplome->CODEDIP) ?>">
                            <span class="oi oi-pencil"></span>
                        </a>
                        <a href="<?= base_url('Diplomes/supprimer/' . $oDiplome->CODEDIP) ?>">
                            <span class="oi oi-trash"></span>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <?= $pagination ?>
</section>

