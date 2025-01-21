<?php
if(!isset($_SESSION['role']) ||$_SESSION['role'] == 'admin') header('Location: /courses');

if(isset($_GET['id'])) {
    $user_id = htmlspecialchars($_GET['id']);
    $db = new Database();
    Admin::activateUser($db, $user_id);
    header('Location: /admin/users');
}
