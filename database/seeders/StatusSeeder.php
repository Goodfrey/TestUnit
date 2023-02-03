<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data[0]   = ['name' => ucfirst('Pendiente')];
        $data[1]   = ['name' => ucfirst('Procesado')];

        foreach ($data as $d => $da)
        {
            $new                =   New Status();
            $new->name          =   $da['name'];

            try {
                $new->save();
            } catch (\Exception $e) {
                var_dump($e->getMessage());
            }

        }
    }
}
