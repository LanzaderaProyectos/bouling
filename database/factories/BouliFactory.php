<?php

namespace Database\Factories;

use App\Models\Brand;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bouli>
 */
class BouliFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $brand = Brand::where("legal_name", "Facebook")->get();

        if (!isset($brand[0]->id)) {
            $brand = new Brand([
                'name' => 'Facebook',
                'legal_name' => 'Facebook',
                'phone' => '123321123',
                'email' => 'admin@brand.com',
                'address' => fake()->streetAddress(),
                'city' => fake()->city(),
                'state' => 'California',
                'country' => fake()->country(),
                'postal_code' => '08019',
            ]);
            $brand->save();
        } else {
            $brand = $brand[0];
        }

        $now = CarbonImmutable::now();
        $tomorrow = $now->add(1, 'day');

        return [
            'name' => fake()->unique()->safeColorName(),
            'key_value' => fake()->unique()->company(),
            'description' => fake()->sentence(20),
            'social_network' => 'Instagram',
            'requirement' => 'Take 5 with our brand',
            'reward' => '20% discount',
            'condition' => 0,
            'date_start' => $now,
            'date_finish' => $tomorrow,
            'brand_id' => $brand->id
        ];
    }
}
