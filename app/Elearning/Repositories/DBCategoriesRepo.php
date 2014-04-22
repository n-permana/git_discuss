<?php namespace Elearning\Repositories;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DBCategoriesRepo
 *
 * @author permana
 */
use Elearning\Models\categorie;

class DBCategoriesRepo {
    
    public function getAll()
    {
        return Categorie::all();
    }
    
    public function categorieList()
    {
        return Categorie::lists('categorie_name','id');
    }
    
    public function getCategoryByCategoryName($category_name)
    {
        return Categorie::where('categorie_name',$category_name)->first();
    }
}
