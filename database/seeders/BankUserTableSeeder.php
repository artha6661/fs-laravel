<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class BankUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('bankuser')->insert([
            [
                "id" => 1,
                "name" => "asep",
                "date_of_birth" => "2001-12-12",
                "email"=> "tampan@gaming.com",
                "phone_number"=> "081212121121",
                "account_number" => "MANDIRI2300123",
                "created_at" => Carbon::now()
            ],
            [
                "id" => 2,
                "name" => "ujang",
                "date_of_birth" => "2001-12-12",
                "email"=> "ujang@gaming.com",
                "phone_number"=> "081212121121",
                "account_number" => "MANDIRI2300123",
                "created_at" => Carbon::now()
            ]
            ]);
    }
}
