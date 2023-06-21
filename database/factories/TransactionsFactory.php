<?php

namespace Database\Factories;

use App\Models\Transactions;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class TransactionsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Transactions::class;
    public function definition()
    {
        return [
            'paidAmount' => number_format($this->rand_float(20,10000,10000), 2, '.', '') ,
            'Currency' => $this->faker->currencyCode(),
            'parentEmail' =>User::inRandomOrder()->first()->email,
            'statusCode' => rand(1,3),
            'paymentDate' => $this->faker->date(),
            'parentIdentification' => Str::random(7).'-'.Str::random(4).'-'.Str::random(5).'-'.Str::random(5).'-'.Str::random(12),
        ];
    }

    function rand_float($startNum,$endNum,$mul)
    {
        if ($startNum>$endNum) return false;
        return mt_rand($startNum*$mul,$endNum*$mul)/$mul;
    }
}
