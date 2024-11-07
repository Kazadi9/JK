<?php
// Code PHP de connexion et authentification inchangé
session_start();
include '../app/db.conn.php'; 

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT name, username, p_p FROM users WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$user_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        $user = [
            'name' => 'Utilisateur Inconnu',
            'username' => 'inconnu',
            'p_p' => 'img/default.jpg'
        ];
    }
} else {
    echo "Erreur : Utilisateur non authentifié.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="img/logo.png">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <input type="checkbox" id="checkbox">
    <header class="header">
        <h2 class="u-name">Admin <b> FAG</b>
            <label for="checkbox">
                <i id="navbtn" class="fa fa-bars" aria-hidden="true"></i>
            </label>
        </h2>
        <i class="fa fa-user" aria-hidden="true"></i>
    </header>
    <div class="body">
        <nav class="side-bar">
            <div class="user-p">
                <img src="<?php echo htmlspecialchars('../uploads/' . $user['p_p']); ?>" alt="p_p"><
    <h4><?php echo htmlspecialchars($user['name']); ?><h4><?php echo htmlspecialchars($user['username']); ?></h4>
            </div>
            <ul>
                <li>
                    <a href="../post.php">
                        <i class="fa fa-edit" aria-hidden="true"></i>
                        <span>Gestion Publication</span>
                    </a>
                </li>
                <li>
                <a href="#">
            <i class="fa fa-user" aria-hidden="true"></i>
            <span>Gestion Utilisateurs</span>
            </a>

                </li>
                <li>
                    <a href="../chat.php">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        <span>Message</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-info-circle" aria-hidden="true"></i>
                        <span>A propos</span>
                    </a>
                </li>
                
                </li>
                <li>
                    <a href="../logout.php">
                        <i class="fa fa-power-off" aria-hidden="true"></i>
                        <span>Déconnexion</span>
                    </a>
                </li>
            </ul>
        </nav>
        <section class="section-1" id="content-section">
            <h1> L'ADMINISTRATION</h1>
            <p>#FAG</p>
        </section>
    </div>

    <script>
        function loadContent(page) {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', page, true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    document.getElementById('content-section').innerHTML = xhr.responseText;
                } else {
                    console.error('Erreur de chargement : ' + xhr.status);
                }
            };
            xhr.send();
        }
    </script>
</body>
</html>
