<?php
// voir les details d'un cours besoin se connecter
if (!isset($_SESSION['user_id'])) header('Location: /login');

$id = $_GET['id'];
$db = new Database();
$course = Course::getDetails($db, $id);

// dd([
//     'controller' => 'edit.php',
//     'course' => $course,
//     'sql' => $db->getLastQuery()
// ]);
// die();
$student_id = $_SESSION['user_id'];
$course_id = $course['id'];

$enrollment = new Enrollment($student_id, $course_id);

$isEnrolled = $enrollment->isEnrolledToCourse($db);
if (!$isEnrolled && isset($_GET["action"]) && $_GET["action"] == "enroll") {
    $enrollment->create($db);
}
$isEnrolled = $enrollment->isEnrolledToCourse($db);


// pour la certificat
$course_name = $course['title'];
$student_name = $_SESSION['user']['name'];
$teacher_name = $course['instructor_name'];

require("views/courses/details.php");
require("views/components/certificate.php");