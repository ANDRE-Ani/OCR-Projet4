<?php session_start();
if (isset($_COOKIE['admin']) && !empty($_COOKIE['admin']) && 
    (isset($_SESSION['admin']) && !empty($_SESSION['admin']))) 
{
    $admin = session_id().microtime().rand(0,9999999999);
    $admin = hash('sha512', $admin);
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

<?php $titre = SITE_NAME . ' - Administration'; ?>

<p>Vous pouvez gérer, à l'aide des menus à gauche, les utilisateurs, articles et commentaires du blog.</p>

<br><hr><br>

<p><h3>Informations sur le blog :</h3></p>
<ul>
<li>Nombre d'articles : <?php echo $total[0]; ?></li>
<li>Nombre de commentaires : <?php echo $totalC[0]; ?></li>
<li>Nombre d'utilisateurs : <?php echo $loginUser[0]; ?></li>
</ul>

<br><br>

<p><h3>Informations sur le serveur</h3></p>
<ul>
<li>Système d'exploitation : <?php echo php_uname(s); ?></li>
<li>Nom d'hôte : <?php echo php_uname(n); ?></li>
<li>Architecture : <?php echo php_uname(m); ?></li>
<li>Version de PHP : <?php echo phpversion(); ?></li>
<li>Mail de l'administrateur : <?php echo $_SERVER['SERVER_ADMIN'] ?></li>
<li>I.P. du serveur : <?php echo $_SERVER['SERVER_ADDR'] ?></li>
<li>Domaine : <?php echo $_SERVER['HTTP_HOST'] ?></li>
</ul>


<?php $contenu = ob_get_clean(); ?>

<?php require 'templates/templateBack.php'; ?>