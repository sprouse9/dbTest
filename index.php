<?php
	require_once 'core/init.php';

	//$users = DB::getInstance()->query("SELECT * FROM users");

	// echo Config::get('mysql/host');
	// echo Config::get("mysql/dbname");

	$instance = DB::getInstance();
	//$employeesResults = $instance->query("SELECT * FROM customers");
	// $employeesResults = DB::getInstance()->query("SELECT id, product_code, product_name, standard_cost,
	// list_price, category FROM products");

	// $employeesResults = DB::getInstance()->query("SELECT id, product_code, product_name, standard_cost,
	// list_price, category FROM products");

	$employeesResults = DB::getInstance()->query("SELECT id, last_name, first_name, email_address FROM employees");

	// while($rowEmp = $employeesResults->fetch_row())
	// 	print_r($rowEmp);


?>

<!DOCTYPE html>
<html>
	<head>
		<title></title>

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


	<div style="overflow-x:auto;">
		<table>
			<?php 	echo $employeesResults->tableHeader();
					echo $employeesResults->tableBody();
			?>
		</table>
	</div>

<pre>
	<?php
		//var_dump($instance);
		//print_r($employeesResults);

	foreach($employeesResults->results() as $employee) {
		//echo '<br>-------------------------------------------------<br>';
		//var_dump( $employee );
		//echo $employee['first_name'];
		//print_r($employee);

	}
	?>
</pre>




</body>
</html>