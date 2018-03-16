<?= form_open('Etudiants/' . ($action == 'add' ? 'ajouter' : 'editer/' . $oEtudiant->NUMETUDIANT)); ?>
<?php if ($action == 'add') { ?>
    <div class="form-group">
        <?= form_label('Numéro étudiant', 'numE'); ?>
        <?= form_error('numE'); ?>
        <?=
        form_input(array(
            'class' => 'form-control',
            'id' => 'numE',
            'name' => 'numE',
            'value' => set_value('numE'),
            'placeholder' => 'ex : 21700611',
        ))
        ?>
    </div>
<?php } ?>
<div class="form-group">
    <?= form_label('Diplôme', 'codeD'); ?>
    <?= form_error('codeD'); ?>
    <?= form_dropdown('codeD', $aDiplomes, $action == 'add' ? set_value('codeD') : $oEtudiant->CODEDIP, array('id' => 'codeD', 'class' => 'form-control')) ?>
</div>
<div class = "form-group">
    <?= form_label('Prénom', 'prenom'); ?>
    <?= form_error('prenom'); ?>
    <?=
    form_input(array(
        'class' => 'form-control',
        'id' => 'prenom',
        'name' => 'prenom',
        'value' => $action == 'add' ? set_value('prenom') : $oEtudiant->PRENOMET,
        'placeholder' => 'ex : Julien',
    ))
    ?>
</div>
<div class = "form-group">
    <?= form_label('Nom', 'nom'); ?>
    <?= form_error('nom'); ?>
    <?=
    form_input(array(
        'class' => 'form-control',
        'id' => 'nom',
        'name' => 'nom',
        'value' => $action == 'add' ? set_value('nom') : $oEtudiant->NOMET,
        'placeholder' => 'ex : Trescartes',
    ))
    ?>
</div>
<div class = "form-group">
    <?= form_label('E-mail', 'email'); ?>
    <?= form_error('email'); ?>
    <?=
    form_input(array(
        'class' => 'form-control',
        'id' => 'email',
        'name' => 'email',
        'value' => $action == 'add' ? set_value('email') : $oEtudiant->EMAIL,
        'placeholder' => 'ex : julient@gmail.com',
    ))
    ?>
</div>
<div class = "form-group">
    <?= form_submit('enregistrer', $action == 'add' ? 'Ajouter' : 'Éditer', array('class' => 'btn btn-primary',)) ?>
</div>
<?= form_close() ?>

