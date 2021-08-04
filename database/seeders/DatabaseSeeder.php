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
        $this->call([
            BranchSeeder::class,
            CustomerInfoSeeder::class,
            BankAccountSeeder::class,
        ]);
    }
}
