<?php
if(!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: /courses');
    exit();
}

$db = new Database();
$tags = Admin::getAllTags($db);

require_once('views/admin/manageTags.php');
?>