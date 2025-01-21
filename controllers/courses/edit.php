<?php

if (!isset($_GET['id'])) {
    header('Location: /courses/dashboard');
    exit();
}

$courseId = $_GET['id'];
$db = new Database();
$course = Course::getDetails($db, $courseId);
$tag_ids = explode(',', $course['tag_ids']);  
$courseTags = $course['tags'] ? explode(',', $course['tags']) : [];

if (!$course) {
    header('Location: /courses/dashboard');
    exit();
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $courseId;
    $title = $_POST['title'];
    $description = $_POST['description'];
    $instructorId = $_SESSION['user_id'];
    $categoryId = $_POST['category_id'];
    $contentType = $_POST['content_type'];
    $contentUrl = $_POST['content_url'];
    $durationMinutes = $_POST['duration_minutes'];
    $price = $_POST['price'];
    $isActive = true;
    
    $course = new Course(
        $title,
        $description,
        $instructorId,
        $categoryId,
        $contentType,
        $contentUrl,
        $durationMinutes,
        $price,
        $isActive
    );

// edit tags
        if ($course->update($db, $courseId)) {
            if (isset($_POST['tags']) && is_array($_POST['tags'])) {
                // Delete course tags
                $db->query("DELETE FROM course_tags WHERE course_id = ?", [$courseId]);
                
                // Insert new course tags
                foreach ($_POST['tags'] as $tagId) {
                    $db->query(
                        "INSERT INTO course_tags (course_id, tag_id) VALUES (?, ?)",
                        [$courseId, $tagId]
                    );
                }
            }
            
            header("Location: /course?id=" . $courseId);
            exit();
        } else {
            throw new Exception("Failed to update course");
        }
}

require_once('views/courses/edit.php');
