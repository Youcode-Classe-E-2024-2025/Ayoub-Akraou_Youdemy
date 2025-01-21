<?php
require_once 'core/Router.php';
require_once 'models/models.php';
require_once 'helpers/functions.php';
require_once 'helpers/Validator.php';
require_once 'database/Database.php';
$db = new Database();
DEFINE('BASE_PATH', __DIR__);
// Créer le router
$router = new Router();

// Routes
$router->add('/', 'home');
$router->add('/login', 'auth/Login');
$router->add('/signup', 'auth/Signup');
$router->add('/logout', 'auth/Logout');
$router->add('/courses', 'courses/index');
$router->add('/course', 'courses/getDetails');
$router->add('/student/myLearning', 'student/myLearning');
$router->add('/about-us', 'about-us');
$router->add('/courses/add', 'courses/add');
$router->add('/courses/edit', 'courses/edit');
$router->add('/courses/dashboard', 'courses/dashboard');
$router->add('/courses/delete', 'courses/delete');
$router->add('/admin/dashboard', 'admin/dashboard');
// approve or reject teachers
$router->add('/admin/approveTeacher', 'admin/teachers/approveTeacher');
$router->add('/admin/rejectTeacher', 'admin/teachers/rejectTeacher');
// manage users
$router->add('/admin/users', 'admin/users/manageUsers');
$router->add('/admin/activateUser', 'admin/users/activateUser');
$router->add('/admin/deactivateUser', 'admin/users/deactivateUser');
$router->add('/admin/deleteUser', 'admin/users/deleteUser');
// manage categories
$router->add('/admin/categories', 'admin/categories/manageCategories');
$router->add('/admin/addCategory', 'admin/categories/addCategory');
$router->add('/admin/updateCategory', 'admin/categories/updateCategory');
$router->add('/admin/deleteCategory', 'admin/categories/deleteCategory');
// manage courses
$router->add('/admin/courses', 'admin/courses/manageCourses');
$router->add('/admin/activateCourse', 'admin/courses/activateCourse');
$router->add('/admin/deactivateCourse', 'admin/courses/deactivateCourse');
$router->add('/admin/deleteCourse', 'admin/courses/deleteCourse');
// manage tags
$router->add('/admin/tags', 'admin/tags/manageTags');
$router->add('/admin/addTags', 'admin/tags/addTags');
$router->add('/admin/deleteTag', 'admin/tags/deleteTag');

// Dispatch
$router->dispatch($_SERVER['REQUEST_URI']);
