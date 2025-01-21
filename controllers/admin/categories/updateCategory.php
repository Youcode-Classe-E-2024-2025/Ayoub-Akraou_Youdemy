<?php
if(!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: /courses');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? '';
    $name = $_POST['name'] ?? '';
    $description = $_POST['description'] ?? '';

    if (empty($id) || empty($name)) {
        header('Location: /admin/categories');
        exit();
    }

    $db = new Database();
    Admin::updateCategory($db, $id, $name, $description);
        
}

header('Location: /admin/categories');
exit();
