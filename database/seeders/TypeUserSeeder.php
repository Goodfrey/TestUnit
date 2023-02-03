<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TypeUser;

class TypeUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data[0]   = ['name' => ucfirst('Administrator')];
        $data[1]   = ['name' => ucfirst('Client')];

        foreach ($data as $d => $da)
        {
            $new                =   New TypeUser();
            $new->name          =   $da['name'];

            try {
                $new->save();
            } catch (\Exception $e) {
                var_dump($e->getMessage());
            }

        }
    }
}
