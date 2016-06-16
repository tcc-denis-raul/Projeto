<?php 
class Configuration 
{
	public function readConFile($field) {
		$inf = file_get_contents("../../paloma.json");
		$dec_inf = json_decode($inf, true);
		return $dec_inf[$field];
	}
	public function getDBName() {
		$database = $this->readConFile("database");
		return $database['db_name'];
	}

	public function getCollection($coll) {
		$database = $this->readConFile("database");
		return $database['collection'][$coll];
	}
}

