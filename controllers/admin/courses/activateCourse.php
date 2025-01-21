<?php
if(!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: /courses');
    exit();
}

if(isset($_GET['id'])) {
    $course_id = htmlspecialchars($_GET['id']);
    $db = new Database();
    Admin::activateCourse($db, $course_id);
    header('Location: /admin/courses');
}
