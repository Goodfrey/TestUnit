<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data[0]   = ['name' => ucfirst('Producto 1'), 'price' => 10.00, 'import' => 2.50];
        $data[1]   = ['name' => ucfirst('Producto 2'), 'price' => 15.00, 'import' => 3.50];
        $data[2]   = ['name' => ucfirst('Producto 3'), 'price' => 20.00, 'import' => 4.50];
        $data[3]   = ['name' => ucfirst('Producto 4'), 'price' => 25.00, 'import' => 5.50];
        $data[4]   = ['name' => ucfirst('Producto 5'), 'price' => 30.00, 'import' => 6.50];

        foreach ($data as $d => $da)
        {
            $new            =   New Product();
            $new->name      =   $da['name'];
            $new->price     =   $da['price'];
            $new->import    =   $da['import'];
            try {
                $new->save();
            } catch (\Exception $e) {
                var_dump($e->getMessage());
            }

        }
    }
}
