<?php
if(!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: /courses');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tagsText = $_POST['tags'] ?? '';
    
    if (empty($tagsText)) {
        $_SESSION['error'] = "No tags provided";
        header('Location: /admin/tags');
        exit();
    }

    // Convertir le texte en tableau de tags
    $tags = array_map('trim', explode(",", $tagsText));
    $tags = array_filter($tags); // Supprimer les entrées vides

    $db = new Database();
    if (Admin::addTags($db, $tags)) {
        $_SESSION['success'] = "Tags added successfully";
    } else {
        $_SESSION['error'] = "Failed to add some tags";
    }
}

header('Location: /admin/tags');
exit();
