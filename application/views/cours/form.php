<?= form_open('Cours/' . ($action == 'add' ? 'ajouter' : 'editer/' . $oCours->CODECOURS)); ?>
<div class = "form-group">
    <?= form_label('Libellé', 'libelle'); ?>
    <?= form_error('libelle'); ?>
    <?=
    form_input(array(
        'class' => 'form-control',
        'id' => 'libelle',
        'name' => 'libelle',
        'value' => $action == 'add' ? set_value('libelle') : $oCours->LIBELLECOURS,
        'placeholder' => 'ex : PHP',
    ))
    ?>
</div>
<div class = "form-group">
    <?= form_label('Crédits ECTS', 'ECTS'); ?>
    <?= form_error('ECTS'); ?>
    <?=
    form_input(array(
        'class' => 'form-control',
        'id' => 'ECTS',
        'name' => 'ECTS',
        'value' => $action == 'add' ? set_value('ECTS') : $oCours->NBECTS,
        'placeholder' => 'ex : 50',
    ))
    ?>
</div>
<div class = "form-group">
    <?= form_submit('valider', $action == 'add' ? 'Ajouter' : 'Éditer', array('class' => 'btn btn-primary',)) ?>
</div>
<?= form_close() ?>

