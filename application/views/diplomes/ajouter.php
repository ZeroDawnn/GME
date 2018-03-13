<section class="container">
    <h2>Diplomes</h2>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Diplomes') ?>">Consulter les diplomes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Diplomes/ajouter') ?>">Ajouter un diplome</a>
        </li>
    </ul>
    <?= validation_errors(); ?>
    <?= form_open('Diplomes/ajouter'); ?>
    <div class="form-group">
        <label for="universite">Université</label>
        <?= form_dropdown('universite', $aUniversites, set_value('universite'), array('id' => 'universite', 'class' => 'form-control')) ?>
    </div>
    <div class = "form-group">
        <?= form_label('Intitulé', 'intitule'); ?>
        <?=
        form_input(array(
            'class' => 'form-control',
            'id' => 'intitule',
            'name' => 'intitule',
            'value' => set_value('intitule'),
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
            'value' => set_value('adresseWeb'),
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
            'value' => set_value('niveau'),
            'placeholder' => 'ex : BAC+2',
        ))
        ?>
    </div>
    <div class = "form-group">
        <?= form_submit('enregistrer', 'Enregistrer', array('class' => 'btn btn-primary',)) ?>
    </div>
    <?= form_close() ?>
</section>

