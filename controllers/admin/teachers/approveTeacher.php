<?php
$id = htmlspecialchars($_GET['id']);
$db = new Database();
Admin::approveTeacher($db, $id);
header('Location: /admin/dashboard');
?>