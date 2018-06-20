<!-- Page de connection à l'admin -->

<?php $titre = 'Connection'; ?>

<?php ob_start(); ?>

<div class="connecter">
<div class="formulaireAdmin">

<!-- Formulaire de connexion à l'administration -->
<p>Veuillez entrer vos identifiants pour vous connecter à l'administartion du blog :</p>

        <form action="view/connectionView.php" method="post">
            <p>
              <input type="text" name="pseudo" />
            <input type="password" name="pass" />
            <input type="submit" value="Valider" />
            </p>
        </form>
</div>
</div>

<?php
$pseudo=$_POST['pseudo'];
$pass=$_POST['pass'];

  if (($pseudo == 'ecrivain') && ($pass == 'motdepasse'))
    {
        header('Location: /?action=administration');
        exit;
      }
      else
        {
          echo "Erreur d'identifiant";
        }
?>

<?php $contenu = ob_get_clean(); ?>

<?php require 'templates/templateFront.php'; ?>