<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TypeUser;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tyA   =   TypeUser::where('name', 'like', '%admin%')->first()->id;
        $tyC   =   TypeUser::where('name', 'like', '%clien%')->first()->id;

        $data[0]   = [
            'name'      =>  ucfirst('Administrator'),
            'email'     =>  strtolower('admin@boomsolutions.com'),
            'password'  =>  bcrypt('12345'),
            'type'      =>  $tyA,
        ];
        $data[1]   = [
            'name'      =>  ucfirst('Luis campos'),
            'email'     =>  strtolower('luis.924@boomsolutions.com'),
            'password'  =>  bcrypt('12345'),
            'type'      =>  $tyC,
        ];

        foreach ($data as $d => $da)
        {
            $new                =   New User();
            $new->name          =   $da['name'];
            $new->email         =   $da['email'];
            $new->password      =   $da['password'];
            $new->type_id       =   $da['type'];

            try {
                $new->save();
            } catch (\Exception $e) {
                var_dump($e->getMessage());
            }
        }
    }
}
