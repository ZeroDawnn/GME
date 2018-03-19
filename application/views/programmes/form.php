<?= form_open('Programmes/' . ($action == 'add' ? 'ajouter' : 'editer/' . $oProgrammes->IDP)); ?>
<div class="form-group">
    <?= form_label('Intitulé', 'intitule'); ?>
    <?= form_error('intitule'); ?>
    <?= form_input(array(
        'class' => 'form-control',
        'id' => 'intitule',
        'name' => 'intitule',
        'value' => $action == 'add' ? set_value('intitule') : $oProgrammes->INTITULEP,
        'placeholder' => 'ex : Administration, ...',
    ))
    ?>
</div>
<div class = "form-group">
    <?= form_label('Explication', 'explication'); ?>
    <?= form_error('explication'); ?>
    <?=
    form_input(array(
        'class' => 'form-control',
        'id' => 'explication',
        'name' => 'explication',
        'value' => $action == 'add' ? set_value('explication') : $oProgrammes->EXPLICATION,
        'placeholder' => 'ex : Ceci est un programme qui consiste...',
    ))
    ?>
</div>
<div class = "form-group">
    <?= form_submit('valider', $action == 'add' ? 'Ajouter' : 'Éditer', array('class' => 'btn btn-primary',)) ?>
</div>
<?= form_close() ?>

