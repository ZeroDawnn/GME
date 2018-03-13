<section class="container">
    <h2>Diplomes</h2>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Diplomes') ?>">Consulter les diplomes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Ajouter') ?>">Ajouter un diplome</a>
        </li>
    </ul>
    <?= validation_errors(); ?>
    <?= form_open('Diplomes/editer/' . $oDiplome->CODEDIP); ?>
    <div class="form-group">
        <label for="universite">Université</label>
        <?= form_dropdown('universite', $aUniversites, $oDiplome->CODEU, array('id' => 'universite', 'class' => 'form-control')) ?>
    </div>
    <div class = "form-group">
        <?= form_label('Intitulé', 'intitule'); ?>
        <?=
        form_input(array(
            'class' => 'form-control',
            'id' => 'intitule',
            'name' => 'intitule',
            'value' => $oDiplome->INTITULEDIP,
            'placeholder' => 'ex : DUT exemple',
        ))
        ?>
    </div>
    <div class = "form-group">
        <?= form_label('Adresse Web', 'adresseWeb'); ?>
        <?=
        form_input(array(
            'class' => 'form-control',
            'id' => 'adresseWeb',
            'name' => 'adresseWeb',
            'value' => $oDiplome->ADRESSEWEBD,
            'placeholder' => 'ex : domaine.fr',
        ))
        ?>
    </div>
    <div class = "form-group">
        <?= form_label('Niveau', 'niveau'); ?>
        <?=
        form_input(array(
            'class' => 'form-control',
            'id' => 'niveau',
            'name' => 'niveau',
            'value' => $oDiplome->NIVEAU,
            'placeholder' => 'ex : BAC+2',
        ))
        ?>
    </div>
    <div class = "form-group">
        <?= form_submit('enregistrer', 'Enregistrer', array('class' => 'btn btn-primary',)) ?>
    </div>
    <?= form_close() ?>
</section>

