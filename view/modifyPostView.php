<!-- Page admin de gestion des articles -->

<?php $titre = 'Gérer les articles'; ?>

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
        <th>Modifier</th>
        <th>Supprimer</th>
</tr>

<tr>
<?php
        while ($data = $posts->fetch()) {
            ?>

        <td><?php echo nl2br(htmlspecialchars($data['id'])); ?></td>
        <td><?php echo htmlspecialchars($data['titre']); ?></td>
        <td><?php echo htmlspecialchars($data['auteur']); ?></td>
        <td><?php echo htmlspecialchars($data['date']); ?></td>
        <td><a href="#">Modifier</a></td>
        <td><a href="../index.php?action=deletePost&amp;id=<?php echo $data['id']; ?>">Supprimer</a></td>
   </tr>     

        <?php
        }
        $posts->closeCursor();
        ?>

    </table>

      </div>

<?php $contenu = ob_get_clean(); ?>

<?php require './templates/templateBack.php'; ?>
