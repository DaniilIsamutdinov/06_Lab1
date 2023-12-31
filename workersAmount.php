<?php
require_once "connection.php";

try {
    $chief = $_GET['chief'];
    $stmt = $connection->prepare("
        SELECT COUNT(worker.ID_WORKER) AS total_workers
        FROM worker
        INNER JOIN department ON worker.FID_DEPARTMENT = department.ID_DEPARTMENT
        WHERE department.chief = :chief
    ");
    $stmt->bindParam(':chief', $chief);
    $stmt->execute();
    $cursor = $stmt->fetch(PDO::FETCH_ASSOC);
    if($cursor['total_workers'] == 0){
        echo "Chief has no workers!";
        exit;
    }
    echo "Total Workers: " . $cursor['total_workers'];
} catch(PDOException $ex) {
    echo "Connection failed: " . $ex->getMessage();
}
?>