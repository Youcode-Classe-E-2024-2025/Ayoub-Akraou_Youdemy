<?php
if(!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: /courses');
    exit();
}

$db = new Database();
$courses = Admin::getAllCourses($db);

require_once('views/admin/manageCourses.php');
?>