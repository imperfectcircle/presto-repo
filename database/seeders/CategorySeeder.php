<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $categories=['sport','motori','elettronica','casa','giardinaggio','giochi','telefonia','informatica','abbigliamento','libri']; 
      

      foreach ($categories as $category){
       
        DB::table('categories')->insert([
            'name'=>$category
        ]); 
      }
      
    }
}
