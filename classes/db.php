<?php
	// Database wrapper as a Singleton
	
class DB {

	private static $_instance = null; 	// db instance if available
	private $_conn,
			$_query,
			$_error = false,
			$_results,
			$_fields,
			$_count = 0;

	private function __construct() {

		try {
			$this->_conn = new mysqli(
					Config::get('mysql/host'),
					Config::get('mysql/username'),
					Config::get('mysql/password'),
					Config::get('mysql/dbname'));

			/* check connection */
			if ($this->_conn->connect_errno) {
			    printf("Connect failed: %s\n", $this->_conn->connect_error);
			    exit();
			}
			// else
			// 	echo "success!!";

		} catch(mysqli_sql_exception $e) {
			$e->errorMessage();
		}

	}

	public static function getInstance() {
		if(!isset(self::$_instance)) {
			self::$_instance = new DB();
		}
		return self::$_instance;
	}

	public function query($sql) {
		$this->_error = false;
		// try {
		
		if($this->_results = $this->_conn->query($sql)) {

			$this->_count  = $this->_results->num_rows;
			$this->_fields = $this->_results->fetch_fields();	// Get field information for all columns

		}
		
		// } catch {

		// }
		return $this;
	}

	public function results() {
		return $this->_results;
	}

	public function tableHeader() {

		// loop thru each column name
		$htmlrow  = '<tr>';
		foreach($this->_fields as $field) {
			$htmlrow .= '<th>' . $field->name . '</th>';
		}

		$htmlrow .= '</tr>';

		return $htmlrow;
	}

	public function tableBody() {

		// loop thru all rows
		$htmlBody = '';

		foreach($this->_results as $record) {
			$htmlBody .= '<tr>';
			foreach($record as $value) {
				$htmlBody .= '<td>' . $value . '</td>
				';
			}
			$htmlBody .= '</tr>';
		}

		return $htmlBody;
	}

}












?>