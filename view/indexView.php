<!-- Page d'accueil du blog -->

<?php session_start();?>

<?php 
    $cookie_name = "visitor";
    $visitor = session_id().microtime().rand(0,9999999999);
    $visitor = hash('sha512', $visitor);
    setcookie($cookie_name, $visitor, time() + (60 * 20), "/", "p4ocr.andre-ani.fr", true, true);
    $_SESSION['visitor'] = $visitor;
    ?>

<?php $titre = 'Le blog de l\'écrivain';?>

<?php ob_start();?>

       <?php
while ($data = $posts->fetch()) {
    ?>

      <!-- Récupération des articles -->

      <p><h2><?php echo htmlspecialchars($data['titre']); ?></h2></p>
      <div class="author">
        <p><img src="../images/author.png" alt="author"> : <?php echo nl2br(htmlspecialchars($data['auteur'])); ?>

        <?php list($date, $time) = explode(" ", $data['post_date']);?>
        <?php list($year, $month, $day) = explode("-", $date);?>
        <?php list($hour, $min, $sec) = explode(":", $time);?>


        <img src="../images/date.png" alt="date"> : <?php echo $data['post_date'] = " Le " . "$day/$month/$year" . " - " . "$time"; ?></p>
    </div>

        <?php $description = ($data['contenu']);

    $lg_max = 95;
    $article = $description;
    $description = strip_tags($description);
    if (strlen($description) > $lg_max) {
        $description = substr($description, 0, $lg_max);
        $last_space = strrpos($description, " ");
        $description = substr($description, 0, $last_space) . "...";
        echo $description;
    } else {
        echo $article;
    }
    ?>
        <p><a href="index.php?action=post&amp;id=<?php echo $data['id']; ?>">Lire l'article</a> -
        <a href="index.php?action=post&amp;id=<?php echo $data['id']; ?>">Voir les commentaires</a> -
        <a href="index.php?action=viewWriteCom&amp;id=<?php echo $data['id']; ?>">Publier un commentaire</a></p>

        <hr>

    <?php
}
$posts->closeCursor();
?>

<?php $contenu = ob_get_clean();?>

<?php require 'templates/templateFront.php';?>
