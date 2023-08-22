<?php

    function validateTask($task) {
         if(empty($task) && trim($task) == ''){
            return true;
         }else{
            return false;
         }
    }

    function task_exists(object $pdo,string $task) {

        $query = "SELECT * FROM tasks WHERE tasks = :task;";
        $stmt = $pdo->prepare($query);
        $stmt->bindparam(':task',$task);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;

        if($result){
            return true;
        }else{
            return false;
        }
    }

    function insertTask(object $pdo, string $task) {
        $query = "INSERT INTO `tasks`(`tasks`) VALUES (:task);";
        $stmt = $pdo->prepare($query);
        $stmt->bindparam(':task',$task);
        $stmt->execute();
    }

    function get_all_tasks(object $pdo){
        $query = "SELECT * FROM tasks;";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        return $results;
    }

    function display_all_tasks($tasks) {
        foreach ($tasks as $task) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($task['tasks']) . "</td>";
            echo "<td style='width: 10%;'><a href='delete.php?Id=" . $task['id'] . "'>delete</a></td>";
            echo "<td style='width: 10%;'><a href='update.php?Id=" . $task['id'] . "'>Update</a></td>";
            echo "</tr>";
        }
    }

    function delete_task(object $pdo, string $task) {
        $id = $_GET['Id'];
        $query = "DELETE FROM tasks WHERE id = :id;";
        $stmt = $pdo->prepare($query);
        $stmt->bindparam(':id',$id);
        $stmt->execute();
    }

    function update_task(object $pdo, string $task){
        $id = $_POST['id'];
        $update = $_POST['task'];
        $query = "UPDATE `tasks` SET `tasks`= ':update' WHERE id = :id;";
        $stmt = $pdo->prepare($query);
        $stmt->bindparam(':id',$id);
        $stmt->bindparam(':update',$update);
        $stmt->execute();
    }