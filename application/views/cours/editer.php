<section class="container">
    <h2>Cours</h2>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" href="<?= base_url('Cours/editer/' . $oCours->CODECOURS) ?>">Éditer le cours : <?= $oCours->LIBELLECOURS?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Cours') ?>">Consulter les cours</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Cours/ajouter') ?>">Ajouter un cours</a>
        </li>
    </ul>
    <?php $this->view('cours/form.php'); ?>
</section>

