<?php

class Category{
	
	/*
		The find static method selects categories
		from the database and returns them as
		an array of Category objects.
	*/
	
	public static function find($arr = array()){
		global $db;
		
		//$query = "SELECT id, name, contains FROM categories ";
		if(empty($arr)){
			//$st = $db->prepare($query);
			$st = $db->prepare("SELECT id, name, contains FROM categories ");
		}
		else if($arr['id']){
			//$st = $db->prepare($query . " WHERE id=:id");
			$st = $db->prepare("SELECT id, name, contains FROM categories WHERE id=:id");
		}
		else if($arr['name']){
			//$st = $db->prepare($query . " WHERE name=:name");
			$st = $db->prepare("SELECT id, name, contains FROM categories WHERE name=:name");
		}
		else {
			throw new Exception("Unsupported property!");
		}
		
		$st->execute($arr);
		
		// Returns an array of Category objects:
		return $st->fetchAll(PDO::FETCH_CLASS, "Category");
	}
}

?>
