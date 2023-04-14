<?php

require_once 'db.php';

if (!empty($_POST)) {
    foreach ($_POST as $key => $value) {
        $_POST[$key] = mysqli_real_escape_string($db, $value);
    }

    extract($_POST); //same as code below

    // $name = mysqli_real_escape_string($db,$_POST['name']);
    // $email = mysqli_real_escape_string($db,$_POST['email']);
    // $date = mysqli_real_escape_string($db,$_POST['date']);

    $insert = "INSERT INTO team (name, email, date) VALUES ('$name', '$email', '$date')";

    $query = mysqli_query($db, $insert);

    if ($query)
        header('Location: team.php');
}

?>