<?php
require_once "connection.php";

try {
    $projectName = $_GET['projectName'];
    
    $stmt = $connection->prepare("
        SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(work.time_end, work.time_start)))) AS total_work_time
        FROM work
        INNER JOIN project ON work.FID_PROJECTS = project.ID_PROJECTS
        WHERE project.name = :projectName
    ");
    $stmt->bindParam(':projectName', $projectName);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "Total Work Time: " . $result['total_work_time'];
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>