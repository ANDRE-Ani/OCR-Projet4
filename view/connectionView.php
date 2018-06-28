<!-- Page de connexion à l'admin -->

<?php $titre = SITE_NAME . ' - Connexion à l\'administration'; ?>

<?php ob_start(); ?>

<div class="connecter">
<div class="formulaireAdmin">

<!-- Formulaire de connexion à l'administration -->
<p>Veuillez entrer vos identifiants pour vous connecter à l'administartion du blog :</p>

        <form action="index.php?action=logAdminF" method="post">
            <p>
              <input type="text" name="user" required />
            <input type="password" name="pass" required />
            <input type="submit" value="Valider" />
            </p>
        </form>
</div>
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require 'templates/templateFront.php'; ?>