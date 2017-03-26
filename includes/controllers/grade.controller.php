<?php

/* This controller renders the category pages */

class GradeController{
    public function handleRequest(){
        // pull the category by id passed in the URL
        $cat = Category::find(array('id'=>$_GET['grade']));

        if(empty($cat)){
            throw new Exception("There is no such grade!");
        }

        // Fetch all the categories:
        $categories = Category::find();

        // Fetch all the products in this category:
        $grades = Grade::find(array('grade'=>$_GET['grade']));

        // $categories and $products are both arrays with objects
        //this whole thing needs to be fixed
        render('grades',array(
            'title'		=> 'Browsing '.$cat[0]->name,
            'categories'	=> $categories,
            'products'	=> $products
        ));
    }
}


?>