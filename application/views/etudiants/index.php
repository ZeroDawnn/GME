<section class="container">

    <h2>Étudiants</h2>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" href="<?= base_url('Etudiants') ?>">Consulter les étudiants</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Etudiants/ajouter') ?>">Ajouter un étudiant</a>
        </li>
    </ul>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Numéro étudiant</th>
                <th scope="col">Intitulé du diplome</th>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">E-mail</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($aEtudiants as $oEtudiant) {
                ?>
                <tr>
                    <td><?= $oEtudiant->NUMETUDIANT ?></td>
                    <td><?= $aDiplomes[$oEtudiant->CODEDIP] ?></td>
                    <td><?= $oEtudiant->NOMET ?></td>
                    <td><?= $oEtudiant->PRENOMET ?></td>
                    <td><?= $oEtudiant->EMAIL ?></td>
                    <td>
                        <a href="<?= base_url('Etudiants/editer/' . $oEtudiant->NUMETUDIANT) ?>">
                            <span class="oi oi-pencil"></span>
                        </a>
                        <a href="<?= base_url('Etudiants/supprimer/' . $oEtudiant->NUMETUDIANT) ?>">
                            <span class="oi oi-trash"></span>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <?= $pagination ?>
</section>

