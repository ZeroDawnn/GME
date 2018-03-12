<section class="container">

    <h1>Diplomes</h1>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" href="<?= base_url('Diplomes') ?>">Consulter les diplomes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Ajouter') ?>">Ajouter un diplome</a>
        </li>
    </ul>
    <h2>Consulter les diplomes</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Code Diplome</th>
                <th scope="col">Code Université</th>
                <th scope="col">Intitulé</th>
                <th scope="col">Adresse Web</th>
                <th scope="col">Niveau</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($aDiplomes as $oDiplome) {
                ?>
                <tr>
                    <td><?= $oDiplome->CODEDIP ?></td>
                    <td><?= $aUniversites[$oDiplome->CODEU] ?></td>
                    <td><?= $oDiplome->INTITULEDIP ?></td>
                    <td><?= $oDiplome->ADRESSEWEBD ?></td>
                    <td><?= $oDiplome->NIVEAU ?></td>
                    <td>
                        <a href="<?= base_url('Diplomes/editer/' . $oDiplome->CODEDIP) ?>">
                            <span class="oi oi-pencil"></span>
                        </a>
                        <a href="<?= base_url('Diplomes/supprimer/' . $oDiplome->CODEDIP) ?>">
                            <span class="oi oi-trash"></span>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</section>

