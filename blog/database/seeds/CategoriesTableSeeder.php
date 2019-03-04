<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $city = new Category();
        $city->id = 1;
        $city->name = 'Story';
        $city->save();

        $city = new Category();
        $city->id = 2;
        $city->name = 'CodeGym';
        $city->save();

        $city = new Category();
        $city->id = 3;
        $city->name = 'Jame';
        $city->save();

        $city = new Category();
        $city->id = 4;
        $city->name = 'Bob';
        $city->save();


    }
}
