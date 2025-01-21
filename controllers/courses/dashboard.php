<?php
if (!isset($_SESSION['role']) || ($_SESSION['role'] != 'teacher' && $_SESSION['role'] != 'admin')) {
    header('Location: /login');
}

$db = new Database();
$courses = Teacher::getCourses($db, $_SESSION['user_id']);

$statistic = Teacher::getStatistic($db, $_SESSION['user_id']);

$n_total_students = $statistic['n_total_students'];
$n_courses = $statistic['n_courses'];
$total_revenue = $statistic['total_revenue'];

require_once('views/courses/dashboard.php');