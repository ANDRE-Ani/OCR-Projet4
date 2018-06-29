<!-- Page de creation de compte -->

<?php $titre = SITE_NAME . ' - Création de compte'; ?>

<?php ob_start(); ?>

<div class="connecter">
<div class="formulaireCreation">

<!-- Formulaire de création de compte -->
<p>Veuillez créer un identifiant et un mot de passe pour votre compte :</p>

        <form action="index.php?action=createUser" method="post">
            <p>Identifiant : <input type="text" name="user" required /></p>
            <p>Mot de passe : <input type="password" name="pass" required /></p>
            <p>Retapper le<br>mot de passe : <input type="password" name="pass2" required /></p>
            <p><input type="submit" value="Valider" /></p>
        </form>
</div>
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require 'templates/templateUser.php'; ?>