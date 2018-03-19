<section class="container">
    <h2>Programmes</h2>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Programmes') ?>">Consulter les programmes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="<?= base_url('Programmes/ajouter') ?>">Ajouter un programme</a>
        </li>
    </ul>
    <?php $this->view('programmes/form.php'); ?>
</section>

