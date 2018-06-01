<!-- Page admin de gestion des articles -->

<?php $titre = 'Gérer les articles'; ?>

<?php ob_start(); ?>

<div id="list">
        <h2>Liste des articles</h2>

        <!-- Récupération des informations des articles -->
        
        <?php
        while ($data = $posts->fetch()) {
            ?>

      <table>
      <tr>
        <th>ID</th>
        <th>Titre</th>
        <th>Auteur</th>
        <th>Date</th>
        <th>Modifier</th>
        <th>Supprimer</th>
      </tr>

        <td><?php echo nl2br(htmlspecialchars($data['id'])); ?></td>
        <td><?php echo htmlspecialchars($data['titre']); ?></td>
        <td><?php echo htmlspecialchars($data['auteur']); ?></td>
        <td><?php echo htmlspecialchars($data['date']); ?></td>
        <td>Modifer</td>
        <td>Supprimer</td>
    </table>

        <?php
        }
        $posts->closeCursor();
        ?>

      </div>

<?php $contenu = ob_get_clean(); ?>

<?php require './templates/templateBack.php'; ?>
