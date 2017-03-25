<?php

class Country{
	
	/*
		The find static method selects countries
		from the database and returns them as
		an array of Country objects.
	*/
	
	public static function find($arr = array()){
		global $db;
		
		$query = "SELECT id, country FROM tblCountries ";
		if(empty($arr)){
			$st = $db->prepare($query);
		}
		else if($arr['id']){
			$st = $db->prepare($query . " WHERE id=:id");
		}
		else if($arr['name']){
			$st = $db->prepare($query . " WHERE country=:country");
		}
		else {
			throw new Exception("Unsupported property!");
		}
		
		$st->execute($arr);
		
		// Returns an array of Category objects:
		return $st->fetchAll(PDO::FETCH_CLASS, "Country");
	}
}

?>
