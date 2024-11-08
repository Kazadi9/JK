<?php
// load_section.php
session_start();

if (isset($_POST['section'])) {
    $section = $_POST['section'];
    
    // Charger le contenu en fonction de la section
    switch ($section) {
        case 'Publication':
            echo '<h2>Publication</h2><p>Contenu mise en ligne ici.</p>';
            break;
        case 'message':
            echo '<h2>Messages</h2><p>Voici vos messages.</p>';
            break;
        case 'A propos':
            echo '<h2>Appropos</h2><p>FAMILLE GUERISONS DE NATIONS</p>;
            break;
    }
} else {
    echo '<p>Erreur: Section non spécifiée.</p>';
}
