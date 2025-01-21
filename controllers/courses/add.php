<?php
if (!isset($_SESSION['role']) || ($_SESSION['role'] != 'teacher' && $_SESSION['role'] != 'admin')) {
    header('Location: /login');
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = htmlspecialchars($_POST['title']);
    $description = htmlspecialchars($_POST['description']);
    $instructor_id = htmlspecialchars($_SESSION['user_id']);
    $category_id = htmlspecialchars($_POST['category_id']);
    $content_type = htmlspecialchars($_POST['content_type']);
    $content_url = htmlspecialchars($_POST['content_url']);
    $duration_minutes = htmlspecialchars((int)$_POST['duration_minutes']);
    $price = htmlspecialchars((float)$_POST['price']);

    $newCourse = new Course($title, $description, $instructor_id, $category_id, $content_type, $content_url, $duration_minutes, $price);
    $db = new Database();

    $newCourse->create($db);

    $courseId = $db->getLastInsertedId();
    $tags = $_POST['tags'];
    foreach ($tags as $tagId) {
        $query = "INSERT INTO course_tags (course_id, tag_id) VALUES (?, ?)";
        $db->query($query, [$courseId, $tagId]);
    }

    header('Location: /courses/dashboard');
}

require_once('views/courses/add.php');
