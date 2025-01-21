<?php
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: /courses');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $description = $_POST['description'] ?? '';

    if (empty($name)) {
        header('Location: /admin/categories');
        exit();
    }

    $db = new Database();
    Admin::addCategory($db, $name, $description);
}

header('Location: /admin/categories');
exit();
