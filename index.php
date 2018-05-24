<?php

require('model.php');

$posts = getPosts();
$data = getPost($_GET["id"]);

require('indexView.php');
require('postView.php');
