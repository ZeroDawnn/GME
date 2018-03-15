<section class="container">
    <h2>Diplomes</h2>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" href="<?= base_url('Diplomes/editer/' . $oDiplome->CODEDIP) ?>">Éditer le diplome <?= $oDiplome->INTITULEDIP ?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Diplomes') ?>">Consulter les diplomes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Diplomes/ajouter') ?>">Ajouter un diplome</a>
        </li>
    </ul>
    <?php $this->view('diplomes/form.php'); ?>
</section>

