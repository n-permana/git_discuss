<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CategoriesTableSeed
 *
 * @author permana
 */
class CategoriesTableSeeder extends Seeder {
    public function run()
	{
            Categorie::truncate();
            for( $i = 1; $i <= 10; $i++)
            {
                Categorie::create([
                   'categorie_name' => 'categori_'.$i,
                ]);
            }
	}
    //put your code here
}
