<?php

require('controler/controlerFront.php');
require('controler/controlerBack.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listPosts') {
        listPosts();

    } elseif ($_GET['action'] == 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            post();
        } else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }

    } elseif ($_GET['action'] == 'writePostA') {
<<<<<<< HEAD
        if (!empty($_POST['author']) && !empty($_POST['comment'])) {
            writePostA($_GET['titre'], $_POST['auteur'], $_POST['contenu']);
        } else {
            echo 'Erreur : tous les champs ne sont pas remplis !';
        }
    }


    elseif ($_GET['action'] == 'writePostBack') {
        writePostAdmin();
    }

    elseif ($_GET['action'] == 'editPosts') {
        modifyPostView();
    }

    elseif ($_GET['action'] == 'connection') {
        connectionAdmin();
    }


=======
        if (!empty($_POST['titre']) && !empty($_POST['auteur']) && !empty($_POST['contenu'])) {
            writePostA($_GET['titre'], $_GET['auteur'], $_GET['contenu']);
        } else {
            echo 'Erreur : tous les champs ne sont pas remplis';
        }
    }
    
>>>>>>> 18d5166f7f07009b2874e7d920c2fe2bf426caee
} else {
    listPosts();
}
