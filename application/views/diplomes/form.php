<?= form_open('Diplomes/' . ($action == 'add' ? 'ajouter' : 'editer/' . $oDiplome->CODEDIP)); ?>
<div class="form-group">
    <?= form_label('Université', 'universite'); ?>
    <?= form_error('universite'); ?>
    <?= form_dropdown('universite', $aUniversites, $action == 'add' ? set_value('universite') : $oDiplome->CODEU, array('id' => 'universite', 'class' => 'form-control')) ?>
</div>
<div class = "form-group">
    <?= form_label('Intitulé', 'intitule'); ?>
    <?= form_error('intitule'); ?>
    <?=
    form_input(array(
        'class' => 'form-control',
        'id' => 'intitule',
        'name' => 'intitule',
        'value' => $action == 'add' ? set_value('intitule') : $oDiplome->INTITULEDIP,
        'placeholder' => 'ex : DUT exemple',
    ))
    ?>
</div>
<div class = "form-group">
    <?= form_label('Adresse Web', 'adresseWeb'); ?>
    <?= form_error('adresseWeb'); ?>
    <?=
    form_input(array(
        'class' => 'form-control',
        'id' => 'adresseWeb',
        'name' => 'adresseWeb',
        'value' => $action == 'add' ? set_value('adresseWeb') : $oDiplome->ADRESSEWEBD,
        'placeholder' => 'ex : domaine.fr',
    ))
    ?>
</div>
<div class = "form-group">
    <?= form_label('Niveau', 'niveau'); ?>
    <?= form_error('niveau'); ?>
    <?=
    form_input(array(
        'class' => 'form-control',
        'id' => 'niveau',
        'name' => 'niveau',
        'value' => $action == 'add' ? set_value('niveau') : $oDiplome->NIVEAU,
        'placeholder' => 'ex : BAC+2',
    ))
    ?>
</div>
<div class = "form-group">
    <?= form_submit('enregistrer', $action == 'add' ? 'Ajouter' : 'Éditer', array('class' => 'btn btn-primary',)) ?>
</div>
<?= form_close() ?>

