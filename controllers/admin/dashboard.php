<?php
$db = new Database();
$total_users = User::count($db);
$total_courses = Course::count($db);
$total_revenue = Course::totalRevenue($db);
$total_enrollments = Enrollment::count($db);

$unvalidated_teachers = Teacher::getUnvalidatedTeachers($db);


require_once('views/admin/dashboard.php');