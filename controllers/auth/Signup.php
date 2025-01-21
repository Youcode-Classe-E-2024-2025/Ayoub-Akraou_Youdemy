
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $role = htmlspecialchars($_POST["role"]);
    $password = htmlspecialchars($_POST["password"]);
    $confirm_password = htmlspecialchars($_POST["confirm_password"]);

    // Validation du nom
    if (!Validator::fullname($name)) {
        $error = "Le nom doit contenir un prénom et un nom.";
    } elseif (!Validator::email($email)) {
        $error = "L'adresse email n'est pas valide.";
    }

    // Validation du mot de passe
    elseif (!Validator::strongPassword($password)) {
        $error = "Le mot de passe doit contenir au moins 8 caractères, une lettre et un chiffre.";
    }

    // Vérification de la correspondance des mots de passe
    elseif ($password !== $confirm_password) {
        $error = "Les mots de passe ne correspondent pas.";
    }
    // Si aucune erreur, procéder à l'enregistrement
    else {
        $newUser = new User($name, $email, password_hash($password, PASSWORD_DEFAULT), $role);
        $db = new Database();
        $newUser->register($db);
        header('Location: /login');
        exit;
    }
}

require_once('views/auth/signup.php');
?>