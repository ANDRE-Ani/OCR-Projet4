<?php

require('modelAdmin.php');

$list = listPosts();
$wrt = writePosts();

require('viewAdmin.php');

?>
