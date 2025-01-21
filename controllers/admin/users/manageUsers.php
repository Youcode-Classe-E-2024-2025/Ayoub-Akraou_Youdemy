<?php

$db = new Database();
$users = User::getAll($db);

require_once('views/admin/manageUsers.php');