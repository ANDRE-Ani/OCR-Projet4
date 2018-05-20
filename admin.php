<?php

require('modelAdmin.php');

$list = listPosts();
$wrt = writePosts();
$req = lireBdd();

require('viewAdmin.php');

?>
