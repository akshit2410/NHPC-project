<?php
    require('../config/config.php');
    require('../config/db.php');
    
    $query = "SELECT * FROM articles
                WHERE deptid = 'jba' 
                ORDER BY startdate DESC";
    $result = mysqli_query($conn, $query);
    $circulars = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if(isset($_POST['add'])){
        session_start();
        
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $body = mysqli_real_escape_string($conn, $_POST['body']);
        $loc = mysqli_real_escape_string($conn, $_SESSION['loc']);
        $deptid = mysqli_real_escape_string($conn, $_SESSION['deptid']);
        $enddate = mysqli_real_escape_string($conn, $_POST['enddate']);
        $empid = mysqli_real_escape_string($conn, $_SESSION['empid']);

        $query = "INSERT INTO articles(title, body, loc, deptid, startdate, enddate, empid) VALUES ('$title', '$body', '$loc', '$deptid', CURDATE(),'$enddate','$empid')";

        if(mysqli_query($conn, $query)){
            header('Location: '.'http://localhost/phpsandbox/Website2/circular/circular.php'.'');
        } else {
            echo 'ERROR: '. mysqli_error($conn);
        }
    }

    if(isset($_POST['edit'])){
        session_start();

        $articleid = mysqli_real_escape_string($conn, $_POST['articleid']);
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $body = mysqli_real_escape_string($conn, $_POST['body']);
        $enddate = mysqli_real_escape_string($conn, $_POST['enddate']);
        
        $query = "UPDATE articles SET 
                    title='$title',
                    body='$body',
                    enddate='$enddate' 
                        WHERE articleid = '$articleid'";
        if(mysqli_query($conn, $query)){
            header('Location: '.'http://localhost/phpsandbox/Website2/circular/circular.php'.'');
        } else {
            echo 'ERROR: '. mysqli_error($conn);
        }
    }

    if(isset($_POST['delete'])){
        session_start();

        $articleid = mysqli_real_escape_string($conn, $_POST['articleid']);

        $query = "DELETE FROM articles WHERE articleid='$articleid'";
        if(mysqli_query($conn, $query)){
            header('Location: '.'http://localhost/phpsandbox/Website2/circular/circular.php'.'');
        } else {
            echo 'ERROR: '. mysqli_error($conn);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>NHPC Admin</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../circular/style.css"></style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="../circular/main.js"></script>
</head>

<body>
    <div class="container">
        <br>
        <a href="../admin/adminindex.php"><button class="btn btn-primary">Go to Home</button></a>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Manage <b>Circulars</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Circular</span></a>
                        <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>    
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Department</th>
                        <th>Valid Upto</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($circulars as $circular): ?>
                        <tr>
                            <td><?php echo $circular['articleid'] ?></td>
                            <td><?php echo $circular['title']; ?></td>
                            <td><?php echo $circular['deptid']; ?></td>
                            <td><?php echo $circular['enddate']; ?></td>
                            <td>
                                <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Add Modal HTML -->
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
                    <div class="modal-header">                      
                        <h4 class="modal-title">Add Circular</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">                    
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Body</label>
                            <textarea class="form-control" name="body" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>End Date</label>
                            <input type="date" name="enddate" class="form-control" required>
                        </div>                  
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <button type="submit" name="add" class="btn btn-success">Add</button> 
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="editEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
                    <div class="modal-header">                      
                        <h4 class="modal-title">Edit Circular</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>ID</label>
                            <input type="text" class="form-control" name="articleid" required>
                        </div>                    
                        <div class="form-group">
                            <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Body</label>
                            <textarea class="form-control" name="body" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>End Date</label>
                            <input type="date" name="enddate" class="form-control" required>
                        </div>                 
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <button type="submit" name="edit" class="btn btn-info">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Delete Modal HTML -->
    <div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">                      
                        <h4 class="modal-title">Delete Circular</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">                    
                        <p>Are you sure you want to delete these Records?</p>
                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>                                                                 