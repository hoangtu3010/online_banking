<?php

namespace Database\Seeders;

use App\Models\CustomerInfo;
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
        DB::table("roles")->insert([
            "name"=>"Admin",
            "ranker"=>1
        ]);

        DB::table("admins")->insert([
            "name"=>"Admin",
            "email"=>"admin@gmail.com",
            "password"=>bcrypt("123456789"),
            "role_id"=>1
        ]);

        DB::table("users")->insert([
            "name"=>"User",
            "email"=>"user@gmail.com",
            "password"=>bcrypt("123456789")
        ]);

        DB::table("savings_package")->insert([
            [
                "name_package"=>"Package three month",
                "time_package"=>"3",
                "interest"=>0.03
            ],
            [
                "name_package"=>"Package six month",
                "time_package"=>6,
                "interest"=>0.06
            ],
            [
                "name_package"=>"Package nice month",
                "time_package"=>9,
                "interest"=>0.09
            ],
            [
                "name_package"=>"Package twelve month",
                "time_package"=>12,
                "interest"=>0.12
            ]
        ]);

        $this->call([
            CustomerInfoSeeder::class,
            BankAccountSeeder::class,
        ]);

    }
}
