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

		<script>
			var temp = '';

			function searchDB(event) {
						temp = event;
						if(event.length == 0) {
								return;
						}
						else {
								$.ajax({
									type: 'POST',
									url:  'ajaxdbsearch.php?searchName='+event,
									data: {}

					});

				}

			}

		</script>
		<style>
					table {
						width: 100%;
					}

					table, td, th {
						border: 1px solid;
						border-collapse: collapse;
						/*border-style: solid;
						border-width: 1px;*/
					}
		</style>


	</head>
<body>

			<label for="searchfield">Search: </label>
			<input type="text" name="searchName" onkeyup="searchDB(this.value)"><br><br>
	
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
