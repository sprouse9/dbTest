<?php
	require_once 'core/init.php';

	$instance = DB::getInstance();

	if(!isset($_POST['searchName'])){
		$searchName = '';
	}
	else {
			$searchName = $_POST['searchName'];
		}

	$employeesResults = DB::getInstance()->query("SELECT id, last_name, first_name, email_address FROM employees
		WHERE first_name LIKE '%{$searchName}%'");

?>

<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<script src="./scripts/jquery-3.2.1.min.js"></script>

		<style>
					table {
						width: 100%;
					}

					table, td, th {
						border: 1px solid;
						border-collapse: collapse;
					}
		</style>


	</head>
<body>

			<label for="searchName">Search: </label>
			<input type="text" name="searchName"><br><br>
	
	<div style="overflow-x:auto;">
			<table>
				<?php
						echo $employeesResults->tableHeader();
						echo $employeesResults->tableBody();
				?>
			</table>
	</div>

<pre>
	<?php
		print_r($_POST);
		//var_dump($instance);
		//print_r($employeesResults);

	//foreach($employeesResults->results() as $employee) {
		//echo '<br>-------------------------------------------------<br>';
		//var_dump( $employee );
		//echo $employee['first_name'];
		//print_r($employee);

	//}
	?>
</pre>




</body>
</html>
