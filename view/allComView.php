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

<?php $titre = SITE_NAME . ' - Administration - Gérer les commentaires'; ?>

<?php ob_start(); ?>

<div id="list">
        <h2>Liste des commentaires</h2>

        <!-- Récupération des informations des commentairess -->

<table>
      <tr>
        <th>ID</th>
        <th>Post ID</th>
        <th>Auteur</th>
        <th>Date</th>
        <th>Statut</th>
        <th>Editer</th>
        <th>Supprimer</th>
</tr>

<tr>
<?php
        while ($coms = $comments->fetch()) {
            ?>

        <?php list($date, $time) = explode(" ", $coms['comment_date']); ?>
        <?php list($year, $month, $day) = explode("-", $date); ?>
        <?php list($hour, $min, $sec) = explode(":", $time); ?>
        

        <td><?php echo nl2br(htmlspecialchars($coms['id'])); ?></td>
        <td><?php echo nl2br(htmlspecialchars($coms['post_id'])); ?></td>
        <td><?php echo htmlspecialchars($coms['author']); ?></td>
        <td><?php echo $coms['comment_date'] = "$day/$month/$year" . " - " . "$time"; ?></td>
        
        <td <?php if(($coms['statut']) == 'signale'): ?> style="color: red;" <?php endif; ?>>
        <?php echo htmlspecialchars($coms['statut']); ?>
        </td>
        
        <td><a href="../index.php?action=viewEditCom&amp;id=<?php echo $coms['id']; ?>">Editer</a></td>
        <td><a href="../index.php?action=deleteCom&amp;id=<?php echo $coms['id']; ?>">Supprimer</a></td>
   </tr>     

        <?php
        }
        $comments->closeCursor();
        ?>

    </table>

      </div>

<?php $contenu = ob_get_clean(); ?>

<?php require 'templates/templateBack.php'; ?>
