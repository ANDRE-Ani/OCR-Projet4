<!-- Page admin de gestion des commentaires -->

<?php $titre = 'Gérer les commentaires'; ?>

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
        <th>Commentaire</th>
        <th>Valider</th>
        <th>Supprimer</th>
</tr>

<tr>
<?php
        while ($coms = $comments->fetch()) {
            ?>

        <td><?php echo nl2br(htmlspecialchars($coms['id'])); ?></td>
        <td><?php echo nl2br(htmlspecialchars($coms['post_id'])); ?></td>
        <td><?php echo htmlspecialchars($coms['author']); ?></td>
        <td><?php echo htmlspecialchars($coms['comment_date']); ?></td>
        <td><?php echo htmlspecialchars($coms['comment']); ?></td>
        <td><a href="#">Valider</a></td>
        <td><a href="#">Supprimer</a></td>
   </tr>     

        <?php
        }
        $comments->closeCursor();
        ?>

    </table>

      </div>

<?php $contenu = ob_get_clean(); ?>

<?php require './templates/templateBack.php'; ?>
