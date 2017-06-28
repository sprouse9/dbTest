<?php
	require_once 'core/init.php';

	//$instance = DB::getInstance();

	// if(!isset($_POST['searchName'])){
	// 	$searchName = '';
	// }
	// else {
	// 		$searchName = $_POST['searchName'];
	// }

	// $employeesResults = DB::getInstance()->query("SELECT id, last_name, first_name, email_address FROM employees
	// 	WHERE first_name LIKE '%{$searchName}%'");
?>

<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<!-- <script src="./scripts/jquery-3.2.1.min.js"></script> -->

		<style>
					table {
						/*width: 100%;*/
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

			<p><H2>Welcome to the Employee Search Utility:</H2></p>
			<label for="searchfield">Search Name: </label>
			<input id ="searchTextBox" type="text" name="searchName"><br><br>

			<div id="searchTableResults" style="overflow-x:auto;">


			</div>

<script>
		var url;
		// When a key is pressed, this function will call
		// the controller via aJax to update the search results
		function updateSearchResults() {
				var divSearchResults = document.getElementById("searchTableResults");
				var search = document.getElementById("searchTextBox");
				url = 'displaySearchResults.php?searchName=' + search.value;

				var xhr = new XMLHttpRequest();
				xhr.open('GET', url, true);
				xhr.onreadystatechange = function() {

						if(xhr.readyState == 4 && xhr.status == 200) {
								divSearchResults.innerHTML = xhr.responseText;
						}
				}
				xhr.send();
		}

		var search = document.getElementById("searchTextBox");
		search.addEventListener("keyup", updateSearchResults);

		updateSearchResults();

</script>


</body>
</html>
