<?php

use Illuminate\Database\Seeder;
use App\Admin;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    
    public function run(){

        $this->call([  
            categorySeeder::class,
        ]);
        
    }
   

}
