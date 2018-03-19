<section class="container">
    <h2>Contrats</h2>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Contrats') ?>">Consulter les contrats</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="<?= base_url('Contrats/ajouter') ?>">Ajouter un contrat</a>
        </li>
    </ul>
    <?php $this->view('contrats/form.php'); ?>
</section>

