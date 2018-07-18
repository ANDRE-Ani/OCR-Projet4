<?php session_start();
$cookie_name = "admin";
$admin = session_id() . microtime() . rand(0, 9999999999);
$admin = hash('sha512', $admin);
setcookie($cookie_name, $admin, time() + (60 * 20), "/", "p4ocr.andre-ani.fr", true, true);
$_SESSION['admin'] = $admin;
?>

<?php $titre = 'Le blog de l\'écrivain';?>

<?php ob_start();?>

<?php
while ($data = $posts->fetch()) {
    ?>

      <!-- Récupération des articles -->

    <div class="post">
      <h2><?php echo htmlspecialchars($data['titre']); ?></h2>
      <div class="author">

        <?php list($date, $time) = explode(" ", $data['post_date']);?>
        <?php list($year, $month, $day) = explode("-", $date);?>
        <?php list($hour, $min, $sec) = explode(":", $time);?>

        <img src="../images/author.png" alt="author"> <?php echo nl2br(htmlspecialchars($data['auteur'])); ?> <img src="../images/date.png" alt="date"> <?php echo $data['post_date'] = " Le " . "$day/$month/$year" . " - " . "$time"; ?>

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

        <p><a href="index.php?action=post&amp;id=<?php echo $data['id']; ?>">Lire l'article et ses commentaires</a> -
        <a href="index.php?action=viewWriteCom&amp;id=<?php echo $data['id']; ?>">Publier un commentaire</a></p>

    </div>


    <?php
}
$posts->closeCursor();
?>

<?php $contenu = ob_get_clean();?>

<?php require 'templates/templateFront.php';?>
