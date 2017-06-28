<?php
		require_once 'core/init.php';

		$instance = DB::getInstance();

		if(!isset($_GET['searchName'])) {
				$searchName = '';
		}
		else {
				$searchName = $_GET['searchName'];
		}

		$employeesResults = DB::getInstance()->query("SELECT id, last_name, first_name, email_address FROM employees
		WHERE first_name LIKE '%{$searchName}%'");
?>


		<table>
			<?php
					echo $employeesResults->tableHeader();
					echo $employeesResults->tableBody();
			?>
		</table>
