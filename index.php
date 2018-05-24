<?php

require('model/model.php');

$posts = getPosts();
$data = getPost($_GET["id"]);

require('view/indexView.php');
require('view/postView.php');
