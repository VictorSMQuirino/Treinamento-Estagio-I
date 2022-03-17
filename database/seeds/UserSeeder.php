<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'  =>  'Jéssica Cerqueira',
            'email' =>  'jessica.cerqueira@uesb.edu.br',
            'password'  =>  bcrypt('admin'),
            'created_at' =>  now()
        ] );
    }
}
