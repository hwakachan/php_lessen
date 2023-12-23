<?php

require('connect.php');

$id = $_REQUEST['id'];
$del = $pdo->prepare('DELETE FROM post WHERE id = :id');
$del->bindValue('id', $id);
$del->execute();

header('Location: index.php');
exit();

