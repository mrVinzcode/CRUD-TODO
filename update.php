<!DOCTYPE html>

<?php include 'db.php';

$id = (int)$_GET['id'];
$sql = "select * from tasks where id ='$id'";
$rows = $db->query($sql);
$row = $rows->fetch_assoc();

if (isset($_POST['send'])) {
    $task = htmlspecialchars($_POST['task']);

    $sql2 = "UPDATE tasks SET task = '$task' WHERE id = '$id'";
    $db->query($sql2);

    header('location:index.php');
    exit;
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD App</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <center>
            <h1>TODO LIST</h1>
        </center>

        <div class="row" style="margin-top: 70px;">
            <div class="col-md-10 offset-md-1">
                <hr>
                <!-- Add.php file -->
                <form method="post" action="">
                    <label>Update Task</label>
                    <br />
                    <br />
                    <input type="text" required name="task" value="<?php echo $row['task']; ?>" class="form-control">
                    <input type="submit" name="send" value="Update" class="btn btn-success mt-3">
                </form>
            </div>
        </div>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>