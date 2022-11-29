<?php

namespace Database\Factories\Modules\Qrcode\Model;


use App\Modules\Qrcode\Model\Qrcode;
use Illuminate\Database\Eloquent\Factories\Factory;

final class QrcodeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Qrcode::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'content' => $this->faker->word,
        ];
    }
}
