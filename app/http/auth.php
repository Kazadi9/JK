<?php 
session_start();

if (isset($_POST['phone']) && isset($_POST['password'])) {
    # Database connection file
    include '../db.conn.php';
   
    # Get data from POST request and store them in variables
    $phone = $_POST['phone'];
    $password = $_POST['password'];
   
    # Simple form validation
    if (empty($phone)) {
        $em = "Numéro de téléphone requis";
        header("Location: ../../index.php?error=$em");
        exit;
    } else if (empty($password)) {
        $em = "Mot de passe requis";
        header("Location: ../../index.php?error=$em");
        exit;
    } else {
        # SQL query to check if the phone exists in the database
        $sql = "SELECT * FROM users WHERE phone=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$phone]);

        # If the phone exists
        if ($stmt->rowCount() === 1) {
            $user = $stmt->fetch();
            if (password_verify($password, $user['password'])) {
                # Successful login
                $_SESSION['username'] = $user['username'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['user_id'] = $user['user_id'];

                # Redirect to home page
                header("Location: ../../dashboard/index.php");
                exit;
            } else {
                $em = "Numéro ou mot de passe incorrect";
                header("Location: ../../index.php?error=$em");
                exit;
            }
        } else {
            $em = "Numéro ou mot de passe incorrect";
            header("Location: ../../index.php?error=$em");
            exit;
        }
    }
} else {
    header("Location: ../../index.php");
    exit;
}
