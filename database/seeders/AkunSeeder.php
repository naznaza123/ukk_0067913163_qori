<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data=[
            [
                'name'=>'abuy',
                'email'=>'admin@gmail.com',
                'password'=>bcrypt('12345'),
                'level'=>'admin'
            ],[
                'name'=>'qorinaza',
                'email'=>'p@gmail.com',
                'password'=>bcrypt('12345'),
                'level'=>'petugas'
            ]
            ];

            foreach ($data as $value){
                User::create($value);
            }


    }
}
