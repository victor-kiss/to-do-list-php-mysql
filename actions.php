<?php
require_once 'db-connect.php';
function addTask($task,$taskName){
    global $dsn,$password,$user;
    $taskID = null;
    try{
        $pdo = new PDO($dsn,$user,$password);
        $pdo -> setAttribute(PDO::ATTR_ERRMODE ,PDO::ERRMODE_EXCEPTION);
        $query = "INSERT INTO tasks (taskID,task,task_name) VALUES (:taskID,:task,:taskName)";
        $stm = $pdo -> prepare($query);
        $stm -> bindValue(':taskID',$taskID,PDO::PARAM_INT);
        $stm -> bindValue(':task',$task,PDO::PARAM_STR);
        $stm -> bindValue(':taskName',$taskName,PDO::PARAM_STR);
        $stm -> execute();
        header('location:index.php');
    }catch(PDOException $e){
        $message = $e;
    }finally{
        if($pdo){
            $pdo = null;
        }
    }
    return $message;
}

function getTasks(){
    global $dsn,$password,$user;
    $tasks = [];
try{
    $pdo = new PDO($dsn,$user,$password);
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT taskID,task,task_name FROM tasks";
    $search = $pdo -> prepare($sql);
    $search -> execute();
    $tasks = $search -> fetchAll(PDO::FETCH_OBJ);
}catch(PDOException ){
    $tasks = [];
}finally{
        $pdo ? $pdo = null : $pdo;
        }
        return $tasks;
}


function removeTask($taskID){
    global $dsn,$password,$user;
    try{
        $pdo = new PDO($dsn,$user,$password,);
        $pdo -> setAttribute(PDO::ATTR_ERRMODE ,PDO::ERRMODE_EXCEPTION);
        $query = "DELETE FROM tasks WHERE taskID =:taskID";
        $stm = $pdo -> prepare($query);
        $stm -> bindValue(':taskID',$taskID);
        $stm -> execute();
    }catch(PDOException $e){
        $message = $e;
    }finally{
        if($pdo){
            $pdo = null;
        }
    }
    return $message;
}
?>

