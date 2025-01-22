<?php
if(!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: /courses');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tagsText = $_POST['tags'] ?? '';
    $tags = array_map('trim', explode(",", $tagsText));
    $tags = array_filter($tags); 
    $db = new Database();
    Admin::addTags($db, $tags);
}

header('Location: /admin/tags');
exit();
