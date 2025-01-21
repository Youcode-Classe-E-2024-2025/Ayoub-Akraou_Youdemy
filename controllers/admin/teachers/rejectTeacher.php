<?php
$teacher_id = htmlspecialchars($_GET['id']);
$db = new Database();
User::delete($db, $teacher_id);
header('Location: /admin/dashboard');
