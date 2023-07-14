<?php
    require_once 'actions.php';
    $task = "";
    session_start();
    if(isset($_POST["task"])){
        $task = $_POST["task"];
        $taskName = $_POST["task-name"];
        addTask($task,$taskName);
    };
    if(isset($_GET["taskID"])){
        $taskID = $_GET["taskID"];
        removeTask($taskID);
      
    }
    if(isset($_GET["update"])){
        $taskID = $_GET["update"];
    };
    $tasks = getTasks();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        div.task{
            width:100%;
            height:auto;
            background:#F5F5F5;
            padding: 15px 5px;
            border-radius:10px;
            box-shadow:2px 2px 10px rgba(0,0,0,.2);
            animation: 1s ease-in-out;
            margin:20px 0;
            display: grid;
        }
        div.task > span{
            font-size:18px;
            font-weight: bold;
            margin:5px 0;
            padding:5px;
        }
        p{
            display: block;
            word-break: break-all;
        }
    </style>
    <title>To-do List PHP + MYSQL</title>
</head>
<body>
<div class="container-fluid  mt-5 d-flex justify-content-center flex-column ">
    <h1 class="fw-bold text-center">To-do List  PHP + MYSQL</h1>
    <div class="container">
    <form method="post">
    <div class="form-group">
    <label for="task-name" class="form-label fw-bold my-4">Task Name</label>
    <input type="text" class="form-control" id="task-name" placeholder="task name" required name="task-name">
        <label for="exampleFormControlTextarea1" class="fw-bold my-4">Task:</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="task" required maxlength="255"></textarea><?php $task?></textarea>
    </div>
    <input type="submit" class="btn btn-success mt-4" name="add-task" value="Add Task">
    </form>
    <div class="container mt-5">
            <?php
                foreach($tasks as $obj){
                    echo'<div class="task"><span>'.$obj -> task_name.'</span>'.
                    '<p>'.$obj -> task.'</p>'.'<div><a href="?taskID='.$obj -> taskID.'" rel="noreferrer" class="btn btn-primary">Finished !</a></div></div>';
                }
            ?>
    </div>
    </div>
</div>
</body>
</html>
