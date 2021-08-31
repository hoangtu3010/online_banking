<?php

namespace Database\Factories;

use App\Models\CustomerInfo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerInfoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CustomerInfo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::all("id");

        return [
            "image"=>null,
            "name"=>$this->faker->name(),
            "birthday"=>$this->faker->dateTimeBetween("-30 years", "-16 years"),
            "address"=>$this->faker->address,
            "tel"=>$this->faker->phoneNumber(),
            "cmnd"=>$this->faker->numberBetween(100000000, 999999999),
            "user_id"=>$user->random()
        ];
    }
}
