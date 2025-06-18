<!-- ----- début viewListeCreneauxAjoutes -->
<?php require($root . '/app/view/fragment/fragmentProjetHeader.html'); ?>
<body>
    <div class="container">
        <?php include $root . '/app/view/fragment/fragmentProjetMenu.php'; ?>
        <?php include $root . '/app/view/fragment/fragmentProjetJumbotron.html'; ?>
    </div>

    <div class="container mt-3 p-5">
        <?php if ($result['status'] === 'ok') : ?>
            <div class="alert alert-success">
                <?= $result['added'] ?> créneau(x) ajouté(s) avec succès !
            </div>
        <?php else : ?>
            <div class="alert alert-danger">
                Erreur : <?= $result['message'] ?? 'Échec de l’ajout des créneaux.' ?>
            </div>
        <?php endif; ?>
    </div>

    <?php include $root . '/app/view/fragment/fragmentProjetFooter.html'; ?>
    <!-- ----- fin viewListeCreneauxAjoutes -->
