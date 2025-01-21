<?php
if(!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: /courses');
    exit();
}

$db = new Database();
$categories = Admin::getAllCategories($db);

require_once('views/admin/manageCategories.php');
