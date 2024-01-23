<!DOCTYPE html>

<?php include 'db.php';

//pagination confi
$page = (isset($_GET['page']) ? (int)$_GET['page'] : 1);
$perPage = (isset($_GET['per_page']) && (int)$_GET(['per-page']) <= 50 ? (int)$_GET['per_page'] : 4);
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;


$sql = "select * from tasks LIMIT " . $start . ", " . $perPage . " ";
$total = $db->query("select * from tasks")->num_rows;
$pages = ceil($total / $perPage);

$rows = $db->query($sql);

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

        <div class="row " style="margin-top: 70px;">
            <center>
                <h1>TODO LIST</h1>
            </center>



            <div class="col-md-10 offset-md-1">
                <button type="button" data-bs-target="#exampleModal" data-bs-toggle="modal" class="btn btn-success ">Add Task</button>
                <button type="button" class="btn btn-primary" style="float: right;">Print</button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Task</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row mb-3">

                                    <!-- Add.php file -->
                                    <form method="post" action="add.php">
                                        <label>Task Name</label>
                                        <input type="text" required name="task" class="form-control">
                                </div>
                                <input type="submit" name="send" value="Add Task" class="btn btn-success">
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <hr><br><br>

                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Task</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $rows->fetch_assoc()) : ?>

                            <!-- <?php var_dump($row); ?> -->

                            <tr>
                                <th><?php echo $row['id'] ?></th>
                                <td class="col-md-10"><?php echo $row['task'] ?></td>
                                <td><a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Edit</button></a></td>
                                <td><a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>

                <ul class="pagination justify-content-center">
                    <?php for ($i = 1; $i <= $pages; $i++) : ?>
                        <li><a class="page-link" href="?page=<?php echo $i; ?>&per-page=<?php echo $perPage; ?>"><?php echo $i; ?></a></li>
                    <?php endfor; ?>
                </ul>
            </div>
        </div>
    </div>











    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>