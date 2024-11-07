<?php
// load_section.php
session_start();

if (isset($_POST['section'])) {
    $section = $_POST['section'];
    
    // Charger le contenu en fonction de la section
    switch ($section) {
        case 'dashboard':
            echo '<h2>Dashboard</h2><p>Contenu du tableau de bord ici.</p>';
            break;
        case 'message':
            echo '<h2>Messages</h2><p>Voici vos messages.</p>';
            break;
        case 'comment':
            echo '<h2>Commentaires</h2><p>Liste des commentaires.</p>';
            break;
        case 'about':
            echo '<h2>À propos</h2><p>Informations sur FAG Ministries.</p>';
            break;
        case 'settings':
            echo '<h2>Paramètres</h2><p>Paramètres du compte ici.</p>';
            break;
        default:
            echo '<p>Section non trouvée.</p>';
            break;
    }
} else {
    echo '<p>Erreur: Section non spécifiée.</p>';
}
