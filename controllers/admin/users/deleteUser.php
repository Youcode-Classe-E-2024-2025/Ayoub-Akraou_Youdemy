<?php
$user_id = htmlspecialchars($_GET['id']);
$db = new Database();
User::delete($db, $user_id);
header('Location: /admin/users');
?>
