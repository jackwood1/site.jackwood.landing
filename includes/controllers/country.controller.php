<?php

/* This controller renders the category pages */

class CountryController{
    public function handleRequest(){
        // pull the category by id passed in the URL
        $cat = Category::find(array('id'=>$_GET['category']));

        if(empty($cat)){
            throw new Exception("There is no such category!");
        }

        // Fetch all the categories:
        $categories = Category::find();

        // Fetch all the products in this category:
        $countries = Product::find(array('category'=>$_GET['category']));

        // $categories and $products are both arrays with objects

        render('country',array(
            'title'		=> 'Browsing '.$cat[0]->name,
            'categories'	=> $categories,
            'products'	=> $countries
        ));
    }
}


?>