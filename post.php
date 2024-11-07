<?php
include 'app/db.conn.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "Erreur : Utilisateur non authentifié.";
    exit;
}

$user_id = $_SESSION['user_id'];
// Récupérer les publications avec les commentaires et likes
$sql = "
    SELECT p.id AS post_id, p.content, p.created_at, u.name, u.username, u.p_p, COUNT(l.post_id) AS likes
    FROM posts p
    JOIN users u ON p.user_id = u.user_id
    LEFT JOIN likes l ON p.id = l.post_id
    GROUP BY p.id
    ORDER BY p.created_at DESC";

$stmt = $conn->prepare($sql);
$stmt->execute();
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<link rel="stylesheet" href="styles.css">


<div class="container">
    <!-- Formulaire de publication -->
    <div class="post-form">
        <textarea class="post-input" placeholder="Qu'avez-vous en tête ?"></textarea>
        <div class="post-actions">
            <button class="upload-btn">📷 Photo</button>
            <button class="upload-btn">🎥 Vidéo</button>
            <button class="upload-btn" id="publish-btn" style="margin-left: auto;">Publier</button>
        </div>
    </div>

    <!-- Affichage des publications -->
    <div class="post-feed">
        <?php foreach ($posts as $post): ?>
            <div class="post">
                <div class="post-header">
                    <img src="uploads/<?= htmlspecialchars($post['p_p']); ?>" alt="Photo de profil" class="post-avatar">
                    <div class="post-info">
                        <strong><?= htmlspecialchars($post['name']); ?></strong>
                        <div><?= htmlspecialchars($post['created_at']); ?></div>
                    </div>
                </div>
                <div class="post-content">
                    <?= htmlspecialchars($post['content']); ?>
                </div>
                
                <div class="post-actions-bottom">
                    <button class="action-btn like-btn" data-post-id="<?= $post['post_id']; ?>">❤️ J'aime (<?= $post['likes']; ?>)</button>
                    <button class="action-btn comment-btn" data-post-id="<?= $post['post_id']; ?>">💬 Commenter</button>
                </div>
                
                <!-- Section des commentaires -->
                <div class="comments-section">
                    <?php
                    $comment_sql = "
                        SELECT c.content, u.name, u.username
                        FROM comments c
                        JOIN users u ON c.user_id = u.id
                        WHERE c.post_id = ?
                        ORDER BY c.created_at ASC";
                    
                    $comment_stmt = $conn->prepare($comment_sql);
                    $comment_stmt->execute([$post['post_id']]);
                    $comments = $comment_stmt->fetchAll(PDO::FETCH_ASSOC);
                    
                    foreach ($comments as $comment): ?>
                        <div class="comment">
                            <strong><?= htmlspecialchars($comment['name']); ?></strong>
                            <?= htmlspecialchars($comment['content']); ?>
                        </div>
                    <?php endforeach; ?>
                    
                    <!-- Formulaire pour ajouter un commentaire -->
                    <form class="comment-form" data-post-id="<?= $post['post_id']; ?>">
                        <input type="text" class="comment-input" placeholder="Écrire un commentaire...">
                        <button type="submit" class="submit-comment">Envoyer</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
    
    // Fonction pour publier le post via AJAX
    function publishPost() {
        const content = document.getElementById('post-content').value.trim();
        
        if (!content) {
            alert("Veuillez écrire quelque chose avant de publier.");
            return;
        }

        const xhr = new XMLHttpRequest();
        xhr.open("POST", "publish.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Traitement de la réponse
                if (xhr.responseText === 'success') {
                    alert("Votre publication a été publiée avec succès !");
                    document.getElementById('post-content').value = ''; // Réinitialiser le champ
                    // Optionnel : ajouter le nouveau post en haut de la liste des publications
                } else {
                    alert("Erreur lors de la publication. Veuillez réessayer.");
                }
            }
        };

        xhr.send("content=" + encodeURIComponent(content));
    }

    function uploadPhoto() {
        // Logique pour le téléchargement de photos
        alert("Fonctionnalité de téléchargement de photo en cours de développement.");
    }

    function uploadVideo() {
        // Logique pour le téléchargement de vidéos
        alert("Fonctionnalité de téléchargement de vidéo en cours de développement.");
    }
    
    document.addEventListener('DOMContentLoaded', function () {
        // Bouton Publier
        document.getElementById('publish-btn').addEventListener('click', function() {
            let content = document.querySelector('.post-input').value.trim();
            if (content) {
                // Requête AJAX pour publier
            }
        });

        // Gestion des likes
        document.querySelectorAll('.like-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                let postId = this.dataset.postId;
                // Requête AJAX pour ajouter un like
            });
        });

        // Gestion des commentaires
        document.querySelectorAll('.comment-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                let postId = this.dataset.postId;
                let comment = this.querySelector('.comment-input').value.trim();
                if (comment) {
                    // Requête AJAX pour ajouter un commentaire
                }
            });
        });
    });
</script>
