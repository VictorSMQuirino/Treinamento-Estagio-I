<?php

use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clientes')->insert([
            'nome'  =>  'Jéssica Cerqueira',
            'telefone'  =>  '(73) 98872-1272',
            'nascimento'  =>  '1992-05-26',
            'email' =>  'jessica.cerqueira@uesb.edu.br',
            'created_at' =>  now()
        ] );
    }
}
