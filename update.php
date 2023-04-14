<?php
require_once 'db.php';

if (!empty($_POST)) {
    foreach ($_POST as $key => $value) {
        $_POST[$key] = mysqli_real_escape_string($db, $value);
    }

    extract($_POST);

    $id = (int) $id;

    $update = "UPDATE `team` SET `name` = '$name', `email` = '$email', `date` = '$date' WHERE `id` = $id";

    $query = mysqli_query($db, $update);

    if ($query)
        header('Location: team.php');
}

?>