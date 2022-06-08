<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PesertaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pesertas')->insert(
            [
                [
                    'nama' => 'Denny',
                    'jenis_kelamin' => 'Laki-laki',
                    'hobi' => 'Bermain Game',
                    'email' => 'denny@gmail.com',
                    'telp' => '081212121212',
                    'username' => 'denny',
                    'password' => password_hash('123456', PASSWORD_DEFAULT),
                ],
                [
                    'name' => 'Budi',
                    'jenis_kelamin' => 'Laki-laki',
                    'hobi' => 'Bermain Game',
                    'email' => 'budi@gmail.com',
                    'telp' => '081212121212',
                    'username' => 'budi',
                    'password' => password_hash('123456', PASSWORD_DEFAULT),
                ]
            ]
        );
    }
}
