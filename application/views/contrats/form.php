<?= form_open('Contrats/' . ($action == 'add' ? 'ajouter' : 'editer/' . $oContrat->IDCONTRAT)); ?>
<div class="form-group">
    <?= form_label('Diplôme', 'codeD'); ?>
    <?= form_error('codeD'); ?>
    <?= form_dropdown('codeD', $aDiplomes, $action == 'add' ? set_value('codeD') : $oContrat->CODEDIP, array('id' => 'codeD', 'class' => 'form-control')) ?>
</div>
<div class="form-group">
    <?= form_label('Référence de mobilites', 'refDemMob'); ?>
    <?= form_error('refDemMob'); ?>
    <?= form_dropdown('refDemMob', $aDemandesMobilites, $action == 'add' ? set_value('refDemMob') : $oContrat->REFDEMMOB, array('id' => 'refDemMob', 'class' => 'form-control')) ?>
</div>
<div class="form-group">
    <?= form_label('Programme', 'idP'); ?>
    <?= form_error('idP'); ?>
    <?= form_dropdown('idP', $aProgrammes, $action == 'add' ? set_value('idP') : $oContrat->IDP, array('id' => 'idP', 'class' => 'form-control')) ?>
</div>
<div class = "form-group">
    <?= form_label('Durée', 'duree'); ?>
    <?= form_error('duree'); ?>
    <?=
    form_input(array(
        'class' => 'form-control',
        'id' => 'duree',
        'name' => 'duree',
        'value' => $action == 'add' ? set_value('duree') : $oContrat->DUREE,
        'placeholder' => 'ex : 2 ans',
    ))
    ?>
</div>
<div class = "form-group">
    <?= form_label('État', 'etat'); ?>
    <?= form_error('etat'); ?>
    <?=
    form_input(array(
        'class' => 'form-control',
        'id' => 'etat',
        'name' => 'etat',
        'value' => $action == 'add' ? set_value('etat') : $oContrat->ETATCONTRAT,
        'placeholder' => 'ex : en cours',
    ))
    ?>
</div>
<div class = "form-group">
    <?= form_label('Ordre', 'ordre'); ?>
    <?= form_error('ordre'); ?>
    <?=
    form_input(array(
        'class' => 'form-control',
        'id' => 'ordre',
        'name' => 'ordre',
        'value' => $action == 'add' ? set_value('ordre') : $oContrat->ORDRE,
        'placeholder' => 'ex : urgent',
    ))
    ?>
</div>
<div class = "form-group">
    <?= form_submit('valider', $action == 'add' ? 'Ajouter' : 'Éditer', array('class' => 'btn btn-primary',)) ?>
</div>
<?= form_close() ?>

