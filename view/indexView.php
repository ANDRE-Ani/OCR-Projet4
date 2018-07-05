<!-- Page d'accueil du blog -->

<?php session_start();?>

<?php $cookie_name = "visitor";
$addr = $_SERVER['REMOTE_ADDR'];
$nav = $_SERVER['HTTP_USER_AGENT'];
$cookie_value = 'Utilisateur anonyme ' . ' I.P. ' . $addr . ' Navigateur ' . $nav;
setcookie($cookie_name, $cookie_value, time() + 3600, "/", null, false, true);
?>

<?php $titre = 'Le blog de l\'écrivain';?>

<?php ob_start();?>

       <?php
while ($data = $posts->fetch()) {
    ?>

      <!-- Récupération des articles -->

      <h2><?php echo htmlspecialchars($data['titre']); ?></h2>
        <p><img src="../images/author.png" alt="author"> : <?php echo nl2br(htmlspecialchars($data['auteur'])); ?>
        <img src="../images/date.png" alt="date"> : <?php echo htmlspecialchars($data['post_date']); ?></p>

        <?php $description = ($data['contenu']);

    if (strlen($description) >= 40) {
        $description = substr($description, 0, 40);
        $espace = strrpos($description, ' ');
        $description = substr($description, 0, $espace) . " (...)";
        echo $description;
    } else {
        echo $description;
    }
    ?>

        <p><a href="index.php?action=post&amp;id=<?php echo $data['id']; ?>">Lire l'article</a></p>
        <p><a href="index.php?action=post&amp;id=<?php echo $data['id']; ?>">Voir les commentaires</a></p>
        <p><a href="index.php?action=viewWriteCom&amp;id=<?php echo $data['id']; ?>">Publier un commentaire</a></p>

        <hr>

    <?php
}
$posts->closeCursor();
?>

<?php $contenu = ob_get_clean();?>

<?php require 'templates/templateFront.php';?>
