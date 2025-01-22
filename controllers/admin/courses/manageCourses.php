<?php
if(!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: /courses');
    exit();
}

$db = new Database();
$courses = Admin::getCourses($db);

require_once('views/admin/manageCourses.php');
?>