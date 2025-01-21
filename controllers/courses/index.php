<?php
// implementer l'affichage des cours avec pagination
$courseInstance = new Course();
$db = new Database();
$total = $courseInstance->getTotalCourses($db);
$limit = 3;
$n_pages = ceil($total / $limit);
$page = isset($_GET['page']) ? htmlspecialchars($_GET['page']) : 1;
$offset = ($page - 1) * $limit;
$courses = $courseInstance->getPaginatedCourses($db, $limit, $offset);

// implementer la fonctionnalite de recherche avec mot cle
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $keyword = htmlspecialchars($_POST['search']);
    $courses = Course::search($db, $keyword);
    $hidePagination = true;
}
?>
<?php require("views/courses/courses.php"); ?>
