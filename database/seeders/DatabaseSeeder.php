<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::insert('insert into produtos (descricao, quantidade, valor, data_vencimento) values (?,?,?,?)', array('Arroz', 10, 10.50, '2021-04-15'));
        DB::insert('insert into produtos (descricao, quantidade, valor, data_vencimento) values (?,?,?,?)', array('Feijão', 8, 8.00 , '2021-04-16'));
        Db::insert('insert into produtos (descricao, quantidade, valor, data_vencimento) values (?,?,?,?)', array('Óleo', 12, 5.99,   '2021-04-17'));
        DB::insert('insert into produtos (descricao, quantidade, valor, data_vencimento) values (?,?,?,?)', array('Farinha', 20, 3.50,'2021-04-18'));
    }
}
