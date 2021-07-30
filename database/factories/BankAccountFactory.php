<?php

namespace Database\Factories;

use App\Models\BankAccount;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BankAccountFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BankAccount::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::all("id");

        return [
            "stk"=>$this->faker->numberBetween(1000000000, 1100000000),
            "balance"=>$this->faker->numberBetween(1000, 100000)*1000,
            "user_id"=>$user->random()
        ];
    }
}
