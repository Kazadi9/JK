<?php 
  session_start();

  if (!isset($_SESSION['username'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Chat App - Sign Up</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">
	<link rel="icon" href="img/logo.png">
    <!-- IntTelInput CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css">
	<style>
		.bg-custom {
			background-color: #ebf6f7;
			padding: 40px;
			border-radius: 10px;
		}
	</style>
</head>
<body class="d-flex justify-content-center align-items-center vh-100" style="background-color: #cae2c1">
	<div class="container w-75 p-5 shadow rounded bg-custom">
	 	<form method="post" action="app/http/signup.php" enctype="multipart/form-data">
	 		<div class="text-center mb-4">
	 			<img src="img/logo.png" class="w-10">
	 			<h3 class="display-4 fs-1">Inscription FAG</h3>   
	 		</div>

	 		<?php if (isset($_GET['error'])) { ?>
	 			<div class="alert alert-warning" role="alert">
				  	<?php echo htmlspecialchars($_GET['error']);?>
				</div>
			<?php } ?>

            <div class="row">
                <!-- Left Column -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Prénom</label>
                        <input type="text" name="name" value="<?= isset($_GET['name']) ? $_GET['name'] : '' ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nom de famille</label>
                        <input type="text" name="username" value="<?= isset($_GET['username']) ? $_GET['username'] : '' ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Numéro de téléphone</label>
                        <input type="tel" id="phone" name="phone" placeholder="Entrez votre numéro de téléphone" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Sexe</label><br>
                        <input type="radio" name="sexe" value="M" required> Homme
                        <input type="radio" name="sexe" value="F" required> Femme
                    </div>
                </div>

                <!-- Right Column -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Fonction</label>
                        <select class="form-control" name="fonction" required>
                            <option value="pasteur">Pasteur</option>
                            <option value="chantre">Chantre</option>
                            <option value="protocole">Protocole</option>
                            <option value="intercesseur">Intercesseur</option>
                            <option value="moniteur">Moniteur</option>
                            <option value="modérateur">Modérateur</option>
                            <option value="prédicateur">Prédicateur</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mot de Passe</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Photo de profil</label>
                        <input type="file" name="pp" class="form-control">
                    </div>
                </div>
            </div>

            <!-- Submit button -->
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary">S'inscrire</button>
                <a href="index.php" class="btn btn-secondary">Se Connecter</a>
            </div>
	 	</form>
	</div>

    <!-- IntTelInput JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <script>
        const phoneInputField = document.querySelector("#phone");
        const phoneInput = window.intlTelInput(phoneInputField, {
            initialCountry: "cd", // Initialisez ici avec le code pays souhaité
            preferredCountries: ["cd", "fr", "us", "ca"],
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        });
    </script>
</body>
</html>

<?php
  } else {
  	header("Location: home.php");
   	exit;
  }
?>
