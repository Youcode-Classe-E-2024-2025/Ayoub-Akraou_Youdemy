<?php
$student_id = $_SESSION['user_id'];
if(!isset($student_id)) header('Location: /login');
$db = new Database();
$courses = Student::getCourses($db, $student_id);
require_once('views/student/myLearning.php'); ?>