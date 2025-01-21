<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);

    // Validation du nom
    if (!Validator::email($email)) {
        $error = "L'adresse email n'est pas valide.";
    } else {
        // Check if user exists
        $db = new Database();
        $user = User::login($db, $email, $password);
        if ($user) {
            // Successful login
            $roles = [1 => "admin", 2 => "teacher", 3 => "student"];
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $roles[$user['role_id']];
            $_SESSION['user'] = $user;
            if ($_SESSION['role'] == 'student') {
                header('Location: /courses');
            }
            if ($_SESSION['role'] == 'teacher') {
                header('Location: /');
            }
            if ($_SESSION['role'] == 'admin') {
                header('Location: /');
            }
          
            exit();
        } else {
            $error = "Email ou mot de passe incorrect.";
        }
    }
}

require_once('views/auth/login.php');
