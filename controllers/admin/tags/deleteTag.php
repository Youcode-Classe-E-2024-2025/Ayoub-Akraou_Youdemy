<?php
if(!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: /courses');
    exit();
}

$id = $_GET['id'] ?? '';

$db = new Database();
Admin::deleteTag($db, $id);

header('Location: /admin/tags');
exit();
