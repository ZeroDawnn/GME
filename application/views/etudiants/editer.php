<section class="container">
    <h2>Diplomes</h2>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" href="<?= base_url('Etudiants/editer/' . $oEtudiant->NUMETUDIANT) ?>">Éditer l'étudiant : <?= $oEtudiant->PRENOMET.' '.$oEtudiant->NOMET ?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Etudiants') ?>">Consulter les étudiants</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Etudiants/ajouter') ?>">Ajouter un étudiant</a>
        </li>
    </ul>
    <?php $this->view('etudiants/form.php'); ?>
</section>

