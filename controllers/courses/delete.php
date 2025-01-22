<?php
if (!isset($_SESSION['role']) || ($_SESSION['role'] != 'teacher' && $_SESSION['role'] != 'admin')) {
    header('Location: /login');
}

if(isset($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);
    $db = new Database();
    Course::delete($db, $id);
    header('Location: /courses/dashboard');
}