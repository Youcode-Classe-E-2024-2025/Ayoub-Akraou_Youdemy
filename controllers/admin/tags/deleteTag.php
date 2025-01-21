<?php
if(!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: /courses');
    exit();
}

$id = $_GET['id'] ?? '';

if (empty($id)) {
    $_SESSION['error'] = "Tag ID is required";
    header('Location: /admin/tags');
    exit();
}

$db = new Database();
if (Admin::deleteTag($db, $id)) {
    $_SESSION['success'] = "Tag deleted successfully";
} else {
    $_SESSION['error'] = "Failed to delete tag";
}

header('Location: /admin/tags');
exit();
