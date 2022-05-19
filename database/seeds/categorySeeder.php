<?php

use Illuminate\Database\Seeder;

class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'categoryName'=>'Fair or Events',
                'categoryPlan'=>'Basic',
                'categoryPrice'=>'500',
                'categoryMedia'=>'3',
                'categoryBoost'=>'1',
            ],
            [
                'categoryName'=>'Fair or Events',
                'categoryPlan'=>'Advance',
                'categoryPrice'=>'1500',
                'categoryMedia'=>'10',
                'categoryBoost'=>'3',
            ],
            [
                'categoryName'=>'Fair or Events',
                'categoryPlan'=>'Premium',
                'categoryPrice'=>'2500',
                'categoryMedia'=>'20',
                'categoryBoost'=>'7',
            ],
            [
                'categoryName' => 'Food or Beverages',
                'categoryPlan'=>'Basic',
                'categoryPrice'=>'300',
                'categoryMedia'=>'5',
                'categoryBoost'=>'1',
            ],
            [
                'categoryName' => 'Food or Beverages',
                'categoryPlan'=>'Advance',
                'categoryPrice'=>'800',
                'categoryMedia'=>'10',
                'categoryBoost'=>'3',
            ],
            [
                'categoryName' => 'Food or Beverages',
                'categoryPlan'=>'Premium',
                'categoryPrice'=>'1500',
                'categoryMedia'=>'20',
                'categoryBoost'=>'7',
            ],
            [
                'categoryName' => 'Product or Merch',
                'categoryPlan'=>'Basic',
                'categoryPrice'=>'200',
                'categoryMedia'=>'5',
                'categoryBoost'=>'1',
            ],   
            [
                'categoryName' => 'Product or Merch',
                'categoryPlan'=>'Advance',
                'categoryPrice'=>'500',
                'categoryMedia'=>'10',
                'categoryBoost'=>'3',
            ], 
            [
                'categoryName' => 'Product or Merch',
                'categoryPlan'=>'Premium',
                'categoryPrice'=>'1000',
                'categoryMedia'=>'20',
                'categoryBoost'=>'7',
            ],          
        ]);
    }
}
