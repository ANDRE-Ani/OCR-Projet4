<!-- Page admin de gestion des utilisateurs -->

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

<?php $titre = SITE_NAME . ' - Administration - Gérer les utilisateurs'; ?>

<?php ob_start(); ?>

<div id="list">
        <h2>Liste des utilisateurs</h2>

        <!-- Récupération des informations des utilisateurs -->

<table>
      <tr>
        <th>ID</th>
        <th>Identifiant</th>
        <th>Mail</th>
        <th>Date de création de compte</th>
        <th>Editer</th>
        <th>Supprimer</th>
</tr>

<tr>
<?php
        while ($data = $users->fetch()) {
            ?>

        <td><?php echo nl2br(htmlspecialchars($data['id'])); ?></td>
        <td><?php echo nl2br(htmlspecialchars($data['user'])); ?></td>
        <td><?php echo htmlspecialchars($data['mail']); ?></td>
        <td><?php echo htmlspecialchars($data['dayTime']); ?></td>
        <td><a href="../index.php?action=viewEditUser&amp;id=<?php echo $data['id']; ?>">Editer</a></td>
        <td><a href="../index.php?action=deleteUser&amp;id=<?php echo $data['id']; ?>">Supprimer</a></td>
   </tr>     

        <?php
        }
        $users->closeCursor();
        ?>

    </table>

      </div>

<?php $contenu = ob_get_clean(); ?>

<?php require 'templates/templateBack.php'; ?>
