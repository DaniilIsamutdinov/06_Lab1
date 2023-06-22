<?php
require_once "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>lb1</title>
	</head>
	<body>
		<form action="getDescription.php" method="GET">
			<p>інформація про виконані завдання за обраним проєктом на зазначену дату;</p>
			ID:
			<select name="projectID">
				<?php
                try {
				$sql = "SELECT ID_Projects FROM PROJECT";
                $stmt = $connection->prepare($sql);
				$stmt->execute(); 
				$cursor = $stmt->fetchAll(PDO::FETCH_ASSOC); 
                foreach ($cursor as $id) {
					echo '<option>' . $id['ID_Projects'] . '</option>';
				}
				} catch (PDOException $ex) {
					echo $ex->getMessage(); 
				}
                ?>
			</select>
			Date: 
			<input type="date" name="date" value="2019-04-16" />
			<input type="submit" value="Отримати" />
		</form>

		<form action="totalTime.php" method="GET">
			<p>загальний час роботи над обраним проєктом;</p>
			ID:
			<select name="projectName">
				<?php
                try {
				$sql = "SELECT name FROM PROJECT";
                $stmt = $connection->prepare($sql);
				$stmt->execute(); 
				$cursor = $stmt->fetchAll(PDO::FETCH_ASSOC); 
                foreach ($cursor as $name) {
					echo '<option>' . $name['name'] . '</option>';
				}
				} catch (PDOException $ex) {
					echo $ex->getMessage(); 
				}
                ?>
			</select>
			<input type="submit" value="Отримати" />
		</form>

		<form action="workersAmount.php" method="GET">
			<p>кількість співробітників відділу обраного керівника.</p>
			Chief:
			<select name="chief">
				<?php
                try {
				$sql = "SELECT chief FROM DEPARTMENT";
                $stmt = $connection->prepare($sql);
				$stmt->execute(); 
				$cursor = $stmt->fetchAll(PDO::FETCH_ASSOC); 
                foreach ($cursor as $chief) {
					echo '<option>' . $chief['chief'] . '</option>';
				}
				} catch (PDOException $ex) {
					echo $ex->getMessage(); 
				}
                ?>
			</select>
			<input type="submit" value="Отримати" />
		</form>
	</body>
</html>
