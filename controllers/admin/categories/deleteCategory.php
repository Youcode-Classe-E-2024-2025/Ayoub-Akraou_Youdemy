<?php
if(!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: /courses');
    exit();
}

$id = $_GET['id'] ?? '';

if (empty($id)) {
    header('Location: /admin/categories');
    exit();
}

$db = new Database();
Admin::deleteCategory($db, $id);

header('Location: /admin/categories');
exit();
