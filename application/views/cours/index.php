<section class="container">

    <h2>Cours</h2>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" href="<?= base_url('Cours') ?>">Consulter les cours</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Cours/ajouter') ?>">Ajouter un cours</a>
        </li>
    </ul>
    <?= form_open('Cours/index'); ?>
    <div class="form-group">
        <?php $aDiplomes[''] = "Choisissez un diplôme" ?>
        <?= form_label('Trier par diplômes', 'diplome'); ?>
        <?= form_error('diplome'); ?>
        <?= form_dropdown('diplome', $aDiplomes, $codeD, array('id' => 'diplome', 'class' => 'form-control')) ?>
    </div>
    <div class = "form-group">
        <?= form_submit('valider', 'Trier', array('class' => 'btn btn-primary',)) ?>
    </div>
    <?= form_close() ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Code cours</th>
                <th scope="col">Libellé du cours</th>
                <th scope="col">Crédits ECTS</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($aCours as $oCours) {
                ?>
                <tr>
                    <td><?= $oCours->CODECOURS ?></td>
                    <td><?= $oCours->LIBELLECOURS ?></td>
                    <td><?= $oCours->NBECTS ?></td>
                    <td>
                        <a href="<?= base_url('Cours/editer/' . $oCours->CODECOURS) ?>">
                            <span class="oi oi-pencil"></span>
                        </a>
                        <a href="<?= base_url('Cours/supprimer/' . $oCours->CODECOURS) ?>">
                            <span class="oi oi-trash"></span>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <?= $pagination ?>
</section>

