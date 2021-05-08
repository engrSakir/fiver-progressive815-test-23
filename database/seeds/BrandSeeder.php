<?php

use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brand = new \App\Brand();
        $brand->name = 'Volvo';
        $brand->save();

        $brand = new \App\Brand();
        $brand->name = 'VAZ';
        $brand->save();

        $brand = new \App\Brand();
        $brand->name = 'Mercedes';
        $brand->save();

        $brand = new \App\Brand();
        $brand->name = 'GAZ';
        $brand->save();
    }
}
