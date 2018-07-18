<?php session_start();

if (isset($_COOKIE['admin']) && !empty($_COOKIE['admin']) && 
    (isset($_SESSION['admin']) && !empty($_SESSION['admin']))) 
{
    $admin = session_id().microtime().rand(0,9999999999);
    $admin = hash('sha512', $ticket);
    $_COOKIE['admin'] = $admin;
    $_SESSION['admin'] = $admin;
}
else
{
    $_SESSION = array();
    session_destroy();
    header('Location: index.php?action=listPosts');
}
?>

<?php $titre = SITE_NAME . ' - Administration - Gérer les articles'; ?>

<?php ob_start(); ?>

<div id="list">
        <h2>Liste des articles</h2>

        <!-- Récupération des informations des articles -->

<table>
      <tr>
        <th>ID</th>
        <th>Titre</th>
        <th>Auteur</th>
        <th>Date</th>
        <th>Editer</th>
        <th>Supprimer</th>
</tr>

<tr>
        <?php
        while ($data = $posts->fetch()) {
            ?>

        <?php list($date, $time) = explode(" ", $data['post_date']); ?>
        <?php list($year, $month, $day) = explode("-", $date); ?>
        <?php list($hour, $min, $sec) = explode(":", $time); ?>


        <td><?php echo nl2br(htmlspecialchars($data['id'])); ?></td>
        <td><?php echo htmlspecialchars($data['titre']); ?></td>
        <td><?php echo htmlspecialchars($data['auteur']); ?></td>
        <td><?php echo $data['post_date'] = "$day/$month/$year" . " - " . "$time"; ?></td>
        <td><a href="../index.php?action=viewEditPost&amp;id=<?php echo $data['id']; ?>">Editer</a></td>
        <td><a href="../index.php?action=deletePost&amp;id=<?php echo $data['id']; ?>">Supprimer</a></td>
   </tr>     

        <?php
        }
        $posts->closeCursor();
        ?>

    </table>

      </div>

<?php $contenu = ob_get_clean(); ?>

<?php require 'templates/templateBack.php'; ?>
