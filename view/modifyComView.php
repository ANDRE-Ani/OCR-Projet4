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
        while ($comments = $coms->fetch()) {
            ?>

        <td><?php echo nl2br(htmlspecialchars($comments['id'])); ?></td>
        <td><?php echo nl2br(htmlspecialchars($comments['post_id'])); ?></td>
        <td><?php echo htmlspecialchars($comments['author']); ?></td>
        <td><?php echo htmlspecialchars($comments['comment_date']); ?></td>
        <td><?php echo htmlspecialchars($comments['comment']); ?></td>
        <td><a href="#">Valider</a></td>
        <td><a href="#">Supprimer</a></td>
   </tr>     

        <?php
        }
        $coms->closeCursor();
        ?>

    </table>

      </div>

<?php $contenu = ob_get_clean(); ?>

<?php require './templates/templateBack.php'; ?>
