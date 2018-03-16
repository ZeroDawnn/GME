<section class="container">
    <h2>Diplômes</h2>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Diplomes') ?>">Consulter les diplômes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="<?= base_url('Diplomes/ajouter') ?>">Ajouter un diplôme</a>
        </li>
    </ul>
    <?php $this->view('diplomes/form.php'); ?>
</section>

