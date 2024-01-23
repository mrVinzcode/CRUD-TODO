<?php
include 'db.php';

//check if 'id' is set in the URL param
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];

    //prevent SQL injection
    $statements = $db->prepare("DELETE FROM tasks WHERE id = ?");
    $statements->bind_param('i', $id);

    if ($statements->execute()) {
        header('location: index.php');
        exit;
    } else {
        echo "ERROR: " . $statements->error;
    }
    $statements->close();
} else {
    echo "ID is not set in the URL";
}
