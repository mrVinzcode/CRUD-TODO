<?php

include 'db.php';

if (isset($_POST['send'])) {

    $name = $_POST['task'];

    $statements = $db->prepare("INSERT INTO tasks(task) VALUES(?)");
    $statements->bind_param("s", $name);



    if ($statements->execute()) {
        $statements->close();
        header('location: index.php');
        exit;
    } else {
        echo "Error: " . $statements->error;
    }
}
