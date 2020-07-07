<?php

use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('features')->insert([
            'name' => 'Build a car section',
            'description' => 'Build a new section called \'cars\' where you car add cars and schedule MOT & TAX dates'
        ]);
        DB::table('features')->insert([
            'name' => 'Build a shop section',
            'description' => 'Build a new section called \'shop\' where you car add products and add images of the product'
        ]);
        DB::table('features')->insert([
            'name' => 'Build a favourite films section',
            'description' => 'Build a new section called \'Facourite  films\' where you car add the users personal favourite film and add add a review of the film'
        ]);
    }
}