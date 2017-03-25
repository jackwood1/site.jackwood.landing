<?php

/* This controller renders the category pages */

class BlockchainController{
	public function handleRequest(){
		// pull the category by id passed in the URL
		$cat = Category::find(array('id'=>$_GET['blockchain']));
		
		if(empty($cat)){
			throw new Exception("There is no such type!");
		}
		
		// Fetch all the categories:
		//$categories = Category::find();
		
		// Fetch all the products in this category:
		//$products = Product::find(array('category'=>$_GET['category']));
		
		// $categories and $products are both arrays with objects
		
		render('category',array(
			'title'		=> 'Browsing '.$cat[0]->name,
			'categories'	=> $categories,
			'products'	=> $products
		));		
	}
}


?>
